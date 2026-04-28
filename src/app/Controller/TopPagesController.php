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

}
