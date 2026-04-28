<?php

App::uses('ComponentCollection', 'Controller');
App::uses('KarteComponent', 'Controller/Component');

/*
 * 
 */
class CheckCustomerShell extends Shell {

	var $Controller;
	
	/**
	 * ‰Šú‰»ˆ—
	 */
	function startup(){

		$collection = new ComponentCollection();
		$this->Karte = new KarteComponent($collection);
		parent::startup();
	
	}

	/**
	 * ƒƒCƒ“ˆ—
	 */
	function main() {
		
		$Customer = ClassRegistry::init('Customer');
		
		//$sql = "SELECT customer_cd FROM m_customers WHERE cancel_date>='" . date('Y-m-d 00:00:00') . "' OR cancel_date IS NULL OR cancel_date=''";
		
		$sql = "SELECT customer_cd FROM m_customers WHERE cancel_date>='" . date('Y-m-d 00:00:00') . "' AND cancel_date IS NOT NULL AND cancel_date!=''";
		
		$result = $Customer->query($sql);
		
		foreach($result as $data) {
			
			$customer_info = array();
			$customer_info = $this->Karte->getCustomerInfo($data['m_customers']['customer_cd']);
			
			if($customer_info['ccd'] == "C06") {
				print $customer_info['customer_cd'] . ":" . $customer_info['ccd'] . "\n";
			}

		}
		
		
		
	}
}


?>
