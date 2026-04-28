<?php
App::uses('AppController', 'Controller');

/**
 * Customers Controller
 *
 * @property Customer $Customer
 */
class SearchController extends AppController {
	
	// トップ
	public function index()
	{
		
		$prefectures_id_list = Configure::read('prefectures_id');
		$this->set(compact('prefectures_id_list'));
		$this->set('page_title', '健康麻雀・ノーレート雀荘を探す｜ノーレート麻雀ナビ');

	}
	
	// トップ
	public function store_list() {
		
		$this->loadModel('Stores');
		
		$prefectures_id_list = Configure::read('prefectures_id');
		
		$search_text_list = array();
		
		$cond = array();
		
		if($this->data){
			
			$this->Session->write('search',$this->data);
			
			foreach(@$this->data['Searchs'] as $key=>$value){

				if(empty($value)) continue;
				switch($key){
					case "mode":
						break;
					case "pref_id":
						$cond['Stores.' . $key] = $value;
						$search_text_list[] = $prefectures_id_list[$value];

						break;

					case "keyword":
						// 全角・半角スペースで分割しAND検索。各キーワードは6カラムOR検索。
						// 将来データ量が増えた場合は FULLTEXT INDEX + MATCH AGAINST への移行を検討すること。
						$_search_cols = array('store_name','address','mati','station','comment','free_word_text');
						$_keywords = preg_split('/[\s\x{3000}]+/u', trim($value), -1, PREG_SPLIT_NO_EMPTY);
						foreach($_keywords as $_kw) {
							$_or = array();
							foreach($_search_cols as $_col) {
								$_or['Stores.' . $_col . ' like'] = "%" . $_kw . "%";
							}
							$cond[] = array('OR' => $_or);
						}
						$search_text_list[] = $value;

						break;

					default :
						$cond['Stores.' . $key .' like'] = "%".$value. "%";
						$search_text_list[] = $value;

						break;
				}
			}
		}
		
		$order = 'Stores.visit_date DESC, Stores.id DESC';
		
		$store_list = $this->Utility->getStores($cond, $order);
		
		$search_text = "";
		if(!empty($search_text_list)) {
			$search_text = implode(" + ", $search_text_list);
		}
		
		$this->set(compact('store_list', 'search_text'));

		$page_title = !empty($search_text)
			? h($search_text) . 'の健康麻雀・ノーレート雀荘 検索結果｜ノーレート麻雀ナビ'
			: '健康麻雀・ノーレート雀荘 検索結果｜ノーレート麻雀ナビ';
		$this->set('page_title', $page_title);

	}


	
}
