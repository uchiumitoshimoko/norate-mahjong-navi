<?php

App::uses('ComponentCollection', 'Controller');
App::uses('CakeEmail', 'Network/Email');


/*

php -f /home/users/1/oops.jp-kenko-norate-mj/web/kanri/app/Console/cake.php CountStores main -app /home/users/1/oops.jp-kenko-norate-mj/web/kanri/app

*/

/*
 * 都道府県と市区町村の登録件数を調べる
 */
class CountStoresShell extends Shell {

	var $Controller;
	
	//var $components = array('Utility');

	/**
	 * 初期化処理
	 */
	function startup(){

		$collection = new ComponentCollection();
		parent::startup();
	
	}

	/**
	 * メイン処理
	 */
	function main() {
		
		$this->Prefs = ClassRegistry::init('Prefs');
		$this->Matis = ClassRegistry::init('Matis');
		$this->Stores = ClassRegistry::init('Stores');
		
		// 一旦新着を消す
		$sql = "UPDATE m_stores SET new_flg=0 WHERE new_flg=1";
		$this->Stores->query($sql, false);
		
		// 直近の10件を新着扱いにする。
		$cond_s = array();
		$cond_s['status'] = "1";
		$limit_s = "10";
		$order_s = array('create_date'=>'desc');
		$fields_s = array('id');
		$new_stores = $this->Stores->find('all', array('conditions'=>$cond_s, 'order'=>$order_s, 'limit'=>$limit_s, 'fields'=>$fields_s));
				
		foreach($new_stores as $row) {
			
			$save_s = array();
			$save_s['id'] = $row['Stores']['id'];
			$save_s['new_flg'] = "1";
			$this->Stores->save($save_s);
		}
		
		// 都道府県の件数を調べる
		$prefs = $this->Prefs->find('all');
		
		foreach($prefs as $pref) {
			
			$cond_p = array();
			$cond_p['pref_id'] = $pref['Prefs']['pref_id'];
			$cond_p['status'] = "1";	// 表示になっているもの
			
			$count = $this->Stores->find('count', array('conditions'=>$cond_p));
			
			$save_p = array();
			$save_p['id'] = $pref['Prefs']['id'];
			$save_p['count'] = $count;
			
			$this->Prefs->save($save_p);
			
		}
		
		// 市区町村の件数を調べる
		$matis = $this->Matis->find('all');
		
		foreach($matis as $mati) {
			
			$cond_p = array();
			$cond_p['pref_id'] = $mati['Matis']['pref_id'];
			$cond_p['mati'] = $mati['Matis']['mati'];
			$cond_p['status'] = "1";	// 表示になっているもの
			
			$count = $this->Stores->find('count', array('conditions'=>$cond_p));
			
			
			$save_p = array();
			$save_p['id'] = $mati['Matis']['id'];
			$save_p['count'] = $count;
			
			$this->Matis->save($save_p);
			
		}
	}
}


?>