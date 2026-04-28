<!DOCTYPE html>
<html>
  <head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<?php
	echo $this->Html->meta('icon');
/*
		echo $this->Html->meta('icon');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
*/
	?>


	<link rel="stylesheet" type="text/css" href="/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="/bootstrap/css/datepicker.css">
	<link rel="stylesheet" type="text/css" href="/css/sp_style.css">
	<link rel="stylesheet" type="text/css" href="/stylesheets/theme.css">
	<link rel="stylesheet" href="/font-awesome/css/font-awesome.css">
	<script src="/js/jquery-1.7.2.min.js" type="text/javascript"></script>
	<script src="/bootstrap/js/bootstrap-datepicker.js" type="text/javascript"></script>

	<!-- Demo page code -->

	<style type="text/css">
		#line-chart {
			height:300px;
			width:800px;
			margin: 0px auto;
			margin-top: 1em;
		}
		.brand { font-family: georgia, serif; }
		.brand .first {
			color: #ccc;
			font-style: italic;
		}
		.brand .second {
			color: #fff;
			font-weight: bold;
		}
		input:focus, select:focus, textarea:focus {
		background-color: #E0FFFF;
		}

	</style>
	<script type="text/javascript">
	$(function(){
		var menu = $('.comMenu'), // スライドインするメニューを指定
		menuBtn = $('.menuBox a'), // メニューボタンを指定
		body = $(document.body),
		menuWidth = menu.width();

		// メニューボタンをクリックした時の動き
		menuBtn.on('click', function(){
			body.animate({'left' : menuWidth }, 300);
			menu.animate({'left' : 0 }, 300);
		});
		
		$('.comMenu .close a').click(function(){
			menu.animate({'left' : -menuWidth }, 300);
			body.animate({'left' : 0 }, 300);
		});
	});
	</script>

<script>

var double_check = 0;

$(function() {
	
	
	$('.doubleClick').on('click', function() {
		
		if(double_check == 1) {
			return false;
		}
		double_check = 1;
		
		setTimeout("cancelDouble()", 2000);
		
	});
	
});

function cancelDouble(){
  double_check = 0;
}


$(function(){
 
　$('input[type=text]').on('blur', function(){
　　var txt = $(this).val();
　　var search_txt = "[①②③④⑤⑥⑦⑧⑨⑩⑪⑫⑬⑭⑮⑯⑰⑱⑲⑳ⅠⅡⅢⅣⅤⅥⅦⅧⅨⅩ㍉㌔㌢㍍㌘㌧㌃㌶㍑㍗㌍㌦㌣㌫㍊㌻㎜㎝㎞㎎㎏㏄㎡㍻〝〟№㏍℡㊤㊥㊦㊧㊨㈱㈲㈹㍾㍽㍼∮∑∟⊿纊褜鍈銈蓜俉炻昱棈鋹曻彅丨仡仼伀伃伹佖侒侊侚侔俍偀倢俿倞偆偰偂傔僴僘兊兤冝冾凬刕劜劦勀勛匀匇匤卲厓厲叝﨎咜咊咩哿喆坙坥垬埈埇﨏塚增墲夋奓奛奝奣妤妺孖寀甯寘寬尞岦岺峵崧嵓﨑嵂嵭嶸嶹巐弡弴彧德忞恝悅悊惞惕愠惲愑愷愰憘戓抦揵摠撝擎敎昀昕昻昉昮昞昤晥晗晙晴晳暙暠暲暿曺朎朗杦枻桒柀栁桄棏﨓楨﨔榘槢樰橫橆橳橾櫢櫤毖氿汜沆汯泚洄涇浯涖涬淏淸淲淼渹湜渧渼溿澈澵濵瀅瀇瀨炅炫焏焄煜煆煇凞燁燾犱犾猤猪獷玽珉珖珣珒琇珵琦琪琩琮瑢璉璟甁畯皂皜皞皛皦益睆劯砡硎硤硺礰礼神祥禔福禛竑竧靖竫箞精絈絜綷綠緖繒罇羡羽茁荢荿菇菶葈蒴蕓蕙蕫﨟薰蘒﨡蠇裵訒訷詹誧誾諟諸諶譓譿賰賴贒赶﨣軏﨤逸遧郞都鄕鄧釚釗釞釭釮釤釥鈆鈐鈊鈺鉀鈼鉎鉙鉑鈹鉧銧鉷鉸鋧鋗鋙鋐﨧鋕鋠鋓錥錡鋻﨨錞鋿錝錂鍰鍗鎤鏆鏞鏸鐱鑅鑈閒隆﨩隝隯霳霻靃靍靏靑靕顗顥飯飼餧館馞驎髙髜魵魲鮏鮱鮻鰀鵰鵫鶴鸙黑ⅰⅱⅲⅳⅴⅵⅶⅷⅸⅹ￤＇＂]";
　　if(txt.match(search_txt)){
　　　alert("機種依存文字が入力されています。");
　　}
　});
 
});


