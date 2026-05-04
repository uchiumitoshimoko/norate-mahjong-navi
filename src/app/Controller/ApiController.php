<?php
App::uses('AppController', 'Controller');

class ApiController extends AppController {

    public function beforeFilter() {
        // API用: 不要なDB問い合わせを避けるため parent は呼ばず最小限に設定
        $this->Security->validatePost = false;
        $this->Security->csrfCheck    = false;
        $this->autoRender             = false;

        // Flutter開発用CORS（本番では適切なオリジンに絞ること）
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, OPTIONS');
        header('Content-Type: application/json; charset=utf-8');

        if ($this->request->method() === 'OPTIONS') {
            exit(0);
        }
    }

    // GET /api/v1/cities?pref_id={id}
    public function cities() {
        $pref_id = (int)$this->request->query('pref_id');

        if (!$pref_id) {
            $this->response->statusCode(400);
            echo json_encode(array('status' => 'error', 'message' => 'pref_id is required'), JSON_UNESCAPED_UNICODE);
            return;
        }

        $this->loadModel('Matis');

        $matis = $this->Matis->find('all', array(
            'conditions' => array('pref_id' => $pref_id, 'count >' => 0),
            'order'      => array('count' => 'desc'),
            'fields'     => array('mati', 'count'),
        ));

        $result = array();
        foreach ($matis as $row) {
            $result[] = array(
                'mati'  => $row['Matis']['mati'],
                'count' => (int)$row['Matis']['count'],
            );
        }

        echo json_encode(
            array('status' => 'ok', 'pref_id' => $pref_id, 'cities' => $result),
            JSON_UNESCAPED_UNICODE
        );
    }

    private function _firstImageNo($s) {
        for ($i = 1; $i <= 4; $i++) {
            if (!empty($s['store_mime_' . $i])) return $i;
        }
        return 0;
    }

    // GET /api/v1/search?keyword={kw}&pref_id={id}
    public function search() {
        $keyword = trim((string)$this->request->query('keyword'));
        $pref_id = (int)$this->request->query('pref_id');

        if (empty($keyword) && !$pref_id) {
            $this->response->statusCode(400);
            echo json_encode(array('status' => 'error', 'message' => 'keyword or pref_id is required'), JSON_UNESCAPED_UNICODE);
            return;
        }

        $this->loadModel('Stores');

        $cond = array('Stores.status' => 1);

        if ($pref_id) {
            $cond['Stores.pref_id'] = $pref_id;
        }

        if (!empty($keyword)) {
            $_search_cols = array('store_name', 'address', 'mati', 'station', 'comment', 'free_word_text');
            $_keywords    = preg_split('/[\s\x{3000}]+/u', $keyword, -1, PREG_SPLIT_NO_EMPTY);
            foreach ($_keywords as $_kw) {
                $_or = array();
                foreach ($_search_cols as $_col) {
                    $_or['Stores.' . $_col . ' LIKE'] = '%' . $_kw . '%';
                }
                $cond[] = array('OR' => $_or);
            }
        }

        $stores = $this->Stores->find('all', array(
            'conditions' => $cond,
            'order'      => 'Stores.visit_date DESC, Stores.id DESC',
            'fields'     => array('id', 'store_name', 'address', 'visit_date', 'visit_flg', 'close_flg',
                                  'store_mime_1', 'store_mime_2', 'store_mime_3', 'store_mime_4'),
            'limit'      => 100,
        ));

        $result = array();
        foreach ($stores as $row) {
            $s      = $row['Stores'];
            $img_no = $this->_firstImageNo($s);
            $result[] = array(
                'id'         => (int)$s['id'],
                'store_name' => $s['store_name'],
                'address'    => $s['address'],
                'visit_date' => ($s['visit_flg'] && !empty($s['visit_date'])) ? $s['visit_date'] : null,
                'has_image'  => $img_no > 0,
                'image_no'   => $img_no,
                'close_flg'  => (int)$s['close_flg'],
            );
        }

        echo json_encode(
            array(
                'status'  => 'ok',
                'keyword' => $keyword,
                'pref_id' => $pref_id ?: null,
                'count'   => count($result),
                'stores'  => $result,
            ),
            JSON_UNESCAPED_UNICODE
        );
    }

