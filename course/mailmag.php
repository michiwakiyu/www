<?php


require_once("/home/users/2/lolipop.jp-dp58180317/web/lib/simplepie.inc");

$url_feed = "http://www.direct-commu.com/milmg/feed/";


//SimplePieオブジェクト生成
$feed = new SimplePie();
//cache設定
//$feed->enable_cache(false); //cacheを無効にする場合
$feed->set_cache_location('./tmp_mailmag/'); //cache場所
$feed->set_cache_duration(60 * 60 * 30); //30時間　//cache時間デフォルトでは60分となっている

$feed->set_feed_url($url_feed);

//パースを実行
$feed->init();



//表示件数を指定
$count = 25;
$feedItems=$feed->get_items(0,$count); 

$b_list = array();
$b_lists = "";

for($i=0; $i< $count; $i++){	
	$b_list["title"] = $feedItems[$i]->get_title();
	$b_list["description"] = $feedItems[$i]->get_description();
	$b_list["url"] =   $feedItems[$i]->get_link();
	$b_list["date"] =   $feedItems[$i]->get_date();
	$b_lists .= 
	//"<dt>".$b_list["date"]."<a href=\"".$b_list["url"]."\">".$b_list["title"]."</a></li>";
	/*"<dt>".$b_list["date"]."</dt>".
	"<dd>"."<a href=\"".$b_list["url"]."\">".$b_list["title"]."</a></dd>";*/
	
	"<li>"."<a href=\"".$b_list["url"]."\">".$b_list["title"]."</a></li>";

	
}



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<META name="description" content="コミュニケーション能力はコツさえ掴めば伸びる！！話し方や会話、人間関係に関する無料メルマガ本♪対人関係にも活用ください">
<META name="keywords" content="本,メルマガ,コミュニケーション能力,話し方,会話,人間関係,対人関係,無料">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="author" content="株式会社ダイレクトコミュニケーション" /><title>コミュニケーション能力をUP！話し方,会話に関するメルマガ本♪人間関係,対人関係</title>

<link href="../common/css/base.css" rel="stylesheet" type="text/css" media="all" />
<link href="../common/css/header.css" rel="stylesheet" type="text/css" media="all" />
<link href="../common/css/sidebar.css" rel="stylesheet" type="text/css" media="all" />
<link href="../common/css/footer.css" rel="stylesheet" type="text/css" media="all" />
<link href="../common/css/content.css" rel="stylesheet" type="text/css" media="all" />

<script type="text/javascript" src="../common/js/smoothscroll.js"></script>
<script type="text/javascript" src="../common/js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="../common/js/jquery.validate.js"></script>
<script type="text/javascript" src="../common/js/fadein.js"></script>
<script type="text/javascript" src="../common/js/onoff.js"></script>
<script type="text/javascript" src="../common/js/ua.js"></script>
<script type="text/javascript" src="../common/js/smart-crossfade.js"></script>
<script type="text/javascript" src="../common/js/smart-crossfade.js"></script>



</head>

<META name="GENERATOR" content="IBM WebSphere Studio Homepage Builder Version 11.0.0.0 for Windows">
<META http-equiv="Content-Type" content="text/html; charset=Shift_JIS">
<META http-equiv="Content-Style-Type" content="text/css">
<TITLE></TITLE>
<body>
<a name="page_top"></a>
<div id="ua"></div>    <div id="header" style="padding-top: 0px">

<div id="onoffbtn"><a href="http://www.direct-commu.com/course/mailmag.php" id="open"></a></div>
<div id="headercontainer">

<div id="headerright"><!-- --></div>
<div id="logowrap"><a href="http://www.direct-commu.com/"><img src="../common/sharedimg/logo_directcomm.gif" alt="ダイレクトコミュニケーション能力,話し方教室" /></a></div>
<!--<ul>
<li><a href="http://www.direct-commu.com/reqruit/teacher.html">講師・心理士 募集</a></li>
<li><a href="http://www.direct-commu.com/reqruit/assistant.html">アシスタント 募集</a></li>
<li><a href="http://www.direct-commu.com/company/contact.html">お問い合わせ</a></li></ul>-->
<ul>
<li><a href="http://www.direct-commu.com/company/contact.html"><img src="../common/sharedimg/header/btn_contact_cloud_off.png" class="hover" /></a></li>
</ul>
</div><!-- end headercontainer -->

