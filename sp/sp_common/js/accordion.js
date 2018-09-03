
$(function(){

	$(".accordion p").click(function(){
		$(this).next("ul").slideToggle();
		$(this).children("span").toggleClass("open");	
	});
	
	$(".accordion dt").click(function(){
		$(this).next("dd").slideToggle();
		$(this).next("dd").siblings("dd").slideUp();
		$(this).toggleClass("open");	
		$(this).siblings("dt").removeClass("open");
	});
}) ;

// サブタイトル表示 upg:20130305
$(function(){
	// タイトル数取得
	var numTitles = $(".title_select .subtitles li").size();
	var numOutlines = $(".title_select .subtitles li").size();

	//メニュータップ時の選択アニメーション
	function selectStory(n) {
		if(numTitles && n< numTitles){
			$(".title_select span.selected" ).html($(".title_select .subtitles li:eq("+n+")").html());
		}
		$(".title_select .outline li.open").removeClass("open").slideUp();
		if(numOutlines && n<numOutlines){
			$(".title_select .outline li:eq("+n+")").slideDown().addClass("open");
		}
	}

	// 起動処理
	selectStory( numTitles-1 ); // 初期表示は最終話に合わせています
	// selectStory(0); // 常にトップを表示したい場合 こちらにしてください（上下逆積みの場合等）
	
	// 現在選択されているプルダウンの表示（メニュー部の表示ON/OFF切り替えのみ）
	$(".title_select span.selected" ).click(function(){
		$(".title_select ul.subtitles").slideToggle();
	});

	// メニュー部クリックイベント　 選択して、メニューを閉じる
	$(".title_select ul.subtitles li").click( function(){
		$(".title_select span.selected" ).html($(this).html());
		$(".title_select .subtitles").slideUp();
		selectStory($(".title_select ul.subtitles li").index(this));
	});
});