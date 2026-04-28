<?php

App::uses('ComponentCollection', 'Controller');
App::uses('Karte2Component', 'Controller/Component');	// カルテ連携コンポーネント
App::uses('PetsController', 'Controller');
App::uses('CustomersController', 'Controller');

/*
 * ベアーレ側のACCOUNTテーブルより、新郎新婦情報を取得し、MYPAGE側に書き込む
 */
class KarteTestShell extends Shell {
	
	// 使用するモデルを指定する。
	//var $uses = array("VAccountMp", "TEventSub", "MCustomer", "VEventMp","Couple", "Mypage", "Dummy", "DandoriTask", "MypageTask", "GuestCardReply", "GuestCardPack", "DummyBeare");
	
	var $Controller;
	
	var $components = array('Karte2');
	
	/**
	 * 初期化処理
	 */
	function startup(){

		$collection = new ComponentCollection();
		$this->Karte2 = new Karte2Component($collection);
		parent::startup();
	
	/*
		$this->Controller =& new Controller();
		$this->Karte =& new KarteComponent(null);
		$this->Karte->initialize($this->Controller);
		$this->Karte = new KarteComponent($this->Controller);
	*/
		/*
		$this->Controller =& new Controller();
		$this->BeareCommon =& new BeareCommonComponent(null);
		$this->BeareCommon->startup($this->Controller);
        
		$this->Controller = new Controller();
        $this->AppController = new AppController();
		$this->BeareCommon = new BeareCommonComponent($this->Controller);
		*/
	}

	/**
	 * カルテ側の昨日分の更新履歴を取得し、その情報をもとにMYPAGE、ECCUBEの顧客データを更新する。
	 */
	function main() {
		
		// 実在するcustomer_cd
		$customer_cd = "100000010757";
		
		$customer_info = $this->Karte2->getCustomerInfo($customer_cd);
		
		print_r($customer_info);
		
	}
}


?>