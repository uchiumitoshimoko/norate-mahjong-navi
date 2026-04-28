<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

/**
 * Customers Controller
 *
 * @property Customer $Customer
 */
class LoginuserController extends AppController {

	var $menuArr;
	
	public function beforeFilter()
	{
		$this->menuArr = Configure::read('menuArr');
	}
	
	// ドミノに切り替えを行う
	public function change_domino() {
		$this->Session->write('menu_type', 'domino');
		$this->redirect(array('controller' => 'd_kigyos','action' => '/'));
	}

	// リザブルに切り替えを行う
	public function change_reserable() {
		$this->Session->write('menu_type', 'reserable');
		$this->redirect(array('controller' => 'stores','action' => '/'));
	}
	
	
	
	public function index(){

		$this->set("title_for_layout","ログインユーザ一覧");
		
		$this->loadModel('Loginuser');
		$this->Loginuser->recursive = 0;
		$users = $this->Loginuser->find('list');
		
		$user_type = Configure::read('user_type');
		
		$con = array();
		
		$status = "";
		
		// パラメータを取得する
		if(isset($this->request->query['status'])) {
			
			if($this->request->query['status'] == "all") {
				$con = array();
				$status = "1";
			}
		}
		else {
			$con['status'] = "1";
		}
		
		$count = $this->Loginuser->find("count", array('conditions' => $con));
		
		$loginusers = $this->Loginuser->find("all", array('conditions' => $con));

		$this->set('status', $status);
		$this->set('count', $count);
		$this->set('users', $loginusers);
		$this->set('user_type', $user_type);
	}
	
