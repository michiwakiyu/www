// source --> https://www.direct-commu.com/chie/wp-content/themes/chie/common/js/sp.js 
/**
 * sp.js
 */
(function($){
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
			var meta = document.createElement('meta');
			meta.setAttribute('name', 'viewport');
			meta.setAttribute('content', 'width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no');
			document.getElementsByTagName('head')[0].appendChild(meta);
			}
})(jQuery);