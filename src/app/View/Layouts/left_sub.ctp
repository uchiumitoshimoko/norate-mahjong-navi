<div id="sub">

<div class="box1">

<h2><i class="fas fa-folder-plus"></i> 新着店舗</h2>

<?
	if(!empty($new_store_list)) {
		foreach($new_store_list as $row) {
?>

<div class="list-sub">
<a href="<?=TEST?>/stores/detail/<?=$row['Stores']['id']?>">

	<?
		// 健康麻雀
		if($row['Stores']['kenko_flg'] == "1") {
	?>
			<span class="icon color3">健康麻雀</span>
	<?
		}
	?>

	<?
		// ノーレート
		if($row['Stores']['norate_flg'] == "1") {
	?>
			<span class="icon color2">ノーレートフリー</span>
	<?
		}
	?>

	<?
		// 競技麻雀
		if($row['Stores']['kyogi_flg'] == "1") {
	?>
			<span class="icon color5">競技麻雀</span>
	<?
		}
	?>

	<?
		// 要電話
		if($row['Stores']['yoyaku_flg'] == "1") {
	?>
			<span class="icon color6">要電話</span>
	<?
		}
	?>
	
<h4 style="font-size:14px;"><p><strong class="color1"><?=$row['Stores']['store_name']?></strong></p></h4>
<p>
	<?=$prefectures_id_list[$row['Stores']['pref_id']]?>
	
	<?
		if(!empty($row['Stores']['mati'])) {
	?>
			<?=$row['Stores']['mati']?>
	<?
		}
	?>
	<br>

<?
	// 訪問日
	if($row['Stores']['visit_flg'] == "1" && !empty($row['Stores']['visit_date'])) {
?>
	訪問日…<?=$row['Stores']['visit_date']?>
<?
	}
?>

<?
	// NEW
	if($row['Stores']['new_flg'] == "1") {
?>
		<span class="new">new</span>
<?
	}
?>

<p class="img" ><img style="width:50px;" src="<?=TEST?>/top_pages/read_store_image/<?=$row['Stores']['id']?>/1" alt=""></p>

</p>
</a>
</div>

<?
		}
	}
?>


</div>
<!--.box1-->


</div>
<!--/#sub-->