</script>

	
	
	<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Le fav and touch icons -->
	<link rel="shortcut icon" href="../assets/ico/favicon.ico">
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
  </head>

  <!--[if lt IE 7 ]> <body class="ie ie6"> <![endif]-->
  <!--[if IE 7 ]> <body class="ie ie7 "> <![endif]-->
  <!--[if IE 8 ]> <body class="ie ie8 "> <![endif]-->
  <!--[if IE 9 ]> <body class="ie ie9 "> <![endif]-->
  <!--[if (gt IE 9)|!(IE)]><!--> 
  <body class=""> 
  <!--<![endif]-->
<!-- Modal -->
<?
$message = $this->Session->flash();
?>
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <h3 id="myModalLabel">確認</h3>
  </div>
  <div class="modal-body">
    <p><?=$message?></p>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">OK</button>
  </div>
</div>

	<div class="navbar">
		<div class="navbar-inner">
				<ul class="nav pull-right">
					<li class="menuBox"><a href="#"><img src="/images/menu.png" alt=""></a></li>

<?if(isset($_SESSION['menu_str'][100])&&$_SESSION['menu_str'][100]==1){?>
					<li ><a href="/loginuser/change_reserable"><img src="/images/logo.png" style="height:20px"></a></li>

<? } ?>
					<li>
						<a href='#'>時刻：
						<?
							$week_str_list = array( '日', '月', '火', '水', '木', '金', '土');
							echo date('Y-m-d');
							echo " (" . $week_str_list[date('w')] . ") ";
							echo date('H:i:s');
						?>
						</a>
					</li>
					<li>
					
					<a href="/loginuser/edit_user"  role="button">
					<?
						echo $this->Session->read('login_name');
					?>
					</a>
					</li>
					
					<li><a href="/loginuser/logout" role="button"><i class="icon-signout"></i>　Logout</a></li>
				</ul>
				<span class="brand_shift"><a href="/domino_kyujin_imports/"><img src="/images/domino_logo.jpg" alt="logo" style="height:50px"/></a></span>
		</div>
	</div>
	<div class="comMenu">
		<div class="close"><a href="#">×</a></div>
		<a href="#customer-menu-sp" class="nav-header" data-toggle="collapse"><i class="icon-group"></i>　Domino</a>
		<ul id="customer-menu" class="nav nav-list collapse in">
			
			<?if(isset($_SESSION['menu_str'][100])&&$_SESSION['menu_str'][100]==1){?><li><a href="/d_kigyos">企業一覧</a></li><?}?>
			<?if(isset($_SESSION['menu_str'][100])&&$_SESSION['menu_str'][100]==1){?><li><a href="/d_kigyos/approach_edit/add">企業新規登録</a></li><?}?>
			<?if(isset($_SESSION['menu_str'][100])&&$_SESSION['menu_str'][3]==1){?><li><a href="/d_progresss">進捗管理</a></li><?}?>
		</ul>
		
		<a href="#customer-sp" class="nav-header" data-toggle="collapse"><i class="icon-group"></i>データインポート</a>
		<ul id="customer-sp" class="nav nav-list collapse in">
			
			<?if(isset($_SESSION['menu_str'][100])&&$_SESSION['menu_str'][100]==1){?><li><a href="/domino_kyujin_imports">求人情報CSV登録</a></li><?}?>
			
			<!--
			<?if(isset($_SESSION['menu_str'][100])&&$_SESSION['menu_str'][100]==1){?><li><a href="/domino_client_imports">CPクライアント登録</a></li><?}?>
			-->
		</ul>

		<a href="#customer-sp" class="nav-header" data-toggle="collapse"><i class="icon-wrench"></i>マスタ設定</a>
		<ul id="customer-sp" class="nav nav-list collapse in">
			
			<?if(isset($_SESSION['menu_str'][100])&&$_SESSION['menu_str'][100]==1){?><li><a href="/d_medias">媒体設定</a></li><?}?>
			<?if(isset($_SESSION['menu_str'][100])&&$_SESSION['menu_str'][100]==1){?><li><a href="/d_common_syokusyus1">共通職種設定</a></li><?}?>
		</ul>
		<a href="#agency-menu-sp" class="nav-header" data-toggle="collapse"><i class="icon-envelope"></i>　履歴</a>
		<ul id="agency-menu-sp" class="nav nav-list collapse">
			
			<?if(isset($_SESSION['menu_str'][100])&&$_SESSION['menu_str'][100]==1){?><li><a href="/d_mails">メール送信履歴</a></li><?}?>
			
		</ul>
	</div>
	<div class="sidebar-nav">

		<a href="#customer-menu" class="nav-header" data-toggle="collapse"><i class="icon-group"></i>Domino</a>
		<ul id="customer-menu" class="nav nav-list collapse in">
			
			<?if(isset($_SESSION['menu_str'][100])&&$_SESSION['menu_str'][100]==1){?><li><a href="/d_kigyos">企業一覧</a></li><?}?>
			<?if(isset($_SESSION['menu_str'][100])&&$_SESSION['menu_str'][100]==1){?><li><a href="/d_kigyos/approach_edit/add">企業新規登録</a></li><?}?>
			<?if(isset($_SESSION['menu_str'][100])&&$_SESSION['menu_str'][3]==1){?><li><a href="/d_progresss">進捗管理</a></li><?}?>
		</ul>
		
		<a href="#customer-menu2" class="nav-header" data-toggle="collapse"><i class="icon-group"></i>データインポート</a>
		<ul id="customer-menu2" class="nav nav-list collapse in">
			
			<?if(isset($_SESSION['menu_str'][100])&&$_SESSION['menu_str'][100]==1){?><li><a href="/domino_kyujin_imports">求人情報CSV登録</a></li><?}?>
			
			<!--
			<?if(isset($_SESSION['menu_str'][100])&&$_SESSION['menu_str'][100]==1){?><li><a href="/domino_client_imports">CPクライアント登録</a></li><?}?>
			-->
		</ul>

		<a href="#customer-menu3" class="nav-header" data-toggle="collapse"><i class="icon-wrench"></i>マスタ設定</a>
		<ul id="customer-menu3" class="nav nav-list collapse in">
			
			<?if(isset($_SESSION['menu_str'][100])&&$_SESSION['menu_str'][100]==1){?><li><a href="/d_medias">媒体設定</a></li><?}?>
			<?if(isset($_SESSION['menu_str'][100])&&$_SESSION['menu_str'][100]==1){?><li><a href="/d_common_syokusyus1">共通職種設定</a></li><?}?>
		</ul>
		
		<a href="#customer-menu4" class="nav-header" data-toggle="collapse"><i class="icon-wrench"></i>メール送信</a>
		<ul id="customer-menu4" class="nav nav-list collapse in">
			
			<?if(isset($_SESSION['menu_str'][100])&&$_SESSION['menu_str'][100]==1){?><li><a href="/d_mails">メール送信履歴</a></li><?}?>
			<?if(isset($_SESSION['menu_str'][100])&&$_SESSION['menu_str'][100]==1){?><li><a href="/d_mail_templates">メールテンプレート設定</a></li><?}?>
			
		</ul>
	</div>

	<div class="content">
			<?php echo $this->fetch('content'); ?>
	</div>

					<footer>
						<hr>

					</footer>
					
			</div>
		</div>
	</div>
	


	<script src="/bootstrap/js/bootstrap.js"></script>
	<script type="text/javascript">
		$("[rel=tooltip]").tooltip();
		$(function() {
			$('.demo-cancel-click').click(function(){return false;});
			<?if(!empty($message)){?>
			
				 $('#myModal').modal();
			
			<?}?>
		});
	</script>

	<script>
		$(function() {
		    var pageTop = $('.page-top');
		    pageTop.hide();
		    $(window).scroll(function () {
		        if ($(this).scrollTop() > 300) {
		            pageTop.fadeIn();
		        } else {
		            pageTop.fadeOut();
		        }
		    });
		    pageTop.click(function () {
		        $('body, html').animate({scrollTop:0}, 500, 'swing');
		        return false;
		    });
		});
	
	</script>
	<style type="text/css">
		.page-top {
		    position: fixed;
		    bottom: 60px;
		    right: 100px;
		    padding: 10px;
		    border-radius: 5px;
		    -webkit-border-radius: 5px;
		    -moz-border-radius: 5px;
		    font-size: 12px;
		    -ms-filter: "alpha(opacity=80)";
		    -moz-opacity: 0.8;
		    -khtml-opacity: 0.8;
		    opacity: 0.8;
		}
	</style>
	
	<a href="#" class="page-top"><img src='/img/e_others_410.png' /></a>
	
	<?php 
		// echo $this->element('sql_dump'); 
	?>

	
  </body>
</html>
