<?php

/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
config('app_config');

App::uses('Controller', 'Controller');
App::uses('PetsController', 'Controller');
App::uses('CustomersController', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AdminController extends Controller {
	var $loginData;
	
	var $components = array('Karte', 'Session');
	
	function beforeFilter(){

		parent :: beforeFilter();

		$permit_actions = array('login','login_check', 'information_sub', 'information_sub2', 'sub_complete');
		//チェック対象外アクション
		if(in_array($this->params['action'],$permit_actions)){

		}else{
			session_start();
			$this->loginData = $this->Session->read('loginData');
			if(empty($this->loginData)){
				$this->Session->setFlash('ログイン状態が切断されました。');
				$this->redirect(array('controller'=>'manager','action'=>'login'));
			}
			$this->set('loginData',$this->loginData);
		}
		
	}

	/**
	 * POSTメソッドでアクセスしてきたときに、submitボタンのname属性を取得する
	 * (押されたsubmitボタンのname属性が取得できる)
	 */
	function _getSubmitName() {

	    foreach ($this->data as $key => $value) {
	        if(preg_match('/^(.*?)(_[xy])$/', $key, $matches) > 0) {
				return $matches[1];
			}
		}

	    return false;

	}
	
}
