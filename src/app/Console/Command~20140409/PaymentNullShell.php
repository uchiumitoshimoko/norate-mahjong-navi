<?php

App::uses('ComponentCollection', 'Controller');
App::uses('UtilityComponent', 'Controller/Component');

// Excel出力用ライブラリ
App::import('vendor','phpexcel/phpexcel');


/*
 * 当月分の支払書データを作成する。
 */
class PaymentNullShell extends Shell {
	
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
		$Dir_Pass = "/var/www/c_system/app/tmp/payment/";
		
		$Dir_Name = (!empty($this->args[0])) ? substr($this->args[0],0,4).substr($this->args[0],4,2):date('Ym');
		
		$Xls_Name_Part = date('Ymd');
		
		$save_columns = array('ccd','cname','account_type','bank','siten','koza','meigi');
		
		// 支払書Excel保存用のディレクトリ作成
		$dir = $Dir_Pass.$Dir_Name;
		if(!is_dir($dir)) {
			mkdir($dir,0777);
		}
		

		$Payment = ClassRegistry::init('Payment');
		$PaymentDetail = ClassRegistry::init('PaymentDetail');
		$Contractor = ClassRegistry::init('Contractor');
		
		$Contractors = array();
		
		$con_date = (!empty($this->args[0])) ? substr($this->args[0],0,4).'-'.substr($this->args[0],4,2):date('Y-m');
		
		$option = array(
			'conditions' => array('payment_id'=>NULL,'pay_month'=>$con_date),
			'joins' => array(
				array('type' => 'LEFT', 'alias' => 'Contractor', 'table' => 'm_contractors',
				'conditions' => 'PaymentDetail.ccd = Contractor.ccd'),
			),
			'group' => 'PaymentDetail.ccd',
			'fields' => 'Contractor.*',
		);
		
		$Contractors = $PaymentDetail->find('all',$option);

