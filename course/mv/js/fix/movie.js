$(function($) {

var tab = $('#movie'),
offset = tab.offset();

	$(window).scroll(function () {
	  if($(window).scrollTop() > offset.top) {
		tab.addClass('fixed');
	  } else {
		tab.removeClass('fixed');
	  }	  
	});


	

	$(window).scroll(function () {
	  if($('.main').height() < $(window).scrollTop()) {
		//tab.removeClass('fixed');
		var y = $(this).scrollTop() - $('.main').height();
		$('#movie').css("top", -y)
		
	  } else {
		//tab.addClass('fixed');
		$('#movie').css("top", 0)
	  }	  
	});
	
	
	
});
