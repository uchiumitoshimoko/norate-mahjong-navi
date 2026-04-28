<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

/**
 * Customers Controller
 *
 * @property Customer $Customer
 */
class MatisController extends AppController {
	
	public $uses = array('Matis');
	
	public function index() {
		
		$this->set("title_for_layout","市区町村一覧");
		
		$this->loadModel('Matis');
		
		$this->Matis->recursive = 0;
		
		$prefectures_id_list = Configure::read('prefectures_id');
		
		$cond = array();

		if (!isset($_GET['backflg'])) {
		    $this->Session->delete('search');
		} else {
		    if (!empty($_SESSION['search'])) $this->data = $_SESSION['search'];
		}
		
		if($this->data){
			$this->Session->write('search',$this->data);
			
			
			foreach(@$this->data['Matis'] as $key=>$value){
				$value = str_replace(" ","",str_replace("　","",$value));
				if(empty($value)) continue;
				switch($key){
					case "mode":
						break;
					case "name":
					case "name_kana":
					case "title":
						$cond['REPLACE(REPLACE(Matis.'.$key .',\' \',\'\'),\'　\',\'\') like'] = "%".$value. "%";
						break;
					case "pref_id":
						$cond['Matis.' . $key] = $value;
						break;
					default :
						$cond['Matis.'.$key .' like'] = "%".$value. "%";
						break;
				}
			}
		}
				
		
		// 検索ボタン以外が押された場合
		if (!empty($this->request->data['Stores']['mode']) ) {
			
			$mode = $this->request->data['Stores']['mode'];
			
			// ダウンロードボタンが押された場合
			if($mode == "1") {
			
				$fields = array('Stores.*');
				
				$res = $this->Jobs->find('all',array('conditions'=>$cond, 'fields'=>$fields, 'order'=>array('id desc')));
				
				// ヘッダ情報
				$str = "id,"
					."\"name\","
					."\"producturl\","
					."\"bigimage\","
					. "\"categoryid1\","
					. "\"categoryid2\","
					. "\"categoryid3\","
					. "\"categoryid4\","
					. "\"description\","
					. "\"price\","
					;
				
				$str.= "\n";
				
				foreach ($res as $write_data) {
					
					// 非表示の場合はスルーする
					if($write_data['Jobs']['show_flg'] != "1"
						|| $write_data['Jobs']['show_flg'] == "0"
					) {
						continue;
					}
					
					$categoryid1 = "";
					
					$kinmu_naiyo = str_replace("<br>", "", $write_data['Jobs']['kinmu_naiyo']);
					
					if(
						   $write_data['Jobs']['syokusyu_type_id_1'] == "1"
						|| $write_data['Jobs']['syokusyu_type_id_1'] == "2"
						|| $write_data['Jobs']['syokusyu_type_id_1'] == "3"
						|| $write_data['Jobs']['syokusyu_type_id_1'] == "4"
						|| $write_data['Jobs']['syokusyu_type_id_1'] == "10"
						|| $write_data['Jobs']['syokusyu_type_id_2'] == "1"
						|| $write_data['Jobs']['syokusyu_type_id_2'] == "2"
						|| $write_data['Jobs']['syokusyu_type_id_2'] == "3"
						|| $write_data['Jobs']['syokusyu_type_id_2'] == "4"
						|| $write_data['Jobs']['syokusyu_type_id_2'] == "10"
						|| $write_data['Jobs']['syokusyu_type_id_3'] == "1"
						|| $write_data['Jobs']['syokusyu_type_id_3'] == "2"
						|| $write_data['Jobs']['syokusyu_type_id_3'] == "3"
						|| $write_data['Jobs']['syokusyu_type_id_3'] == "4"
						|| $write_data['Jobs']['syokusyu_type_id_3'] == "10"
						|| $write_data['Jobs']['syokusyu_type_id_4'] == "1"
						|| $write_data['Jobs']['syokusyu_type_id_4'] == "2"
						|| $write_data['Jobs']['syokusyu_type_id_4'] == "3"
						|| $write_data['Jobs']['syokusyu_type_id_4'] == "4"
						|| $write_data['Jobs']['syokusyu_type_id_4'] == "10"
					) {
						$categoryid1 = "エンジニア";
					}
					else if($write_data['Jobs']['syokusyu_type_id_1'] == "6"
						|| $write_data['Jobs']['syokusyu_type_id_2'] == "6"
						|| $write_data['Jobs']['syokusyu_type_id_3'] == "6"
						|| $write_data['Jobs']['syokusyu_type_id_4'] == "6"
					) {
						$categoryid1 = "ゲーム";
					}
					else if($write_data['Jobs']['syokusyu_type_id_1'] == "5"
						|| $write_data['Jobs']['syokusyu_type_id_2'] == "5"
						|| $write_data['Jobs']['syokusyu_type_id_3'] == "5"
						|| $write_data['Jobs']['syokusyu_type_id_4'] == "5"
					) {
						$categoryid1 = "クリエイター";
					}
					else if(
						   $write_data['Jobs']['syokusyu_type_id_1'] == "7"
						|| $write_data['Jobs']['syokusyu_type_id_2'] == "7"
						|| $write_data['Jobs']['syokusyu_type_id_3'] == "7"
						|| $write_data['Jobs']['syokusyu_type_id_4'] == "7"
						|| $write_data['Jobs']['syokusyu_type_id_1'] == "8"
						|| $write_data['Jobs']['syokusyu_type_id_2'] == "8"
						|| $write_data['Jobs']['syokusyu_type_id_3'] == "8"
						|| $write_data['Jobs']['syokusyu_type_id_4'] == "8"
					) {
						$categoryid1 = "営業";
					}
					else if($write_data['Jobs']['syokusyu_type_id_1'] == "9"
						|| $write_data['Jobs']['syokusyu_type_id_2'] == "9"
						|| $write_data['Jobs']['syokusyu_type_id_3'] == "9"
						|| $write_data['Jobs']['syokusyu_type_id_4'] == "9"
					) {
						$categoryid1 = "管理部門";
					}
					
					$substr="\"" . $write_data['Jobs']['id'] . "\","
						. "\"" . $write_data['Jobs']['title'] . "\","
						. "\"" . "https://www.geekly.co.jp/search/detail/" . $write_data['Jobs']['id'] . "\","
						. "\"" . "" . "\","
						. "\"" . $categoryid1 . "\","
						. "\"" . $write_data['Jobs']['kinmusaki_name_1'] . "\","
						. "\"" . $write_data['Jobs']['nensyu'] . "\","
						. "\"" . $kinmu_naiyo . "\","
						. "\"" . $write_data['Jobs']['nensyu'] . "\","
						;
					
					$str.= $substr."\r\n";
			    }
			    
			    $filename = "jobs_" . date('Ymd') . ".csv";
			    $filepath = SHELL_PATH."/tmp/csv/";
			    
			    $fname = $filepath.$filename;
			    $fp = fopen ($fname, "w+");
			    fputs( $fp, mb_convert_encoding($str, "SJIS", "UTF-8") );
			    fclose($fp);
			
			    $content_length = filesize($filepath . $filename);
			
			    header("Content-disposition: attachment; filename= $filename");
			    header("Content-Length: ".$content_length);
			    header("Content-Type: application/octet-stream");
			    readfile($filepath . $filename);
			    exit;
			}

		}
				
		$order = array('pref_id'=>'asc',
						'sort' => 'asc');
		$this->paginate = array(
			'conditions' => $cond,
			'limit' => 100,
			'recursive'=>0,
			'order'=>$order,
		);
		
		$matis = $this->paginate('Matis');
		
		$this->set(compact('matis', 'prefectures_id_list'));
	}
	
	
	// ソートチェンジ
	public function sortchange($id = null, $sort_no = null, $change_type = null) {
		
		$this->loadModel('Consultants');
		
		// upの場合、同一タイプ内の自分のソート番号より小さな一番大きいIDとソート番号を取得して、それと入れ替える。
		$up_or_down = "";
		$max_or_min = "";
		if($change_type == "up") {
			$up_or_down = "<";
			$max_or_min = "max(sort_no) as sort_no";
		}
		else {
			$up_or_down = ">";
			$max_or_min = "min(sort_no) as sort_no";
		}
		
		$sql = "SELECT " . $max_or_min . " FROM h_consultants WHERE deleted=0 AND sort_no" . $up_or_down . $sort_no . " AND id!=" . $id;
		
		$result = $this->Consultants->query($sql);
		
		// 存在する場合は番号を入れ替える
		if(!empty($result[0][0]['sort_no'])) {
		
			$target_sort_no = $result[0][0]['sort_no'];
			$sql = "UPDATE h_consultants SET sort_no=" . $sort_no . " WHERE sort_no=" . $target_sort_no;
			$this->Consultants->query($sql);
			
			$sql = "UPDATE h_consultants SET sort_no=" . $target_sort_no . " WHERE id=" . $id;
			$this->Consultants->query($sql);
		
		}
		
		return $this->redirect(array ('controller' => 'consultants', 'action' => 'index'));
		exit;
	}
	
