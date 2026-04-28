<?php

App::uses('ComponentCollection', 'Controller');
App::uses('KarteComponent', 'Controller/Component');	// カルテ連携コンポーネント
App::uses('PetsController', 'Controller');
App::uses('CustomersController', 'Controller');

/*
 * ベアーレ側のACCOUNTテーブルより、新郎新婦情報を取得し、MYPAGE側に書き込む
 */
class KarteImportShell extends Shell {
	
	// 使用するモデルを指定する。
	//var $uses = array("VAccountMp", "TEventSub", "MCustomer", "VEventMp","Couple", "Mypage", "Dummy", "DandoriTask", "MypageTask", "GuestCardReply", "GuestCardPack", "DummyBeare");
	
	var $Controller;
	
	var $components = array('Karte');
	
	/**
	 * 初期化処理
	 */
	function startup(){

		$collection = new ComponentCollection();
		$this->Karte = new KarteComponent($collection);
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
		
		// チェックする日付
		$check_date = date("Y-m-d",strtotime("-1 day"));
		//$check_date = date("Y-m-d");
		
		// 実在するcustomer_cd
		$const_customer_cd = "100000000136";
		
		// 更新リストを取得する。
		$customers = $this->Karte->getCustomerModified($const_customer_cd, $check_date);
		
		// 更新がなければ終了
		if(!isset($customers) || empty($customers)) {
			return true;
		}
		
		$CustomerModel = ClassRegistry::init('Customer');

		require_once('/var/www/html/web_entry/Database.php');
        define('DB_SERVER',   'localhost');
        define('DB_USER',     'anim2cli4');
        define('DB_PASSWORD', 'Hw8XF62DHnx7mvEz');
        define('DB_NAME',     'eccube');
        $Database = new Database();
        $result = $Database->executeSQL("SET NAMES utf8");
        
		// ループして、MYPAGE側のcustomer_cdが存在していれば、MYPAGE、ECCUBEを更新する。
		foreach($customers as $customer_info) {
			
			$cond = array("customer_cd"=>$customer_info['customer_cd']);
				
			$login = $CustomerModel->find('first', array('conditions'=>$cond));
			
			// MYPAGEにデータがなければ、スルー
			if(empty($login)) {
				continue;
			}
			
			// ccd=C09のカルテ削除の場合は、この段階でc_customersとdtb_customerに削除フラグを立てる
			if($customer_info['ccd'] == 'C06') {
		
				// dtb_customerから削除
				$eccube_id = $login['Customer']['eccube_id'];
				$sql = "UPDATE dtb_customer SET ";
				$sql.= "del_flg=1 ";
				$sql.= " WHERE customer_id='" . $eccube_id . "'";
				$result = $Database->executeSQL($sql);
				
				// c_customersから削除
				$cond = "Customer.id='" . $login['Customer']['id'] . "'";
				$setdata['deleted'] = "1";
				$setdata['deleted_date'] = "'" . date('Y-m-d h:i:s') . "'";
				$CustomerModel->updateAll($setdata, $cond);
				
				continue;
			}
			
			$loginData = $login['Customer'];
			$loginData['customer_id'] = $login['Customer']['id'];
			
			$loginData['karte'] = $customer_info;
		
			// 取得したパラメータをもとに、MYPAGE側のECCUBEデータを更新する。
			$customerctl = new CustomersController();
			$customerctl->updateCustomerForKarte($customer_info, $loginData);
			
			// カルテ情報をループして、ペット配列に格納する。
			$pet_buf = array();
			foreach($customer_info['array_pets'] as $item) {
				$pet_buf[$item['pcd']] = $item;
			}
			
			// 取得したパラメータをもとに、MYPAGE側にペットコードが存在するかどうかしらべて、既にあれば[なにもしない]、なければ[追加]する。
			$petctl = new PetsController();
			$petctl->updatePetsForKarte($pet_buf, $loginData['customer_id']);
		}
	}
}


?>