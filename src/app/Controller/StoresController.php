<?php
App::uses('AppController', 'Controller');

/**
 * Cancels Controller
 *
 * @property Cancel $Customer
 */
class StoresController extends AppController {

	public function detail($store_id = "") {

		$this->loadModel('Stores');
		$this->loadModel('Prefs');
		$this->loadModel('Matis');
		
		// 店舗情報を取得する
		$cond_s = array();
		$cond_s['id'] = $store_id;
		
		// 都道府県内の店舗一覧を取得する。
		$store_list = $this->Utility->getStores($cond_s);
		
		$pankuzu = $this->Utility->createPankuzu("","",$store_id);
		
		$this->set(compact('store_list', 'pankuzu'));
		
		if(!empty($store_list)) {
			
			$prefectures_id_list = Configure::read('prefectures_id');
			
			$sub_title = $store_list[0]['Stores']['store_name'] . "|" . @$prefectures_id_list[$store_list[0]['Stores']['pref_id']] . $store_list[0]['Stores']['mati'];
			$this->set('sub_title', $sub_title);

			$_pref     = @$prefectures_id_list[$store_list[0]['Stores']['pref_id']];
			$_mati     = $store_list[0]['Stores']['mati'];
			$_location = $_pref . (!empty($_mati) ? $_mati : '');
			$this->set('page_title',
				$store_list[0]['Stores']['store_name'] . '｜健康麻雀・ノーレート雀荘｜' . $_location . '｜ノーレート麻雀ナビ'
			);
			
		}
	}
	
}
