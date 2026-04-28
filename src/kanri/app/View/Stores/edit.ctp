<div class="header">
	<h1 class="page-title">店舗詳細</h1>
</div>
		

<div class="container-fluid">
	<div class="row-fluid">

<?php echo $this->Form->create('Stores', array('enctype' => 'multipart/form-data', 'url'=>'edit')); ?>

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
					<td align="left" bgcolor="#ececec" class="td-title">表示/非表示</td>
					<td align="left" bgcolor="#ffffff">
					    <?=$this->Form->input('status',array('type'=>'radio','class'=>'input-normal','label'=>false,'options'=>$status_list,'div'=>false,'legend'=>'','separator'=>' ', 'default'=>'1'))?>
					</td>
				</tr>
				<tr>
					<td align="left" bgcolor="#ececec" class="td-title" nowrap>店舗ID</td>
					<td align="left" bgcolor="#ffffff">
						<?=$this->Form->input('id',array('type'=>'hidden','class'=>'input-small','label'=>false))?>
						<?=@$this->data['Stores']['id']?>
					</td>
				</tr>
				<tr>
					<td align="left" bgcolor="#ececec" class="td-title">店舗名</td>
					<td align="left" bgcolor="#ffffff">
						<?=$this->Form->input('store_name',array('type'=>'text','class'=>'input-xxlarge','label'=>false,'div'=>false))?>
					</td>
				</tr>

				<tr>
					<td align="left" bgcolor="#ececec" class="td-title">ブログの記事ID</td>
					<td align="left" bgcolor="#ffffff">
						<?=$this->Form->input('blog_url',array('type'=>'text','class'=>'input-xxlarge','label'=>false,'div'=>false))?>
					</td>
				</tr>

				<tr>
					<td align="left" bgcolor="#ececec" class="td-title">訪問フラグ</td>
					<td align="left" bgcolor="#ffffff">
						<?=$this->Form->input('visit_flg',array('type'=>'checkbox','class'=>'input-normal','label'=>false,'div'=>false))?>
					</td>
				</tr>
				<tr>
					<td align="left" bgcolor="#ececec" class="td-title">訪問日</td>
					<td align="left" bgcolor="#ffffff">
						<?=$this->Form->input('visit_date',array('type'=>'text','class'=>'input-normal input_date','label'=>false,'data-date-format'=>'yyyy-mm-dd', 'style' =>'width:100px;background-color:white;cursor: default;', 'autocomplete'=>'off'))?>
					</td>
				</tr>



			<?
				for($i=1; $i<=1;$i++) {
			?>
				<tr>
					<td align="left" bgcolor="#ececec" class="td-title">ホームページ<?=$i?>のタイトル</td>
					<td align="left" bgcolor="#ffffff">
						<?=$this->Form->input('homepage_' . $i . '_title',array('type'=>'text','class'=>'input-xxlarge','label'=>false,'div'=>false))?>
					</td>
				</tr>
				<tr>
					<td align="left" bgcolor="#ececec" class="td-title">ホームページ<?=$i?>のURL</td>
					<td align="left" bgcolor="#ffffff">
						<?=$this->Form->input('homepage_' . $i . '_url',array('type'=>'text','class'=>'input-xxlarge','label'=>false,'div'=>false))?>
					</td>
				</tr>
			<?
				}
			?>				

				<tr>
					<td align="left" bgcolor="#ececec" class="td-title">Twitter</td>
					<td align="left" bgcolor="#ffffff">
						<?=$this->Form->input('twitter',array('type'=>'text','class'=>'input-xxlarge','label'=>false,'div'=>false))?>
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
				<tr>
					<td align="left" bgcolor="#ececec" class="td-title">住所</td>
					<td align="left" bgcolor="#ffffff">
						<?=$this->Form->input('address',array('type'=>'text','class'=>'input-xxlarge','label'=>false,'div'=>false))?>
					</td>
				</tr>
				<tr>
					<td align="left" bgcolor="#ececec" class="td-title">最寄り駅</td>
					<td align="left" bgcolor="#ffffff">
						<?=$this->Form->input('station',array('type'=>'text','class'=>'input-xxlarge','label'=>false,'div'=>false))?>
					</td>
				</tr>

				<tr>
					<td align="left" bgcolor="#ececec" class="td-title">登録日</td>
					<td align="left" bgcolor="#ffffff">
						<?=$this->Form->input('create_date',array('type'=>'text','class'=>'input-normal input_date','label'=>false,'data-date-format'=>'yyyy-mm-dd', 'style' =>'width:100px;background-color:white;cursor: default;', 'autocomplete'=>'off'))?>
						
					</td>
				</tr>
				
				<tr>
					<td align="left" bgcolor="#ececec" class="td-title">更新日</td>
					<td align="left" bgcolor="#ffffff">
						<?=$this->Form->input('update_date',array('type'=>'text','class'=>'input-normal input_date','label'=>false,'data-date-format'=>'yyyy-mm-dd', 'style' =>'width:100px;background-color:white;cursor: default;', 'autocomplete'=>'off'))?>
					</td>
				</tr>
				<tr>
					<td align="left" bgcolor="#ececec" class="td-title">ピックアップフラグ</td>
					<td align="left" bgcolor="#ffffff">
						<?=$this->Form->input('pickup_flg',array('type'=>'checkbox','class'=>'input-normal','label'=>false,'div'=>false))?>
					</td>
				</tr>
				<tr>
					<td align="left" bgcolor="#ececec" class="td-title">新着フラグ</td>
					<td align="left" bgcolor="#ffffff">
						<?=$this->Form->input('new_flg',array('type'=>'checkbox','class'=>'input-normal','label'=>false,'div'=>false))?>
					</td>
				</tr>
				<tr>
					<td align="left" bgcolor="#ececec" class="td-title">健康麻雀フラグ</td>
					<td align="left" bgcolor="#ffffff">
						<?=$this->Form->input('kenko_flg',array('type'=>'checkbox','class'=>'input-normal','label'=>false,'div'=>false))?>
					</td>
				</tr>
				<tr>
					<td align="left" bgcolor="#ececec" class="td-title">ノーレフリーフラグ</td>
					<td align="left" bgcolor="#ffffff">
						<?=$this->Form->input('norate_flg',array('type'=>'checkbox','class'=>'input-normal','label'=>false,'div'=>false))?>
					</td>
				</tr>
				<tr>
					<td align="left" bgcolor="#ececec" class="td-title">要電話フラグ</td>
					<td align="left" bgcolor="#ffffff">
						<?=$this->Form->input('yoyaku_flg',array('type'=>'checkbox','class'=>'input-normal','label'=>false,'div'=>false))?>
					</td>
				</tr>
				<tr>
					<td align="left" bgcolor="#ececec" class="td-title">競技麻雀フラグ</td>
					<td align="left" bgcolor="#ffffff">
						<?=$this->Form->input('kyogi_flg',array('type'=>'checkbox','class'=>'input-normal','label'=>false,'div'=>false))?>
					</td>
				</tr>


			
			<?
				for($i=1; $i<=4; $i++) {
			?>
				<tr>
					<td align="left" bgcolor="#ececec" class="td-title">店舗画像ファイル<?=$i?></td>
					<td align="left" bgcolor="#ffffff">
						<span style="color:red">※画像サイズは、幅222ピクセル×高さ170ピクセルが推奨です。<br/>
						サイズ変更する場合は、幅222ピクセルの縦横比維持で調整をしてください<br/>
						参考サイト：<a target="_blank" href="https://www.iloveimg.com/ja/resize-image">こちら</a><br/>
						</span>
						<?=$this->Form->input('store_image_' . $i, array('type'=>'file','label'=>false));?>
						<?
							if(!empty($this->data['Stores']['store_imgdat_' . $i])) {
								echo "<img src='" . TEST . "/kanri/stores/read_store_image/" . $this->data['Stores']['id'] . "/" . $i . "'>";
							}
						?>
					</td>
				</tr>
			
			<?
				}
			?>
				<tr>
					<td align="left" bgcolor="#ececec" class="td-title">コメント</td>
					<td align="left" bgcolor="#ffffff">
						<?=$this->Form->input('comment',array('type'=>'textarea','class'=>'input-xxlarge','label'=>false,'div'=>false))?>
					</td>
				</tr>

				<tr>
					<td align="left" bgcolor="#ececec" class="td-title">閉店フラグ</td>
					<td align="left" bgcolor="#ffffff">
						<?=$this->Form->input('close_flg',array('type'=>'checkbox','class'=>'input-normal','label'=>false,'div'=>false))?>
					</td>
				</tr>
			
			
			<?
				for($i=2; $i<=3;$i++) {
			?>
				<tr>
					<td align="left" bgcolor="#ececec" class="td-title">ホームページ<?=$i?>のタイトル</td>
					<td align="left" bgcolor="#ffffff">
						<?=$this->Form->input('homepage_' . $i . '_title',array('type'=>'text','class'=>'input-xxlarge','label'=>false,'div'=>false))?>
					</td>
				</tr>
				<tr>
					<td align="left" bgcolor="#ececec" class="td-title">ホームページ<?=$i?>のURL</td>
					<td align="left" bgcolor="#ffffff">
						<?=$this->Form->input('homepage_' . $i . '_url',array('type'=>'text','class'=>'input-xxlarge','label'=>false,'div'=>false))?>
					</td>
				</tr>
			<?
				}
			?>				

			
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
