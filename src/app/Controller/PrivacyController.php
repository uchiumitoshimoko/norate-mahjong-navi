<?php
App::uses('AppController', 'Controller');

class PrivacyController extends AppController {

    public function index() {
        $this->set('page_title', 'ノーレート麻雀ナビ | プライバシーポリシー');
        $this->set('noindex', true);
    }

}
