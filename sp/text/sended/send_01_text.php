<?php

//==========================================================================================
//cr値
//==========================================================================================

$cr = 0;
if(isset($_POST["cr"])){
	$cr = $_POST["cr"];
}

if($cr == 0){
	header("Location: http://www.direct-commu.com/text/");
	exit();
}


//==========================================================================================
//値取得
//==========================================================================================

//namae
if(isset($_POST["namae"])){
	$namae = $_POST["namae"];
}

//furigana
if(isset($_POST["furigana"])){
	$furigana = $_POST["furigana"];
}


//phone
if(isset($_POST["phone"])){
	$phone = $_POST["phone"];
}

//zip001
if(isset($_POST["zip001"])){
	$zip001 = $_POST["zip001"];
}
//zip002
if(isset($_POST["zip002"])){
	$zip002 = $_POST["zip002"];
}




//age
if(isset($_POST["age"])){
	$age = $_POST["age"];
}

//sex
$sex = $_POST["sex"];

//email
if(isset($_POST["email"])){
	$email = $_POST["email"];
}

//mailmag
if(isset($_POST["mailmag"])){
	$mailmag = $_POST["mailmag"];
}

//address
if(isset($_POST["address"])){
	$address = $_POST["address"];
}

//kyozai 教材の種類
if(isset($_POST["kyozai"])){
	$kyozai = $_POST["kyozai"];
}

//where どこで知ったか
if(isset($_POST["where"])){
	$where = $_POST["where"];
}



//question  受講の動機 / お悩み / ご質問等
if(isset($_POST["question"])){
	$question = $_POST["question"];
}


//======================================================================
//■通信教材申し込みメール送信
//======================================================================
mb_language("Ja") ;
mb_internal_encoding("utf-8") ;

$to_email_masuda = "m.yosuke@kyconsul.org";
$to_email_kawashima = "tsushinkoza@direct-comm.com";
//$to_email_kawashima = "kawashima@direct-comm.com";


$content = "
スマホサイトから通信教材申し込みのお問い合わせがあります。\n\n
\n".
"お名前：".$namae."\n".
"ふりがな：".$furigana."\n".
"電話番号：".$phone."\n".
"郵便番号：".$zip001." - ".$zip002."\n".
"住所：".$address."\n".
"年齢：".$age."\n".
"性別：".$sex."\n".
"メールアドレス：".$email."\n".
"メルマガ希望：".$mailmag."\n".
"教材の種類：".$kyozai."\n".
"当サイトはどこで知りましたか：".$where."\n".

"受講の動機 / お悩み / ご質問等：".$question."\n".




"\n\n--------------------------------------------------------\n".
"●株式会社ダイレクトコミュニケーション●\n".
"\n".
"運営:株式会社ダイレクトコミュニケーション http://www.direct-commu.com\n".
"mail:info@direct-commu.com\n".
"--------------------------------------------------------";


$mailfrom= "From: direct-commu.com<info@direct-comm.com>";
$subject = "スマホサイトから通信教材申し込みのお問い合わせがあります";

//masuda
//mb_send_mail($to_email_masuda,$subject,$content,$mailfrom);
//kawashima
mb_send_mail($to_email_kawashima,$subject,$content,$mailfrom);



//======================================================================
//■講座振替希望メール送信完了ページへ
//======================================================================



header("Location: http://www.direct-commu.com/text/sended/sended.php");
exit();


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>通信教材申し込み完了</title>
<link href="../../sp_common/css/base.css" rel="stylesheet" type="text/css" media="all" />
<link href="../../common/css/header.css" rel="stylesheet" type="text/css" media="all" />
<link href="../../common/css/content.css" rel="stylesheet" type="text/css" media="all" />
<link href="../../common/css/sidebar.css" rel="stylesheet" type="text/css" media="all" />
<link href="../../common/css/footer.css" rel="stylesheet" type="text/css" media="all" />
<link href="../../common/css/course.css" rel="stylesheet" type="text/css" media="all" />

<script type="text/javascript" src="../../sp_common/js/smoothscroll.js"></script>

<script type="text/javascript" src="../common/js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="../common/js/jquery.validate.js"></script>
<script type="text/javascript" src="../common/js/myvalidate_06_text.js"></script>


</head>

<body>
<p>スマートフォン</p>
<a name="page_top"></a>
<div id="headercontainer">
<div id="header">
<div id="headerright">ゼロからコミュニケーション能力・スキルを高める！向上するトレーニング法！低下で悩んだら　　<strong style="color: #fff; font-size:9px"><a href="http://communi-pedia.com/" style="color:  #fff">コミュニペディア</a></strong></div>
<div id="logowrap"><a href="http://www.direct-commu.com/"><img src="../../common/sharedimg/logo_directcomm.gif" alt="ダイレクトコミュニケーション,話し方教室" /></a></div>
<ul>
<li><a href="http://www.direct-commu.com/reqruit/teacher.html">講師・心理士 募集</a></li>
<li><a href="http://www.direct-commu.com/reqruit/assistant.html">アシスタント 募集</a></li>

<!--<li><a href="http://www.direct-commu.com/link/index.html">　相互リンク</a></li>-->
<li><a href="../../sitemap.html">サイトマップ</a></li>
<li><a href="../../company/contact.html">お問い合わせ</a></li>
</ul>

