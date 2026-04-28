<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">

<head>
	<?php echo $this->Html->charset(); ?>

<title>マイページTOP | Anicli24</title>

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
});

//]]>
</script>

</head>

<body id="pageTop">
<div id="MessageBox" style="display: none; ">
<p><?=$message?></p>
</div>

<div id="wrapper">





<!-- //▼HEADER▼// -->

<div id="header01">

<div class="frame clearfix">

<h1><a href="/mypage/pets/home"><img alt="Anicli24" src="/mypage/img/common/logo.png" width="118" height="27" class="over" /></a></h1>

<div id="headMenu">

		<ul class="clearfix">

			<li id="help"><a href="/mypage/manager/home">HOMEへ</a></li>

		</ul>

</div>

</div>

</div>

<!-- //△HEADER△// -->







<!-- //▼CONTAINER▼// -->

<div id="container">

<div id="myPage" class="clearfix">

	<?php echo $this->fetch('content'); ?>

</div>



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
<?php 
//echo $this->element('sql_dump'); 
?>

</body>

</html>