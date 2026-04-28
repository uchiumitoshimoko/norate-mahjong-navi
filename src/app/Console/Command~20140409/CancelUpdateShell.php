<?php

App::uses('ComponentCollection', 'Controller');

/*
 * 解約日を経過した人を「退会」にし、電話番号をメモ欄に移動して電話が繋がらないようにする。
 */
class CancelUpdateShell extends Shell {
	
	var $Controller;
	
	//var $components = array('Karte');
	

	/**
	 * 初期化処理
	 */
	function startup(){

		$collection = new ComponentCollection();
		//$this->Karte = new KarteComponent($collection);
		parent::startup();
	
	}

	/**
	 * メイン処理
	 */
	function main() {
		
		print "aa";
		exit;
	
	}
}


?>