		foreach ($Contractors as $Cont){
			
			$ccd = $Cont['Contractor']['ccd'];

			$Xls_Name = $ccd."_".$Xls_Name_Part.".xls";
			
			// 内海ここから
			// テンプレートExcelをコピーして、代理店用のExcelを作成する。
			$filepath = $dir . "/" . $Xls_Name;
			copy($Dir_Pass . "payment_tmp.xls", $filepath);
			chmod($dir . "/" . $Xls_Name, 0777);
			$objReader = PHPExcel_IOFactory::createReader("Excel5");
			$objPHPExcel = $objReader->load($filepath);

			// １シート目を指定
			$objPHPExcel->setActiveSheetIndex(0);
			$sheet = $objPHPExcel->getActiveSheet();
			//$sheet->setCellValueByColumnAndRow($c, $r+1, "  ");
			$objPHPExcel->setActiveSheetIndex(1);
			$sheet2 = $objPHPExcel->getActiveSheet();
			
			// 集計期間の設定
			$a13str = date('Y年m月分のお支払額を、下記のとおりご案内申し上げます', mktime(0, 0, 0, intval(substr($this->args[0],4,2)) - 1, 1, intval(substr($this->args[0],0,4))));
			$sheet->setCellValue('A13', $a13str);
			
			$a30str = date('Y年m月分 取次手数料', mktime(0, 0, 0, intval(substr($this->args[0],4,2)) - 1, 1, intval(substr($this->args[0],0,4))));
			$sheet->setCellValue('A30', $a30str);
			
			
			$b26str = date('Y/m/d', mktime(0, 0, 0, intval(substr($this->args[0],4,2)) - 1, 1, intval(substr($this->args[0],0,4)))) . "～" . date('Y/m/d', mktime(0, 0, 0, intval(substr($this->args[0],4,2)), 0, intval(substr($this->args[0],0,4))));
			$sheet->setCellValue('B26', $b26str);
			
			// 支払書代理店名
			$sheet->setCellValue('A10', $Cont['Contractor']['cname3'].'　御中');
			$sheet2->setCellValue('C7',$Cont['Contractor']['cname3'].'　様');

/*			
			// デバッグ用
			$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
			$objWriter->setTempDir($dir);
			$objWriter->save($filepath);
			
			exit;
*/
			
			// 内海ここまで
			
			$save_data = array();
			foreach ( $save_columns as $key => $val ) {
				$save_data['Payment'][$val] = $Cont['Contractor'][$val];
			}
			//$save_data['Payment']['pay_yyyymm'] = date('Ym');
			$save_data['Payment']['pay_yyyymm'] = (!empty($this->args[0])) ? substr($this->args[0],0,4).substr($this->args[0],4,2):date('Ym');
			
			$options =  array(
				'conditions' => array('Contractor.pay_matome_ccd' => $Cont['Contractor']['ccd'] ),
				'fields' => 'DISTINCT Contractor.ccd',
			);

			if ( $Children = $Contractor->find('all',$options)) {
				foreach ($Children as $Child ){
					$Cont['Contractor']['ccd'] .= ",".$Child['Contractor']['ccd'];
				}
			}

			// 代理店コード
			$sheet->setCellValue('B25', $Cont['Contractor']['ccd']);
			$sheet2->setCellValue('C6',$Cont['Contractor']['ccd']);
			
			//$LastMonth = date("Ym", mktime(0, 0, 0, date('m'), 0, date('Y')));
			
			$LastMonth = date('Ym', mktime(0, 0, 0, intval(substr($this->args[0],4,2))-1, 1, intval(substr($this->args[0],0,4))));
			
			$con = array(
				'conditions' => array(
				'Payment.pay_yyyymm' => $LastMonth ,
				'Payment.ccd' => $ccd
				)
			);
			
			$LastData = $Payment->find('first',$con);
				
			$save_data['Payment']['kurikosi_price'] = (!empty($LastData['Payment']['next_kurikosi_price'])) ? $LastData['Payment']['next_kurikosi_price']:0;
			
			$sheet->setCellValue('B20', $save_data['Payment']['bank']); //金融機関名
			$sheet->setCellValue('B21', $save_data['Payment']['siten']); // 支店
			$sheet->setCellValue('B22', $save_data['Payment']['koza']); // 口座
			$sheet->setCellValue('B23', $save_data['Payment']['meigi']); // 名義
			$sheet->setCellValue('G26', $save_data['Payment']['kurikosi_price']); // 前月繰越金額
			//$sheet->setCellValue('B26', date('Y/m/1').'～'.date('Y/m/t')); // 集計期間
			
			$Payment->create();
			
			$Payment->save($save_data);
			
			$insert_id = $Payment->getLastInsertID();
			
			$row=array();

			// 初年度会員
			$Ft =array();
			$Ftt =array();
			$opt1 = array(
				'fields' => array ('PaymentDetail.*','count(1) as count','SUM(pay_price) as sum_price'),
				'conditions' => array (
//					'PaymentDetail.type' => '1' ,
					'PaymentDetail.pay_month' => $con_date ,
//					'PaymentDetail.pay_price >' => '0' , 
					'OR' => array('PaymentDetail.ccd' => $ccd,'PaymentDetail.pay_matome_ccd' => $ccd)
				),
				'group' => array('ccd', 'rate', 'price', 'tax_rate'),
				//'order'=>'PaymentDetail.application_date'
				'order'=>'PaymentDetail.ccd, PaymentDetail.type'
			);

			$Customers = $PaymentDetail->find('all',$opt1);
/*
			$log = $PaymentDetail->getDataSource()->getLog(false, false);
			$querylog = $log['log'][$log['count']-1]['query'];
var_dump($querylog);exit;
*/
			$opt1['fields'] = array('PaymentDetail.*');
			unset($opt1['group']);

			$Customers_option = $PaymentDetail->find('all',$opt1);

			if ( !empty($Customers_option[0])) $Customer[0] = $Customers_option[0];

/*
			$log = $PaymentDetail->getDataSource()->getLog(false, false);
			$querylog = $log['log'][$log['count']-1]['query'];
var_dump($querylog);exit;
*/
/*
			PaymentDetail.typeは後で分けるように変更したので、コメント
			// 継続会員
			$Kt =array();
			$Ktt =array();
			$opt2 = array(
				'fields' => array ('PaymentDetail.*','count(1) as count'),
				'conditions' => array (
//					'PaymentDetail.type' => '2' ,
					'PaymentDetail.pay_month' => date('Y-m') ,
					'PaymentDetail.price >' => '0' 
				),
				'group' => array('ccd', 'rate', 'price', 'tax_rate')
				'order'=>'PaymentDetail.application_date'
			);
			$KCustomers = $PaymentDetail->find('all',$opt2);
			
			// 調整額
			$At =array();
			$Att =array();
			$opt3 = array(
				'fields' => array ('PaymentDetail.*','count(1) as count'),
				'conditions' => array (
					'PaymentDetail.type' => '3' ,
					'PaymentDetail.pay_month' => date('Y-m') ,
					'PaymentDetail.ccd' => $Cont['Contractor']['ccd']
				),
				'group' => array('ccd', 'rate', 'price', 'tax_rate')
				'order'=>'PaymentDetail.application_date'
			);
			
			$Adjusts = $PaymentDetail->find('all',$opt3);
*/			
			$res_prise = 0;
			$res_tax = 0;
			
			$i=32;
			$i2=10;
			
			if (is_array($Customers)){
				foreach ($Customers as $Customer) {
					
				$sql = "SELECT cname FROM m_contractors WHERE ccd='" . $Customer['PaymentDetail']['ccd'] . "'";
				$m_contractors_data = $PaymentDetail->query($sql, false);
				$cname = $m_contractors_data[0]['m_contractors']['cname'];
				
				switch ($Customer['PaymentDetail']['type']) {
					case '1':
						//$row['product_name']=$Cont['Contractor']['cname']."　初年度会員";
						$row['product_name']=$cname."　初年度会員";
						break;
					case '2':
						//$row['product_name']=$Cont['Contractor']['cname']."　継続会員";
						$row['product_name']=$cname."　継続会員";
						break;
					case '3':
						//$row['product_name']=$Cont['Contractor']['cname']."　調整額";
						$row['product_name']=$cname."　調整額";
						break;
					default:
						break;
				}
				// $row['product_name']=$Cont['Contractor']['cname']."　初年度会員";
				$row['rate']=$Customer['PaymentDetail']['rate'];
				$row['pay_price']=$Customer['PaymentDetail']['pay_price'];
				$rate=$row['rate']/100;
				$row['count']=$Customer[0]['count'];
				$row['price']=$Customer['PaymentDetail']['price'];
				// $row['products_prise']=$Customer['PaymentDetail']['price'] * $Customer[0]['count'];
				$row['products_prise']=$Customer[0]['sum_price'];
				$res_prise += $row['products_prise'];
				
				$sheet->setCellValue('A'.$i,$row['product_name']); // 商品名
				$sheet->setCellValue('C'.$i,$row['rate']); // 手数料
				$sheet->setCellValue('D'.$i,$row['count']); // 数量
				$sheet->setCellValue('E'.$i,$row['price']); // 単価
				$sheet->setCellValue('F'.$i,$row['products_prise']); // 金額
				
				$i++;
				}
				foreach ($Customers_option as $Customer_option) {
				$sheet2->setCellValue('A'.$i2,$Customer_option['PaymentDetail']['application_date']); // 申込日
				$sheet2->setCellValue('B'.$i2,$Customer_option['PaymentDetail']['customer_cd']); // ID
				$sheet2->setCellValue('C'.$i2,$Customer_option['PaymentDetail']['name_kana']); // 氏名
				$sheet2->setCellValue('D'.$i2,$Customer_option['PaymentDetail']['price']); // 単価
				$sheet2->setCellValue('E'.$i2,$Customer_option['PaymentDetail']['rate']); // 手数料
				$sheet2->setCellValue('F'.$i2,$Customer_option['PaymentDetail']['pay_price']); // 手数料単価
				//$res_tax += $row['price'] * $rate - $row['price'] / 1.05 * $rate;
				
				$res_tax += $row['price'] * $rate - floor(ceil($row['price'] / (($Customer_option['PaymentDetail']['tax_rate']+100)/100)) * $rate);
				
				//$res_tax += $row['price'] * $rate - floor((ceil($row['price'] / (($Customer_option['PaymentDetail']['tax_rate']+100)/100)) * $rate);
				
				$Customer_option['PaymentDetail']['payment_id'] = $insert_id;

				$PaymentDetail->save($Customer_option);

				$i2++;
				}
			} else {
				//
			}
			
/*
			// 上のロジックでまとめたのでコメント
			if (is_array($KCustomers)){
				foreach ($KCustomers as $KCustomer) {
				$row['product_name']=$Cont['Contractor']['cname']."　継続会員";
				$row['rate']=$KCustomer['PaymentDetail']['rate'];
				$row['count']=$KCustomer[0]['count'];
				$row['price']=$KCustomer['PaymentDetail']['price'];
				$row['products_prise']=$KCustomer['PaymentDetail']['price'] * $KCustomer[0]['count'];
				$res_prise += $row['products_prise'];
				$res_tax += $row['price'] - $row['price'] / 1.05;
				
				$sheet->setCellValue('A'.$i,$row['product_name']); // 商品名
				$sheet->setCellValue('C'.$i,$row['rate']); // 手数料
				$sheet->setCellValue('D'.$i,$row['count']); // 数量
				$sheet->setCellValue('E'.$i,$row['price']); // 単価
				$sheet->setCellValue('F'.$i,$row['products_prise']); // 金額
				
				$sheet2->setCellValue('A'.$i2,$KCustomer['PaymentDetail']['application_date']); // 申込日
				$sheet2->setCellValue('B'.$i2,$KCustomer['PaymentDetail']['customer_cd']); // ID
				$sheet2->setCellValue('C'.$i2,$KCustomer['PaymentDetail']['name_kana']); // 氏名
				$sheet2->setCellValue('D'.$i2,$row['price']); // 単価
				$sheet2->setCellValue('E'.$i2,$row['rate']); // 手数料
				$sheet2->setCellValue('F'.$i2,$row['products_prise']); // 手数料単価
				$i++;
				$i2++;
				}
			} else {
				//
			}
			

			
			if (is_array($Adjusts)){
				foreach ($Adjusts as $Adjust) {
				$row['product_name']=$Cont['Contractor']['cname']."　調整額";
				$row['rate']=$Adjust['PaymentDetail']['rate'];
				$row['count']=$Adjust[0]['count'];
				$row['price']=$Adjust['PaymentDetail']['price'];
				$row['products_prise']=$Adjust['PaymentDetail']['price'] * $Adjust[0]['count'];
				$res_prise += $row['products_prise'];
				$res_tax += $row['price'] - $row['price'] / 1.05;
				
				$sheet->setCellValue('A'.$i,$row['product_name']); // 商品名
				$sheet->setCellValue('C'.$i,$row['rate']); // 手数料
				$sheet->setCellValue('D'.$i,$row['count']); // 数量
				$sheet->setCellValue('E'.$i,$row['price']); // 単価
				$sheet->setCellValue('F'.$i,$row['products_prise']); // 金額
				
				$sheet2->setCellValue('A'.$i2,$Adjust['PaymentDetail']['application_date']); // 申込日
				$sheet2->setCellValue('B'.$i2,$Adjust['PaymentDetail']['customer_cd']); // ID
				$sheet2->setCellValue('C'.$i2,$Adjust['PaymentDetail']['name_kana']); // 氏名
				$sheet2->setCellValue('D'.$i2,$row['price']); // 単価
				$sheet2->setCellValue('E'.$i2,$row['rate']); // 手数料
				$sheet2->setCellValue('F'.$i2,$row['products_prise']); // 手数料単価
				$i++;
				$i2++;
				}
			} else {
				//
			}
			
*/			
			//$total_prise = $res_prise + $res_tax;
			$total_prise = floor($res_prise * 1.05);
			$res_tax = $total_prise - $res_prise;

			$save_data['Payment']['monthly_price'] = $total_prise; //今月分支払金額
			$save_data['Payment']['total_price'] = $total_prise + $save_data['Payment']['kurikosi_price']; //合計支払金額
			
			$save_data['Payment']['next_kurikosi_price'] = ( $save_data['Payment']['total_price'] < 10000 ) ? $save_data['Payment']['total_price'] : 0; //次月繰越金額

			// 支払い日
			switch ($Cont['Contractor']['pay_site']){
				case "0":
					$save_data['Payment']['pay_date'] = date('Y/m/d', mktime(0, 0, 0, intval(substr($this->args[0],4,2))+1, 0, intval(substr($this->args[0],0,4))));
					// Invoice No. CHE-130901-01
					$sheet->setCellValue('G2', 'Invoice No. CHE-'.date('ym01-01', mktime(0, 0, 0, intval(substr($this->args[0],4,2))+1, 0, intval(substr($this->args[0],0,4)))));
					$sheet2->setCellValue('F2', 'Invoice No. CHE-'.date('ym01-01', mktime(0, 0, 0, intval(substr($this->args[0],4,2))+1, 0, intval(substr($this->args[0],0,4)))));
					// 作成日
					$sheet->setCellValue('G1', '作成日：'.date('Y年m月01日', mktime(0, 0, 0, intval(substr($this->args[0],4,2))+1, 0, intval(substr($this->args[0],0,4)))));
					$sheet2->setCellValue('F1', '作成日：'.date('Y年m月01日', mktime(0, 0, 0, intval(substr($this->args[0],4,2))+1, 0, intval(substr($this->args[0],0,4)))));
			
				break;
				case "1":
					$save_data['Payment']['pay_date'] = date('Y/m/d', mktime(0, 0, 0, intval(substr($this->args[0],4,2))+2, 0, intval(substr($this->args[0],0,4))));
					// Invoice No. CHE-130901-01
					$sheet->setCellValue('G2', 'Invoice No. CHE-'.date('ym01-01', mktime(0, 0, 0, intval(substr($this->args[0],4,2))+2, 0, intval(substr($this->args[0],0,4)))));
					$sheet2->setCellValue('F2', 'Invoice No. CHE-'.date('ym01-01', mktime(0, 0, 0, intval(substr($this->args[0],4,2))+2, 0, intval(substr($this->args[0],0,4)))));
					// 作成日
					$sheet->setCellValue('G1', '作成日：'.date('Y年m月01日', mktime(0, 0, 0, intval(substr($this->args[0],4,2))+2, 0, intval(substr($this->args[0],0,4)))));
					$sheet2->setCellValue('F1', '作成日：'.date('Y年m月01日', mktime(0, 0, 0, intval(substr($this->args[0],4,2))+2, 0, intval(substr($this->args[0],0,4)))));
				break;
				case "2":
					$save_data['Payment']['pay_date'] = date('Y/m/d', mktime(0, 0, 0, intval(substr($this->args[0],4,2))+3, 0, intval(substr($this->args[0],0,4))));
					// Invoice No. CHE-130901-01
					$sheet->setCellValue('G2', 'Invoice No. CHE-'.date('ym01-01', mktime(0, 0, 0, intval(substr($this->args[0],4,2))+3, 0, intval(substr($this->args[0],0,4)))));
					$sheet2->setCellValue('F2', 'Invoice No. CHE-'.date('ym01-01', mktime(0, 0, 0, intval(substr($this->args[0],4,2))+3, 0, intval(substr($this->args[0],0,4)))));
					// 作成日
					$sheet->setCellValue('G1', '作成日：'.date('Y年m月01日', mktime(0, 0, 0, intval(substr($this->args[0],4,2))+3, 0, intval(substr($this->args[0],0,4)))));
					$sheet2->setCellValue('F1', '作成日：'.date('Y年m月01日', mktime(0, 0, 0, intval(substr($this->args[0],4,2))+3, 0, intval(substr($this->args[0],0,4)))));
				break;
				default:
				break;
			}
			
			
			
			$sheet->setCellValue('G25', $save_data['Payment']['monthly_price']); //今月分支払金額
			
			// 1万円未満は、支払日を印字しない。
			// if(intval($save_data['Payment']['monthly_price']) >= 10000) {
			if(intval($save_data['Payment']['total_price']) >= 10000) {
				$payweek = date('w',strtotime($save_data['Payment']['pay_date']));
				if ( $payweek == 0 ) {
				    $pay_date = date('Y/m/d',mktime(0,0,0,substr($save_data['Payment']['pay_date'],5,2),substr($save_data['Payment']['pay_date'],8,2)-2,substr($save_data['Payment']['pay_date'],0,4)));
				} elseif ( $payweek == 6 ) {
				    $pay_date = date('Y/m/d',mktime(0,0,0,substr($save_data['Payment']['pay_date'],5,2),substr($save_data['Payment']['pay_date'],8,2)-1,substr($save_data['Payment']['pay_date'],0,4)));
				} else {
				    $pay_date = $save_data['Payment']['pay_date'];
				}
				$sheet->setCellValue('B27',$pay_date); // 支払い日
			}
			else {
				$sheet->setCellValue('B27', "-"); // 支払い日
			}
			
			$sheet->setCellValue('G27', $save_data['Payment']['total_price']); // 合計支払金額
			$sheet->setCellValue('F52', $save_data['Payment']['monthly_price']); // 今月分支払金額
			$sheet->setCellValue('F48', $res_prise); // 小計
			$sheet->setCellValue('F50',$res_tax ); // 消費税
			
			$save_data['Payment']['id'] = $insert_id;
									
			$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
			$objWriter->setTempDir($dir);
			$objWriter->save($filepath);

			// カラのファイルは削除する
			if ( $total_prise == 0 || empty($total_prise) ) {
			    exec('rm -rf ' . $filepath);
			}
			
			$Payment->save($save_data);
			
			// exit;
			
		}
		
