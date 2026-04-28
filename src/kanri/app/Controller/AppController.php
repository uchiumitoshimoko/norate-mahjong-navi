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
class AppController extends Controller {
	var $loginData;
	var $petsData = array();
	var $components = array('Session');
	
	function beforeFilter(){
		parent :: beforeFilter();

		
		$permit_actions = array('user_update', 'resumption_mypage', 'mendan_update', 'seiyaku_user', 'maejitai_user', 'atojitai_user', 'unavailable_user', 'delete_user','login','login_check', 'forget', 'sub_complete', 'd', 'i', 'x', 'e', 'c', 'upload', 'complete', 'execute');
		
		$check_sess = $this->Session->read('loginData');
		
		/*
		if(isset($_COOKIE['login_info'])) {

			if(empty($check_sess)) {
				$one_pass = $_COOKIE['login_info'];
				
				// DBからこのワンタイムパスワードがあるかどうかを調べる。
				$this->loadModel('Customer');
				$cond = array("one_pass"=>$one_pass);
				
				$login = $this->Customer->find('first', array('conditions'=>$cond));

				if(!empty($login)) {
					
					$this->updateSessionData($login['Customer']['customer_cd']);
					$this->redirect(array('controller'=>'loginuser','action'=>'login'));
					exit;
				}
			}
		}
		*/
		
				
		//チェック対象外アクション
		if(in_array($this->params['action'],$permit_actions)){
		
		}else{
			/*
			$ua = $_SERVER['HTTP_USER_AGENT'];
            if (strstr($ua, 'Trident') || strstr($ua, 'MSIE')) {
                $this->Session->setFlash('InternetExplolerでは操作できません');
  				  $this->redirect(array('controller'=>'loginuser','action'=>'login'));

            }
            */
			$this->loginData = $this->Session->read('id');
			
			if(empty($this->loginData)){
				//$this->Session->setFlash('ログイン状態が切断されました。');
				$this->redirect(array('controller'=>'loginuser','action'=>'login'));
			}
			
			
			$this->set('loginData',$this->loginData);
		}

		if($this->params['action'] == "login") {
			$this->redirect(array('controller'=>'loginuser','action'=>'login'));
			exit;
		}

	}

	protected function getFileExtension($var){
		$tmp_name = basename($var);
		if(strrpos($tmp_name, '.')<=0)
			return "";
		return substr($tmp_name, strrpos($tmp_name, '.') + 1);
	}
	protected function getFileName($var){
		$tmp_name = basename($var);
		if(strrpos($tmp_name, '.')<=0)
			return $tmp_name;
		return str_replace('.'.$this->getFileExtension($var),'',$tmp_name);
		
	}
	protected function checkDate($val){
		if(empty($val['year']))
			return false;
		if(empty($val['month']))
			return false;
		if(empty($val['day']))
			return false;

		return true;
			
	}
	protected function getDateStr($val){
		if(!$this->checkDate($val)){
			return false;
		}
		return $val['year'] . '-' .$val['month'] . '-' . $val['day'];
	}
	protected function getDateArr($val){
		$tmp = split("[-/]",$val);
		if(empty($tmp) || count($tmp)!=3)
			return false;
		$date = array('year'=>$tmp[0],'month'=>$tmp[1],'day'=>$tmp[2]);
		return $date;
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
