
		<div class="header">
			<h1 class="page-title">一斉パスワードリセット</h1>
		</div>
		

		<div class="container-fluid">
			<div class="row-fluid">


<div class="well">
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="home">
<?php echo $this->Form->create('Loginuser'); ?>

	        処理を実行すると、登録されているユーザのパスワードが一斉にリセットされ、各ユーザに対してメールで通知されます。
	        
		<br/>

		<div class="btn-toolbar">
		    <button class="btn btn-primary reset_button"><i class="icon-save"></i> 一斉パスワードリセットを実行する</button>
		</div>
<?php echo $this->Form->end(); ?>

</div>
</div>
</div>

<script>

$(function() {

	// 直接対応にするかどうか
	$(".reset_button").on('click', function() {

		if(!window.confirm('本当にリセットしてよろしいですか？')){
			return false;
		}
	});
});

</script>