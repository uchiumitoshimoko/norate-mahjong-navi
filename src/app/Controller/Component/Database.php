<?php
/**
 * データベース処理
 * $Id: Database.php 97 2009-12-21 11:15:50Z muroi $
 */

class Database {
    function __construct() {
        self::connectDB();
    }

    /**
     * DB接続
     */
    function connectDB($db_server=DB_SERVER, $db_user=DB_USER, $db_password=DB_PASSWORD, $db_name=DB_NAME) {
        $mysql = mysql_connect($db_server, $db_user, $db_password);
    
        if (!$mysql) { 
            //Common::logError('Could not connect : ' . $db_server .' '. $db_user .' '. $db_password);
            $_data['error_message'] =  'エラーが発生しました：Could not connect';
            //Common::showTemplate('error/message.html', $_data);
        }   
                                         
        if (!mysql_select_db($db_name, $mysql)) {
            //Common::logError('Could not select database : ' . $db_name);
            $_data['error_message'] =  'エラーが発生しました：Could not select database';
            //Common::showTemplate('error/message.html', $_data);
        }
        mysql_query('SET NAMES utf8');
    }

    /**
     * SQL実行、データ取得(一件)
     */ 
    function executeSQL($sql, array $item_array=NULL, $error_flg=NULL) {
        $sql = self::escapeSQL($sql, $item_array);
        $result = mysql_query($sql);

        if ($result) {
            if (is_resource($result)) {
                $row = mysql_fetch_assoc($result);
        
                if ($row === false) {
                   //Common::logError('No Data : ' . $sql);
                   $row = false;

                   if ($error_flg == 1) { 
                       $_data['error_message'] =  '指定されたデータがありません：No Data';
                       //Common::showTemplate('error/message.html', $_data);
                   }
                }
            } else {
                $row = true;
            }
        } else {
            //Common::logError('Query failed : ' . $sql .' '. mysql_error());
            $row = false;
      
            if ($error_flg == 1) { 
                $_data['error_message'] =  '処理中にエラーが発生しました：Query failed';
                //Common::showTemplate('error/message.html', $_data);
            }
        }

        return $row;
    }

    /**
     * SQL実行、データ取得(配列)
     */ 
    function executeArraySQL($sql, array $item_array=NULL, $error_flg=NULL) {
        $sql = self::escapeSQL($sql, $item_array);
        $result = mysql_query($sql);

        if ($result) {
            $row_array = array();
               
            while($row = mysql_fetch_assoc($result)) {
                array_push($row_array, $row);
            }
        } else {
            //Common::logError('Query failed : ' . $sql .' '. mysql_error());
            $row = false;
            
            if ($error_flg == 1) { 
                $_data['error_message'] =  '処理中にエラーが発生しました：Query failed';
                //Common::showTemplate('error/message.html', $_data);
            }
        }

        return $row_array;
    }

    /**
     * SQLインジェクション対応
     */
    function escapeSQL($sql, array $item_array=NULL) {
        // 複数スペース除去
        //$sql = preg_replace('/\s\s+/', ' ', $sql);
        
        // 入力値が有る場合
        if (is_array($item_array)) {
            $item_count = count($item_array);
            
            extract($item_array, EXTR_PREFIX_ALL, 'item');
        
            for ($i=0; $i<$item_count; $i++) {    
                $item = 'item_' . $i;
                $sql_item[] =  mysql_real_escape_string($$item);
            }
   
            $sql = vsprintf($sql, $sql_item);
        }
    
        return $sql;
    }  
    
    /**
     * バイナリデータをDB格納用に変換
     */
    function convertBinaryFile($file) {
        if ($file['tmp_name'] == '') {
            return false;
        }

        $file_convert = file_get_contents($file['tmp_name']);
        $file_convert = '0x' . bin2hex($file_convert);
        
        return $file_convert;
    }
    
    /**
     * DB接続を閉じる
     */
    function close() {
        return mysql_close();
    }
}

