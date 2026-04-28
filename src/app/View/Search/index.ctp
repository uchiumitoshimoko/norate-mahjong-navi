
<div id="main">

<section>

<h2>店舗検索</h2>

<?=$this->Form->create('Searchs', array('url'=>'/search/store_list', 'method'=>'POST')); ?>



<table class="ta1">

<tr>
<th>都道府県</th>
<td>
	<?=$this->Form->input('pref_id',array('type'=>'select','class'=>'ws','label'=>false, 'options'=>$prefectures_id_list, 'empty'=>''))?>
</td>
</tr>

<tr>
<th>キーワード</th>
<td>
	<?=$this->Form->input('keyword',array('type'=>'text','label'=>false,'div'=>false,'placeholder'=>'店名・住所・駅名・コメントなど'))?>
	<p style="margin:4px 0 0;font-size:12px;color:#888;">スペース区切りで複数キーワードのAND検索ができます</p>
</td>
</tr>
</table>

<p class="c">
<input type="submit" value="検索する" class="btn">
</p>

<?=$this->Form->end(); ?>

</section>

</div>
<!--/#main-->