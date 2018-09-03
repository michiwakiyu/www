<?php

//require_once("/home/direct-comm/config.php");

$db_host = "mysql501.phy.lolipop.jp";
$db_user = "LA08419899";
$db_pass = "sb4wpy";
$db_name = "LA08419899-directcomm";

mysql_connect($db_host,$db_user,$db_pass);
mysql_set_charset("utf8");
mysql_select_db($db_name);



//============================================================================
//cache_lite
//============================================================================

//Cache_lite読み込み
require_once '/home/users/2/lolipop.jp-dp58180317/web/lib/PEAR/Cache/Lite.php';

$cache_id = "http://www.direct-commu.com/colums/";

//tmpディレクトリは相対パスでないとダメ    automaticSerializationは配列格納用
$options = array('cacheDir' => './tmp/','lifeTime' => 60 * 60 * 30,'automaticSerialization' => 'true');

//キャッシュオブジェクト生成
$Cache_Lite = new Cache_Lite($options);

if ($data = $Cache_Lite -> get($cache_id)) {

	//echo "キャッシュがあります";
	$list_new = $data["list_new"];
	$list_access = $data["list_access"];	
	$list_mental = $data["list_mental"];	
	$list_relation = $data["list_relation"];	
	$list_business = $data["list_business"];	
	$list_feature= $data["list_feature"];	

}else{
	
//echo "キャッシュがない";
mysql_connect($db_host,$db_user,$db_pass);
mysql_set_charset("utf8");
mysql_select_db($db_name_colums);


//new
$sql_new = "select * from colums where flag='1' order by date desc limit 5";
$result_new = mysql_query($sql_new) or die("er_new");

$list_new = "";

//現在のunixtime
$date_now = date("Y/m/d H:i:s");
$date_now = strtotime($date_now); // unixtime


while($rows_new = mysql_fetch_array($result_new)){
	
	if($date_now - strtotime($rows_new["date"]) < 1209600){
		$icon_new = "<img src=\"../common/sharedimg/icon/icon_new.gif\" />";
	}else{
		$icon_new = "";
	}
	
	//$list_new .= "<li><a href=\"".$rows_new["url"]."\">".$rows_new["c_title"]."</a></li>";
	$list_new .= "<li>"."<span>".mb_substr($rows_new["date"],0,10,'utf-8')."</span>"."<a href=\"".$rows_new["url"]."\">".$rows_new["c_title"]."</a> ".$icon_new."</li>";
}

//access
$sql_access = "select * from colums where flag='1' order by access desc limit 5";
$result_access = mysql_query($sql_access) or die("er_access");

$list_access = "";
while($rows_access = mysql_fetch_array($result_access)){
	$list_access .= "<li>"."<span>".mb_substr($rows_access["date"],0,10,'utf-8')."</span>"."<a href=\"".$rows_access["url"]."\">".$rows_access["c_title"]."</a></li>";
}


//mental
$sql_mental = "select * from colums where flag='1' and category='mental' order by date desc limit 10";
$result_mental = mysql_query($sql_mental) or die("er_mental");

$list_mental = "";
while($rows_mental = mysql_fetch_array($result_mental)){
	$list_mental .= "<li>"."<span>".mb_substr($rows_mental["date"],0,10,'utf-8')."</span>"."<a href=\"".$rows_mental["url"]."\">".$rows_mental["c_title"]."</a></li>";
}

//relation
$sql_relation = "select * from colums where flag='1' and category='relation' order by date desc limit 8";
$result_relation = mysql_query($sql_relation) or die("er_relation");

$list_relation = "";
while($rows_relation = mysql_fetch_array($result_relation)){
	$list_relation .= "<li>"."<span>".mb_substr($rows_relation["date"],0,10,'utf-8')."</span>"."<a href=\"".$rows_relation["url"]."\">".$rows_relation["c_title"]."</a></li>";
}

//business
$sql_business = "select * from colums where flag='1' and category='business' order by date desc limit 10";
$result_business = mysql_query($sql_business) or die("er_business");

$list_business = "";
while($rows_business = mysql_fetch_array($result_business)){
	$list_business .= "<li>"."<span>".mb_substr($rows_business["date"],0,10,'utf-8')."</span>"."<a href=\"".$rows_business["url"]."\">".$rows_business["c_title"]."</a></li>";
}

//feature
$sql_feature = "select * from colums where flag='1' and category='feature' order by date desc limit 10";
$result_feature = mysql_query($sql_feature) or die("er_feature");

$list_feature = "";
while($rows_feature = mysql_fetch_array($result_feature)){
	$list_feature .= "<li>"."<span>".mb_substr($rows_feature["date"],0,10,'utf-8')."</span>"."<a href=\"".$rows_feature["url"]."\">".$rows_feature["c_title"]."</a></li>";
}



$data["list_new"] = $list_new;
$data["list_access"] = $list_access;
$data["list_mental"] = $list_mental;
$data["list_relation"] = $list_relation;
$data["list_business"] = $list_business;
$data["list_feature"] = $list_feature;

$Cache_Lite->save($data,$cache_id);

}//end cache



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="description" content="ダイレクトコミュニケーションの話し方教室の評判はまずはコラムからお試しあれ">
<meta name="keywords" content="ダイレクトコミュニケーション,話し方教室,評判">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="author" content="株式会社ダイレクトコミュニケーション" /><title>ダイレクトコミュニケーション,話し方教室の評判はコラムから</title>

