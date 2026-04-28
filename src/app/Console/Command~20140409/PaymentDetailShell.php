<?php

App::uses('ComponentCollection', 'Controller');
App::uses('UtilityComponent', 'Controller/Component');

/*
 * 当月分の支払い明細データを作成する。
 */
class PaymentDetailShell extends Shell {
	
	
	var $Controller;
	
	/**
	 * 初期化処理
	 */
	function startup(){

		$collection = new ComponentCollection();
		$this->Utility = new UtilityComponent($collection);
		parent::startup();
	
	}

	/**
	 * メイン処理
	 */
	function main() {
		/********　　ボリュームによるマージンの計算のための判定　　**************************************/
		/** ２か月前（起動日が９月２日なら７月１日～７月３１日）に入会した人で、現時点で決済確定している人の数を、代理店ごとに求める。
		/** 
		/** ※次月請求の代理店があっても、７月利用分は８月頭に請求としてあがるので、８月末には確定するので問題ない。
		/************************************************************************************************/
		// $bolume_month = date("Y-m",strtotime("-2 month"));
		$bolume_month = (!empty($this->args[0])) ? date('Y-m',mktime(0,0,0,substr($this->args[0],4,2)-2,1,substr($this->args[0],0,4))) : date("Y-m",strtotime("-2 month"));
		$kakutei_count = $this->Utility->getKakuteiCount($bolume_month);
		
		//print_r($kakutei_count);
		
		/** 先月入金完了した請求データの請求額（＝入金額）についての、手数料を代理店に支払う。**/
		// $bill_kakutei_month = date("Y-m",strtotime("-1 month"));
		$bill_kakutei_month = (!empty($this->args[0])) ? date('Y-m',mktime(0,0,0,substr($this->args[0],4,2)-1,1,substr($this->args[0],0,4))) : date("Y-m",strtotime("-1 month"));
		
		$Bill = ClassRegistry::init('Bill');
		
		$cond = array('status'=>'1',
						'comp_date LIKE'=>$bill_kakutei_month . '%'
						);
						
		
		//$result = $Bill->find('all', array('conditions'=>$cond, 'limit'=>'2'));
		$result = $Bill->find('all', array('conditions'=>$cond));
		
		
		// 代理店詳細
		$Commission = ClassRegistry::init('Commission');
		
		// 回収者データの作成（入金完了データ＝回収者）
		
		$Customer = ClassRegistry::init('Customer');
		$Contractor = ClassRegistry::init('Contractor');
		$PaymentDetail = ClassRegistry::init('PaymentDetail');
		
		foreach($result as $data) {
			
			/** 代理店手数料を計算する **/
			
			// 入会日が$bolume_month期間の顧客の場合には、ボリュームの判定を行う。
			// それ以外の人は、通常の手数料になる。
			$cond = array('customer_cd'=>$data['Bill']['customer_cd']);
			$customer_data = $Customer->find('first', array('conditions'=>$cond));
			
			//print substr($customer_data['Customer']['application_date'], 0, 7);
			
			$kakutei_ninzu = "0";
			
			//print "app=" . $customer_data['Customer']['application_date'];
			//print "sub=" . substr($customer_data['Customer']['application_date'], 0, 7);
			//print "bolu=" . $bolume_month;
			
			// ストレート入金確定の場合は、ボリュームチェックを行える。
			if(substr($customer_data['Customer']['application_date'], 0, 7) == $bolume_month) {
				
				// $kakutei_countの配列に、代理店コードが存在していれば、そのコードの確定人数を設定する。
				if(isset($kakutei_count[$customer_data['Customer']['ccd']])) {
					$kakutei_ninzu = $kakutei_count[$customer_data['Customer']['ccd']];
				}
				else {
					$kakutei_ninzu = "0";
				}
				
			}
			else {
				$kakutei_ninzu = "0";
			}
			
			// 該当請求の利用月を求める。
			// 　当月請求の代理店なら→bill_yyyymmのまま
			// 　次月請求の代理店なら→bill_yyyymmから-1か月
			$use_month = "";
			
			$cond = array('ccd'=>$data['Bill']['ccd']);
			$contractor_data = $Contractor->find('first', array('conditions'=>$cond));
			
			$use_month = substr($data['Bill']['bill_yyyymm'], 0, 4) . "-" . substr($data['Bill']['bill_yyyymm'], 4, 5);
			
			/*
			if($contractor_data['Contractor']['debit_type'] == "THIS") {
				$use_month = substr($data['Bill']['bill_yyyymm'], 0, 4) . "-" . substr($data['Bill']['bill_yyyymm'], 4, 5);
			}
			else {
				
				// 次月請求のい場合は、請求月の1か月前が利用月になる。
				$a = strtotime(substr($data['Bill']['bill_yyyymm'], 0, 4) . "-" . substr($data['Bill']['bill_yyyymm'], 4, 5) . "-15");
				$b = strtotime("-1 month", $a);
				$use_month = date("Y-m", $b);
			}
			*/
			
			//print "ccd=" . $data['Bill']['ccd'];
			//print "use_month=" . $use_month;
			//print "customer_cd=" . $data['Bill']['customer_cd'];
			
			// 手数料データを取得する。
			// １ヶ月でも入金確定がおくれていれば、ここでは、$bolume_month=201308になるので、$kakutei_ninzu=0になるため、ボリュームの影響は受けない。
			// ストレートに入金確定した人達だけが、ボリュームの影響を受ける。
			//$sql = "SELECT * FROM m_commissions WHERE ccd='" . $customer_data['Customer']['ccd'] . "' AND start_date<='" . $use_month . "-01' AND ijo<=" . $kakutei_ninzu . " AND " . $kakutei_ninzu . "<miman ORDER BY start_date DESC limit 1";
			
			$sql = "SELECT * FROM m_commissions WHERE ccd='" . $customer_data['Customer']['ccd'] . "' AND start_date<='" . $customer_data['Customer']['application_date'] . "' AND ijo<=" . $kakutei_ninzu . " AND " . $kakutei_ninzu . "<miman ORDER BY start_date DESC limit 1";


			//print $sql;
			
			$commission_data = $Commission->query($sql, false);
			
			//print_r($commission_data);
			
			//exit;
			
			$rate = "";
			
			$first_type = "";
			
			
			// 利用月が初年度かどうかを判定する。(レートはパーセンテージ）
			if($this->Utility->isFirstNendo($customer_data['Customer']['application_date'], $use_month . "-01")) {
				$rate = $commission_data[0]['m_commissions']['first_rate'];
				$first_type = "1";
				
				//*****************************************************************************************
				// 初年度で、代理店の「初回収フラグ」が立っている場合は、ここでは処理をしない。
				//*****************************************************************************************
				if($first_type == "1" && $contractor_data['Contractor']['initial_payed_flg'] == "TRUE") {
					continue;
				}
			}
			else {
				$rate = $commission_data[0]['m_commissions']['after_rate'];
				$first_type = "2";
			}
			
			// レートが０の場合は、支払いが発生しないため、次のレコードにうつる。
			if($rate == "0") continue;
			
			//print "rate=" . $rate;
			//print "ccd=" . $data['Bill']['ccd'];
			//print "use_month=" . $use_month;
			//print "customer_cd=" . $data['Bill']['customer_cd'];
			
			
			// 支払い明細テーブル、t_payment_detailsに出力する。
			$PaymentDetail->create();
			$saveData = array();
			
			$saveData['PaymentDetail']['ccd'] = $data['Bill']['ccd'];	// 代理店コード
			
			// 支払書まとめ先コード
			if(empty($contractor_data['Contractor']['pay_matome_ccd'])) {
				$saveData['PaymentDetail']['pay_matome_ccd'] = $data['Bill']['ccd'];
			}
			else {
				$saveData['PaymentDetail']['pay_matome_ccd'] = $contractor_data['Contractor']['pay_matome_ccd'];
			}
			
			$saveData['PaymentDetail']['type'] = $first_type;	// 回収者
			$saveData['PaymentDetail']['customer_cd'] = $data['Bill']['customer_cd'];	// 顧客コード
			
			//$saveData['PaymentDetail']['pay_month'] = date('Y-m');	// 支払書発行月
			
			//$saveData['PaymentDetail']['pay_month'] = (!empty($this->args[0])) ? date('Y-m',mktime(0,0,0,substr($this->args[0],4,2)-2,1,substr($this->args[0],0,4))) : date('Y-m');	// 支払書発行月
			
			$saveData['PaymentDetail']['pay_month'] = (!empty($this->args[0])) ? date('Y-m',mktime(0,0,0,substr($this->args[0],4,2),1,substr($this->args[0],0,4))) : date('Y-m');	
			
			$saveData['PaymentDetail']['use_month'] = $use_month;	// 利用月
			$saveData['PaymentDetail']['application_date'] = $customer_data['Customer']['application_date'];	// 会員登録日（申込日）
			$saveData['PaymentDetail']['name_kana'] = $customer_data['Customer']['name_kana'];	// 顧客名（カナ）
			$saveData['PaymentDetail']['price'] = $data['Bill']['receipt_price'];	// 入金額
			$saveData['PaymentDetail']['rate'] = $rate;	// 手数料率
			$saveData['PaymentDetail']['tax_rate'] = $commission_data[0]['m_commissions']['tax_rate'];	// 消費税率
			//$saveData['PaymentDetail']['pay_price'] = ceil(intval($data['Bill']['receipt_price']) / (($commission_data[0]['m_commissions']['tax_rate']+100)/100) * ($rate/100));	// 支払い金額
			
			$saveData['PaymentDetail']['pay_price'] = floor(ceil(intval($data['Bill']['receipt_price']) / (($commission_data[0]['m_commissions']['tax_rate']+100)/100)) * ($rate/100));	// 支払い金額
			
			$PaymentDetail->save($saveData);

		}
		
		/************************************************************************************************/
		/** 解約テーブル（t_cancels）から、先月が解約手続き完了日の人の「調整金額」を取得して登録する。**/
		/************************************************************************************************/
		// $cancel_month = date("Y-m",strtotime("-1 month"));

		$CancelPatternArr = array('通常','違約金','全額返金','クーリングオフ','利用停止');

		$cancel_month = (!empty($this->args[0])) ? date('Y-m',mktime(0,0,0,substr($this->args[0],4,2)-1,1,substr($this->args[0],0,4))) : date("Y-m",strtotime("-1 month"));
		
		/*
		$cond = array('status'=>'1',
						'cancel_date LIKE'=>$cancel_month . '%'
						);
		*/
		
		/*
		$cond = array('cancel_date LIKE'=>$cancel_month . '%'
						);
		*/
		
		$cond = array('repayment_date LIKE'=>$cancel_month . '%'
						);

		$Cancel = ClassRegistry::init('Cancel');
		
		$result = $Cancel->find('all', array('conditions'=>$cond));
		
		foreach($result as $data) {

			$cond = array('customer_cd'=>$data['Cancel']['customer_cd']);
			$customer_data = $Customer->find('first', array('conditions'=>$cond));

			$cond = array('ccd'=>$customer_data['Customer']['ccd']);
			$contractor_data = $Contractor->find('first', array('conditions'=>$cond));


			// 初年度での初回収のある代理店の場合はここでは処理は無視する。
			if($this->Utility->isFirstNendo($customer_data['Customer']['application_date'], $cancel_month . "-01")) {
				//*****************************************************************************************
				// 初年度で、代理店の「初回収フラグ」が立っている場合は、ここでは処理をしない。
				//*****************************************************************************************
				if($contractor_data['Contractor']['initial_payed_flg'] == "TRUE") {
					continue;
				}
			}
			
			// 調整金額が０円なら無視する。
			if($data['Cancel']['offset_price'] == null || $data['Cancel']['offset_price'] == "0") {
				continue;
			}
			
			$PaymentDetail->create();
			$saveData = array();
			
			$saveData['PaymentDetail']['ccd'] = $customer_data['Customer']['ccd'];	// 代理店コード
			
			// 支払書まとめ先コード
			if(empty($contractor_data['Contractor']['pay_matome_ccd'])) {
				$saveData['PaymentDetail']['pay_matome_ccd'] = $customer_data['Customer']['ccd'];
			}
			else {
				$saveData['PaymentDetail']['pay_matome_ccd'] = $contractor_data['Contractor']['pay_matome_ccd'];
			}
			
			$saveData['PaymentDetail']['type'] = "3";	// 解約調整額
			$saveData['PaymentDetail']['customer_cd'] = $customer_data['Customer']['customer_cd'];	// 顧客コード
			
			//$saveData['PaymentDetail']['pay_month'] = (!empty($this->args[0])) ? date('Y-m',mktime(0,0,0,substr($this->args[0],4,2)-2,1,substr($this->args[0],0,4))) : date('Y-m');	// 支払書発行月
			$saveData['PaymentDetail']['pay_month'] = (!empty($this->args[0])) ? date('Y-m',mktime(0,0,0,substr($this->args[0],4,2),1,substr($this->args[0],0,4))) : date('Y-m');	// 支払書発行月
			//$saveData['PaymentDetail']['pay_month'] = date('Y-m',mktime(0,0,0,substr($this->args[0],4,2),1,substr($this->args[0],0,4))) : date("Y-m");
			
			$cancel_month = substr($data['Cancel']['cancel_date'], 0, 4) . "-" . substr($data['Cancel']['cancel_date'], 5, 2);
			$saveData['PaymentDetail']['use_month'] = $cancel_month;	// 解約月
			$saveData['PaymentDetail']['application_date'] = $customer_data['Customer']['application_date'];	// 会員登録日（申込日）
			// $saveData['PaymentDetail']['name_kana'] = $customer_data['Customer']['name_kana'];	// 顧客名（カナ）
			$saveData['PaymentDetail']['name_kana'] = $customer_data['Customer']['name_kana']."(".$CancelPatternArr[$data['Cancel']['cancel_pattern']].")";	// 顧客名（カナ）
			$saveData['PaymentDetail']['price'] = 0;
			$saveData['PaymentDetail']['rate'] = 0;	// 手数料率
			$saveData['PaymentDetail']['tax_rate'] = 0; // 消費税率
			$saveData['PaymentDetail']['pay_price'] = intval($data['Cancel']['offset_price']);	// 入金額
			
			$PaymentDetail->save($saveData);
		}
		
		//debug($Receipt->getDataSource()->getLog());


	}
}


?>
