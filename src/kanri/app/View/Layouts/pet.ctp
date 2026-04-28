<?
	$title_message = "ここに説明文が挿入されます。ここに説明文が挿入されます。ここに説明文が挿入されます。";
if($menu_id==1){
	$title="日常のケア";
	$title_message = "病気の予防は身近なところから。お家でできるケアの紹介と、その記録ができます。";
}elseif($menu_id==2){
	$title="通知機能＆写真付きメモパッド";
	$title_message = "シンプルなメモ帳としての使用はもちろん、写真を添付したり、リマインダー機能を使える高機能メモパッド。メモ一覧から日付・タイトルで検索も可能。";
}elseif($menu_id==3){
	$title="体重/体脂肪率/BCS";
	$title_message = "急な体重の変化は病気のサインかも。肥満はいろいろな病気の原因になります。定期的な体重／体脂肪率測定で、病気の予防や早期発見を。グラフ機能あります。";
}elseif($menu_id==4){
	$title="お薬手帳";
	$title_message = "病院でもらったお薬を記録できます。";
}elseif($menu_id==5){
	$title="ワクチンの記録";
	$title_message = "いつ、何のワクチンを接種したかが一目でわかります。感染症にかからないためには、定期的なワクチン接種が必要です。";
}elseif($menu_id==6){
	$title="フィラリアの記録";
	$title_message = "フィラリアは予防が基本です。季節になったら検査を行い、薬の与え忘れがないように、記録をつけましょう。";
}elseif($menu_id==7){
	$title="ノミ・マダニ予防記録";
	$title_message = "痒いだけでなく、他の病気の原因になる事があります。しっかり予防して、ペットの健康を守りましょう。";
}elseif($menu_id==8){
	$title="健康診断の記録";
	$title_message = "健康診断における各種検査（血液検査、画像診断）の記録です。";
}elseif($menu_id==9){
	$title="証明書の管理";
	$title_message = "ペットショップや病院でもらった証明書などを画像で保存しておけば、必要な時にすぐ確認できます。";
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?=$title?> | Anicli24
	</title>
	<?php
		echo $this->Html->script(array('jquery-1.7.2.min','jquery.carouFredSel-5.5.5-packed','jquery-ui-1.8.20.custom.min','common'));
		echo $this->Html->meta('icon');

		echo $this->Html->css('import');
		echo $this->Html->css('blitzer/jquery-ui-1.8.20.custom');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>

<script type="text/javascript">
<?
$message = $this->Session->flash();
?>
//<![CDATA[

$(function() {
	<?if(!empty($message)){?>
	$('#MessageBox').dialog({
	  autoOpen: true,
	  title: 'Message',
	  closeOnEscape: false,
	  modal: true,
	  buttons: {
	    "OK": function(){
	      $(this).dialog('close');
	    }
	  }
	});
	<?}?>
	$( ".datepicker" ).datepicker({
		dateFormat : "yy/mm/dd"
        ,minDate: '-10y'
        ,maxDate: '+1y'
		,yearSuffix: "年"
		,monthNames: ["1月","2月","3月","4月","5月","6月","7月","8月","9月","10月","11月","12月"]
		,monthNamesShort:["1月","2月","3月","4月","5月","6月","7月","8月","9月","10月","11月","12月"]
		,dayNames:["日曜日","月曜日","火曜日","水曜日","木曜日","金曜日","土曜日"]
		,dayNamesMin: ["日","月","火","水","木","金","土"]
		,dayNamesShort:["日曜","月曜","火曜","水曜","木曜","金曜","土曜"]
		,showMonthAfterYear: true 
		,showOn: "button"
		,buttonImageOnly : true
		,buttonImage : "/mypage/img/common/icon_calendar.png"
		,beforeShow : function(input,inst){
			//開く前に日付を上書き
			var datestr = "";
			$(this).closest(".calendar").find("select").each(function(index,element){
				if(index!=0)
					datestr += "/";
				datestr += $(element).val();
			});
			var date = new Date(datestr);
			if(datestr == (date.getFullYear() + "/" + (date.getMonth() + 1) + "/" + date.getDate())){
				$(this).datepicker("setDate" , datestr)
			}else{
			}
		},
		onSelect: function(dateText, inst){
			//カレンダー確定時にフォームに反映
			var dates = dateText.split('/');
			$(this).closest(".calendar").find("select").each(function(index,element){
				$(element).val(dates[index]);
				$(element).trigger("change");
			});
		}
	});
	$( ".calendar select" ).change(function(){
		var datestr = "";
		$(this).closest(".calendar").find("select").each(function(index,element){
			if(index!=0)
				datestr += "/";
			datestr += String(parseInt($(element).val(),10));
		});
		var date = new Date(datestr);
		if(datestr == (date.getFullYear() + "/" + (date.getMonth() + 1) + "/" + date.getDate())){
		}else{
			alert("存在しない日付が指定されています。");
			$(this).closest(".calendar").find("select").each(function(index,element){
				$(element).val('');
			});
		}
	});
});

//]]>
</script>

</head>
<body id="pageTop">
<div id="MessageBox" style="display: none; ">
<p><?=$message?></p>
</div>

<div id="wrapper">


<?
$birthday_type = $petsData[$pet_id]['birthday_type'];
if($birthday_type==1)
$birth = $petsData[$pet_id]['karte']['birthday'];
else
$birth = $petsData[$pet_id]['birthday_estim'];


$age = "";
$age_month = "";

if($birth!='0000-00-00'){
	$age = floor((date("Ymd") - date("Ymd", strtotime($birth))) / 10000);
	$birth_month = date("m", strtotime($birth));
	$curr_month = date("m");
	$age_month = $curr_month - $birth_month;
	if($age_month < 0){
		$age_month += 12;
	}
}
if($petsData[$pet_id]['karte']['sex']=='MALE'){
	$sex = 'M';
}else{
	$sex = 'W';
}
if($petsData[$pet_id]['karte']['ptype']=='DOG'){
	$type = 'D';
}else{
	$type = 'C';
}
$isbirthday = false;
$isPrebirthday = false;
if(date("md")==date("md", strtotime($birth)))
	$isbirthday = true;
elseif(date("md")  >= date("md",strtotime($birth." -1 month")) && date("md") < date("md", strtotime($birth)) )
	$isPrebirthday = true;


?>

<!-- //▼HEADER▼// -->

<div id="header02">

<div class="frame clearfix">

<dl class="clearfix">
	<dt><p class="icon">

<?
	$call_list['0'] = "ちゃん";
	$call_list['1'] = "ちゃん";
	$call_list['2'] = "くん";
	
?>


<? if(!empty($petsData[$pet_id]['pet_photo'])){ ?>
	<img alt="<?=$petsData[$pet_id]['karte']['pname']?><?=$call_list[$petsData[$pet_id]['yobikata']]?>" src="/mypage/images/spet/<?=$pet_id?>?<?=rand()?>" width="60" height="60" />
<?}else{?>
	<? if($type=="D"){ ?>
	<img src="/mypage/img/common/head_icon_dog.png" width="60" height="60"/>
	<? }else{?>
	<img src="/mypage/img/common/head_icon_cat.png" width="60" height="60"/>
	<? }?>
<?}?>
	</p>
<?if($isbirthday){?>
<p class="coverH"></p>
<?}elseif($isPrebirthday){?>
<p class="coverPH"></p>
<?}elseif($sex=='M'){?>
<p class="coverB"></p>
<?}else{?>
<p class="coverR"></p>
<?}?>	
	</dt>

	<dd><span class="bold"><?=$petsData[$pet_id]['karte']['pname']?><?=$call_list[$petsData[$pet_id]['yobikata']]?>の健康管理ノート</span><br />

			登録日：<?=strftime("%Y年%m月%d日",strtotime($petsData[$pet_id]['karte']['register_dt']))?>～</dd>

</dl>

<h1 class="tsp20"><?=$title?></h1>

<ul id="headMenu" class="clearfix">

	<li id="user"><p id="hmName"><span><?=$loginData['karte']['name']?></span>さんのマイページ</p>

	<li id="btn">

		<p><?=$this->Html->link($this->Html->image('common/btn_logout.png'),array('controller'=>'customers','action'=>'logout'),array('escape' => false))?></p>

		<p><?=$this->Html->link($this->Html->image('common/btn_mypage.png'),array('controller'=>'pets','action'=>'home',$pet_id),array('escape' => false))?></p>

	</li>

</ul>

</div>

</div>

<!-- //△HEADER△// -->


<!-- //▼GLOBAL-NAVI▼// -->

<div id="gnavi">

<div class="frame">

<ul class="clearfix">

	<li>
		<a href="/mypage/dailies/tooth/<?=$pet_id?>">
		<?if($menu_id==1){?>
			<img alt="日常のケア" src="/mypage/img/common/gn01_o.gif" width="87" height="58" class="over" />
		<?}else{?>
			<img alt="日常のケア" src="/mypage/img/common/gn01.gif" width="87" height="58" class="imgover" />
		<?}?>
		</a>
	</li>
	<li>
		<a href="/mypage/memopads/index/<?=$pet_id?>">
		<?if($menu_id==2){?>
			<img alt="通知機能＆写真付きメモパッド" src="/mypage/img/common/gn02_o.gif" width="136" height="58" class="over" />
		<?}else{?>
			<img alt="通知機能＆写真付きメモパッド" src="/mypage/img/common/gn02.gif" width="136" height="58" class="imgover" />
		<?}?>
		</a>
	</li>
	<li>
		<a href="/mypage/weights/index/<?=$pet_id?>">
		<?if($menu_id==3){?>
			<img alt="体重/体脂肪率BCS" src="/mypage/img/common/gn03_o.gif" width="107" height="58" class="over" />
		<?}else{?>
			<img alt="体重/体脂肪率BCS" src="/mypage/img/common/gn03.gif" width="107" height="58" class="imgover" />
		<?}?>
		</a>
	</li>
	<li>
		<a href="/mypage/medicines/index/<?=$pet_id?>">
		<?if($menu_id==4){?>
			<img alt="お薬手帳" src="/mypage/img/common/gn04_o.gif" width="80" height="58" class="over" />
		<?}else{?>
			<img alt="お薬手帳" src="/mypage/img/common/gn04.gif" width="80" height="58" class="imgover" />
		<?}?>
		</a>
	</li>
	<li>
		<a href="/mypage/vaccines/index/<?=$pet_id?>">
		<?if($menu_id==5){?>
			<img alt="ワクチンの記録" src="/mypage/img/common/gn05_o.gif" width="116" height="58" class="over" />
		<?}else{?>
			<img alt="ワクチンの記録" src="/mypage/img/common/gn05.gif" width="116" height="58" class="imgover" />
		<?}?>
		</a>
	</li>
	<li>
		<a href="/mypage/filarias/index/<?=$pet_id?>">
		<?if($menu_id==6){?>
			<img alt="フィラリアの記録" src="/mypage/img/common/gn06_o.gif" width="118" height="58" class="over" />
		<?}else{?>
			<img alt="フィラリアの記録" src="/mypage/img/common/gn06.gif" width="118" height="58" class="imgover" />
		<?}?>
		</a>
	</li>
	<li>
		<a href="/mypage/nomis/index/<?=$pet_id?>">
		<?if($menu_id==7){?>
			<img alt="ノミ・マダニ予防記録" src="/mypage/img/common/gn07_o.gif" width="108" height="58" class="over" />
		<?}else{?>
			<img alt="ノミ・マダニ予防記録" src="/mypage/img/common/gn07.gif" width="108" height="58" class="imgover" />
		<?}?>
		</a>
	</li>
	<li>
		<a href="/mypage/medicals/index/<?=$pet_id?>">
		<?if($menu_id==8){?>
			<img alt="健康診断の記録" src="/mypage/img/common/gn08_o.gif" width="108" height="58" class="over" />
		<?}else{?>
			<img alt="健康診断の記録" src="/mypage/img/common/gn08.gif" width="108" height="58" class="imgover" />
		<?}?>
		</a>
	</li>
	<li>
		<a href="/mypage/photos/index/<?=$pet_id?>">
		<?if($menu_id==9){?>
			<img alt="証明書の管理" src="/mypage/img/common/gn09_o.gif" width="107" height="58" class="over" />
		<?}else{?>
			<img alt="証明書の管理" src="/mypage/img/common/gn09.gif" width="107" height="58" class="imgover" />
		<?}?>
		</a>
	</li>
</ul>

<p id="cap"><?=$title_message?></p>

</div>

</div>

<!-- //△GLOBAL-NAVI△// -->


<!-- //▼CONTAINER▼// -->

<div id="container">
			<?php echo $this->fetch('content'); ?>
</div>

<!-- //△CONTAINER△// -->







<!-- //▼FOOTER▼// -->

<div id="footer">

<div class="frame">

<p id="footLogo"><img alt="Anicli24" src="/mypage/img/common/footlogo.png" width="98" height="21" /></p>

<p id="copy">COPYRIGHT（C）Anicli24 ALL RIGHTS RESERVED.</p>

</div>

</div>

<!-- //△FOOTER△// -->

</div><!-- End of wrapper -->
<?php echo $this->element('sql_dump'); ?>

</body>

</html>