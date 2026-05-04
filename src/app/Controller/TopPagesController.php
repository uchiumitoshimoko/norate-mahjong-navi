<?php
App::uses('AppController', 'Controller');

/**
 * Cancels Controller
 *
 * @property Cancel $Customer
 */
class TopPagesController extends AppController {

	public function index() {
		
		$this->loadModel('Stores');
		$this->loadModel('Prefs');
		
		$prefs = $this->prefs_count;
		
		// 各都道府県ごとに1店舗だけランダムに表する店舗を取得する。
		foreach($prefs as $key => $pref) {
			
			$cond_s = array();
			$cond_s['pref_id'] = $pref['Prefs']['pref_id'];
			$cond_s['status'] = "1";
			$fields = array('id');
			$stores = $this->Stores->find('all', array('conditions'=>$cond_s, 'fields'=>$fields));
			
			shuffle($stores);
			
			if(!empty($stores)) {
				$pickup_store = array_slice($stores , 0, 1);
			
				$prefs[$key]['Prefs']['store_id'] = $pickup_store[0]['Stores']['id'];
			}
		}
		
		$this->set(compact('prefs'));
		
		$this->set('sub_title', "ホーム");
		$this->set('page_title', 'ノーレート麻雀ナビ｜全国の健康麻雀・フリー雀荘検索');
	}

	// 画像ダウンロード(店舗画像）
	public function read_store_image($id = null, $no = "")
	{
		$this->loadModel('Stores');

		$cond = array('id'=>$id);

		$fields = array('store_imgdat_' . $no, 'store_mime_' . $no);

		$stores = $this->Stores->find('first', array('conditions'=>$cond, 'fields'=>$fields));

		header("Content-Type: ".$stores['Stores']['store_mime_' . $no]);
        echo $stores['Stores']['store_imgdat_' . $no];
		exit;
	}

	// サムネイル配信（幅260px・JPEG圧縮・サーバー側ファイルキャッシュ付き）
	// アプリ・Web共通で利用可能
	public function read_store_thumb($id = null, $no = "1")
	{
		$this->loadModel('Stores');

		$no  = max(1, min(4, (int)$no));
		$id  = (int)$id;

		// サーバー側ファイルキャッシュ（2回目以降はDB・GD不要）
		$cacheDir  = TMP . 'thumbs';
		$cacheFile = $cacheDir . DS . $id . '_' . $no . '.jpg';

		if (file_exists($cacheFile)) {
			header('Content-Type: image/jpeg');
			header('Cache-Control: public, max-age=604800');
			readfile($cacheFile);
			exit;
		}

		$row = $this->Stores->find('first', array(
			'conditions' => array('id' => $id),
			'fields'     => array('store_imgdat_' . $no, 'store_mime_' . $no),
		));

		$imgdata = isset($row['Stores']['store_imgdat_' . $no]) ? $row['Stores']['store_imgdat_' . $no] : null;
		$mime    = isset($row['Stores']['store_mime_'   . $no]) ? $row['Stores']['store_mime_'   . $no] : '';

		if (empty($imgdata)) {
			$this->response->statusCode(404);
			exit;
		}

		// GD が使えない場合は元画像をそのまま返す（フォールバック）
		if (!function_exists('imagecreatefromstring')) {
			header('Content-Type: ' . $mime);
			header('Cache-Control: public, max-age=604800');
			echo $imgdata;
			exit;
		}

		$src = @imagecreatefromstring($imgdata);
		if ($src === false) {
			header('Content-Type: ' . $mime);
			header('Cache-Control: public, max-age=604800');
			echo $imgdata;
			exit;
		}

		$origW = imagesx($src);
		$origH = imagesy($src);
		$maxW  = 260;

		if ($origW > $maxW) {
			$newH = (int)round($origH * ($maxW / $origW));
			$dst  = imagecreatetruecolor($maxW, $newH);
			imagecopyresampled($dst, $src, 0, 0, 0, 0, $maxW, $newH, $origW, $origH);
			imagedestroy($src);
			$src = $dst;
		}

		// キャッシュファイルに保存
		if (!is_dir($cacheDir)) {
			@mkdir($cacheDir, 0755, true);
		}
		@imagejpeg($src, $cacheFile, 75);

		header('Content-Type: image/jpeg');
		header('Cache-Control: public, max-age=604800');
		imagejpeg($src, null, 75);
		imagedestroy($src);
		exit;
	}

}
