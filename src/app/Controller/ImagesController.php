<?php
class ImagesController extends AppController {
	var $uses = array();
	var $components = array('Image');
	public function memo($id=null) {
		$this->layout = false;
		$this->render(false);
		header('Content-type: image/jpeg');
		if(empty($id))
			return false;
		$this->loadModel('Memopad');
		$this->Memopad->recursive = -1;
		if(!$Memopad = $this->Memopad->read('',$id)){
			return false;
		}
		$pet_id = $Memopad['Memopad']['pet_id'];
		$photo = $Memopad['Memopad']['photo'];
		$this->checkPetId($pet_id);
		if(empty($photo))
			return false;

		$file = MemopadImageDir.$photo;
		if(!file_exists($file))
			return false;
		readfile($file);
		
	}
	private function pet($id,$type) {
		$this->layout = false;
		$this->render(false);
		header('Content-type: image/jpeg');
		if(empty($id))
			return false;
		$this->loadModel('Pet');
		$this->Pet->recursive = -1;
		if(!$Pet = $this->Pet->read('',$id)){
			return false;
		}
		$pet_id = $id;
		$photo = $Pet['Pet']['pet_photo'];
		$this->checkPetId($pet_id);
		if(empty($photo))
			return false;

		$file = PetImageDir.$type.$photo;
		if(!file_exists($file))
			return false;
		readfile($file);
		
	}

	public function lpet($id=null) {
		$this->pet($id,'l');
	}
	public function spet($id=null) {
		$this->pet($id,'s');
	}
	public function ph($id=null) {
		$this->layout = false;
		$this->render(false);
		header('Content-type: image/jpeg');
		if(empty($id))
			return false;
		$sid = $this->params->named['sid'];
		if($sid<1 || $sid>5)
			return false;
		$this->loadModel('Photo');
		$this->Photo->recursive = -1;
		if(!$Photo = $this->Photo->read('',$id)){
			return false;
		}
		$pet_id = $Photo['Photo']['pet_id'];
		$photo = $Photo['Photo']['photo'.$sid];
		$this->checkPetId($pet_id);
		if(empty($photo))
			return false;

		$file = PhotoImageDir.$photo;
		if(!file_exists($file))
			return false;
		readfile($file);

	}
}
?>