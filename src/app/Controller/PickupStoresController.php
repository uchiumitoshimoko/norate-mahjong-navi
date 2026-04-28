<?php
App::uses('AppController', 'Controller');

/**
 * Customers Controller
 *
 * @property Customer $Customer
 */
class PickupStoresController extends AppController {
	
	// ピックアップ店舗を表示
	public function index()
	{
		$this->set('store_list', $this->pickup_store_list);
		
		$this->set('sub_title', "ピックアップ店舗");
	}


	
}
