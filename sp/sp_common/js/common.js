$(document).ready(function(){
	$('.to_page_top a').click(function(){
		$('html,body').animate({ scrollTop: 1 }, 'fast');
		return false;
	});
	$('a.menu').click(function() {
		$('#category_search_hide').toggle();
	});
});

function scrollTO(targetOption, targetName) {
	if (targetOption == 'id') {
		targetPX = $('#'+targetName).offset().top;
	} else if (targetOption == 'class') {
		targetPX = $('.'+targetName).offset().top;
	}
	$('html,body').animate({ scrollTop: targetPX }, 0);
	return false;
}
// アドレスバーを非表示にする
function doScroll() { if (window.pageYOffset === 0) { window.scrollTo(0,1); } }
window.addEventListener('load', function () { setTimeout(doScroll, 100); }, false);
window.onorientationchange = function() { setTimeout(doScroll, 100); };