	public function login(){
		
		$this->set("title_for_layout","ログイン");
		
//		$this->loadModel('Loginuser');
		$this->layout = 'login';
/*		$cond = array("login_id"=>"aaaaa", "password"=>"aaaaaa");
		$login = $this->Loginuser->find('first', array('conditions'=>$cond));
*/
	}
	
	
	public function login_check(){
		
		$this->loadModel('Loginuser');
		//$this->data['Customer']['id'] = $id;
		$login_id = trim($this->data['login_id']);
		$password = trim($this->data['login_password']);
			
		if($login_id == "" || $password == "") {
			//ログインエラー
			$this->Session->setFlash('入力内容に誤りがあります');
			$this->redirect(array('action'=>'login'));
		}
		
		$cond = array("login_id"=>$login_id, "login_password"=>$password,'status'=>'1');
		
		if(!$login = $this->Loginuser->find('first', array('conditions'=>$cond))){
			
			//ログインエラー
			$this->Session->setFlash('ID、またはパスワードに誤りがあります');
			$this->redirect(array('action'=>'login'));
		}
		else {
			
			$next_url = "";
			if($this->Session->check('next_url')) {
				$next_url = $this->Session->read('next_url');
			}
			
			
			$this->Session->destroy();
			$this->Session->write('id',$login['Loginuser']['id']);
			$this->Session->write('login_id',$login['Loginuser']['login_id']);
			$this->Session->write('login_name',$login['Loginuser']['name']);
			$this->Session->write('login_mail_address',$login['Loginuser']['mail_address']);
			foreach($login['LoginuserAuth'] as $val => $key){
				$this->Session->write('menu_str.'.$key["menu_cd"],$key["status"] );
			}
	/*		
			if(isset($this->data['login'])) {
				if($this->data['login'] == "1") {
					
					$one_pass = md5(uniqid(rand(), true));
					setcookie('login_info', $one_pass, time()+60*60*24*30 );
					
					// ワンタイムパスワードを更新する。
					$cond = "Customer.id='" . $login['Customer']['id'] . "'";
					$setdata['one_pass'] = "'" . $one_pass . "'";
					$this->Customer->updateAll($setdata, $cond);
				}
			}
	*/
			if($next_url == "") {
				$this->redirect(array('controller' => 'stores','action' => '/'));
			}
			else {
				$this->redirect("/" . $next_url);
			}
		}
		
		$this->updateSessionData($login['Customer']['customer_cd']);
		if($login['Customer']['login_help_flg']){
			$this->redirect(array('controller'=>'customers','action'=>'help'));
		}else{
			

			
			//$this->redirect(array('controller'=>'pets','action'=>'home'));
		}
	}
	public function add() {
		
		$this->set("title_for_layout","ログインユーザ編集");
		
		$optStatus=array("無効","有効");
		$this->set('optStatus',$optStatus);
		$this->loadModel('Loginuser');
		$this->loadModel('LoginUserAuthorities');
		if ($this->request->is('post')) {
			$this->Loginuser->create();
			if ($this->Loginuser->save($this->request->data)) {
				$id=$this->Loginuser->getLastInsertID();
				$this->AuthSave($id);
				$this->Session->setFlash('ログインユーザーの情報を保存しました。');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The teacher could not be saved. Please, try again.'));
			}
		}else{
		}
		$this->set('menu', $this->menuArr);
		$this->render('edit');
	}
	public function edit($id = null) {
		
		$this->set("title_for_layout","ログインユーザ編集");
		
		$ca_rank_list = Configure::read('ca_rank_list');
		$user_type = Configure::read('user_type');
		
		$optStatus=array("無効","有効");
		$this->set('optStatus',$optStatus);
		$menus=array("有効","無効");
		$this->set('menus',$menus);
		$this->loadModel('Loginuser');
		$this->loadModel('LoginUserAuthorities');
		if ($this->request->is('post') || $this->request->is('put')) {
			
			$this->Loginuser->begin();
			
			$this->AuthUpdate($id);
			
			// もしステータスが無効なら、面談予定者を無効にし、CAランクを未設定にする。
			if($this->request->data['Loginuser']['status'] == "0") {
				
				$this->request->data['Loginuser']['mendan_flg'] = "0";
				$this->request->data['Loginuser']['ca_rank'] = "";
			}
			
			// ステータスが0になったら、ドミノ側の担当者から外す。
			if($this->request->data['Loginuser']['status'] == "0") {
				
				// ドミノの企業担当者担っていたら解除する。
				$sql = "UPDATE d_kigyos SET geekly_user_id=NULL WHERE geekly_user_id=" . $id;
				$this->Loginuser->query($sql);
				
			}

			// 画像削除なら削除する。
			if($this->request->data['Loginuser']['delete_image_flg'] == "1") {
				
				$this->request->data['Loginuser']['no_imgdat'] = "";
				$this->request->data['Loginuser']['no_mime'] = "";
				
			}
			else if(!empty($this->request->data['Loginuser']['no_image']['tmp_name'])) {
				
				$imgdat = file_get_contents($this->request->data['Loginuser']['no_image']['tmp_name']);
			    $mime = $this->request->data['Loginuser']['no_image']['type'];
			    
			    $this->request->data['Loginuser']['no_imgdat'] = $imgdat;
			    $this->request->data['Loginuser']['no_mime'] = $mime;
			}
			unset($this->request->data['Loginuser']['no_image']);

			if ($this->Loginuser->save($this->request->data)) {

				$this->Loginuser->commit();
				
				$this->Session->setFlash('ログインユーザーの情報を保存しました。');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The teacher could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Loginuser.' . $this->Loginuser->primaryKey => $id));
			$this->request->data = $this->Loginuser->find('all', $options);
		}
		$this->request->data = $this->request->data[0];
		$menuStr = $this->request->data['LoginuserAuth'];
		$users_menu_cd=array();
		foreach ($menuStr as $val => $key){
			if ($key['status']==1) $users_menu_cd[$key['menu_cd']]=1;
		}
		//$users_menu_cd = array_flip($users_menu_cd);
		$this->set(compact('schools', 'workTypes'));
		$this->set('menu', $this->menuArr);
		$this->set('users_menu_cd', $users_menu_cd);
		$this->set('ca_rank_list', $ca_rank_list);
		$this->set('user_type', $user_type);

	}
	public function delete($id = null) {
		$this->Loginuser->id = $id;
		if (!$this->Loginuser->exists()) {
			throw new NotFoundException(__('Invalid teacher'));
		}
		//$this->request->onlyAllow('post', 'delete');
		if ($this->Loginuser->delete()) {
			$this->Session->setFlash('ユーザーの情報を削除しました。');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('ユーザーの情報を削除しました。');
		$this->redirect(array('action' => 'index'));
	}
	function AuthUpdate($id = null){
		$this->LoginUserAuthorities->deleteAll(array('LoginUserAuthorities.user_id'=>$id));
		$this->AuthSave($id);
	}
	function AuthSave($id = null){
		foreach ($this->menuArr as $key => $val) {
			if (isset($this->request->data['menu_cd'][$key])&&$this->request->data['menu_cd'][$key]==1){
				$str = 1;
			} else {
				$str = 0;
			}
			$dataArr = array('user_id' => $id,
				'menu_cd' => $key,
				'status' => $str
				);
			$data['LoginUserAuthorities']=$dataArr;
			$fields=array('user_id','menu_cd','status');
			$this->LoginUserAuthorities->create();
			$this->LoginUserAuthorities->save($data,false,$fields);
		}
	}




	function help(){
		$this->layout = "home";
		if ($this->request->is('post') || $this->request->is('put')) {
			if($this->data['Customer']['login_help_flg']){
				$this->Customer->id = $this->loginData['customer_id'];
				$this->Customer->saveField('login_help_flg',0);
			}
			$this->redirect(array('controller'=>'pets','action'=>'home'));
		}
	}
	function logout(){
		setcookie('login_info', '');
		$this->Session->delete('id');
		$this->Session->destroy();
		$this->Session->setFlash('ログアウトしました。');
		$this->redirect(array('action'=>'login'));
	}

	// 登録情報変更
	public function edit_user() {
		
		$this->set("title_for_layout","登録情報変更");
		
		$id = $this->Session->read('id');
		
		$optStatus=array("無効","有効");
		$this->set('optStatus',$optStatus);
		$menus=array("有効","無効");
		$this->set('menus',$menus);
		$this->loadModel('Loginuser');
		$this->loadModel('LoginUserAuthorities');
		if ($this->request->is('post') || $this->request->is('put')) {
			//$this->AuthUpdate($id);
			
			$savedata = array();
			$savedata['id'] = $id;
			$savedata['name'] = $this->data['Loginuser']['name'];
			$savedata['mail_address'] = $this->data['Loginuser']['mail_address'];
			$savedata['cybozu_id'] = $this->data['Loginuser']['cybozu_id'];
			
			if ($this->Loginuser->save($savedata)) {
				$this->Session->setFlash('登録情報を変更しました');
				$this->redirect(array('action' => 'edit_user'));
			} else {
				$this->Session->setFlash(__('The teacher could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Loginuser.' . $this->Loginuser->primaryKey => $id));
			$this->request->data = $this->Loginuser->find('all', $options);
		}
		$this->request->data = $this->request->data[0];
		$menuStr = $this->request->data['LoginuserAuth'];
		$users_menu_cd=array();
		foreach ($menuStr as $val => $key){
			if ($key['status']==1) $users_menu_cd[$key['menu_cd']]=1;
		}
		//$users_menu_cd = array_flip($users_menu_cd);
		$this->set(compact('schools', 'workTypes'));
		$this->set('menu', $this->menuArr);
		$this->set('users_menu_cd', $users_menu_cd);

	}
	
	// パスワード変更
	public function edit_password() {
		
		$this->set("title_for_layout","パスワード変更");
		
		$id = $this->Session->read('id');
		
		$optStatus=array("無効","有効");
		$this->set('optStatus',$optStatus);
		$menus=array("有効","無効");
		$this->set('menus',$menus);
		$this->loadModel('Loginuser');
		$this->loadModel('LoginUserAuthorities');
		if ($this->request->is('post') || $this->request->is('put')) {
			
			// 現在のパスワードがあっているか確認
			$cond = array('id'=>$id);
			$user_result = $this->Loginuser->find('first', array('conditions'=>$cond));
			
			if($user_result['Loginuser']['login_password'] != $this->data['Loginuser']['now_password']) {
				$this->Session->setFlash('現在のパスワードに誤りがあります。');
				$this->redirect(array('action' => 'edit_password'));
			}

			if($this->data['Loginuser']['login_password_new'] != $this->data['Loginuser']['login_password_new_confirm']) {
				$this->Session->setFlash('新しいパスワードと、新しいパスワード（確認）に誤りがあります。');
				$this->redirect(array('action' => 'edit_password'));
			}
			
			$savedata = array();
			$savedata['id'] = $id;
			$savedata['login_password'] = $this->data['Loginuser']['login_password_new'];
			
			//$this->AuthUpdate($id);
			if ($this->Loginuser->save($savedata)) {
				$this->Session->setFlash('パスワードを変更しました');
				$this->redirect(array('action' => 'edit_password'));
			} else {
				$this->Session->setFlash(__('The teacher could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Loginuser.' . $this->Loginuser->primaryKey => $id));
			$this->request->data = $this->Loginuser->find('all', $options);
		}
		$this->request->data = $this->request->data[0];
		$menuStr = $this->request->data['LoginuserAuth'];
		$users_menu_cd=array();
		foreach ($menuStr as $val => $key){
			if ($key['status']==1) $users_menu_cd[$key['menu_cd']]=1;
		}
		//$users_menu_cd = array_flip($users_menu_cd);
		$this->set(compact('schools', 'workTypes'));
		$this->set('menu', $this->menuArr);
		$this->set('users_menu_cd', $users_menu_cd);

	}

	// 一斉パスワードリセット
	public function password_reset() {

		$this->set("title_for_layout","一斉パスワードリセット");
		
		$id = $this->Session->read('id');
		
		$this->loadModel('Loginuser');
		
		if ($this->request->is('post') || $this->request->is('put')) {
			
			// 同一メールアドレスで、複数ユーザが使っている場合は1通にまとめる。
			$mail_list = array();

			// 現在有効なユーザの一覧を取得する。
			$this->Loginuser->recursive = -1;
			$cond = array();
			$cond['status'] = "1";
			$cond['deleted'] = "0";
			$users = $this->Loginuser->find('all', array('conditions'=>$cond));
			
			foreach($users as $row) {
				
				// 新しいパスワードを生成する。
				$new_password = $this->makeRandStr(7);
				
/*
				$query = ['mailaddress'=>'geekly@mybrainlab.net','password'=>'abcdef'];
				$response = file_get_contents(
		              "https://geekly.careerplus2.jp/geekly/Batch/ResetPasswordAPI.asp?" .  http_build_query($query)
		        );
		        
		        print "yonda";
		        exit;
*/
				// 新しいパスワードを設定して保存する。
				$save_u = array();
				$save_u['id'] = $row['Loginuser']['id'];
				
				$save_u['login_password'] = $new_password;
				//$save_u['login_password'] = $row['Loginuser']['login_password'];

				$this->Loginuser->save($save_u);
				
				// CP側をコールする
				$query = ['mailaddress'=>$row['Loginuser']['mail_address'],'password'=>$new_password];
				$response = file_get_contents(
		              "https://geekly.careerplus2.jp/geekly/Batch/ResetPasswordAPI.asp?" .  http_build_query($query)
		        );
        		
				if(!isset($mail_list[$row['Loginuser']['mail_address']])) {
					$mail_list[$row['Loginuser']['mail_address']] = array();
				}
				
				$mail_list[$row['Loginuser']['mail_address']][] = array('name'=>$row['Loginuser']['name'], 'password'=>$new_password);
				
				

			}
			
			foreach($mail_list as $mail_address => $rows) {
				
				// パスワード部分のメイン文章
				$pass_str = "";
				
				// 宛先名
				$name = "";
				
				foreach($rows as $row) {
					
$pass_str.= $row['name'] . "さん 
パスワード：" . $row['password'] . "\n\n";
					
					$name = $row['name'];
				}

				// 新しいメールアドレスに変更された旨をメールで通知する。
				// 本文
				$body = "お疲れ様です。システム管理者です。
CPとリザブルのパスワードが変更されました。

新しいパスワードは以下になります。

";

$body.= $pass_str;

$body.= "パスワードは他人に教えることなく厳格に管理するようお願いします。";
				
				$email = new CakeEmail('sakura');
				$config = Configure::read('mail_config');
				$from_mail = 'info@geekly.co.jp';
				$from_name = 'Geekly事務局';
				
				
			    // 宛先
				$to_mail = $mail_address;
				//$to_mail = "uchiumi@web-life.co.jp";
				
				if(count($rows) == 1) {
					$to_name = $row['Loginuser']['name'];
				}
				else {
					$to_name = "担当者様";
				}
				
				$config2 = array('additionalParameters' => '-f ' . $from_mail);
				$email->config($config2);

			    $email->charset = 'ISO-2022-JP';
			    $email->headerCharset = 'ISO-2022-JP';

				$subject = "CPとリザブルのパスワードが変更されました。";
				//$message = mb_convert_encoding($detail['MailDetails']['mail_body'],"JIS", "UTF-8");
				$message = $body;
				
				$email
		            ->emailFormat('text')
		            ->from(array($from_mail => $from_name))
		            ->to(array($to_mail => $to_name))
		            ->subject($subject)
		            ->send($message);
				
			}
		} 

	}

	// ランダム文字列作成
	function makeRandStr($length) {
	    $str = array_merge(range('a', 'z'), range('0', '9'), range('A', 'Z'));
	    $r_str = null;
	    for ($i = 0; $i < $length; $i++) {
	        $r_str .= $str[rand(0, count($str) - 1)];
	    }
	    return $r_str;
	}

	// 画像ダウンロード(NO）
	public function read_no_image($id = null)
	{
		
		$this->loadModel('Loginuser');

		$cond = array('id'=>$id);
		$loginusers = $this->Loginuser->find('first', array('conditions'=>$cond));
		
		header( "Content-Type: ".$loginusers['Loginuser']['no_mime']);
        echo $loginusers['Loginuser']['no_imgdat'];
		exit;
	}
	
}
?>
