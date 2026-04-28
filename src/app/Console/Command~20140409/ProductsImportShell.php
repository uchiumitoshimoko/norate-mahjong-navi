<?php

App::uses('ComponentCollection', 'Controller');

/*
 * カルテ側から日時処理で、代理店、商品データを取得し、C_SYSTEM側商品データを更新する。
 */
class ProductsImportShell extends Shell {
		
	var $Controller;
	
	// カルテ連携データの入っているディレクトリ
	const KARTEMASTER_DIR = "/var/www/c_system/app/tmp/kartemaster";
	
	// 代理店データ
	const Contractor_FILE_NAME = "anicli24_pet_Contractor.txt";
	
	// 商品データ
	const Product_FILE_NAME = "anicli24_pet_Product.txt";
	
	
	/**
	 * 初期化処理
	 */
	function startup(){

		$collection = new ComponentCollection();
		//$this->Karte = new KarteComponent($collection);
		parent::startup();
	
	}

	/**
	 * メイン処理
	 */
	function main() {
		
		// 代理店ファイル
		$Contractor_file = ProductsImportShell::KARTEMASTER_DIR . "/" . ProductsImportShell::Contractor_FILE_NAME;
		$line = file($Contractor_file);
		
		// 代理店リスト
		$contractor_list = array();
		
		// 代理店コード＋代理店名を、連想配列に格納する。
		for($i = 0; $i < count($line); $i++) {
			
			// １行目はヘッダ情報なので読み飛ばす
			if($i==0) continue;
			
			// データはすべてタブ区切り
			$data = explode("\t", mb_convert_encoding($line[$i], "UTF-8", "EUC-JP"));
			
			$contractor_list[$data[0]] = $data[1];
		}
		
		$ContractorModel = ClassRegistry::init('Contractor');
		
		// 代理店ファイル
		$Product_file = ProductsImportShell::KARTEMASTER_DIR . "/" . ProductsImportShell::Product_FILE_NAME;
		$line = file($Product_file);
		
		// 商品データ配列
		// $products_list[代理店コード][代理店名]
		//							   [開始日]
		//							   [～～～]
		$products_list = array();
		
		for($i = 0; $i < count($line); $i++) {
			
			// １行目はヘッダ情報なので読み飛ばす
			if($i==0) continue;
			
			// データはすべてタブ区切り
			$data = explode("\t", mb_convert_encoding($line[$i], "UTF-8", "EUC-JP"));
			
			// 代理店コード
			$ccd = $data[1];
			
			$update_flg = 0;
			
			// 既に代理店コードが存在しているか調べて、
			//	存在していない→配列に登録
			//	存在している→開始日を比較して、こちらのデータのほうが新しければ更新
			//	をかける。
			if(isset($products_list[$ccd])) {
				
				// 開始日を比較
				if($data[7] > $products_list[$ccd]['start_dt']) {
					$update_flg = 1;
				}
			}
			else {
				$update_flg = 1;
			}
			
			// リストを更新する。
			if($update_flg == 1) {
				
				$products_list[$ccd]['start_dt'] = $data[7];
				$products_list[$ccd]['ccd']	= $ccd;
				
				
				if($data[4] == "PER_USE") {
					$data[4] = "PRE_USE";
				}
				
				if($data[4] == "PRE_USE") {
					$products_list[$ccd]['cname'] = $ccd . "　従量";
				}
				else if($data[4] == "MONTHLY") {
					$products_list[$ccd]['cname'] = $ccd . "　月額";
				}
				else if($data[4] == "ANNUAL") {
					$products_list[$ccd]['cname'] = $ccd . "　年払";
				}
				else if($data[4] == "INIT") {
					$products_list[$ccd]['cname'] = $ccd . "　初期";
				}
				else if($data[4] == "OPTION") {
					$products_list[$ccd]['cname'] = $ccd . "　オプ";
				}
				
				$products_list[$ccd]['account_type'] = $data[4];
				$products_list[$ccd]['debit_type'] = str_replace("\n", "", $data[16]);
				$products_list[$ccd]['initial_payed_flg'] = $data[15];
				
				// これより下は、本番稼動ではコメントアウトする。
				// 本来手数料は、カルテ側からは取得しないため。開発段階のみ
				/*
				$products_list[$ccd]['first_rate'] = $data[11];
				$products_list[$ccd]['after_rate'] = $data[13];
				$products_list[$ccd]['tax_rate'] = "0.05";
				$products_list[$ccd]['unit_price'] = $data[6];
				*/
			}
		}
		
		$Commission = ClassRegistry::init('Commission');
		
		// 商品データリストをもとに、 m_contractorsを更新する。
		foreach($products_list as $ccd => $p_data) {
			
			// 既にm_contractorsにccdがあればUPDATE。なければ、INSERT
			$cond = array("ccd"=>$ccd );

			$sql = "SELECT * FROM m_contractors WHERE ccd='" . $ccd . "'";
			$result = $ContractorModel->query($sql);
			
			$saveData = array();
			
			if(!empty($result)) {
				
				$saveData['Contractor']['id'] = $result[0]['m_contractors']['id'];
			}
			else {
				$ContractorModel->create();
			}
			
			// 各項目をsaveDataに格納する。
			$saveData['Contractor']['ccd'] = $ccd;
			$saveData['Contractor']['cname'] = $p_data['cname'];
			$saveData['Contractor']['account_type'] = $p_data['account_type'];
			$saveData['Contractor']['debit_type'] = str_replace("\n", "", $p_data['debit_type']);
			$saveData['Contractor']['initial_payed_flg'] = $p_data['initial_payed_flg'];
			
			$ContractorModel->set($saveData);
			$ContractorModel->save();
			
			// これより下は、本番稼動ではコメントアウトする。
			// 本来手数料は、カルテ側からは取得しないため。開発段階のみ
			/*
			$saveData2 = array();
			$Commission->create();
			$saveData2['Commission']['ccd'] = $ccd;
			$saveData2['Commission']['start_date'] = $p_data['start_dt'];
			$saveData2['Commission']['first_rate'] = $p_data['first_rate'];
			$saveData2['Commission']['after_rate'] = $p_data['after_rate'];
			$saveData2['Commission']['tax_rate'] = $p_data['tax_rate'];
			$saveData2['Commission']['unit_price'] = $p_data['unit_price'];
			$Commission->set($saveData2);
			$Commission->save();
			*/
		}
		
	
	}
}


?>