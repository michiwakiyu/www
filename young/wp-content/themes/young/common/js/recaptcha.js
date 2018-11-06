/**
 * recaptch.js
 */
$(document).ready(function() {
//console.log("AAA");
	$("#commentform #submit").attr("disabled", "disabled") ;
});

function commentRecaptchaCallback(code) {
//console.log("BBB");
	if (code != "") {
//console.log("CCC");
		$("#commentform #submit").removeAttr("disabled") ;
		setTimeout(function(){$("#commentform #submit").attr("disabled", "disabled");}, 120000) ;
	}
}
