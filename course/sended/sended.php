<?php

$id = 0;

if(isset($_GET["id"])){
	$id = $_GET["id"];
}


if(!isset($_GET["id"])){
	header("Location: http://www.direct-commu.com/");
	exit();
}



if($id == 1){ $mes = "仮登録メールを送信しました"; }

if($id == 2){ $mes = "グループカウンセリング参加のメールを送信しました"; }

if($id == 3){ $mes = "心理カウンセリング参加のメールを送信しました"; }

if($id == 4){ $mes = "心理検査参加のメールを送信しました"; }

if($id == 5){ $mes = "講座振替希望のメールを送信しました"; }



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="author" content="株式会社ダイレクトコミュニケーション" /><title>メールを送信しました</title>
<link href="../../common/css/base.css" rel="stylesheet" type="text/css" media="all" />
<link href="../../common/css/header.css" rel="stylesheet" type="text/css" media="all" />
<link href="../../common/css/content.css" rel="stylesheet" type="text/css" media="all" />
<link href="../../common/css/sidebar.css" rel="stylesheet" type="text/css" media="all" />
<link href="../../common/css/footer.css" rel="stylesheet" type="text/css" media="all" />

<script type="text/javascript" src="../../common/js/smoothscroll.js"></script>
<script type="text/javascript" src="../../common/js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="../../common/js/fadein.js"></script>
<script type="text/javascript" src="../../common/js/onoff.js"></script>
<script type="text/javascript" src="../../common/js/ua.js"></script>
<script type="text/javascript" src="../../common/js/smart-crossfade.js"></script>


</head>

<body>
<a name="page_top"></a>
<div id="ua"></div>

<div id="header" style="padding-top: 0px">

<div id="onoffbtn"><a href="http://www.direct-commu.com/course/mailmag.html" id="open"></a></div>

<div id="headercontainer">

<div id="headerright"><!-- --></div>
<div id="logowrap"><a href="http://www.direct-commu.com/"><img src="../../common/sharedimg/logo_directcomm.gif" alt="ダイレクトコミュニケーション能力,話し方教室" /></a></div>
<!--<ul>
<li><a href="http://www.direct-commu.com/reqruit/teacher.html">講師・心理士 募集</a></li>
<li><a href="http://www.direct-commu.com/reqruit/assistant.html">アシスタント 募集</a></li>
<li><a href="http://www.direct-commu.com/company/contact.html">お問い合わせ</a></li></ul>-->
<ul>
<li><a href="http://www.direct-commu.com/company/contact.html"><img src="../../common/sharedimg/header/btn_contact_cloud_off.png" class="hover" /></a></li>
</ul>
</div><!-- end headercontainer -->

<ul id="gnav">
<li id="home"><a href="http://www.direct-commu.com/">ホーム</a></li>
<li id="course"><a href="http://www.direct-commu.com/course/" class="selected">コミュニケーション講座</a></li>
<li id="text"><a href="http://www.direct-commu.com/text/">ダイコミュ通信講座</a></li>
<li id="training"><a href="http://www.direct-commu.com/training/">コミュニケーション能力トレーニング</a></li>
<li id="ability"><a href="http://xn--zckzah9129bsdgbusdye.jp/">コミュニケーション能力診断</a></li>
<li id="colums"><a href="http://www.direct-commu.com/colums/">コミュニケーションコラム集</a></li>
<li id="event"><a href="http://www.direct-commu.com/event/">ダイコミュイベント</a></li>
<li id="teacher"><a href="http://www.direct-commu.com/profile/">講師紹介</a></li>
</ul><!-- end gnav -->
</div><!-- end header -->

<div id="topicpath">

<div id="topicleft"><a href="http://www.direct-commu.com/">ホーム</a> > <a href="http://www.direct-commu.com/">コミュニケーション講座</a> > <h1><?=$mes?></h1>
</div><!-- end topicleft -->
<div id="topicright">
  <h2>相手の気持ちに敏感になろう　人間関係が楽しくなる</h2>
</div><!-- end topicright -->
</div><!-- end topicpath -->


<div id="container">

<div id="sidebar">
<a href="http://www.direct-commu.com/course/"><img src="../../common/sharedimg/course/img_title_course.gif" width="290" height="44" /></a>
<div class="nav">
<ul style="margin-top: 0">
<li><a href="http://www.direct-commu.com/course/1_intro.html">はじめての方へ</a></li>
</ul>
<p><img src="../../common/sharedimg/course/title_sidebar_01_course.gif" alt="基本コース" /></p>
<ul>
<li><a href="http://www.direct-commu.com/course/mental.html">心理学コース</a></li>
<li><a href="http://www.direct-commu.com/course/ningenkankei.html">人間関係コース</a></li>
<li><a href="http://www.direct-commu.com/course/business.html">社会人基礎コース</a></li>
</ul>
<p><img src="../../common/sharedimg/course/title_sidebar_02_tanki.gif" alt="短期集中コース" /></p>
<ul>
<li><a href="http://www.direct-commu.com/course/01_kanto/index.html">関東短期集中講座　<img src="http://www.direct-commu.com/common/images/course/icon_date_tanki.png" width="70" />　</a></li>
</ul>

