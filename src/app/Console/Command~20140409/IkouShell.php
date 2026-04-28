<?php

App::uses('ComponentCollection', 'Controller');
App::uses('KarteComponent', 'Controller/Component');	// カルテ連携コンポーネント
App::uses('PetsController', 'Controller');
App::uses('CustomersController', 'Controller');

class IkouShell extends Shell {
	
	var $Controller;
	
	var $components = array('Karte');
	
	/**
	 * 初期化処理
	 */
	function startup(){

		$collection = new ComponentCollection();
		$this->Karte = new KarteComponent($collection);
		parent::startup();
	}

	/**
	 * 移行用のデータを取り込む
	 */
	function main() {

		require_once('/var/www/html/web_entry/Database.php');
        define('DB_SERVER',   'localhost');
        define('DB_USER',     'anim2cli4');
        define('DB_PASSWORD', 'Hw8XF62DHnx7mvEz');
        define('DB_NAME',     'eccube');
       	
		$Database = new Database();
		
       	$result = $Database->executeSQL("SET NAMES utf8");
		
		$check_file = "/var/www/cake/app/Console/Command/customerlist.csv";
		
		$line = file($check_file);
		
		for($i = 0; $i < count($line); $i++) {
			
			$data = explode(",", $line[$i]);
			
			$customer_cd = $data[0];

			// eccubeにデータ追加
			$sql = "SELECT sequence FROM dtb_customer_customer_id_seq";
			$Database = new Database(); 
			$result = $Database->executeSQL($sql);
			$sequence = $result['sequence'];
			$sequence = intval($sequence) + 1;
			$sql = "UPDATE dtb_customer_customer_id_seq SET sequence='" . $sequence . "'";
			$Database = new Database();
			$result = $Database->executeSQL($sql);

			$strList = randString(6, 1);
			
			$password_str = $strList[0];
			
			$password = hash_hmac('sha256', $password_str . ':raeguloukousliacrephouloucriuiathisaisio', 'choulawrip');
		
			$sql = "INSERT INTO dtb_customer SET ";
			$sql.= "customer_id='" . $sequence . "',";
			$sql.= "name01='姓',";
			$sql.= "name02='名',";
			$sql.= "kana01='セイ',";
			$sql.= "kana02='メイ',";
			
			$login_id = $customer_cd . "@dummy.jp";
						
			$sql.= "email='" . $login_id . "',";
			

			
			$sql.= "password='" . $password . "',";
			$sql.= "salt='choulawrip',";
			$sql.= "secret_key='" . md5(uniqid(rand(),1)) . "',";
			$sql.= "status='1',";
			$sql.= "create_date=sysdate(),";
			$sql.= "update_date=sysdate(),";
			$sql.= "del_flg='0'";
			
			$Database = new Database();
			$result = $Database->executeSQL("SET NAMES utf8");
			$result = $Database->executeSQL($sql);

	       	// c_customerにデータ追加
	       	$sql = "INSERT INTO c_customers SET ";
	       	$sql.= "eccube_id='" . $sequence . "',";
	       	$sql.= "customer_cd='" . $customer_cd . "',";

	       	$sql.= "login_id='" . $login_id . "',";

	       	$sql.= "password='" . $password_str . "',";
	       	
	       	// complete_func.phpで0に戻す。
	       	$sql.= "deleted=0,";
	       	
	       	$sql.= "created=SYSDATE(),";
			$sql.= "modified=SYSDATE()";
			
			$Database = new Database(); 
			$result = $Database->executeSQL("SET NAMES utf8");
			$result = $Database->executeSQL($sql);
		
		}
	

		
	}
}

function randString($len, $num)
{
    // 表示する文字の設定
    $chars = '01234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';

    // 文字列の初期化
    $strList = null;

    if ( is_numeric($len) && is_numeric($num) && strcmp($len, 0) != 0 &&
strcmp($num, 0 ) != 0 ){

        for ( $i = 0; $i < $num; $i++ ){
    
            $string = "";
    
            for ($j = 0; $j < $len; $j++){
        
                $pos = rand(0, strlen($chars)-1);
                
                $string .= $chars{$pos};
            }
    
            $strList[] = $string;
    
        }

    }

    return $strList;
}

?>