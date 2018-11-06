$(function($) {

// ---- var tab = $('#sidebar'),
var tab = $('.last-ul'),
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
		$('#sidebar').css("top", -y)
		
	  } else {
		//tab.addClass('fixed');
		// ---- $('#sidebar').css("top", 0)
		  $('.last-ul').css("top", 0)
	  }	  
	});
	
	
	
});
