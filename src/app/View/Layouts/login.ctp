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
/*
		echo $this->Html->meta('icon');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
*/
	?>


	<link rel="stylesheet" type="text/css" href="/shift/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="/shift/stylesheets/theme.css">
	<link rel="stylesheet" href="/shift/font-awesome/css/font-awesome.css">
	<script src="/shift/js/jquery-1.7.2.min.js" type="text/javascript"></script>

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
	</style>

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
					<!-- li><a href="logout" role="button"><i class="icon-signout"></i>　Logout</a></li -->
				</ul>
				<span class="brand_shift">株式会社チェリッシュライフジャパン
				　　　シフト管理システム</span>
		</div>
	</div>
	<!--div class="sidebar-nav">
		<a href="#customer-menu" class="nav-header" data-toggle="collapse"><i class="icon-group"></i>顧客管理</a>
		<ul id="customer-menu" class="nav nav-list collapse in">
			<?if($_SESSION['menu_str'][0]==1){?><li><a href="#">顧客一覧</a></li><?}?>
		</ul>
		<a href="#agency-menu" class="nav-header" data-toggle="collapse"><i class="icon-home"></i>代理店管理</a>
		<ul id="agency-menu" class="nav nav-list collapse in">
			<?if($_SESSION['menu_str'][1]==1){?><li><a href="#">代理店一覧</a></li><?}?>
			<?if($_SESSION['menu_str'][2]==1){?><li><a href="#">代理グループ一覧</a></li><?}?>
			<?if($_SESSION['menu_str'][3]==1){?><li><a href="#">代理店グループ新規登録</a></li><?}?>
		</ul>
		<a href="#receipts-menu" class="nav-header" data-toggle="collapse"><i class="icon-money"></i>入金管理</a>
		<ul id="receipts-menu" class="nav nav-list collapse in">
			<?if($_SESSION['menu_str'][4]==1){?><li><a href="#">クレジットカード決済処理</a></li><?}?>
			<?if($_SESSION['menu_str'][5]==1){?><li><a href="#">SMBC決済取込</a></li><?}?>
			<?if($_SESSION['menu_str'][6]==1){?><li><a href="#">○○決済取込</a></li><?}?>
			<?if($_SESSION['menu_str'][7]==1){?><li><a href="#">手動入金</a></li><?}?>
		</ul>
		<a href="#demand-menu" class="nav-header" data-toggle="collapse"><i class="icon-jpy"></i>請求管理</a>
		<ul id="demand-menu" class="nav nav-list collapse in">
			<?if($_SESSION['menu_str'][8]==1){?><li><a href="#">請求一覧</a></li><?}?>
		</ul>
		<a href="#payment-menu" class="nav-header" data-toggle="collapse"><i class="icon-usd"></i>支払い管理</a>
		<ul id="payment-menu" class="nav nav-list collapse in">
			<?if($_SESSION['menu_str'][9]==1){?><li><a href="#">支払い一覧</a></li><?}?>
		</ul>
		<a href="#follow-menu" class="nav-header" data-toggle="collapse"><i class="icon-phone"></i>フォロー管理</a>
		<ul id="follow-menu" class="nav nav-list collapse in">
			<?if($_SESSION['menu_str'][10]==1){?><li><a href="#">フォロー一覧</a></li><?}?>
		</ul>
		<a href="#result -menu" class="nav-header" data-toggle="collapse"><i class="icon-thumbs-up"></i>成果管理</a>
		<ul id="result -menu" class="nav nav-list collapse in">
			<?if($_SESSION['menu_str'][11]==1){?><li><a href="#">代理店成果一覧</a></li><?}?>
		</ul>
		<a href="#loginuser-menu" class="nav-header" data-toggle="collapse"><i class="icon-user"></i>ログインユーザ管理</a>
		<ul id="loginuser-menu" class="nav nav-list collapse in">
			<?if($_SESSION['menu_str'][12]==1){?><li ><a href="loginuser">ログインユーザ一覧</a></li><?}?>
			<?if($_SESSION['menu_str'][13]==1){?><li ><a href="loginuser/add">ログインユーザ新規登録</a></li><?}?>
		</ul>
	</div-->

	<div class="login_content">
			<?php echo $this->fetch('content'); ?>
	</div>

					<footer>
						<hr>

					</footer>
					
			</div>
		</div>
	</div>
	


	<script src="/shift/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		$("[rel=tooltip]").tooltip();
		$(function() {
			$('.demo-cancel-click').click(function(){return false;});
			<?if(!empty($message)){?>$('#myModal').modal();<?}?>
		});
	</script>
	<?php echo $this->element('sql_dump'); ?>

	
  </body>
</html>