</div><!-- end header -->

<ul id="gnav">
<li id="home"><a href="http://www.direct-commu.com">ホーム</a></li>
<li id="course"><a href="http://www.direct-commu.com/course/">コミュニケーション講座</a></li>
<li id="text"><a href="http://www.direct-commu.com/text/" class="selected">ダイコミュ通信講座</a></li>
<li id="ability"><a href="http://xn--zckzah9129bsdgbusdye.jp/">コミュニケーション能力診断</a></li>
<li id="colums"><a href="http://www.direct-commu.com/colums/">コミュニケーションコラム集</a></li>
<li id="skillup"><a href="http://www.direct-commu.com/skillup/">スキルアップ道場</a></li>
<li id="event"><a href="http://www.direct-commu.com/event/">ダイコミュイベント</a></li>
<li id="teacher"><a href="http://www.direct-commu.com/profile/">講師紹介</a></li>
</ul><!-- end gnav -->
</div><!-- end headercontainer -->


<div id="topicpath">

<div id="topicleft"><a href="../../../direct-commu.com">ホーム</a> > <a href="http://www.direct-commu.com/text">コミュニケーション通信講座</a> > 
  <h1>通信講座を申し込みました</h1></div><!-- end topicleft -->
<div id="topicright">
  <h2>認知行動療法わかる！通信の研修・セミナーで学ぶ！おススメ本</h2>
</div><!-- end topicright -->
</div><!-- end topicpath -->

<div id="keyvisual"><img src="../../common/images/title/title_text.jpg" width="921" height="111" alt="コミュニケーション通信講座" /></div>

<div id="container">
<div id="sidebarwrapper">
<div id="sidebar">
<a href="../."><img src="../../common/sharedimg/sidebar/img_title_text.gif" alt="ダイコミュ通信講座" /></a>
<ul class="ul_01">
<li style="margin-bottom: 20px"><a href="http://www.direct-commu.com/text/">通信教材について</a></li>

<li><a href="http://www.direct-commu.com/text/mental.html" class="selected">心理学教材の内容</a></li>
<li><a href="http://www.direct-commu.com/text/ningenkankei.html">人間関係教材の内容</a></li>
<li><a href="http://www.direct-commu.com/text/katsuzetsu.html">ボイトレ教材の内容</a></li>
</ul>
</div><!-- end sidebar -->

<div id="sidebar">
<img src="../../common/sharedimg/sidebar/img_title_course_02.gif" alt="ダイコミュ通信講座のご受講に関して" />
<ul class="ul_01">
  <li><a href="http://www.direct-commu.com/text/price.html">料金や特徴</a></li>
  <li><a href="http://www.direct-commu.com/text/flow.html">ご購入までの流れ</a></li>
  <li><a href="http://www.direct-commu.com/text/moushikomi.html">申し込みはこちら</a></li>
  <li><a href="http://www.direct-commu.com/text/question.html">よくある質問</a></li>
  
</ul>

</div><!-- end sidebar -->
</div><!-- end sidebarwrapper -->

<div id="content">

<p class="maintitle">通信教材お申し込み完了</p>

<p class="title">通信教材を申し込み頂き有り難うございます。</p>
<p>　どうして人はコミュニケーションに対する苦手意識を持ってしまうのでしょうか？？？ 　<br />
</p>

<p class="title">Yahooメール,hotmailをご利用の方へ</p>
<p>弊社のメールが迷惑フォルダーに送信されやすくなっております。<br />
  確実に返信メールを受け取りたい方は、予め下記アドレスをアドレス帖にご登録頂くことを<br />
  お勧めします。</p>
<p><img src="../../common/sharedimg/img_address.gif" width="230" height="28" /></p>


<p class="title">迷惑フォルダに送信された場合</p>
<p>迷惑フォルダに送信された場合は、各メールボックスにある「迷惑メールではない」<br />
  ボタンを押して頂くと次回以降はスムーズにメールを受信することができます。</p>
<p class="title">送信後2日経っても返信メールが無い場合</p>
<p>弊社にメールが到達していない可能性があります。その際にはお手数ですがメールアドレスを変え、<br />
  再度メールをお送り下さい。</p>
<p>○お電話でのお問い合わせについて <br />
  　平日11～15時　 045-633-1897</p>

</div><!-- end contents -->
</div><!-- end container -->

<br class="brclear" />

<h3>認知行動療法,本,書籍,研修,セミナー 
通信講座でコミュニケーション
</h3><div id="pagetopwrapper">
<div id="pagetop">
<a href="#page_top"><img src="../../common/sharedimg/btn_pagetop.gif" width="232" height="30" /></a>
</div><!-- end pagetop -->
</div><!-- end pagetopwrapper -->
<div id="footercontaier">
<div id="footer">
<a href="http://direct-commu.com/company.html">会社概要</a> | <a href="http://direct-commu.com/privacy.html">プライバシーポリシー</a> | <a href="http://direct-commu.com/contact.html">お問い合わせ</a>
<p id="copyright">Copyright(c) 2006-2012 Direct Communication co.,Ltd all right reserved</p>

</div><!-- end footer -->
</div><!-- end footercontainer -->

<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-10783873-1");
pageTracker._trackPageview();
} catch(err) {}</script>
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