<link href="../common/css/base.css" rel="stylesheet" type="text/css" media="all" />
<link href="../common/css/header.css" rel="stylesheet" type="text/css" media="all" />
<link href="../common/css/sidebar.css" rel="stylesheet" type="text/css" media="all" />
<link href="../common/css/footer.css" rel="stylesheet" type="text/css" media="all" />
<link href="../common/css/content.css" rel="stylesheet" type="text/css" media="all" />
<link href="../common/css/colums.css" rel="stylesheet" type="text/css" media="all" />


<script type="text/javascript" src="../common/js/smoothscroll.js"></script>
<script type="text/javascript" src="../common/js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="../common/js/jquery.validate.js"></script>
<script type="text/javascript" src="../common/js/fadein.js"></script>


</head>

<body>
<a name="page_top"></a>

<div id="header">
<div id="headercontainer">

<div id="headerright"><!-- --></div>
<div id="logowrap"><a href="http://www.direct-commu.com/"><img src="../common/sharedimg/logo_directcomm.gif" alt="ダイレクトコミュニケーション能力,話し方教室" /></a></div>
<ul>
<li><a href="http://www.direct-commu.com/reqruit/teacher.html">講師・心理士 募集</a></li>
<li><a href="http://www.direct-commu.com/reqruit/assistant.html">アシスタント 募集</a></li>
<li><a href="http://www.direct-commu.com/company/contact.html">お問い合わせ</a></li></ul>
</div><!-- end headercontainer -->

<ul id="gnav">
<li id="home"><a href="http://www.direct-commu.com/">ホーム</a></li>
<li id="course"><a href="http://www.direct-commu.com/course/">コミュニケーション講座</a></li>
<li id="text"><a href="http://www.direct-commu.com/text/">ダイコミュ通信講座</a></li>
<li id="ability"><a href="http://xn--zckzah9129bsdgbusdye.jp/">コミュニケーション能力診断</a></li>
<li id="colums"><a href="http://www.direct-commu.com/colums/" class="selected">コミュニケーションコラム集</a></li>
<li id="skillup"><a href="http://www.direct-commu.com/skillup/">スキルアップ道場</a></li>
<li id="event"><a href="http://www.direct-commu.com/event/">ダイコミュイベント</a></li>
<li id="teacher"><a href="http://www.direct-commu.com/profile/">講師紹介</a></li>
</ul><!-- end gnav -->
</div><!-- end header -->

