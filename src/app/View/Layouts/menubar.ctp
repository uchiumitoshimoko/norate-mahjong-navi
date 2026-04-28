<?php
	$current_list = array();
	$current_list['TopPages'] = "";
	$current_list['Prefs'] = "";
	$current_list['Search'] = "";
	$current_list['Contacts'] = "";
	$current_list['GoogleMaps'] = "";
	$current_list['Links'] = "";
	$current_list['NewStores'] = "";
	$current_list['PickupStores'] = "";
	
	$current_list[$this->name] = "class='current'";
?>
<!--PC用（901px以上端末）メニュー-->
<nav id="menubar" class="nav-fix-pos">
<ul class="inner">
<li <?=$current_list['TopPages']?>><a href="<?=TEST?>/">ホーム<span>Home</span></a></li>
<li <?=$current_list['Prefs']?>><a href="<?=TEST?>/prefs/pref_list">都道府県一覧<span>Prefectures</span></a></li>
<li <?=$current_list['NewStores']?>><a href="<?=TEST?>/new_stores">新着店舗<span>New</span></a></li>
<li <?=$current_list['PickupStores']?>><a href="<?=TEST?>/pickup_stores">ピックアップ店舗<span>Pickup</span></a></li>
<li <?=$current_list['GoogleMaps']?>><a href="<?=TEST?>/google_maps">GoogleMap検索<span>GoogleMap</span></a></li>
<li <?=$current_list['Links']?>><a href="<?=TEST?>/links">リンク<span>Link</span></a></li>

<li <?=$current_list['Contacts']?>><a href="<?=TEST?>/contacts">お問い合わせ<span>Contact</span></a></li>
</ul>
</nav>
<!--小さな端末用（900px以下端末）メニュー-->
<nav id="menubar-s" style="display:none;">
<ul>
<li <?=$current_list['TopPages']?>><a href="<?=TEST?>/">ホーム<span>Home</span></a></li>
<li <?=$current_list['Prefs']?>><a href="<?=TEST?>/prefs/pref_list">都道府県一覧<span>Prefectures</span></a></li>
<li <?=$current_list['NewStores']?>><a href="<?=TEST?>/new_stores">新着店舗<span>New</span></a></li>
<li <?=$current_list['PickupStores']?>><a href="<?=TEST?>/pickup_stores">ピックアップ店舗<span>Pickup</span></a></li>
<li <?=$current_list['GoogleMaps']?>><a href="<?=TEST?>/google_maps">GoogleMap検索<span>GoogleMap</span></a></li>
<li <?=$current_list['Links']?>><a href="<?=TEST?>/links">リンク<span>Link</span></a></li>
<li <?=$current_list['Contacts']?>><a href="<?=TEST?>/contacts">お問い合わせ<span>Contact</span></a></li>
</ul>
</nav>