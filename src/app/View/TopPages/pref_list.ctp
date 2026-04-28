<div id="main">

<section>

<h2>都道府県一覧</h2>

<ul class="list2">

<?
	// 都道府県のリスト
	foreach($prefs as $pref) {
?>
		<li><a href="/prefs/list/<?=$pref['Prefs']['pref_id']?>"><img src="/top_pages/read_store_image/<?=$pref['Prefs']['store_id']?>/1" alt="" class="img"><?=$pref['Prefs']['pref_name']?><br><span><?=$pref['Prefs']['count']?>件</span></a></li>
<?
	} 
?>

</ul>

</section>

</div>
<!--/#main-->