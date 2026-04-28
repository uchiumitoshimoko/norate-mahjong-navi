<?
	if(!empty($store_list)) {
		foreach($store_list as $row) {
?>

<?
	if($row['Stores']['close_flg'] == "1") {
?>
<div class="list" style="background:lightgray;">
<?
	}
	else {
?>
<div class="list">
<?
	}
?>

	<p class="img"><a href="<?=TEST?>/top_pages/read_store_image/<?=$row['Stores']['id']?>/1" target="_blank"><img src="<?=TEST?>/top_pages/read_store_image/<?=$row['Stores']['id']?>/1" alt=""></a></p>
	
	<div class="text">
	
	<?
		// NEW
		if($row['Stores']['new_flg'] == "1") {
	?>
			<span class="new">new</span>
	<?
		}
	?>
	
	<?
		// ピックアップ
		if($row['Stores']['pickup_flg'] == "1") {
	?>
			<span class="icon color1">ピックアップ</span>
	<?
		}
	?>

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
	
	<?
		// 訪問済み
		if($row['Stores']['visit_flg'] == "1") {
	?>
			<span class="icon color4">訪問済み</span>
	<?
		}
	?>

	<h4><a href="<?=TEST?>/stores/detail/<?=$row['Stores']['id']?>"><?=$row['Stores']['store_name']?></a></h4>
	
	<?
		if(!empty($row['Stores']['comment'])) {
			echo "<p style='font-color:black'>" . nl2br($row['Stores']['comment']) . "</p>";
		}
	?>
	
	</div>
	<!--/.text-->

<?
	if(!empty($row['Stores']['store_mime_2']) || !empty($row['Stores']['store_mime_3']) || !empty($row['Stores']['store_mime_4'])) {
?>

<table class="ta1" style="border:none;">
	<tr style="border:none;">
<?
	for($i=2;$i<=4;$i++) {
?>
		<td style="border:none;">
<?
		if(!empty($row['Stores']['store_mime_' . $i])) {
?>
		
			<p><a href="<?=TEST?>/top_pages/read_store_image/<?=$row['Stores']['id']?>/<?=$i?>" target="_blank"><img src="<?=TEST?>/top_pages/read_store_image/<?=$row['Stores']['id']?>/<?=$i?>" alt=""></a></p>
<?
		}
?>
		</td>
<?
	}
?>
	</tr>
</table>

<?
	}
?>

<table class="ta1">
	<tr>
	<th>店舗名</th>
	<td><a href="<?=TEST?>/stores/detail/<?=$row['Stores']['id']?>"><?=$row['Stores']['store_name']?></a></td>
	</tr>
	<tr>

<?
	if(!empty($row['Stores']['address'])) {
?>
	<tr>
	<th>住所</th>
	<td><?=$row['Stores']['address']?></td>
	</tr>
<?
	}
?>

<?
	if(!empty($row['Stores']['station'])) {
?>
	<tr>
	<th>最寄駅</th>
	<td><?=$row['Stores']['station']?></td>
	</tr>
<?
	}
?>

<?
	if(!empty($row['Stores']['twitter'])) {
?>
	<tr>
	<th><img src="<?=TEST?>/images/twitter_logo.png">Twitter</th>
	<td><a target="_blank" href="https://twitter.com/<?=$row['Stores']['twitter']?>"><?=$row['Stores']['twitter']?></a></td>
	</tr>
<?
	}
?>

<?
	for($i=1; $i<=3; $i++) {
		if(!empty($row['Stores']['homepage_' . $i . '_url'])) {
			echo "<tr><th>";
			echo "HP" . $i;
			
			echo "</th>";
			
			echo "<td><a target='_blank' href='" . $row['Stores']['homepage_' . $i . '_url'] . "'>" . $row['Stores']['homepage_' . $i . '_title'] . "</a></td>";
			echo "</tr>";
		}
	}
?>

<?
	// 訪問日
	if($row['Stores']['visit_flg'] == "1" && !empty($row['Stores']['visit_date'])) {
?>
	<tr>
	<th>訪問日</th>
	<td><?=$row['Stores']['visit_date']?></td>
	</tr>
<?
	}
?>

<?
	// 訪問ブログ
	if(!empty($row['Stores']['blog_url'])) {
?>
	<tr>
	<th style="background-color:#6495ED;color:white">ブログ</th>
	<td>
		<a target="_blank" href="https://free-mj-blog.com/archives/<?=$row['Stores']['blog_url']?>">トッシイの麻雀日記｜<?=$row['Stores']['store_name']?></a>

	</td>
	</tr>
<?
	}
?>

</table>

<!--
	<p></p>
	<p><a href="item.html" class="btn">詳細を見る</a></p>
-->

</div>
<!--list-->

<?
		}
	}
?>