<?php
	echo $this->Html->script(array('jquery-1.7.2.min'));
?>
<script>
//<![CDATA[

$(function() {
	window.close();
	window.opener.location.reload();
	window.opener.$('body').scrollTop(0);
});

//]]>

</script>
