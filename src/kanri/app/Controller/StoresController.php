<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

/**
 * Customers Controller
 *
 * @property Customer $Customer
 */
class StoresController extends AppController {
	
	public $uses = array('Stores');
	var $components = array('Session', 'Utility');
	
	public function index() {
		
		$this->set("title_for_layout","店舗一覧");
		
		$prefectures_id_list = Configure::read('prefectures_id');
		$status_list = Configure::read('status_list');
		
		$this->loadModel('Stores');
		
		$this->Stores->recursive = 0;
		
		$cond = array();

		if (!isset($_GET['backflg'])) {
		    $this->Session->delete('search');
		} else {
		    if (!empty($_SESSION['search'])) $this->data = $_SESSION['search'];
		}
		
		if($this->data){
			$this->Session->write('search',$this->data);

			foreach(@$this->data['Stores'] as $key=>$value){
				$value = str_replace(" ","",str_replace("　","",$value));
				if(empty($value)) continue;
				switch($key){
					case "mode":
						break;
					case "name":
					case "name_kana":
					case "title":
						$cond['REPLACE(REPLACE(Stores.'.$key .',\' \',\'\'),\'　\',\'\') like'] = "%".$value. "%";
						break;
					case "pickup_flg":
					case "pref_id":
					case "status":
						$cond['Stores.' . $key] = $value;
						break;
					case "deny_visit_flg":
						$cond['Stores.visit_flg'] = "0";
						break;
					case "deny_blog_url":
						$cond['Stores.blog_url'] = "";
						break;
					case "image_flg":
						$cond['Stores.store_imgdat_1'] = "";
						break;
					default :
						$cond['Stores.'.$key .' like'] = "%".$value. "%";
						break;
				}
			}
		}
		
		$order = array('id'=>'desc');
		
		$fields = array('id', 'create_date','update_date','pickup_flg','store_name','kenko_flg','norate_flg','kyogi_flg', 'yoyaku_flg', 'visit_flg','visit_date','blog_url','homepage_1_title','homepage_1_url','homepage_2_title','homepage_2_url','homepage_3_title','homepage_3_url','comment','pref_id','mati','address','close_flg', 'status','station','free_word_text','new_flg','twitter', 'store_mime_1', 'store_mime_2', 'store_mime_3', 'store_mime_4');
		
		$this->paginate = array(
			'conditions' => $cond,
			'fields'=>$fields,
			'limit' => 100,
			'recursive'=>0,
			'order'=>$order,
		);
		
		$stores = $this->paginate('Stores');
		
		$this->set(compact('status_list', 'stores', 'prefectures_id_list'));
	}
	
	// 編集
	public function edit($id = null)
	{
		$this->set("title_for_layout","店舗詳細");
		
		$this->loadModel('Stores');
		$this->loadModel('Matis');
		
		$prefectures_id_list = Configure::read('prefectures_id');
		$status_list = Configure::read('status_list');
		
		// 実行処理
		if ($this->request->is('post') || $this->request->is('put')) {
			
			// トランザクション開始
			$this->Stores->begin();
			
			$this->Stores->id = $this->request->data['Stores']['id'];
			
			for($i=1; $i<=4; $i++) {
			
				if(!empty($this->request->data['Stores']['store_image_' . $i]['tmp_name'])) {
						
					$imgdat = file_get_contents($this->request->data['Stores']['store_image_' . $i]['tmp_name']);
				    $mime = $this->request->data['Stores']['store_image_' . $i]['type'];
				    
				    $this->request->data['Stores']['store_imgdat_' . $i] = $imgdat;
				    $this->request->data['Stores']['store_mime_' . $i] = $mime;
				}
				unset($this->request->data['Stores']['store_image_' . $i]);
			}
			
			// ホームページURLがあり、タイトルがなければ店舗名をタイトルにする。
			for($i=1; $i<=3;$i++) {
				if(!empty($this->request->data['Stores']['homepage_' . $i. '_url'])) {
					
					if(empty($this->request->data['Stores']['homepage_' . $i . '_title'])) {
						$this->request->data['Stores']['homepage_' . $i . '_title'] = $this->request->data['Stores']['store_name'];
					}
				}
			}
			
			// 登録日、更新日が未設定なら、現在を登録
			if(empty($this->request->data['Stores']['create_date'])) {
				$this->request->data['Stores']['create_date'] = date('Y-m-d');
			}
			if(empty($this->request->data['Stores']['update_date'])) {
				$this->request->data['Stores']['update_date'] = date('Y-m-d');
			}
			
			if($this->Stores->save($this->request->data)) {
				
				// まだ市区町村マスタに登録されていない場合は、新規に登録する。
				$cond_m = array();
				$cond_m['pref_id'] = $this->request->data['Stores']['pref_id'];
				$cond_m['mati'] = $this->request->data['Stores']['mati'];
				$matis = $this->Matis->find('first', array('conditions'=>$cond_m));
				
				if(empty($matis)) {
					
					$this->Matis->create();
					$save_m = array();
					$save_m['pref_id'] = $this->request->data['Stores']['pref_id'];
					$save_m['mati'] = $this->request->data['Stores']['mati'];
					$save_m['sort'] = "99";
					
					$this->Matis->save($save_m);
				}
				
				$this->Utility->countStores();
				$this->Utility->createSitemaps();
				
				$this->Stores->commit();

				$this->Session->setFlash ('店舗情報の編集が完了しました。');
				return $this->redirect(array ('controller' => 'stores', 'action' => 'index/page:'.@$_SESSION['page']));
			}
			else {
				return $this->Session->setFlash($this->Stores->error);
			}

		}

		$cond = array('id'=>$id);
		$stores = $this->Stores->find('first', array('conditions'=>$cond));
		
		$this->data = $stores;
		
		$this->set(compact('status_list', 'prefectures_id_list'));		

	}

	// 画像ダウンロード(店舗画像）
	public function read_store_image($id = null, $no = "")
	{
		$this->loadModel('Stores');
		
		$cond = array('id'=>$id);
		$stores = $this->Stores->find('first', array('conditions'=>$cond));
		
		header("Content-Type: ".$stores['Stores']['store_mime_' . $no]);
        echo $stores['Stores']['store_imgdat_' . $no];
		exit;
	}
}
