<script>

$(function() {
	
	
	$('#saveButton').on('click', function() {
		
		var r = $('input[name="data[Loginuser][mendan_flg]"]:checked').val();
		
		if(r == "1") {
			
			var a = $('[name="data[Loginuser][ca_rank]"] option:selected').val();
			
			if(a == "") {
				alert("面談予定者が有効の場合は、CAランクの設定が必要です");
				return false;
			}
			
		}

	});
	
});



</script>


		<div class="header">
			<h1 class="page-title">ログインユーザ編集</h1>
		</div>
		

		<div class="container-fluid">
			<div class="row-fluid">



<?if(!empty($this->data['Loginuser']['id'])){?>
<div class="btn-toolbar">
    <a href="/loginuser/delete/<?=$this->data['Loginuser']['id']?>" onclick='return confirm("よろしいですか？");' data-toggle="modal" class="btn btn-danger pull-right">削除</a>
</div>
<?}?>
<div class="well">
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="home">
      
<?php echo $this->Form->create('Loginuser', array('url'=>'/loginuser/edit/' . $this->data['Loginuser']['id'],'enctype' => 'multipart/form-data')); ?>


<?=$this->Form->input('id');?>

	        <label>本システムのログインID</label>
	        <?=$this->Form->input('login_id',array('type'=>'text','class'=>'input-small','label'=>false,'required'=>'required'))?>
			

	        
	        <label>本システムのログインパスワード</label>
	        <?=$this->Form->input('login_password',array('type'=>'text','class'=>'input-medium','label'=>false,'required'=>'required'))?>

			<label><font color="red">CP側集客者ID</font></label>
	        <?=$this->Form->input('cp_user_id',array('type'=>'text','class'=>'input-small','label'=>false))?>
	        
	        <label><font color="red">CP側ユーザID</font></label>
	        <?=$this->Form->input('charge_id',array('type'=>'text','class'=>'input-small','label'=>false))?>
	        
	        <label>名前</label>
	        <?=$this->Form->input('name',array('type'=>'text','class'=>'input-medium','label'=>false,'required'=>'required'))?>
	        <label>メールアドレス</label>
	        <?=$this->Form->input('mail_address',array('type'=>'text','class'=>'input-large','label'=>false,'required'=>'required'))?>
	        <label><font color="red">サイボウズのログイン名</font><br/>※面談確定した場合に、このログイン名でサイボウズに登録されます。必要のないユーザの場合は、未入力可。</label>
	        <?=$this->Form->input('cybozu_id',array('type'=>'text','class'=>'input-small','label'=>false))?>
	        <br/>
	        <label>面談予定者</label>
	        <div class="form-inline"><?=$this->Form->input('mendan_flg',array('type'=>'radio','options'=>$optStatus,'legend'=>false,'div'=>false, 'required'=>'required'))?></div>
	        <br/>

	        <label>CAランク</label>
	        <div class="form-inline"><?=$this->Form->input('ca_rank',array('type'=>'select','options'=>$ca_rank_list,'legend'=>false,'style'=>'width:80px;', 'label'=>false,'div'=>false, 'empty'=>'----'))?></div>
	        <br/>
	        
	        <label>社員種別</label>
	        <div class="form-inline"><?=$this->Form->input('type',array('type'=>'select','options'=>$user_type,'legend'=>false,'style'=>'width:80px;', 'label'=>false,'div'=>false, 'empty'=>'----'))?></div>
	        <br/>
	        
	        <label>ステータス</label>
	        <div class="form-inline"><?=$this->Form->input('status',array('type'=>'radio','options'=>$optStatus,'legend'=>false, 'div'=>false, 'required'=>'required'))?></div>
	         <label><font color="red">一旦無効にするとユーザ一覧に表示されなくなります。</font></label>
	        <br/>

			<label>画像ファイル</label>
			<div class="form-inline">
				<span style="color:red">※画像サイズは、幅222ピクセル×高さ170ピクセルが推奨です。<br/>
				サイズ変更する場合は、幅222ピクセルの縦横比維持で調整をしてください<br/>
				参考サイト：<a target="_blank" href="https://www.iloveimg.com/ja/resize-image">こちら</a><br/>
				</span>
					<?=$this->Form->input('no_image', array('type'=>'file','label'=>false));?>
					<?
						if(!empty($this->data['Loginuser']['no_imgdat'])) {
							echo "<img src='/loginuser/read_no_image/" . $this->data['Loginuser']['id'] . "/'>";
						}
					?>

					<?
							// もし画像が存在していれば、削除ボタンを用意する。
							if(!empty($this->data['Loginuser']['no_imgdat'])) {
					?>
						<?=$this->Form->input('delete_image_flg',array('type'=>'checkbox','class'=>'input-normal','label'=>false,'div'=>false))?>&nbsp;画像を削除する
							
					<?
							}
					?>
						
			</div>
				

		<br/>
		<label>※利用できるメニューをチェックして下さい。</label>
		<?foreach($menu as $key => $val){?>

				<div class="form-inline"><input type="checkbox" name="menu_cd[<?=$key?>]" value="1" <?if (!empty($users_menu_cd) && isset($users_menu_cd[$key])){?>checked<?}?>><?=$val?></div>

		<?}?>
<div class="btn-toolbar">
    <button class="btn btn-primary" id="saveButton"><i class="icon-save"></i> 保存</button>
</div>
<?php echo $this->Form->end(); ?>
</div>

<script type="text/javascript">
function statusCheck() {
        <? if ( empty($this->data['Loginuser']['id']) ) {
            echo "document.getElementById('LoginuserStatus1').checked=true;";
        } ?>
}
window.onload = statusCheck();
</script>