<p><img src="../../common/sharedimg/course/title_sidebar_03_counseling.gif" alt="カウンセリング" /></p>

<ul>
<li><a href="http://www.direct-commu.com/course/counseling/group.html">グループカウンセリング
</a>
<li><a href="http://www.direct-commu.com/course/counseling/psychology.html">心理カウンセリング</a></li>
<li><a href="http://www.direct-commu.com/course/counseling/shinri.html">心理検査</a></li>
</ul>

<p><img src="../../common/sharedimg/course/title_sidebar_04_price.gif" alt="受講料金" /></p>

<ul>
<li><a href="http://www.direct-commu.com/course/4_price.html">基本コース 受講料金
</a>
<li><a href="http://www.direct-commu.com/course/4_2_price.html">カウンセリング 受講料金</a></li>
</ul>

</div><!-- end nav -->

<div class="navbottom"><!-- --></div><!-- end navbottom -->
<img src="../../common/sharedimg/course/img_title_course_about.gif" width="290" height="44" />
<div class="nav">
<p><img src="../../common/sharedimg/course/title_sidebar_04_schedule.gif" alt="スケジュール・会場" /></p>
<ul>
<li><a href="http://www.direct-commu.com/course/class/class_shinjuku.php">新宿第１教室
</a></li>
<li><a href="http://www.direct-commu.com/course/class/class_shinjuku_02.php">新宿第２教室
</a></li>
<li><a href="http://www.direct-commu.com/course/class/class_ginza.php">銀座教室</a></li>
<li><a href="http://www.direct-commu.com/course/class/class_yokohama.php">横浜教室</a></li>
<li><a href="http://www.direct-commu.com/course/class/class_saitama.php">埼玉教室</a></li>
<li><a href="http://www.direct-commu.com/course/class/class_kansai.php">関西教室</a></li>
</ul>
<p><img src="../../common/sharedimg/course/title_sidebar_05_reservation.gif" alt="仮予約" /></p>
<ul>
<li><a href="http://www.direct-commu.com/course/6_reservation.html">仮予約する</a></li>
</ul>

<p><img src="../../common/sharedimg/course/title_sidebar_06_other.gif" alt="その他・注意事項" /></p>
<ul>
<!--<li><a href="http://www.direct-commu.com/course/5_confirmation.html">注意事項</a></li>-->
<!--<li><a href="http://www.direct-commu.com/course/4_price.html">受講料金</a></li>-->
<li><a href="http://www.direct-commu.com/course/keizoku.html">継続について</a></li>
<li><a href="http://www.direct-commu.com/course/furikae.html">振替について</a></li>
<li><a href="http://www.direct-commu.com/course/seitosannokoe.html">生徒さんの声</a></li>
<li><a href="http://www.direct-commu.com/course/yokuarushitumon.html">よくある質問</a></li>
</ul>


</div><!-- end nav -->
<div class="navbottom"><!-- --></div><!-- end navbottom -->
</div><!-- end sidebar -->

<hr class="clear" />

<div id="content">
<div id="contenttop"><!-- --></div><!-- end contenttop -->

<div class="main">
  <p class="title_01"><?=$mes?></p>
<div class="wrap">
<div class="imgbox" style="width: 220px"><img src="../../common/illust/michi/counseling/gc002_img1.jpg" /></div><!-- end imgbox -->
<p>メッセージを送信しました！</p>
<p>返信が来るまでいましばらくお待ちください！</p>
<p>&nbsp;</p>
</div><!-- end wrap -->


<p class="title_01"><span class="title">Yahooメール,hotmailをご利用の方へ</span></p>
<div class="wrap">
<p>弊社のメールが迷惑フォルダーに送信されやすくなっております。<br />
確実に返信メールを受け取りたい方は、予め下記アドレスをアドレス帖にご登録頂くことを<br />
お勧めします。</p>
<p><img src="../../common/sharedimg/img_address.gif" width="230" height="28" /></p>
</div><!-- end wrap -->

<p class="title_01"><span class="title">迷惑フォルダに送信された場合</span></p>
<div class="wrap">
<p>迷惑フォルダに送信された場合は、各メールボックスにある「迷惑メールではない」<br />
ボタンを押して頂くと次回以降はスムーズにメールを受信することができます。</p>
</div><!-- end wrap -->

<p class="title_01"><span class="title">送信後2日経っても返信メールが無い場合</span></p>
<div class="wrap">
<p>弊社にメールが到達していない可能性があります。その際にはお手数ですがメールアドレスを変え、<br />
再度メールをお送り下さい。</p>
<p>○お電話でのお問い合わせについて <br />
  平日11～15時　 045-633-1897</p>
</div><!-- end wrap -->


</div><!-- end main -->
<div id="bg_contentbottom"><!-- --></div>


</div><!-- end content -->


</div><!-- end container -->

<br class="brclear" />

<br class="brclear" />

<h3>新宿、銀座、横浜、大阪♪ 
人間関係を楽しもう♪ 人間関係が楽しくなる♪</h3>
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

<div class="section"> <a href="http://www.direct-commu.com/company/contact.html"><img src="../../common/sharedimg/footer/banner_footer2.gif" alt="お問い合わせ" /></a></div><!-- end section -->
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
