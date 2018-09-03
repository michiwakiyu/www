// JavaScript Document

$(function(){
			   
	var smh = 0;		   
	var UA = navigator.userAgent;
	
	rep = UA.match(/iPhone/);
	if(rep+'' == 'iPhone'){
		smh += 1;
	}
	
	rep = UA.match(/Android/);
		if(rep+'' == 'Android'){
		smh += 1;
	}
	
	if(smh != 0){
	
	var html = 	
	'<div id="sp"><a onclick=\'document.cookie="mode=sp;path=/;"; window.location.reload();\' href="#">スマートフォン版はこちら</a>';
	
	$('#ua').html(html+'');
	}// end if	
});