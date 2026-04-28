<?php

App::uses('ComponentCollection', 'Controller');
App::uses('KarteComponent', 'Controller/Component');

/*
 * 解約日を過ぎているユーザを、会員→退会に変更する。
 */
class UpdateCustomerCancelShell extends Shell {

	var $Controller;
	
	/**
	 * 初期化処理
	 */
	function startup(){

		$collection = new ComponentCollection();
		$this->Karte = new KarteComponent($collection);
		parent::startup();
	
	}

	/**
	 * メイン処理
	 */
	function main() {
		
		$Customer = ClassRegistry::init('Customer');
		
		// 解約日を過ぎている人を抽出
		//$sql = "SELECT customer_cd FROM m_customers WHERE customer_status=1 AND cancel_date<'" . date('Y-m-d 00:00:00') . "' AND cancel_date IS NOT NULL AND cancel_date!=''";
		//$sql = "SELECT customer_cd FROM m_customers WHERE customer_status=1 AND cancel_date<'" . date('Y-m-d 00:00:00') . "'";
		$sql = "SELECT customer_cd FROM m_customers WHERE (customer_status=1 OR caller01!='' OR caller02!='' OR caller03!='') AND cancel_date<'" . date('Y-m-d 00:00:00') . "' AND cancel_date IS NOT NULL AND cancel_date!=''";
		
		$result = $Customer->query($sql);
		
		foreach($result as $data) {
			
			// 電話番号を移動する。
			$customer_info = array();
			$customer_info = $this->Karte->getCustomerInfo($data['m_customers']['customer_cd']);

			$c_data = array();
			$c_data['customer_cd'] = $customer_info['customer_cd'];
			
			// ①登録電話番号１～３を、メモ欄に移動
			$c_data['tel1'] = "";
			$c_data['tel2'] = "";
			$c_data['tel3'] = "";
			$c_data['memo'] = "\r\n" . $customer_info['memo'] . "\r\n";
			
			if(!empty($customer_info['tel1'])) {
				$c_data['memo'].= $customer_info['tel1'] . "\r\n";
			}
			if(!empty($customer_info['tel2'])) {
				$c_data['memo'].= $customer_info['tel2'] . "\r\n";
			}
			if(!empty($customer_info['tel3'])) {
				$c_data['memo'].= $customer_info['tel3'] . "\r\n";
			}
			
			// ②代理店をカルテ削除にする。
			$c_data['ccd'] = "C06";
			
			$customer_info = $this->Karte->registCustomerInfo($c_data);
						
			// 退会にする。
			$sql = "UPDATE m_customers SET customer_status=0 WHERE customer_cd='" . $data['m_customers']['customer_cd'] . "'";
			$re = $Customer->query($sql);
		}
		
		
		
	}
}


?>
