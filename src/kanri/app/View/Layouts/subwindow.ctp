<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$title = '';
if(!isset($menu_id))$menu_id = 0;
if($menu_id==1){
	$title="日常のケア";
}elseif($menu_id==2){
	$title="通知機能＆写真付きメモパッド";
}elseif($menu_id==3){
	$title="体重/体脂肪率/BCS";
}elseif($menu_id==4){
	$title="お薬手帳";
}elseif($menu_id==5){
	$title="ワクチンの記録";
}elseif($menu_id==6){
	$title="フィラリアの記録";
}elseif($menu_id==7){
	$title="ノミ・マダニ予防記録";
}elseif($menu_id==8){
	$title="健康診断の記録";
}elseif($menu_id==9){
	$title="証明書の管理";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?=$title?> | Anicli24	</title>
	<?php
		echo $this->Html->script(array('jquery-1.7.2.min','jquery-ui-1.8.20.custom.min'));
		echo $this->Html->script(array('common'));
		echo $this->Html->meta('icon');

		echo $this->Html->css('import');
		echo $this->Html->css('blitzer/jquery-ui-1.8.20.custom');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
<script type="text/javascript">
//<![CDATA[

$(function() {
	$( ".datepicker" ).datepicker({
		dateFormat : "yy/mm/dd"
		,dayNamesMin: ['日', '月', '火', '水', '木', '金', '土']
		,showOn: "button"
		,buttonImageOnly : true
		,buttonImage : "/mypage/img/common/icon_calendar.png"
		,beforeShow : function(input,inst){
			//開く前に日付を上書き
			var date = "";
			$(this).closest(".calendar").find("select").each(function(index,element){
				if(index!=0)
					date += "/";
				date += $(element).val();
			});
			$(this).datepicker( "setDate" , date)
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
});

//]]>
</script>

</head>
<body id="pageTop">
	<div id="wrapper">
			<div class="error-message"><?php echo $this->Session->flash(); ?></div>
			<?php echo $this->fetch('content'); ?>
	</div>
	<?php 
		//echo $this->element('sql_dump'); 
	?>
</body>
</html>