    // GET /api/v1/store?id={id}
    public function store() {
        $id = (int)$this->request->query('id');

        if (!$id) {
            $this->response->statusCode(400);
            echo json_encode(array('status' => 'error', 'message' => 'id is required'), JSON_UNESCAPED_UNICODE);
            return;
        }

        $this->loadModel('Stores');

        $result = $this->Stores->find('first', array(
            'conditions' => array(
                'Stores.id'     => $id,
                'Stores.status' => 1,
            ),
            'fields' => array(
                'id', 'store_name', 'address', 'station', 'comment',
                'visit_date', 'visit_flg', 'close_flg',
                'store_mime_1', 'store_mime_2', 'store_mime_3', 'store_mime_4',
                'kenko_flg', 'norate_flg', 'kyogi_flg', 'yoyaku_flg',
                'pickup_flg',
                'homepage_1_title', 'homepage_1_url',
                'homepage_2_title', 'homepage_2_url',
                'homepage_3_title', 'homepage_3_url',
                'twitter', 'blog_url',
            ),
        ));

        if (!$result) {
            $this->response->statusCode(404);
            echo json_encode(array('status' => 'error', 'message' => 'store not found'), JSON_UNESCAPED_UNICODE);
            return;
        }

        $s = $result['Stores'];

        $image_nos = array();
        for ($i = 1; $i <= 4; $i++) {
            if (!empty($s['store_mime_' . $i])) $image_nos[] = $i;
        }

        $tags = array();
        if ($s['kenko_flg'])  $tags[] = '健康麻雀';
        if ($s['norate_flg']) $tags[] = 'ノーレートフリー';
        if ($s['kyogi_flg'])  $tags[] = '競技麻雀';
        if ($s['yoyaku_flg']) $tags[] = '要電話';
        if ($s['pickup_flg']) $tags[] = 'ピックアップ';
        if ($s['visit_flg'])  $tags[] = '訪問済み';

        $homepages = array();
        for ($i = 1; $i <= 3; $i++) {
            if (!empty($s['homepage_' . $i . '_url'])) {
                $homepages[] = array(
                    'title' => !empty($s['homepage_' . $i . '_title']) ? $s['homepage_' . $i . '_title'] : $s['homepage_' . $i . '_url'],
                    'url'   => $s['homepage_' . $i . '_url'],
                );
            }
        }

        $store = array(
            'id'         => (int)$s['id'],
            'store_name' => $s['store_name'],
            'address'    => (string)$s['address'],
            'station'    => !empty($s['station'])  ? $s['station']  : null,
            'comment'    => !empty($s['comment'])  ? $s['comment']  : null,
            'visit_date' => ($s['visit_flg'] && !empty($s['visit_date'])) ? $s['visit_date'] : null,
            'close_flg'  => (int)$s['close_flg'],
            'image_nos'  => $image_nos,
            'tags'       => $tags,
            'homepages'  => $homepages,
            'twitter'    => !empty($s['twitter'])  ? $s['twitter']  : null,
            'blog_url'   => !empty($s['blog_url']) ? $s['blog_url'] : null,
        );

        echo json_encode(
            array('status' => 'ok', 'store' => $store),
            JSON_UNESCAPED_UNICODE
        );
    }

    // GET /api/v1/stores?pref_id={id}&mati={mati}
    public function stores() {
        $pref_id = (int)$this->request->query('pref_id');
        $mati    = $this->request->query('mati');

        if (!$pref_id || !$mati) {
            $this->response->statusCode(400);
            echo json_encode(array('status' => 'error', 'message' => 'pref_id and mati are required'), JSON_UNESCAPED_UNICODE);
            return;
        }

        $this->loadModel('Stores');

        $stores = $this->Stores->find('all', array(
            'conditions' => array(
                'Stores.pref_id' => $pref_id,
                'Stores.mati'    => $mati,
                'Stores.status'  => 1,
            ),
            'order'  => 'Stores.visit_date DESC, Stores.id DESC',
            'fields' => array('id', 'store_name', 'address', 'visit_date', 'visit_flg', 'close_flg',
                              'store_mime_1', 'store_mime_2', 'store_mime_3', 'store_mime_4'),
        ));

        $result = array();
        foreach ($stores as $row) {
            $s      = $row['Stores'];
            $img_no = $this->_firstImageNo($s);
            $result[] = array(
                'id'         => (int)$s['id'],
                'store_name' => $s['store_name'],
                'address'    => $s['address'],
                'visit_date' => ($s['visit_flg'] && !empty($s['visit_date'])) ? $s['visit_date'] : null,
                'has_image'  => $img_no > 0,
                'image_no'   => $img_no,
                'close_flg'  => (int)$s['close_flg'],
            );
        }

        echo json_encode(
            array('status' => 'ok', 'pref_id' => $pref_id, 'mati' => $mati, 'stores' => $result),
            JSON_UNESCAPED_UNICODE
        );
    }

    // GET /api/v1/new_stores
    public function new_stores() {
        $this->loadModel('Stores');

        $stores = $this->Stores->find('all', array(
            'conditions' => array('Stores.status' => 1),
            'order'      => 'Stores.create_date DESC, Stores.id DESC',
            'fields'     => array('id', 'store_name', 'address', 'visit_date', 'visit_flg', 'close_flg',
                                  'store_mime_1', 'store_mime_2', 'store_mime_3', 'store_mime_4'),
            'limit'      => 20,
        ));

        $result = array();
        foreach ($stores as $row) {
            $s      = $row['Stores'];
            $img_no = $this->_firstImageNo($s);
            $result[] = array(
                'id'         => (int)$s['id'],
                'store_name' => $s['store_name'],
                'address'    => $s['address'],
                'visit_date' => ($s['visit_flg'] && !empty($s['visit_date'])) ? $s['visit_date'] : null,
                'has_image'  => $img_no > 0,
                'image_no'   => $img_no,
                'close_flg'  => (int)$s['close_flg'],
            );
        }

        echo json_encode(
            array('status' => 'ok', 'count' => count($result), 'stores' => $result),
            JSON_UNESCAPED_UNICODE
        );
    }

    // GET /api/v1/prefectures
    public function prefectures() {
        $this->loadModel('Prefs');

        $prefs = $this->Prefs->find('all', array(
            'conditions' => array('count >' => 0),
            'order'      => array('pref_id' => 'asc'),
            'fields'     => array('pref_id', 'pref_name', 'count'),
        ));

        $result = array();
        foreach ($prefs as $row) {
            $result[] = array(
                'pref_id' => (int)$row['Prefs']['pref_id'],
                'name'    => $row['Prefs']['pref_name'],
                'count'   => (int)$row['Prefs']['count'],
            );
        }

        echo json_encode(
            array('status' => 'ok', 'prefectures' => $result),
            JSON_UNESCAPED_UNICODE
        );
    }
}
