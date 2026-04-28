<?php

App::uses('ComponentCollection', 'Controller');

/*
 * 従量課金の請求データを取得して、本システムの請求テーブルに登録する。
 */
class BillPreUseShell extends Shell {

	var $Controller;
	
	const BILL_DIR = "/var/www/c_system/app/tmp/bill_pre_use";
	
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

		// ディレクトリ
		// $check_month = date("Ym",strtotime("-1 month"));
		$check_month = (!empty($this->args[0])) ? date('Ym',mktime(0,0,0,substr($this->args[0],4,2)-1,1,substr($this->args[0],0,4))) : date("Ym",strtotime("-1 month"));
		$bill_dir = BillPreUseShell::BILL_DIR . "/" . $check_month;
		
		// ファイル
		$check_file = $bill_dir . "/" . $check_month . "_payasyoutalk.txt";
		$line = file($check_file);
		
		$Bill = ClassRegistry::init('Bill');
		$Customer = ClassRegistry::init('Customer');
		
		for($i = 0; $i < count($line); $i++) {
			
			// １行目はヘッダ情報なので読み飛ばす
			if($i==0) continue;
			
			$saveData = array();
			
			$data = explode("\t", $line[$i]);
			
			// 顧客コード
			$customer_cd = $data[0];
			
			// 顧客コードから代理店コードを調べる。
			$cond = array("customer_cd"=>$customer_cd);
			$result = $Customer->find("first", array("conditions"=>$cond));
			$ccd = $result['Customer']['ccd'];
			
			// 請求作成時の支払方法
			$payment_type = $result['Customer']['payment_type'];
			
			// 請求金額
			$money = $data[3];
			
			$Bill->create();
			
			$saveData['Bill']['customer_cd'] = $customer_cd;
		    $saveData['Bill']['ccd'] = $ccd;
		    $saveData['Bill']['account_type'] = "PRE_USE";
		    $saveData['Bill']['payment_type'] = $payment_type;
		    // $saveData['Bill']['bill_yyyymm'] = date("Ym");
		    $saveData['Bill']['bill_yyyymm'] = (!empty($this->args[0])) ? date('Ym',mktime(0,0,0,substr($this->args[0],4,2),1,substr($this->args[0],0,4))) : date("Ym");
		    $saveData['Bill']['bill_price'] = $money;
		    $saveData['Bill']['receipt_price'] = "0";
		    $saveData['Bill']['status'] = "0";
		    
		    $Bill->set($saveData);
			$Bill->save();
		}

	}
}


?>
