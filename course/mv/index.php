<?php

//==================================
//session
//==================================

session_start();

//==================================
//session確認
//==================================

if(isset($_SESSION["neruma"]) || $_SESSION["neruma"] == "directcomm"){
	header("Location: http://www.direct-commu.com/course/mv/page.php?login=1");
	exit();
}


if(isset($_GET["er"])){
	$mes = "ログインに失敗しました";
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<META name="description" content="ビジネスコミュニケーション能力が確実につきます！仕事の上でのスキルアップを目指すなら！スキルUP研修・セミナー">
<META name="keywords" content="ビジネス,コミュニケーション能力,スキル,研修,セミナー">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>社会人基礎コース　動画ページ</title>

<link href="../../common/css/base.css" rel="stylesheet" type="text/css" media="all" />
<link href="../../common/css/header.css" rel="stylesheet" type="text/css" media="all" />
<link href="../../common/css/sidebar.css" rel="stylesheet" type="text/css" media="all" />
<link href="../../common/css/footer.css" rel="stylesheet" type="text/css" media="all" />
<link href="../../common/css/content.css" rel="stylesheet" type="text/css" media="all" />
<link href="./css/style.css" rel="stylesheet" type="text/css" media="all" />

<script type="text/javascript" src="../../common/js/smoothscroll.js"></script>
<script type="text/javascript" src="../../common/js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="../../common/js/jquery.validate.js"></script>
<script type="text/javascript" src="../../common/js/fadein.js"></script>
<script type="text/javascript" src="./validate/myvalidate_01.js"></script>


</head>
 
<body>
<a name="page_top"></a>
 
<div id="header" style="background-position: center top">
<div id="headercontainer">
 
<div id="headerright"><!-- --></div>
<div id="logowrap"><a href="http://www.direct-commu.com/"><img src="../../common/sharedimg/logo_directcomm.gif" alt="ダイレクトコミュニケーション能力,話し方教室" /></a></div>
<ul>
<li><a href="http://www.direct-commu.com/reqruit/">求人情報</a></li>
<li><a href="http://www.direct-commu.com/company/contact.html">お問い合わせ</a></li>
</ul>
</div><!-- end headercontainer -->
 
<ul id="gnav">
<li id="home"><a href="http://www.direct-commu.com">ホーム</a></li>
<li id="course"><a href="http://www.direct-commu.com/course/" class="selected">コミュニケーション講座</a></li>
<li id="text"><a href="http://www.direct-commu.com/text/">ダイコミュ通信講座</a></li>
<li id="ability"><a href="http://xn--zckzah9129bsdgbusdye.jp/">コミュニケーション能力診断</a></li>
<li id="colums"><a href="http://www.direct-commu.com/colums/">コミュニケーションコラム集</a></li>
<li id="skillup"><a href="http://www.direct-commu.com/skillup/">スキルアップ道場</a></li>
<li id="event"><a href="http://www.direct-commu.com/event/">ダイコミュイベント</a></li>
<li id="teacher"><a href="http://www.direct-commu.com/profile/">講師紹介</a></li>
</ul><!-- end gnav -->
</div><!-- end header -->
 
<div id="topicpath">
 
<div id="topicleft"><a href="http://www.direct-commu.com/">ホーム</a> > <a href="http://www.direct-commu.com/">コミュニケーション講座</a> > <h1>ビジネスコミュニケーション能力が格段にアップする方法がここに！スキル,研修,セミナー</h1>
</div><!-- end topicleft -->
<div id="topicright">
  <h2>ビジネス,コミュニケーション能力,スキル,研修,セミナー</h2>
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
<li><a href="http://www.direct-commu.com/course/business.html" class="selected">社会人基礎コース</a></li>
</ul>
<p><img src="../../common/sharedimg/course/title_sidebar_02_tanki.gif" alt="短期集中コース" /></p>
<ul>
<li><a href="http://www.direct-commu.com/course/01_kanto/index.html">関東短期集中講座　<img src="http://www.direct-commu.com/common/images/course/icon_date_tanki.gif" width="70" />　</a></li>
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
<li><a href="http://www.direct-commu.com/course/mailmag.html">メールマガジン</a></li>
</ul>
 
 
</div><!-- end nav -->
<div class="navbottom"><!-- --></div><!-- end navbottom -->
</div><!-- end sidebar -->
 
<hr class="clear" />
 
<div id="content">
<div id="contenttop"><!-- --></div><!-- end contenttop -->
<div class="main" style="text-align: center">
<img src="images/img_title_speach.gif" />
 
<div class="wrap">

<p><span class="red"><?=$mes?></span></p>
<form action="./login.php" method="post">
<input type="text" name="pass" class="form_text" /><br />
<input type="hidden" name="cr" value="1" /><input type="submit" value="ログイン" />
</form>

<p>&nbsp;</p>


</div><!-- end wrap -->
<div class="wrap"> </div><!-- end wrap -->
 
<ul id="course_sub">
<li id="guide"><a href="http://www.direct-commu.com/course/guide.html">ご受講ガイド</a></li>
<li id="eriko"><a href="http://www.direct-commu.com/course/student/">えりこの体験記</a></li>
<li id="photo"><a href="http://www.direct-commu.com/course/photo/" class="side">ダイコミュ写真館</a></li>
</ul>
<hr class="clear" />
<P>&nbsp;</P>
 
</div><!-- end main -->
<div id="bg_contentbottom"><!-- --></div>
 
 
</div><!-- end content -->
 
 
</div><!-- end container -->
 
<br class="brclear" />
 
<br class="brclear" />
 
<h3>ビジネスコミュニケーション能力が確実につきます！仕事の上でのスキルアップを目指すなら！スキルUP研修・セミナー</h3>
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
 
<div class="section"> <a href="http://www.direct-commu.com/course/mailmag.html"><img src="http://www.direct-commu.com/common/sharedimg/footer/banner_footer.gif" width="236" /></a></div><!-- end section -->
</div><!-- end nav -->
<br class="brclear" />
<div id="small"><div id="small"><span>Copyright(c) 2006-2013 Direct Communication co.,Ltd all right reserved</span></div><!-- end small --></div><!-- end small -->
 
 
</div><!-- end footercontainer -->
</div><!-- end footer -->
 
 
 
<script type="text/javascript"> 
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-10783873-1");
pageTracker._trackPageview();
} catch(err) {}</script>
</body>
</html>
