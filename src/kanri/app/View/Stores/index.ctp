<div class="header">
	<h1 class="page-title">店舗一覧</h1>
</div>

<div class="container-fluid">
	<div class="row-fluid">

<?php echo $this->Form->create('Stores', array('url'=>'index', 'method'=>'POST', 'class'=>'form-inline')); ?>

	<div class="block">
        <a href="#allowance" class="block-heading" data-toggle="collapse">検索条件</a>
		<div id="allowance" class="block-body collapse in"><h3></h3>
		
		<table>
			
			<tr>
				<td nowrap>
				　店舗ID
				</td>
				<td>
					<?=$this->Form->input('id',array('type'=>'text','label'=>false,'div'=>false,'required'=>false,'style' =>'width:50px'))?>
				</td>
				<td nowrap>
				　都道府県
				</td>
				<td>
					<?=$this->Form->input('pref_id',array('type'=>'select','class'=>'input-normal','label'=>false, 'options'=>$prefectures_id_list, 'empty'=>'都道府県','div'=>false))?>
				</td>
				<td nowrap>
				　店舗名
				</td>
				<td>
					<?=$this->Form->input('store_name',array('type'=>'text','label'=>false,'div'=>false,'required'=>false,'style' =>'width:150px'))?>
				</td>
			</tr>

			<tr>
				<td nowrap>
				　ピックアップ
				</td>
				<td>
					<?=$this->Form->input('pickup_flg',array('type'=>'checkbox','label'=>false,'div'=>false,'required'=>false))?>
				</td>	
				<td nowrap>
				　未訪問
				</td>
				<td>
					<?=$this->Form->input('deny_visit_flg',array('type'=>'checkbox','label'=>false,'div'=>false,'required'=>false))?>
				</td>
				<td nowrap>
				　ブログ未記入
				</td>
				<td>
					<?=$this->Form->input('deny_blog_url',array('type'=>'checkbox','label'=>false,'div'=>false,'required'=>false))?>
				</td>
				<td nowrap>
				　表示/非表示
				</td>
				<td>
					<?=$this->Form->input('status',array('type'=>'select','class'=>'input-normal','label'=>false, 'options'=>$status_list, 'empty'=>'-----','div'=>false))?>
				</td>
				<td nowrap>
				　画像なし
				</td>
				<td>
					<?=$this->Form->input('image_flg',array('type'=>'checkbox','label'=>false,'div'=>false,'required'=>false))?>
				</td>
			</tr>
			
			</table>
			
<br/>

<div class="btn-toolbar" align="center">
	<?=$this->Form->input('mode',array('type'=>'hidden','value'=>''))?>
	<button class="btn btn-primary" onClick='javascript:document.getElementById("StoresMode").value="";'>　　　<i class="icon-search"></i> 検索　　　</button>　

</div>
	

		</div>
	</div>
	
	<br/>
	
<a href="/kanri/stores/edit/" class="btn btn-primary"><i class="icon-tag"></i>　新規登録</a><br/><br/>

	
<div class="well">
  <a href="#result" class="block-heading" data-toggle="collapse">検索結果</a>
  <div id="result" class="block-body collapse in"><h3><?echo $this->Paginator->params()["count"]; ?>件</h3>

<ul class="nav pull-right">
<? if($this->Paginator->params()["count"] > 0) { ?>
<li>
<div class="btn-toolbar" align="right">
	
	<button class="btn btn-primary pc" onClick='javascript:document.getElementById("StoresMode").value="1";'><i class="icon-download-alt"></i> ダウンロード</button>

</div>
</li>
<? } ?>
</ul>


  <div class="pagination">
   <ul>
    <?php echo $this->Paginator->prev(__('prev'), array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a')); ?>
    <?php echo $this->Paginator->numbers(array('separator' => '','currentTag' => 'a', 'currentClass' => 'active','tag' => 'li','first' => 1, 'ellipsis' => '<li class="disabled"><a>...</a></li>')); ?>                              
    <?php echo $this->Paginator->next(__('next'), array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a')); ?>
   </ul>                                          
  </div>  
    <table class="table">
      <thead>
        <tr class="customertr">
          <th><?php echo $this->Paginator->sort('id','店舗ID'); ?></th>
          <th><?php echo $this->Paginator->sort('store_name','店舗名'); ?></th>
          <th>住所</th>
          <th>コメント</th>
          <th>詳細</th>
        </tr>
      </thead>
      <tbody>


<?php foreach ($stores as $row): ?>

<?
	$bgcolor = "";
	
	// 非表示は暗くする
	if($row['Stores']['status'] == "0" || $row['Stores']['close_flg'] == "1") {
		$bgcolor = "#aaaaaa";
	}
?>
	<tr bgcolor="<?=$bgcolor?>">
		<td><?=h($row['Stores']['id']); ?></td>
		<td><?=h($row['Stores']['store_name']); ?></td>	
		<td><?=h($row['Stores']['address']); ?></td>
		<td>
			https://kenko-norate-mahjong.com/stores/detail/<?=$row['Stores']['id']?><br/><br/>
			<?=nl2br($row['Stores']['comment'])?>
		</td>
		<td><a target="_blank" href="<?=TEST?>/kanri/stores/edit/<?=h($row['Stores']['id']); ?>">編集</a></td>
		
		
	</tr>
        
<?php endforeach; ?>
        
      </tbody>
    </table>
  </div>
</div>


</div>
</div>
