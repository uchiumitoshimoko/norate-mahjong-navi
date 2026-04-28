<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

/**
 * Receipt Controller
 *
 * @property Receipt $Receipt
 */
class ReceiptController extends AppController {
	var $typeArr = array(
		"1" => "カード",
		"2" => "SMBC",
		"3" => "CSS",
		"4" => "手動"
	);
	public function index() {
		$this->loadModel('Receipt');
		$this->Receipt->recursive = 0;
		$con = array();
		if (!empty($this->passedArgs['post_subject'])) $this->data = $this->passedArgs['post_subject'];
		$con['azukari_price >'] = 0;
		$option = array(
			'conditions' => $con ,
		);
		$count = $this->Receipt->find("count", $option);
		$this->paginate = array(
		'conditions' => $con,
		'limit' => 20,
		'order'=>'receipt_date',
		'fields' =>array('Receipt.*','Customer.name'),
		'joins' => array(
			array('type' => 'INNER', 'alias' => 'Customer', 'table' => 'm_customers',
			'conditions' => 'Receipt.customer_cd = Customer.customer_cd')
		),
		'recursive'=>0
		);

		$this->set('count', $count);
		$this->set('Receipts', $this->paginate());
		$this->set('typeArr', $this->typeArr);
	}
	
}