<ul id="gnav">
<li id="home"><a href="http://www.direct-commu.com/">ホーム</a></li>
<li id="course"><a href="http://www.direct-commu.com/course/" class="selected">コミュニケーション講座</a></li>
<li id="text"><a href="http://www.direct-commu.com/text/">ダイコミュ通信講座</a></li>
<li id="training"><a href="http://www.direct-commu.com/training/">コミュニケーション能力トレーニング</a></li>
<li id="ability"><a href="http://commutest.com">コミュニケーション能力診断</a></li>
<li id="colums"><a href="http://www.direct-commu.com/colums/">コミュニケーションコラム集</a></li>
<li id="event"><a href="http://www.direct-commu.com/event/">ダイコミュイベント</a></li>
<li id="teacher"><a href="http://www.direct-commu.com/profile/">講師紹介</a></li>
</ul><!-- end gnav -->
</div><!-- end header -->

<div id="topicpath">

<div id="topicleft"><a href="http://www.direct-commu.com/">ホーム</a> &gt; <a href="http://www.direct-commu.com/course/">コミュニケーション講座</a> &gt;
<h1>&gt;話し方,会話に関するメルマガ本♪人間関係,対人関係</h1>
</div><!-- end topicleft -->
<div id="topicright">
  <h2>本,メルマガ,コミュニケーション能力,話し方,会話,人間関係,対人関係,無料</h2>
</div><!-- end topicright -->
</div><!-- end topicpath -->


<div id="container">

<div id="sidebar">
<a href="http://www.direct-commu.com/milmg/"><img src="../common/sharedimg/mailmag/img_title_mailmag0.gif" width="290" height="44" /></a>
<div class="nav">
<ul style="margin-top: 0">
<?=$b_lists?>

<p>&nbsp;</p>

<p style="text-align: center"><a href="http://www.direct-commu.com/milmg/">全て見る>></a></p>

</ul>





</div><!-- end nav -->

<div class="navbottom"><!-- --></div><!-- end navbottom -->
</div><!-- end sidebar -->

<hr class="clear" />

<div id="content">
<div id="contenttop"><!-- --></div><!-- end contenttop -->

<div class="main">
<img src="../common/sharedimg/mailmag/img_title_mailmag2.gif" alt="人間関係コースのメインタイトル画像" border="0" usemap="#Map"/>
<map name="Map" id="Map">
  <area shape="rect" coords="414,172,655,235" href="https://i-magazine.jp/bm/p/f/tf.php?id=directcomm" />
</map>

<div class="wrap">
  <p><FONT size="+1" color="#009999"><BR>
１.コミュニケーションで悩んでいませんか？<BR>
</FONT><FONT color="#009999"><BR>
</FONT><span class="green">・会話が続かない<BR>
・すぐに沈黙になる<BR>
・人と話すと不安になる<BR>
・何を質問していいかわからない</span><BR>
<BR>
<BR>
皆さんは上記のお悩みを抱えていませんか？<BR>
これらのお悩みを抱えている状態ですと、<BR>
会話がとてもつらいと感じる方が多いと思います。<BR>
<BR>
<BR>
そこでダイコミュでは生徒さん向けに、毎月１回<BR>
専門的なトレーニング方法をお伝えしています。<BR>
<BR>
<BR>
具体的には下記のようなテーマとなります。<BR>
<span class="red">・会話が続けるトレーニング<BR>
・相手が話しやすい質問の作り方<BR>
・沈黙になったときの対処法<BR>
・人が怖いという感情との向き合い方</span><BR>
<BR>
<BR>
ちょっとよくわからないなあ・・・という方もいらっしゃるかもしれません。<BR>
例えば「会話を続ける」ことについて考えてみましょう。<BR>
<BR>
<BR>
<BR>
<FONT color="#009999" size="+1">2.なぜ会話が続かないのか？</FONT><BR>
<BR>
（質問に頼りすぎていませんか？<BR>
<BR>
<BR>
まずコミュニケーションで悩む方の多くが<BR>
<span class="red">質問を使いすぎてしまう</span>という失敗をしています。<BR>
良かれと思って質問をするのが仇となって、<BR>
尋問になってしまうのですね。<BR>
<BR>
<BR>
これらの問題を改善するには、<span class="red">「留まる練習」</span><BR>
をする必要があります。同じ話題を掘り下げて味わうようなイメージですね。<BR>
ではどうすれば留まれるようになるのか・・・その点については<BR>
定期的に配信させて頂きます。<BR>
<BR>
<BR>
<BR>
<BR>
<FONT size="+1" color="#009999">３．毎月の定期トレーニングでスキルUP！</FONT><BR>
<BR>
<BR>
このようにコミュニケーショントレーニングでは<BR>
日常で役立つスキルをたくさん練習していきます。<BR>
<BR>
<BR>
もし今コミュニケーションでお悩みの方がいたら、<BR>
必ず役に立つ情報ばかりだと思います。<BR>
毎月トレーニングをすれば今よりもきっとコミュニケーションが楽しくなるでしょう。<BR>
<BR>
<BR>
是非全国の方と一緒にトレーニングをしていきましょう！！<BR>
現在<span class="red">1２７８人の方</span>が一緒にトレーニングしていますよ♪交流も盛んです（＾＾）<BR>
<BR>
<p><B><FONT size="+2" color="#ff66cc">解除と登録はこちらから↓（無料です）</FONT></B></p>
<p><a href="https://i-magazine.jp/bm/p/f/tf.php?id=directcomm"><img src="../common/sharedimg/mailmag/btn_mailmag_off.gif" alt="ダイコミュメールだよりを登録" width="239" height="59" border="0" /></a></p>
<p><a href="http://www.direct-commu.com/milmg/">バックナンバーはこちら</a></p>
</div>
<BR>
<BR>
<BR>
<span class="red">＊ダイコミュはメールだけでなく、実際に顔を合わせて</span><BR>
切磋琢磨することも大事にしています。是非全国の方と<BR>
一緒にトレーニングしていきましょう♪♪<BR>
<BR>
<BR>
<span class="red">＊現役の生徒さん</span><BR>
必ず登録をお願いします。みんなで知識を共有して<BR>
切磋琢磨してコミュニケーション能力を向上させていきましょう。<BR>
<BR>
<BR>
<span class="red">＊楽しいイベント情報</span><BR>
毎年行っている、山登り、運動会、忘年会などの<BR>
情報もお伝えしています。<BR>
<BR>
<BR>
<span class="red">＊トレーニングUPソフトのお知らせ</span><BR>
皆さんのコミュニケーション能力を向上させるための、<BR>
性格診断や練習ソフトを定期的にお伝えします。<BR>
もちろん無料で使えるものばかりですので是非ご活用ください。<BR>
<BR>
<BR>
<BR>

