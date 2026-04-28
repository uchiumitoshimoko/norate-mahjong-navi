<?php

App::uses('ComponentCollection', 'Controller');
App::uses('CakeEmail', 'Network/Email');


/*
 * ベアーレ側のACCOUNTテーブルより、新郎新婦情報を取得し、MYPAGE側に書き込む
 */
class BillMailShell extends Shell {

	var $Controller;
	
	const BILL_DIR = "/var/www/cake/app/tmp/bill";

	//var $components = array('Karte');
	
	/**
	 * 初期化処理
	 */
	function startup(){

		$collection = new ComponentCollection();
		//$this->Karte = new KarteComponent($collection);
		parent::startup();
	
	}

	/**
	 * 利用明細ファイルを分析し、メールを送信する。
	 */
	function main() {

		// ディレクトリ
		$check_month = date("Ym",strtotime("-1 month"));
		$bill_dir = BillMailShell::BILL_DIR . "/" . $check_month;
		
		// ファイル
		$bill_month = date("Ym",strtotime("-3 month"));
		//$check_file = $bill_dir . "/" . $bill_month . "_callfee.txt";
		$check_file = $bill_dir . "/" . $check_month . "_callfee.txt";
		$line = file($check_file);
		
		for($i = 0; $i < count($line); $i++) {
			
			if($i==0) continue;
			
			$data = explode("\t", $line[$i]);
			
			$customer_cd = $data[0];
			$name = $data[1];
			$name = mb_convert_encoding($name, "UTF-8", "ASCII,JIS,UTF-8,EUC-JP,SJIS");
			
			$mailaddress = $data[2];
			$pdf_file = $bill_dir . "/web/" . $data[4];	// ファイル
			$pdf_file = trim($pdf_file);
			$money = $data[3];
			
		    //$subject = "ご利用明細書の送付(" .  date("Y年m月",strtotime("-3 month")) . "分)";
			$subject = "【Anicli24】ご利用明細の送付";
			
		    // テンプレートに送る変数
		    $ary_vars = array (
		        'name' => $name
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
		    
			$email->attachments(array(
			    'bill.pdf' => array(
			        'file' => $pdf_file,
			        'mimetype' => 'application/pdf'
			    )
			));
		    
		    $email
		                ->template('bill', 'bill')
		                ->viewVars($ary_vars)
		                ->emailFormat('text')
		                ->from(array($from_mail => $from_name))
		                ->to(array($to_mail => $to_name))
		                ->subject($subject)
		                ->send();
			
			$email
		                ->template('bill', 'bill')
		                ->viewVars($ary_vars)
		                ->emailFormat('text')
		                ->from(array($from_mail => $from_name))
		                ->to(array("info@anicli24.com" => $to_name))
		                ->subject($subject)
		                ->send();
			
			$email
		                ->template('bill', 'bill')
		                ->viewVars($ary_vars)
		                ->emailFormat('text')
		                ->from(array($from_mail => $from_name))
		                ->to(array("uchiumi@a-sel.com" => $to_name))
		                ->subject($subject)
		                ->send();
		                
		}

	}
}


?>