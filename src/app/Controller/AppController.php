<?php

/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
config('app_config');

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
  var $loginData;
  var $petsData = array();
  var $components = array('Session', 'Utility', 'Security');

  public $prefs_count = array();

  public $pickup_store_list = array();
  public $new_store_list = array();

  public function forceSecure()
  {
    $this->redirect("https://" . env('SERVER_NAME') . $this->here);
  }

  function beforeFilter()
  {
    // ローカルではHTTPS強制しない
    $host = env('HTTP_HOST');
    $isLocal = (
      strpos($host, 'localhost') !== false ||
      strpos($host, '127.0.0.1') !== false
    );

    // Security コンポーネントはHTTPSリダイレクト専用で使用。
    // フォームCSRF検証・改ざん検証は公開サイトでは不要なため無効化する。
    $this->Security->validatePost = false;
    $this->Security->csrfCheck    = false;

    if (!Configure::read('debug') && !$isLocal) {
      $this->Security->blackHoleCallback = 'forceSecure';
      $this->Security->requireSecure();
    }
    parent::beforeFilter();

    $prefectures_id_list = Configure::read('prefectures_id');
    $this->set('prefectures_id_list', $prefectures_id_list);

    // 都道府県ごとの件数を取得する。
    $this->prefs_count = $this->Utility->getPrefsCount();
    $this->set('prefs_count', $this->prefs_count);

    // 新着店舗を取得する（訪問日降順）。
    $cond_n = array();
    $cond_n['new_flg'] = "1";
    $cond_n['status'] = "1";
    $cond_n['store_mime_1 !='] = null;
    $this->new_store_list = $this->Utility->getStores(
      $cond_n,
      'Stores.visit_date DESC, Stores.id DESC',
      "10"
    );

    $this->set('new_store_list', $this->new_store_list);

    // ピックアップ店舗を取得する（訪問日降順）。
    $cond_n = array();
    $cond_n['pickup_flg'] = "1";
    $cond_n['status'] = "1";
    $this->pickup_store_list = $this->Utility->getStores(
      $cond_n,
      'Stores.visit_date DESC, Stores.id DESC',
      "10"
    );

    $this->set('pickup_store_list', $this->pickup_store_list);

    $this->set('title', 'ノーレート麻雀ナビ');
  }

  public function appError($error)
  {

    print_r($error);
    exit;

    $this->redirect('/');
  }
}
