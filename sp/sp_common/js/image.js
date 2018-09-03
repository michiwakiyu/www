// 画像系
$(document).ready(function(){
//iPhone4等、解像度の大きい媒体
	if(typeof window.devicePixelRatio == 'number' && window.devicePixelRatio > 1){
		$("img").each( function() {
			$(this).attr("src",$(this).attr("src").replace("images/","images/640/"));
		});
	}

	//画像プリロード
	$("div.icons").each(function(){
        $("<img>").attr("src",$(this).attr("src"));
    })
});