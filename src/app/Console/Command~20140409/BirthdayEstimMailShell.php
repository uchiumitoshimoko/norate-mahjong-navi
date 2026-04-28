<?php

App::uses('ComponentCollection', 'Controller');
App::uses('CakeEmail', 'Network/Email');
App::uses('KarteComponent', 'Controller/Component');	// カルテ連携コンポーネント

/*
 * 誕生日メールを送信する。（推定年月日）
 *
 * 【送り方】誕生日タイプが推定の当月が誕生日のペットを抽出→c_reminder_mailに格納→c_reminder_mailsを全てメール送信
 */
class BirthdayEstimMailShell extends Shell {

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
	 * 実行
	 */
	function main() {
		
		$today = date('Y-m-d');	// 本日
		$birthday = date('m');	// 誕生日
		
		$ReminderMail = ClassRegistry::init('ReminderMail');	// 一時まとめテーブル
		
		// 誕生日タイプが「誕生日」で、今日が誕生日のペットを取得する。
		$Pet = ClassRegistry::init('Pet');
		$cond = "Pet.birthday_estim LIKE '%" . $birthday . "-01' AND Pet.birthday_type=2";
		
		$datas = $Pet->find('all', array('conditions'=>$cond));
		
		if(!empty($datas)) {
			foreach($datas as $data) {
				$saveData = array();
				$saveData['customer_id'] = $data['Pet']['customer_id'];
				$saveData['reminder_id'] = $data['Pet']['id'];
				$saveData['pet_id'] = $data['Pet']['id'];
				$saveData['table_id'] = "12";
				$saveData['send_estim_date'] = $today;
				$saveData['next_date'] = $today;
				$ReminderMail->create(array('ReminderMail'=>$saveData));
				$ReminderMail->save();
			}
		}

		/** ここからメール送信 **/
		
		// c_reminder_mailsから、送信予定日時が今日のものを取得し、送信する。
		
		$cond = "ReminderMail.send_estim_date='" . $today . "' AND ReminderMail.send_flg=0 AND table_id=12 ";
		$datas = $ReminderMail->find('all', array('conditions'=>$cond, 'order'=>array('customer_id')));
		
		// 一件もなければ処理終了。
		if(empty($datas)) {
			return;
		}
		
		$yobikata = array();
		$yobikata[0] = "";
		$yobikata[1] = "ちゃん";
		$yobikata[2] = "くん";
		
		// customer_idごとにメールを送信する。
		foreach($datas as $data) {
			
			// リマインダーメール送信フラグがたっていなければ、スルーする。
			if($data['Customer']['reminder_pc'] != "1" && $data['Customer']['reminder_m'] != "1") {
				continue;
			}
			
			$customer_info = $this->Karte->getCustomerInfo($data['Customer']['customer_cd']);
			
			$cond = "Pet.id=" . $data['ReminderMail']['reminder_id'];
			$pet_info = $Pet->find('first', array('conditions'=>$cond));
			$pet_karte = $customer_info['array_pets'][intval($pet_info['Pet']['pcd']) - 1];
	
			$petinfo = array();
			
			$pet_param['pname'] = $pet_karte['pname'] . $yobikata[intval($pet_info['Pet']['yobikata'])];
			$pet_param['birthday'] = substr($pet_info['Pet']['birthday_estim'], 0, 7);
			$pet_param['today'] = $birthday;
			
			$now = date('Ymd');
    		$birthday_buf = str_replace("-", "", $pet_param['birthday'] . "-01");
    		$age_buf = floor(($now-$birthday_buf)/10000);
    
			$pet_param['age'] = $age_buf;
			
			// メール送信（PC)
			$subject = "【Anicli24】ハッピーバースデー♪" . $pet_param['pname'];
			if($data['Customer']['reminder_pc'] == "1") {
				$this->mailSend($customer_info['email'], $customer_info['name'], $subject, $pet_param);
			}
			
			// メール送信（モバイル）
			if($data['Customer']['reminder_m'] == "1") {
				$this->mailSend($data['Customer']['email_m'], $customer_info['name'], $subject, $pet_param);
			}
		}
		
		// 送信したら、送信フラグを更新する。（send_flg=1）
		$cond = "ReminderMail.send_estim_date='" . $today . "' AND ReminderMail.table_id=12";
		$setdata = array();
		$setdata['send_flg'] = "'1'";	// 送信フラグ
		$setdata['send_date'] = "'" . date('Y-m-d H:i:s') . "'";	// 送信時間
		
		$ReminderMail->updateAll($setdata, $cond);
		
	}
	
	/**
	 * メール送信
	 */
	function mailSend($mailaddress, $name, $subject, $pet_param) {
		
		$today_param = date("n月");
		
	    // テンプレートに送る変数
	    $ary_vars = array (
	    	'name' => $name,
	        'pname' => $pet_param['pname'],
	        'today' => $today_param,
	        'birthday' => $pet_param['birthday'],
	        'age' => $pet_param['age'],
	    );

	    // 送受信者設定
	    $from_mail = 'info@anicli24.com';
	    $from_name = 'Anicli24 事務局';
	    $to_mail = $mailaddress;
	    $to_name = $name;
		
		//$to_mail = "haizuka@a-sel.com";
		//$to_mail = "f94017@yahoo.co.jp";

		$config = array (
		        'host'      => '127.0.0.1',
		        'port'      => 25,
		        'username'  => 'wladmin',
		        'password'  => 'WLP@ssw0rd',
		        'transport' => 'Mail'
		    );

	    // 送信処理
	    $email = new CakeEmail($config);
	    
	    /*
		$email->attachments(array(
		    'bill.pdf' => array(
		        'file' => $pdf_file,
		        'mimetype' => 'application/pdf'
		    )
		));
	    */
	    
	    $email
	                ->template('birthdayestim_mail', 'birthdayestim_mail')
	                ->viewVars($ary_vars)
	                ->emailFormat('text')
	                ->from(array($from_mail => $from_name))
	                ->to(array($to_mail => $to_name))
	                ->subject($subject)
	                ->send();
	                	                
	}
	
}


?>