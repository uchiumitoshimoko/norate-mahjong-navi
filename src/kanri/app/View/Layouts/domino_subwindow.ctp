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

	<div class="content" style="margin-left:0px">
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