		/**
			■処理手順

			
			○以下全代理店コードを取得して、ループ処理をする。
			　→m_contractorsをループ処理
			 　→pay_matome_ccdに値がemptyでない場合は、別にまとめ先があるので、処理を飛ばす
			
			①支払書のExcelファイルを作成する。
			　→テンプレートファイルをコピーして、ファイルを作成。
			　　ファイル名は、「ccd_yyyymmdd.xls」
			　　
			②t_paymentに１レコードcreateし、そのidを取得。(当月支払い分の支払書IDを作成）
			　→代理店名（cname）、課金方式（account_type）、金融機関（bank）、支店名（siten）、口座番号（koza）、名義（meigi）
			　　支払月（pay_yyyymm）＝当月を登録　　（支払日は、合計支払金額が１万円にみたない場合は記述しないので、ここではまだ登録しない）
			　→代理店コードについては、m_contractorsで、pay_matome_ccd=ccdの代理店をdistinctで調べて、複数ある場合は、カンマ区切りで表記する。
			　→同時に、Excelにも印字
			
			③前月の繰越分（前月のレコードの、next_kurikosi_price）がある場合には、それを当月のkurikosi_priceに代入。
			　→同時にExcelにも印字。
			
			※ここからは、明細行をExcelに印字しつつ、合計金額を積算していく。
			
			※まずは、t_payment_detailsのtype=1について明細行を作成する。
			
			④t_payment_detailsを
			　　条件（type=1 AND pay_month=当月 AND pay_matome_ccd=代理店コード）の条件で、（ccd, rate, price, tax_rate）でgroup by して取得したものを、
			　　商品名＝代理店名２　初年度会員
			　　　　　　↑ccdのm_contractorsのcname2
			　　手数料＝rate
			　　数量＝count
			　　単価＝price
			　　金額＝数量*単価
			　　
			　　同時に、
			　　
			　　小計＝小計＋金額
			　　消費税金額合計＝消費税金額合計＋（price-price/1.05)
			　　
			　　を保存しておく。
			　　
			　　これをgroup byでヒットした数分繰り返し、１ぎょうずつ追加していく。

			⑤t_payment_detailsを
			　　条件（type=2 AND pay_month=当月 AND pay_matome_ccd=代理店コード）の条件で、（ccd, rate, price, tax_rate）でgroup by して取得したものを、
			　　商品名＝代理店名２　継続会員
			　　　　　　↑ccdのm_contractorsのcname2
			　　手数料＝rate
			　　数量＝count
			　　単価＝price
			　　金額＝数量*単価
			　　
			　　同時に、
			　　
			　　小計＝小計＋金額
			　　消費税金額合計＝消費税金額合計＋（price-price/1.05)
			　　
			　　を保存しておく。
			　　
			　　これをgroup byでヒットした数分繰り返し、１ぎょうずつ追加していく。

			⑥t_payment_detailsを
			　　条件（type=3 AND pay_month=当月 AND pay_matome_ccd=代理店コード）の条件で、（ccd, rate, price, tax_rate）でgroup by して取得したものを、
			　　商品名＝代理店名２　調整金額
			　　　　　　↑ccdのm_contractorsのcname2
			　　手数料＝rate
			　　数量＝count
			　　単価＝price
			　　金額＝数量*単価
			　　
			　　同時に、
			　　
			　　小計＝小計＋金額
			　　消費税金額合計＝消費税金額合計＋（price-price/1.05)
			　　
			　　を保存しておく。
			　　
			　　これをgroup byでヒットした数分繰り返し、１ぎょうずつ追加していく。
			　　
			⑦フッタ部分の記述
			　　小計（税抜き）＝小計
			　　消費税＝消費税金額合計
			　　合計お支払金額＝小計＋消費税
			
			⑧Excelの２枚目以降に、代理店（まとめられていて代理店が複数ある場合には、代理店ごとに別シート）の、t_payment_detailsの
			　条件（type=1 AND pay_month=当月 AND ccd=代理店コード）の条件でヒットした顧客のリストを一覧出力する。
			　申し込み日＝applicateion_date
			　ID=customer_cd
			　名前＝name_kana
			
			⑨Excelを閉じる。
			
			⑩t_paymentを更新する。
			　今月分支払金額（monthly_price）＝合計お支払金額
			　合計支払金額（total_price）＝monthly_price+kurikosi_price
			　
			　次月繰越金額（next_kurikosi_price）
			　　→合計支払金額が、１万円未満の場合は　＝合計支払金額
			　　→合計支払金額が、１万円以上の場合は　＝０
			　
			　お支払日（pay_date）
			　　→代理店マスタ（m_contractors）の支払サイト（pay_site）をみて、
			　　　０：当月末日
			　　　１：翌月末日
			　　　２：翌々月末日
			　　　をセット。
		**/
		


	}
}


?>
