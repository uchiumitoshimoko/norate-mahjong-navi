$(function(){
	setTimeout(function(){window.scrollTo(0, 1)}, 100);
	$.mobile.ajaxEnabled = false;
	
	var current = $("body").attr('id');
	$(".gn_"+current).addClass("current");
});