	// 編集
	public function edit($id = null)
	{
		$this->set("title_for_layout","市区町村詳細");
		
		$this->loadModel('Matis');
		
		$prefectures_id_list = Configure::read('prefectures_id');
			
		// 実行処理
		if ($this->request->is('post') || $this->request->is('put')) {
			
			// トランザクション開始
			$this->Matis->begin();
			
			$this->Matis->id = $this->request->data['Matis']['id'];
						
			if($this->Matis->save($this->request->data)) {
				
				$this->Matis->commit();
				
				$this->Session->setFlash ('市区町村情報の編集が完了しました。');
				return $this->redirect(array ('controller' => 'matis', 'action' => 'index/page:'.@$_SESSION['page']));
			}
			else {
				return $this->Session->setFlash($this->Matis->error);
			}

		}

		$cond = array('id'=>$id);
		$matis = $this->Matis->find('first', array('conditions'=>$cond));
		
		$this->data = $matis;
		
		$this->set(compact('prefectures_id_list'));		

	}

	// 画像ダウンロード(店舗画像）
	public function read_store_image($id = null)
	{
		$this->loadModel('Stores');

		$cond = array('id'=>$id);
		$stores = $this->Stores->find('first', array('conditions'=>$cond));
		
		header("Content-Type: ".$stores['Stores']['store_mime']);
        echo $stores['Stores']['store_imgdat'];
		exit;
	}
}
