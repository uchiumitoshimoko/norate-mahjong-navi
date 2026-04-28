<div class="header">
	<h1 class="page-title">市区町村詳細</h1>
</div>
		

<div class="container-fluid">
	<div class="row-fluid">

<?php echo $this->Form->create('Matis', array('enctype' => 'multipart/form-data', 'url'=>'edit')); ?>

<div class="btn-toolbar">
	<button class="btn btn-primary saveButton" id="save"><i class="icon-save"></i> 保存</button>

<?	if(!empty($this->data['Consultants']['id'])) {	?>
	
	　<button class="btn btn-danger pull-right saveButton" id="delete"><i class="icon-save"></i> 削除</button>

<?	}	?>

</div>

    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="home">
	<div class="block">
	<a href="#tab1" class="block-heading" data-toggle="collapse">店舗詳細情報</a>
	  <div id="tab1" class="block-body collapse in"><h3></h3>

			<table class="table table-bordered">
				<tr>
					<td align="left" bgcolor="#ececec" class="td-title" nowrap>市区町村ID</td>
					<td align="left" bgcolor="#ffffff">
						<?=$this->Form->input('id',array('type'=>'hidden','class'=>'input-small','label'=>false))?>
						<?=@$this->data['Matis']['id']?>
					</td>
				</tr>
				
				<tr>
					<td align="left" bgcolor="#ececec" class="td-title">都道府県</td>
					<td align="left" bgcolor="#ffffff">
						<?=$this->Form->input('pref_id',array('type'=>'select','class'=>'input-normal','label'=>false, 'options'=>$prefectures_id_list, 'empty'=>'都道府県','div'=>false))?>
					</td>
				</tr>
				
				<tr>
					<td align="left" bgcolor="#ececec" class="td-title">市区町村</td>
					<td align="left" bgcolor="#ffffff">
						<?=$this->Form->input('mati',array('type'=>'text','class'=>'input-xxlarge','label'=>false,'div'=>false))?>
					</td>
				</tr>
			
			</table>
	  </div>
	</div>

<div class="btn-toolbar">
	<button class="btn btn-primary saveButton" id="save"><i class="icon-save"></i> 保存</button>
</div>


<?php echo $this->Form->end(); ?>

<script type="text/javascript">
	$('.input_date').datepicker();
</script>
