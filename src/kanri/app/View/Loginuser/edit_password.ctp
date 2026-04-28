
		<div class="header">
			<h1 class="page-title">パスワード変更</h1>
		</div>
		

		<div class="container-fluid">
			<div class="row-fluid">


<div class="well">

    <!--ul class="nav nav-tabs">
      <li class="active"><a href="#home" data-toggle="tab">基本</a></li>
	<?if ($kbn_parts==1){?><li><a href="#profile" data-toggle="tab">利用勤務区分</a></li><?}?>
      <!--li><a href="#profile" data-toggle="tab">利用勤務区分</a></li-->
    </ul-->
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="home">
<?php echo $this->Form->create('Loginuser'); ?>

	        <label>本システムのログインID</label>
			<br/>
			　<?=$this->data['Loginuser']['login_id']?>
			<br/><br/>
			
	        <label>現在のパスワード</label>
	        <?=$this->Form->input('now_password',array('type'=>'password','class'=>'input-medium','label'=>false,'required'=>'required'))?>
	        
	        <label>新しいパスワード</label>
	        <?=$this->Form->input('login_password_new',array('type'=>'password','class'=>'input-medium','label'=>false,'required'=>'required'))?>
	        
	        <label>新しいパスワード（確認）</label>
	        <?=$this->Form->input('login_password_new_confirm',array('type'=>'password','class'=>'input-medium','label'=>false,'required'=>'required'))?>
	        

		<br/>

<div class="btn-toolbar">
    <button class="btn btn-primary"><i class="icon-save"></i> 保存</button>
</div>
<?php echo $this->Form->end(); ?>

</script>
