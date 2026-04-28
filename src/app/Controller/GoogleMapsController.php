<?php
App::uses('AppController', 'Controller');

/**
 * GoogleMaps Controller
 */
class GoogleMapsController extends AppController {

	public function index() {

		$this->set('sub_title', "GoogleMap検索");
		$this->set('page_title', '健康麻雀・ノーレート雀荘マップ｜ノーレート麻雀ナビ');

	}

}