<div id="topicpath">

<div id="topicleft"><a href="http://www.direct-commu.com/">ホーム</a> > <h1>ダイレクトコミュニケーション,評判のコラム集</h1></div><!-- end topicleft -->
<div id="topicright">
  <h2>ダイレクトコミュニケーション,話し方教室の評判はコラムから</h2>
</div><!-- end topicright -->
</div><!-- end topicpath -->


<div id="container">

<div id="sidebar">
<a href="http://www.direct-commu.com/colums/mental/"><img src="../common/sharedimg/colums/img_title_colums_new.gif" width="290" height="44" alt="メンタルコラムタイトル" /></a>
<div class="nav">
<ul style="margin-top: 0">
<!--<?=$list_new?>-->
<?=str_replace("www.direct-commu.com","www.direct-commu.com",$list_new)?>

</ul>

<p style="text-align: center"><a href="http://www.direct-commu.com/course/mailmag.html"><img src="../common/sharedimg/btn_mailmag_2.gif" alt="コミュニケーションメールマガジン" /></a></p>

</div><!-- end nav -->

<div class="navbottom"></div><!-- end navbottom -->






</div><!-- end sidebar -->

<hr class="clear" />

<div id="content">
<div id="contenttop"><!-- --></div><!-- end contenttop -->

<div class="main">

<div id="keyvisual"><img src="../common/sharedimg/colums/img_keyvisual_colums.jpg" width="680" height="216" /></div><!-- end keyisual -->

<p class="title_01">コミュニケーションの知恵袋　入門編</p>
<div class="wrap">
<p><span class="title_01"><a href="intro/intro_01.html">入門知恵袋１　コミュニケーション能力ってなんぞや？</a></span></p>
<p><span class="title_01"><a href="intro/intro_02.html">入門知恵袋２　３つのポイントを抑えれば充分</a></span></p>
<p><span class="title_01"><a href="intro/intro_03.html">入門知恵袋3　コミュニケーション能力に高い・低いはない！</a></span></p>
<p><span class="title_01"><a href="intro/intro_04.html">入門知恵袋４　効果的にトレーニングをするために</a></span></p>
</div><!-- end wrap -->



<p class="title_01">メンタルスキルコラム</p>
<div class="wrap">
<ul class="normal_list">
<!--<?=$list_mental?>-->
<?=str_replace("www.direct-commu.com","www.direct-commu.com",$list_mental)?>
</ul>
<p><a href="./mental/">全て見る&gt;&gt;</a></p>
</div><!-- end wrap -->

<p class="title_01">人間関係スキルコラム</p>
<div class="wrap">
<ul class="normal_list">
<!--<?=$list_relation?>-->
<?=str_replace("www.direct-commu.com","www.direct-commu.com",$list_relation)?>
</ul>
<p><a href="./relation/">全て見る&gt;&gt;</a></p>

</div><!-- end wrap -->

<p class="title_01">ビジネススキルコラム</p>
<div class="wrap">
<ul class="normal_list">
<!--<?=$list_business?>-->
<?=str_replace("www.direct-commu.com","www.direct-commu.com",$list_business)?>
</ul>
<p><a href="./business/">全て見る&gt;&gt;</a></p>

</div><!-- end wrap -->

<p class="title_01">特集コラム</p>
<div class="wrap">
<ul class="normal_list">
<!--<?=$list_feature?>-->
<?=str_replace("www.direct-commu.com","www.direct-commu.com",$list_feature)?>
</ul>
<p><a href="./feature/">全て見る&gt;&gt;</a></p>
</div><!-- end wrap -->



</div><!-- end main -->
<div id="bg_contentbottom"><!-- --></div>


</div>
<!-- end content -->


</div><!-- end container -->

<br class="brclear" />

<br class="brclear" />

<h3>ダイレクトコミュニケーション,話し方教室の評判はコラムから</h3>
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
