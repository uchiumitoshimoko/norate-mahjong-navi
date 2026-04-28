<div class="header">
	<h1 class="page-title">獣医師新規登録</h1>
</div>
		

<div class="container-fluid">
	<div class="row-fluid">


<?php echo $this->Form->create('Veterinarians', array('action'=>'add')); ?>

<div class="btn-toolbar">
	<button class="btn btn-primary"><i class="icon-save"></i> 登録</button>
</div>


    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="home">
	<div class="block">
	<a href="#contractor" class="block-heading" data-toggle="collapse">獣医師情報</a>
	  <div id="contractor" class="block-body collapse in"><h3></h3>
			<table class="table table-bordered">
				<tr>
					<td align="left" bgcolor="#ececec" class="td-title">獣医師アカウント</td>
					<td align="left" bgcolor="#ffffff">
						<?=$this->Form->input('veterinarian_cd',array('type'=>'number','class'=>'input-small','label'=>false,'div'=>false, 'required'=>'required'))?>
					</td>
				</tr>
				<tr>
					<td align="left" bgcolor="#ececec" class="td-title">獣医師名</td>
					<td align="left" bgcolor="#ffffff">
						<?=$this->Form->input('name',array('type'=>'text','class'=>'input-normal','label'=>false,'div'=>false, 'required'=>'required'))?>
					</td>
				</tr>
				<tr>
					<td align="left" bgcolor="#ececec" class="td-title">獣医師名カナ</td>
					<td align="left" bgcolor="#ffffff">
						<?=$this->Form->input('name_kana',array('type'=>'text','class'=>'input-normal','label'=>false,'div'=>false))?>
					</td>
				</tr>
				<tr>
					<td align="left" bgcolor="#ececec" class="td-title">性別</td>
					<td align="left" bgcolor="#ffffff">
						<? $sex = Configure::read('sex'); ?>
						<?=$this->Form->input('sex',array('type'=>'radio','options'=>$sex, 'default'=>'1', 'legend'=>false,'div'=>false))?>
					</td>
				</tr>
				<tr>
					<td align="left" bgcolor="#ececec" class="td-title">郵便番号</td>
					<td align="left" bgcolor="#ffffff">
						<?=$this->Form->input('zip_code',array('type'=>'number','class'=>'input-small','label'=>false,'div'=>false))?>
						
					</td>
				</tr>
				<tr>
					<td align="left" bgcolor="#ececec" class="td-title">住所</td>
					<td align="left" bgcolor="#ffffff">
						<? $addr1 = Configure::read('addr1'); ?>
						<?=$this->Form->input('addr1',array('type'=>'select','label'=>false,'div'=>false,'options'=>$addr1,'style'=>'width:100px','default'=>13))?>（都道府県）<br/>
						<?=$this->Form->input('addr2',array('type'=>'text','style'=>'width:300px','label'=>false,'div'=>false))?>（市区町村）<br/>
						<?=$this->Form->input('addr3',array('type'=>'text','style'=>'width:300px','label'=>false,'div'=>false))?>（番地・マンション名）
					</td>
				</tr>
				<tr>
					<td align="left" bgcolor="#ececec" class="td-title">メールアドレス</td>
					<td align="left" bgcolor="#ffffff">
						<?=$this->Form->input('email',array('type'=>'text','class'=>'input-normal','label'=>false,'div'=>false))?>
					</td>
				</tr>
				<tr>
					<td align="left" bgcolor="#ececec" class="td-title">BizTelアカウント</td>
					<td align="left" bgcolor="#ffffff">
						ID<?=$this->Form->input('biztel_id',array('type'=>'text','class'=>'input-normal','label'=>false,'div'=>false))?>　
						パスワード<?=$this->Form->input('biztel_password',array('type'=>'text','class'=>'input-normal','label'=>false,'div'=>false))?>
					</td>
				</tr>
				<tr>
					<td align="left" bgcolor="#ececec" class="td-title">カルテアカウント</td>
					<td align="left" bgcolor="#ffffff">
						ID<?=$this->Form->input('karte_id',array('type'=>'text','class'=>'input-normal','label'=>false,'div'=>false))?>　
						パスワード<?=$this->Form->input('karte_password',array('type'=>'text','class'=>'input-normal','label'=>false,'div'=>false))?>
					</td>
				</tr>
				<tr>
					<td align="left" bgcolor="#ececec" class="td-title">契約開始日</td>
					<td align="left" bgcolor="#ffffff">
						<?=$this->Form->input('promise_date',array('type'=>'text','class'=>'input-normal','label'=>false,'data-date-format'=>'yyyy-mm-dd','readonly','style'=>'background-color:white;cursor: default;', 'required'=>'required'))?>
					</td>
				</tr>
				<tr>
					<td align="left" bgcolor="#ececec" class="td-title">契約状態</td>
					<td align="left" bgcolor="#ffffff">
						<? $promise_status = Configure::read('promise_status'); ?>
						<?=$this->Form->input('promise_status',array('type'=>'select','label'=>false,'div'=>false,'options'=>$promise_status,'style'=>'width:100px','default'=>1))?>
					</td>
				</tr>
				<tr>
					<td align="left" bgcolor="#ececec" class="td-title">ＰＨＳ電話番号</td>
					<td align="left" bgcolor="#ffffff">
						<?=$this->Form->input('phs',array('type'=>'text','class'=>'input-normal','label'=>false,'div'=>false))?>
					</td>
				</tr>
				<tr>
					<td align="left" bgcolor="#ececec" class="td-title">連絡先電話番号</td>
					<td align="left" bgcolor="#ffffff">
						<?=$this->Form->input('tel',array('type'=>'text','class'=>'input-normal','label'=>false,'div'=>false))?>
					</td>
				</tr>

				<tr>
					<td align="left" bgcolor="#ececec" class="td-title">シフト表の色指定</td>
					<td align="left" bgcolor="#FF0000">
						#<?=$this->Form->input('shift_back_color',array('type'=>'text','class'=>'input-normal','label'=>false,'div'=>false))?> <a href="">色選択</a>　　　　文字
					</td>
				</tr>
				<tr>
					<td align="left" bgcolor="#ececec" class="td-title">シフト表の文字色指定</td>
					<td align="left" bgcolor="#FF0000">
						#<?=$this->Form->input('shift_moji_color',array('type'=>'text','class'=>'input-normal','label'=>false,'div'=>false))?>
						　　　文字
					</td>
				</tr>
			</table>
	  </div>
	</div>



