<?php

App::uses('ComponentCollection', 'Controller');
App::uses('UtilityComponent', 'Controller/Component'); 

/*

php -f /home/users/1/oops.jp-kenko-norate-mj/web/kanri/app/Console/cake.php CreateSitemap main -app /home/users/1/oops.jp-kenko-norate-mj/web/kanri/app

*/

/*
 * サイトマップ作製
 */
class CreateSitemapShell extends Shell {

	var $Controller;
	
	/**
	 * 初期化処理
	 */
	function startup(){

		$collection = new ComponentCollection();
		
		$this->Utility = new UtilityComponent($collection); //コンポーネントを
		
		parent::startup();
	
	}

	/**
	 * メイン処理
	 */
	function main() {
		
		$URI = "https://kenko-norate-mahjong.com";
		
		// トランザクション開始
		$this->Sitemaps = ClassRegistry::init('Sitemaps');
		$this->Stores = ClassRegistry::init('Stores');
		$this->Prefs = ClassRegistry::init('Prefs');
		$this->Matis = ClassRegistry::init('Matis');
		
$contents = <<< EOM
<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
EOM;
		
		$sitemap_list = array();
		
		// 固定ページのサイトマップ情報を取得する。
		$sitemaps = $this->Sitemaps->find('all');
		
		foreach($sitemaps as $row) {
			
			$sub = array();
			$sub['loc'] = $URI . $row['Sitemaps']['loc'];
			$sub['priority'] = $row['Sitemaps']['priority'];
			$sub['changefreq'] = $row['Sitemaps']['changefreq'];
			$sub['lastmod'] = $row['Sitemaps']['lastmod'];
			
			$sitemap_list[] = $sub;
			
		}
		
		// 都道府県情報を取得する
		$cond = array();
		$fields = array('pref_id');
		$prefs = $this->Prefs->find('all', array('fields'=>$fields, 'conditions'=>$cond));
		
		foreach($prefs as $row) {
			
			$lastmod = date('Y-m-d');
			
			$sub = array();
			$sub['loc'] = $URI . "/prefs/list/" . $row['Prefs']['pref_id'];
			$sub['priority'] = "1.0";
			$sub['changefreq'] = "daily";
			$sub['lastmod'] = $lastmod;
			
			$sitemap_list[] = $sub;
		}
		
		// 市区町村情報を取得する。
		foreach($prefs as $row) {
			
			$cond = array();
			$cond['pref_id'] = $row['Prefs']['pref_id'];
			
			$matis = $this->Matis->find('all', array('conditions'=>$cond));
			
			foreach($matis as $row_m) {
				
				$lastmod = date('Y-m-d');
				
				$sub = array();
				$sub['loc'] = $URI . "/matis/list/" . $row_m['Matis']['pref_id'] . "/" . $row_m['Matis']['mati'];
				$sub['priority'] = "1.0";
				$sub['changefreq'] = "daily";
				$sub['lastmod'] = $lastmod;
				
				$sitemap_list[] = $sub;
			}
		}
		
		// 店舗情報を取得する。
		$stores = $this->Utility->getStores();
		
		if(!empty($stores)) {
			foreach($stores as $row_s) {
				
				$lastmod = date('Y-m-d', strtotime($row_s['Stores']['update_date']));
				
				$sub = array();
				$sub['loc'] = $URI . "/stores/detail/" . $row_s['Stores']['id'];
				$sub['priority'] = "1.0";
				$sub['changefreq'] = "daily";
				$sub['lastmod'] = $lastmod;
				
				$sitemap_list[] = $sub;
					
			}
		}		
		
		// 文字列にする。
		foreach($sitemap_list as $row) {

$contents .= <<< EOM
<url>
<loc>{$row['loc']}</loc>
<priority>{$row['priority']}</priority>
<lastmod>{$row['lastmod']}</lastmod>
<changefreq>{$row['changefreq']}</changefreq>
<lastmod>{$row['lastmod']}</lastmod>
</url>
EOM;
$contents.= "\n";

		}
		
		$contents .= "\n</urlset>";
		
		// 結果をファイルに書き出す
		$file = "/home/users/1/oops.jp-kenko-norate-mj/web/app/webroot/sitemap.xml";
		file_put_contents($file, $contents);
		
	}
	
	
}


?>