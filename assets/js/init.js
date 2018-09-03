/**
 * init.js
 */
(function($){
	$(window).load(function(){
		var
			sideH = $("#sidebar").outerHeight(),
			startPos = $("#sidebar").offset().top,
			endtPos = $("#footercontainer").offset().top-200;
			scroll = $(window).scrollTop();
			if( scroll >= startPos) {
				$('#sidebar').addClass("fixed");
			} else if (scroll < startPos ) {
				$('#sidebar').removeClass("fixed");
			}
			if(endtPos < scroll + sideH){
				$('#sidebar').addClass("fixedEnd");
			} else {
				$('#sidebar').removeClass("fixedEnd");
			}

		$(window).scroll(function(){
			var
				sideH = $("#sidebar").outerHeight(),
				scroll = $(window).scrollTop();
			if( scroll >= startPos) {
				$('#sidebar').addClass("fixed");
			} else if (scroll < startPos ) {
				$('#sidebar').removeClass("fixed");
			}
			if(endtPos < scroll + sideH){
				$('#sidebar').addClass("fixedEnd");
			} else {
				$('#sidebar').removeClass("fixedEnd");
			}
		});
	});


	$(function(){
		$(".bt_curri").click(function(){
			$(this).next().slideToggle(600);
			$(this).toggleClass('close');
		});
		$(window).resize(function(){
			var wd = $(window).width();
			if(wd > 569){
				$(".curriculum_area").removeAttr('style');
			}
		});
	});

})(jQuery);





















