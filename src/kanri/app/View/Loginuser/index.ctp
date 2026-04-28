		<div class="header">
			<h1 class="page-title">ログインユーザ一覧</h1>
		</div>


		<div class="container-fluid">
			<div class="row-fluid">
<div class="btn-toolbar">
    <a href="loginuser/add" class="btn btn-primary"><i class="icon-plus"></i> 新規作成</a>
</div>
<p><code><?echo $count?></code>件</p>

<?
	$checked_flg = "";
	
	if($status == "1") {
		$checked_flg = "checked='checked'";
	}
?>
<input type="checkbox" name="status_check" value="1" id="status_check" <?=$checked_flg?>>無効にしたユーザも表示する

<div class="well">
    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>ログインID</th>
          <th>メールアドレス</th>
          <th>CP側集客者ID</th>
          <th>CP側ユーザID</th>
          <th>サイボウズID</th>
          <th>名前</th>
          <th>面談予定者</th>
          <th>CAランク</th>
          <th>社員種別</th>
          <th>ステータス</th>
          <th>画像</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
	<?php foreach ($users as $users): ?>
        <tr>
          <td><?=h($users['Loginuser']['id']); ?></td>
          <td><?=h($users['Loginuser']['login_id']); ?></td>
          <td><?=h($users['Loginuser']['mail_address']); ?></td>
          <td><?=h($users['Loginuser']['cp_user_id']); ?></td>
          <td><?=h($users['Loginuser']['charge_id']); ?></td>
          <td><?=h($users['Loginuser']['cybozu_id']); ?></td>
          <td><?=h($users['Loginuser']['name']); ?></td>
          <td><? if($users['Loginuser']['mendan_flg']==0){ ?>無効<? }else{ ?>有効<? } ?></td>
          <td><?=h($users['Loginuser']['ca_rank']); ?></td>
          <td><?=$user_type[$users['Loginuser']['type']]; ?></td>
          <td><? if($users['Loginuser']['status']==0){ ?>無効<? }else{ ?>有効<? } ?></td>
          <td>
          	<?
          		if($users['Loginuser']['no_imgdat']) {
          	?>
          	<img src='/loginuser/read_no_image/<?=h($users['Loginuser']['id']);?>' alt='<?=h($users['Loginuser']['name']); ?>'>
          	<?
          		}
          	?>
          </td>
          <td>
              <a href="loginuser/edit/<?=h($users['Loginuser']['id']); ?>">編集</a>
          </td>
        </tr>
	<?php endforeach; ?>
      </tbody>
    </table>
</div>


			</div>
		</div>


<script>

$(function() {
	$("#status_check").on('change', function() {
		
		var val = "";
		val = $(this).prop("checked");
		
		// チェックされている
		if(val) {
			
			location.href="/loginuser?status=all";
			return;
		}
		// チェックされていない
		else {
			location.href="/loginuser";
			return;
		}
		
	});
});

</script>