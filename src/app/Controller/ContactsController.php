<?php
App::uses('AppController', 'Controller');

class ContactsController extends AppController {

    public function index() {
        $this->set('page_title', 'ノーレート麻雀ナビ | お問い合わせ');
    }

}
