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
