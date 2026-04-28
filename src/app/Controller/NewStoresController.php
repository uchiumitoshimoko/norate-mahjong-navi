<?php
App::uses('AppController', 'Controller');

/**
 * Customers Controller
 *
 * @property Customer $Customer
 */
class NewStoresController extends AppController {
	
	// 新着店舗を表示
	public function index()
	{
		$this->set('store_list', $this->new_store_list);
		
		$this->set('sub_title', "新着店舗");
	}


	
}