<!--<p class="title_01">ダイコミュ通信～みんなでコミュ力をアップしよう～</p>
<div class="wrap">
<P><a href="http://www.direct-commu.com/milmg/">バックナンバーはこちらから&gt;&gt;</a></P>
</div>--><!-- end wrap -->



</div><!-- end main -->
<div id="bg_contentbottom"><!-- --></div>


</div><!-- end content -->


</div><!-- end container -->

<br class="brclear" />

<br class="brclear" />

<h3>ダイコミュ通信</h3>
<div id="footer">

<div id="pagetop">
<div id="btn_pagetop">
<a href="#page_top"><!-- --></a>
</div>
</div><!-- end pagetop -->
<div id="footercontainer">
<div id="nav">
<div class="section">
<P>●ダイレクトコミュニケーション</p>
<ul>
<li><a href="http://www.direct-commu.com/company/">・会社概要</a></li>
<li><a href="http://www.direct-commu.com/profile/">・講師紹介</a></li>
<li><a href="http://www.direct-commu.com/company/contact.html">・お問い合わせ</a></li>
<li><a href="http://www.direct-commu.com/company/privacy.html">・プライバシーポリシー</a></li>
</ul>

</div><!-- end section -->
<div class="section">
<P>●開催講座一覧</p>
<ul>
<li><a href="http://www.direct-commu.com/course/1_intro.html">・はじめての方へ</a></li>
<li><a href="http://www.direct-commu.com/course/mental.html">・心理学コース</a></li>
<li><a href="http://www.direct-commu.com/course/ningenkankei.html">・人間関係コース</a></li>
<li><a href="http://www.direct-commu.com/course/business.html">・社会人基礎コース</a></li>
</ul>

</div><!-- end section -->
<div class="section">
<P>●ダイコミュ通信教材</p>
<ul>
<li><a href="http://www.direct-commu.com/text/">・通信講座について</a></li>
<li><a href="http://www.direct-commu.com/text/mental.html">・心理学教材</a></li>
<li><a href="http://www.direct-commu.com/text/ningenkankei.html">・人間関係教材</a></li>
<li><a href="http://www.direct-commu.com/text/katsuzetsu.html">・滑舌・ボイストレーニング教材</a></li>
</ul>
</div><!-- end section -->

<div class="section"> <a href="http://www.direct-commu.com/company/contact.html"><img src="../common/sharedimg/footer/banner_footer2.gif" alt="お問い合わせ" /></a></div><!-- end section -->
</div><!-- end nav -->
<br class="brclear" />
<div id="small"><div id="small"><span>Copyright(c) 2006-2013 Direct Communication co.,Ltd all right reserved<br />
<a href="http://www.direct-commu.com/">コミュニケーション能力のことなら「ダイレクトコミュニケーション」</a></span></div><!-- end small --></div><!-- end small -->


</div><!-- end footercontainer -->
</div><!-- end footer -->



<!-- google analytics -->
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-39326739-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>
</html>
