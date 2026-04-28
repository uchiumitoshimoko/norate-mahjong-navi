<?php
App::uses('AppController', 'Controller');

/**
 * Cancels Controller
 *
 * @property Cancel $Customer
 */
class MatisController extends AppController {

	public function list($pref_id = "", $mati = "") {

		$this->loadModel('Stores');
		$this->loadModel('Prefs');
		$this->loadModel('Matis');
		
		// 都道府県情報を取得する。
		$cond_p = array();
		$cond_p['pref_id'] = $pref_id;
		$prefs = $this->Prefs->find('first', array('conditions'=>$cond_p));
		
		// 市区町村を取得する。
		$cond_m = array();
		$cond_m['pref_id'] = $pref_id;
		$cond_m['mati'] = $mati;
		$matis = $this->Matis->find('first', array('conditions'=>$cond_m));
		
		$cond_s = array();
		$cond_s['pref_id'] = $pref_id;
		$cond_s['mati'] = $mati;
		$cond_s['status'] = "1";
		
		// 市区町村の店舗一覧を取得する（訪問日降順）。
		$store_list = $this->Utility->getStores($cond_s, 'Stores.visit_date DESC, Stores.id DESC');
		
		// パンくず
		$pankuzu = $this->Utility->createPankuzu($pref_id,$mati,"");
		
		$this->set(compact('pankuzu', 'matis', 'prefs', 'store_list'));
		
		$prefectures_id_list = Configure::read('prefectures_id');
		
		$this->set('sub_title', $prefectures_id_list[$pref_id] . '　' . $mati);
		$this->set('page_title',
			$mati . 'の健康麻雀・ノーレート雀荘一覧（' . $prefectures_id_list[$pref_id] . '）｜ノーレート麻雀ナビ'
		);
	}
	
}
