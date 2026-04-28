<div class="header">
	<h1 class="page-title">市区町村一覧</h1>
</div>

<div class="container-fluid">
	<div class="row-fluid">

<?php echo $this->Form->create('Matis', array('url'=>'index', 'method'=>'POST', 'class'=>'form-inline')); ?>

	<div class="block">
        <a href="#allowance" class="block-heading" data-toggle="collapse">検索条件</a>
		<div id="allowance" class="block-body collapse in"><h3></h3>
		
		<table class="pc">
			
			<tr>
				<td nowrap>
				　都道府県
				</td>
				<td>
					<?=$this->Form->input('pref_id',array('type'=>'select','class'=>'input-normal','label'=>false, 'options'=>$prefectures_id_list, 'empty'=>'都道府県','div'=>false))?>
				</td>
				<td nowrap>
				　市区町村
				</td>
				<td>
					<?=$this->Form->input('mati',array('type'=>'text','label'=>false,'div'=>false,'required'=>false,'style' =>'width:150px'))?>
				</td>				
			</tr>
			
			</table>
			
<br/>

<div class="btn-toolbar" align="center">
	<?=$this->Form->input('mode',array('type'=>'hidden','value'=>''))?>
	<button class="btn btn-primary" onClick='javascript:document.getElementById("MatisMode").value="";'>　　　<i class="icon-search"></i> 検索　　　</button>　

</div>
	

		</div>
	</div>
	
	<br/>
	
<a href="/kanri/matis/edit/" class="btn btn-primary"><i class="icon-tag"></i>　新規登録</a><br/><br/>

	
<div class="well">
  <a href="#result" class="block-heading" data-toggle="collapse">検索結果</a>
  <div id="result" class="block-body collapse in"><h3><?echo $this->Paginator->params()["count"]; ?>件</h3>

<ul class="nav pull-right">
<? if($this->Paginator->params()["count"] > 0) { ?>
<li>
<div class="btn-toolbar" align="right">
	
	<button class="btn btn-primary pc" onClick='javascript:document.getElementById("MatisMode").value="1";'><i class="icon-download-alt"></i> ダウンロード</button>

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
          <th><?php echo $this->Paginator->sort('pref_id','都道府県'); ?></th>
          <th><?php echo $this->Paginator->sort('mati','市区町村'); ?></th>
          <th><?php echo $this->Paginator->sort('sort','ソート'); ?></th>
          <th>詳細</th>
        </tr>
      </thead>
      <tbody>


<?php foreach ($matis as $row): ?>

<?
	$bgcolor = "";
	
?>
	<tr bgcolor="<?=$bgcolor?>">
		<td><?=h($prefectures_id_list[$row['Matis']['pref_id']]); ?></td>
		<td><?=h($row['Matis']['mati']); ?></td>
		<td><?=h($row['Matis']['sort']); ?></td>
		<td><a href="/kanri/matis/edit/<?=h($row['Matis']['id']); ?>">編集</a></td>
		
		
	</tr>
        
<?php endforeach; ?>
        
      </tbody>
    </table>
  </div>
</div>


</div>
</div>