※【仕様メモ】↓以下は管理者のみの情報です。
	<div class="block">
	<a href="#contractor" class="block-heading" data-toggle="collapse">支払情報</a>
	  <div id="contractor" class="block-body collapse in"><h3></h3>
			<table class="table table-bordered">
				<tr>
					<td align="left" bgcolor="#ececec" class="td-title">時給ランク</td>
					<td align="left" bgcolor="#ffffff">
						<? $rank = Configure::read('rank'); ?>
						<?=$this->Form->input('rank_hour',array('type'=>'select','label'=>false,'div'=>false,'options'=>$rank,'style'=>'width:100px','default'=>4))?>
					</td>
				</tr>
				<tr>
					<td align="left" bgcolor="#ececec" class="td-title">在宅ランク</td>
					<td align="left" bgcolor="#ffffff">
						<?=$this->Form->input('rank_zaitaku',array('type'=>'select','label'=>false,'div'=>false,'options'=>$rank,'style'=>'width:100px','default'=>4))?>
					</td>
				</tr>
				<tr>
					<td align="left" bgcolor="#ececec" class="td-title">コミッション金額1</td>
					<td align="left" bgcolor="#ffffff">
						<?=$this->Form->input('commission1',array('type'=>'number','class'=>'input-small','label'=>false,'div'=>false, 'default'=>100, 'required'=>'required'))?>円
					</td>
				</tr>
				<tr>
					<td align="left" bgcolor="#ececec" class="td-title">コミッション金額2</td>
					<td align="left" bgcolor="#ffffff">
						5分未満<?=$this->Form->input('commission2_5miman',array('type'=>'number','class'=>'input-small','label'=>false,'div'=>false, 'default'=>100, 'required'=>'required'))?>円　
						10分未満<?=$this->Form->input('commission2_10miman',array('type'=>'number','class'=>'input-small','label'=>false,'div'=>false, 'default'=>300, 'required'=>'required'))?>円　
						10分以上<?=$this->Form->input('commission2_10ijo',array('type'=>'number','class'=>'input-small','label'=>false,'div'=>false, 'default'=>500, 'required'=>'required'))?>円　
						20分以上<?=$this->Form->input('commission2_20ijo',array('type'=>'number','class'=>'input-small','label'=>false,'div'=>false, 'default'=>1000, 'required'=>'required'))?>円
					</td>
				</tr>
				<tr>
					<td align="left" bgcolor="#ececec" class="td-title">勤務日数に応じた手当</td>
					<td align="left" bgcolor="#ffffff">
						<? $kinmu_teate_flg = Configure::read('kinmu_teate_flg'); ?>
						<?=$this->Form->input('kinmu_teate_flg',array('type'=>'radio','options'=>$kinmu_teate_flg, 'default'=>'0', 'legend'=>false,'div'=>false, 'required'=>'required'))?>
					</td>
				</tr>
			</table>
	  </div>
	</div>
	
	
	
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="home">
	<div class="block">
	<a href="#contractor" class="block-heading" data-toggle="collapse">変更履歴</a>
	  <div id="contractor" class="block-body collapse in"><h3></h3>
			<table class="table table-bordered">

				<tr>
					<th align="left" bgcolor="#ececec" class="td-title">変更日時</th>
					<th align="left" bgcolor="#ececec" class="td-title">変更箇所</th>
					<th align="left" bgcolor="#ececec" class="td-title">前</th>
					<th align="left" bgcolor="#ececec" class="td-title">後</th>
					<th align="left" bgcolor="#ececec" class="td-title">更新者</th>
				</tr>
				
				<tr>
					<td>2015-05-19 12:03</td>
					<td>時給ランク</td>
					<td>AAA</td>
					<td>S</td>
					<td>馬場</td>
				</tr>

				<tr>
					<td>2015-05-10 12:03</td>
					<td>新規登録</td>
					<td></td>
					<td></td>
					<td>三宅</td>
				</tr>
				
				
			</table>
	  </div>
	</div>
	

<div class="btn-toolbar">
	<button class="btn btn-primary"><i class="icon-save"></i> 登録</button>
</div>

<?php echo $this->Form->end(); ?>


<script type="text/javascript">
	$('#VeterinariansPromiseDate').datepicker();
</script>