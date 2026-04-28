<?php
App::uses('AppController', 'Controller');

/**
 * Cancels Controller
 *
 * @property Cancel $Customer
 */
class PrefsController extends AppController {

	public function list($pref_id = "aa") {

		$this->loadModel('Stores');
		$this->loadModel('Prefs');
		$this->loadModel('Matis');
		
		// 都道府県情報を取得する。
		$cond_p = array();
		$cond_p['pref_id'] = $pref_id;
		$prefs = $this->Prefs->find('first', array('conditions'=>$cond_p));
		
		// 都道府県内の市区町村一覧を取得する。
		$cond_m = array();
		$cond_m['pref_id'] = $pref_id;
		$order_m = array('count'=>'desc');
		$matis = $this->Matis->find('all', array('conditions'=>$cond_m, 'order'=>$order_m));
		
		// 合計数を計算する。
		$all_count = 0;
		foreach($matis as $row) {
			
			$all_count += $row['Matis']['count'];
		}
		
		// 市区町村ごとに1店舗だけランダムに表する店舗を取得する。
		foreach($matis as $key => $row) {
			
			$cond_s = array();
			$cond_s['pref_id'] = $row['Matis']['pref_id'];
			$cond_s['mati'] = $row['Matis']['mati'];
			$cond_s['status'] = "1";
			
			$fields = array('id');
			$stores = $this->Stores->find('all', array('conditions'=>$cond_s, 'fields'=>$fields));
			
			shuffle($stores);
			
			if(!empty($stores)) {
				$pickup_store = array_slice($stores , 0, 1);
			
				$matis[$key]['Matis']['store_id'] = $pickup_store[0]['Stores']['id'];
			}
		}
		
		// 店舗情報を取得する
		$cond_s = array();
		$cond_s['pref_id'] = $pref_id;
		$cond_s['status'] = "1";
		
		// 都道府県内の店舗一覧を取得する（訪問日降順）。
		$store_list = $this->Utility->getStores($cond_s, 'Stores.visit_date DESC, Stores.id DESC');
		
		// パンくず
		$pankuzu = $this->Utility->createPankuzu($pref_id,"","");
		
		$this->set(compact('pankuzu', 'matis', 'all_count', 'prefs', 'store_list'));
		
		$prefectures_id_list = Configure::read('prefectures_id');
		
		$this->set('sub_title', $prefectures_id_list[$pref_id]);
		$this->set('page_title',
			$prefectures_id_list[$pref_id] . 'の健康麻雀・ノーレート雀荘一覧（' . $all_count . '件）｜ノーレート麻雀ナビ'
		);
	}
	
	// 都道府県リスト
	public function pref_list() {
		
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
		
		$this->set('sub_title', "都道府県一覧");
		$this->set('page_title', '都道府県から健康麻雀・ノーレート雀荘を探す｜ノーレート麻雀ナビ');
		
	}

	// 画像ダウンロード(店舗画像）
	public function read_store_image($id = null)
	{
		$this->loadModel('Stores');

		$cond = array('id'=>$id);
		$stores = $this->Stores->find('first', array('conditions'=>$cond));
		
		header("Content-Type: ".$stores['Stores']['store_mime']);
        echo $stores['Stores']['store_imgdat'];
		exit;
	}

}
