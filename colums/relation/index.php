<?php


$db_host = "mysql501.phy.lolipop.jp";
$db_user = "LA08419899";
$db_pass = "6B87rrUc";
$db_name = "LA08419899-directcomm";

mysql_connect($db_host,$db_user,$db_pass);
mysql_set_charset("utf8");
mysql_select_db($db_name);



//============================================================================
//cache_lite
//============================================================================

//Cache_lite読み込み
require_once '/home/users/2/lolipop.jp-dp58180317/web/lib/PEAR/Cache/Lite.php';
$cache_id = "http://www.direct-commu.com/relation/";

//tmpディレクトリは相対パスでないとダメ    automaticSerializationは配列格納用
$options = array('cacheDir' => './tmp/','lifeTime' => 60 * 60 * 30,'automaticSerialization' => 'true');

//キャッシュオブジェクト生成
$Cache_Lite = new Cache_Lite($options);

if ($data = $Cache_Lite -> get($cache_id)) {
	//echo "キャッシュがあります";
	$list_new_relation= $data["list_new_relation"];
	
	$list_1= $data["list_1"];
	$list_2= $data["list_2"];
	$list_3= $data["list_3"];
	$list_4= $data["list_4"];
	$list_5= $data["list_5"];
	$list_6= $data["list_6"];
	$list_7= $data["list_7"];
	$list_8= $data["list_8"];
	$list_9= $data["list_9"];
	$list_10= $data["list_10"];
	$list_11= $data["list_11"];
	
}else{
	
	//echo "キャッシュがないです";
$sql_new_relation = "select * from colums_u where category='relation' and flag='1' order by date desc limit 10";
$result_new_relation = mysql_query($sql_new_relation) or die("em");
$list_new_relation = "";

while($rows_new_relation = mysql_fetch_array($result_new_relation)){
	
	$list_new_relation .= "<li><span>".mb_substr($rows_new_relation["date"],0,10,'utf-8')."</span><a href=\"".$rows_new_relation["url"]."\">".$rows_new_relation["c_title"]."</a></li>";
	
}


//11
$sql_11 = "select * from colums_u where theme='11 誤解はなぜ起こるのか？' and flag='1' order by date desc";
$result_11 = mysql_query($sql_11) or die("e1");

$list_11 = "";

while($rows_11 = mysql_fetch_array($result_11)){
	$list_11 .= "<li><span>".mb_substr($rows_11["date"],0,10,'utf-8')."</span><a href=\"".$rows_11["url"]."\">".$rows_11["c_title"]."</a></li>";
}

//10
$sql_10 = "select * from colums_u where theme='10 浅い話と深い話' and flag='1' order by date desc";
$result_10 = mysql_query($sql_10) or die("e1");

$list_10 = "";

while($rows_10 = mysql_fetch_array($result_10)){
	$list_10 .= "<li><span>".mb_substr($rows_10["date"],0,10,'utf-8')."</span><a href=\"".$rows_10["url"]."\">".$rows_10["c_title"]."</a></li>";
}

//9
$sql_9 = "select * from colums_u where theme='9 傾聴' and flag='1' order by date desc";
$result_9 = mysql_query($sql_9) or die("e1");

$list_9 = "";

while($rows_9 = mysql_fetch_array($result_9)){
	$list_9 .= "<li><span>".mb_substr($rows_9["date"],0,10,'utf-8')."</span><a href=\"".$rows_9["url"]."\">".$rows_9["c_title"]."</a></li>";
}

//8
$sql_8 = "select * from colums_u where theme='8 口癖' and flag='1' order by date desc";
$result_8 = mysql_query($sql_8) or die("e1");

$list_8 = "";

while($rows_8 = mysql_fetch_array($result_8)){
	$list_8 .= "<li><span>".mb_substr($rows_8["date"],0,10,'utf-8')."</span><a href=\"".$rows_8["url"]."\">".$rows_8["c_title"]."</a></li>";
}

//7
$sql_7 = "select * from colums_u where theme='7 しぐさ' and flag='1' order by date desc";
$result_7 = mysql_query($sql_7) or die("e1");

$list_7 = "";

while($rows_7 = mysql_fetch_array($result_7)){
	$list_7 .= "<li><span>".mb_substr($rows_7["date"],0,10,'utf-8')."</span><a href=\"".$rows_7["url"]."\">".$rows_7["c_title"]."</a></li>";
}

//6
$sql_6 = "select * from colums_u where theme='6 外見とコミュニケーション' and flag='1' order by date desc";
$result_6 = mysql_query($sql_6) or die("e1");

$list_6 = "";

while($rows_6 = mysql_fetch_array($result_6)){
	$list_6 .= "<li><span>".mb_substr($rows_6["date"],0,10,'utf-8')."</span><a href=\"".$rows_6["url"]."\">".$rows_6["c_title"]."</a></li>";
}

//5
$sql_5 = "select * from colums_u where theme='5 集団とコミュニケーション' and flag='1' order by date desc";
$result_5 = mysql_query($sql_5) or die("e1");

$list_5 = "";

while($rows_5 = mysql_fetch_array($result_5)){
	$list_5 .= "<li><span>".mb_substr($rows_5["date"],0,10,'utf-8')."</span><a href=\"".$rows_5["url"]."\">".$rows_5["c_title"]."</a></li>";
}

//4
$sql_4 = "select * from colums_u where theme='4 相手の心理を読み取る' and flag='1' order by date desc";
$result_4 = mysql_query($sql_4) or die("e1");

$list_4 = "";

while($rows_4 = mysql_fetch_array($result_4)){
	$list_4 .= "<li><span>".mb_substr($rows_4["date"],0,10,'utf-8')."</span><a href=\"".$rows_4["url"]."\">".$rows_4["c_title"]."</a></li>";
}

//3
$sql_3 = "select * from colums_u where theme='3 他者との良好な関係２' and flag='1' order by date desc";
$result_3 = mysql_query($sql_3) or die("e1");

$list_3 = "";

while($rows_3 = mysql_fetch_array($result_3)){
	$list_3 .= "<li><span>".mb_substr($rows_3["date"],0,10,'utf-8')."</span><a href=\"".$rows_3["url"]."\">".$rows_3["c_title"]."</a></li>";
}

//2
$sql_2 = "select * from colums_u where theme='2 他者との良好な関係' and flag='1' order by date desc";
$result_2 = mysql_query($sql_2) or die("e1");

$list_2 = "";

while($rows_2 = mysql_fetch_array($result_2)){
	$list_2 .= "<li><span>".mb_substr($rows_2["date"],0,10,'utf-8')."</span><a href=\"".$rows_2["url"]."\">".$rows_2["c_title"]."</a></li>";
}

//1
$sql_1 = "select * from colums_u where theme='1　コミュニケーション能力' and flag='1' order by date desc";
$result_1 = mysql_query($sql_1) or die("e1");

$list_1 = "";

while($rows_1 = mysql_fetch_array($result_1)){
	$list_1 .= "<li><span>".mb_substr($rows_1["date"],0,10,'utf-8')."</span><a href=\"".$rows_1["url"]."\">".$rows_1["c_title"]."</a></li>";
}


$data["list_new_relation"] = $list_new_relation;
$data["list_1"] = $list_1;
$data["list_2"] = $list_2;
$data["list_3"] = $list_3;
$data["list_4"] = $list_4;
$data["list_5"] = $list_5;
$data["list_6"] = $list_6;
$data["list_7"] = $list_7;
$data["list_8"] = $list_8;
$data["list_9"] = $list_9;
$data["list_10"] = $list_10;
$data["list_11"] = $list_11;

$Cache_Lite->save($data,$cache_id);

}// end cache


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<META name="description" content="職場や恋愛の人間関係で悩む人に役立つ、コミュニケーション能力向上のためのトレーニング法を紹介しています。">
<META name="keywords" content="人間関係,コミュニケーション能力,職場,恋愛,悩み,トレーニング">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="author" content="株式会社ダイレクトコミュニケーション" /><title>人間関係スキルコラム一覧</title>

<link href="../../common/css/base.css" rel="stylesheet" type="text/css" media="all" />
<link href="../../common/css/header.css" rel="stylesheet" type="text/css" media="all" />
<link href="../../common/css/sidebar.css" rel="stylesheet" type="text/css" media="all" />
<link href="../../common/css/footer.css" rel="stylesheet" type="text/css" media="all" />
<link href="../../common/css/content.css" rel="stylesheet" type="text/css" media="all" />
<link href="../../common/css/colums.css" rel="stylesheet" type="text/css" media="all" />


<script type="text/javascript" src="../../common/js/smoothscroll.js"></script>
<script type="text/javascript" src="../../common/js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="../../common/js/jquery.validate.js"></script>
<script type="text/javascript" src="../../common/js/fadein.js"></script>
<script type="text/javascript" src="../../common/js/onoff.js"></script>
<script type="text/javascript" src="../../common/js/smart-crossfade.js"></script>


</head>

<body>
<a name="page_top"></a>

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
<li id="course"><a href="http://www.direct-commu.com/course/">コミュニケーション講座</a></li>
<li id="text"><a href="http://www.direct-commu.com/text/">ダイコミュ通信講座</a></li>
<li id="training"><a href="http://www.direct-commu.com/training/">コミュニケーション能力トレーニング</a></li>
<li id="ability"><a href="http://xn--zckzah9129bsdgbusdye.jp/">コミュニケーション能力診断</a></li>
<li id="colums"><a href="http://www.direct-commu.com/colums/" class="selected">コミュニケーションコラム集</a></li>
<li id="event"><a href="http://www.direct-commu.com/event/">ダイコミュイベント</a></li>
<li id="teacher"><a href="http://www.direct-commu.com/profile/">講師紹介</a></li>
</ul><!-- end gnav -->
</div><!-- end header -->

<div id="topicpath">

<div id="topicleft"><a href="http://www.direct-commu.com/">ホーム</a> > <a href="http://www.direct-commu.com/colums/">コミュニケーション知恵袋</a> > 
  <h1>人間関係スキルコラム</h1>
</div><!-- end topicleft -->
<div id="topicright">
  <h2>悩み解消！職場・恋愛・結婚　人間関係が楽しくなる♪</h2>
</div><!-- end topicright -->
</div><!-- end topicpath -->


<div id="container">

<div id="sidebar">
<a href="http://www.direct-commu.com/colums/relation/"><img src="../../common/sharedimg/colums/img_title_colums_ningenkankei.gif" width="290" height="44" alt="人間関係コラムタイトル" /></a>
<div class="nav">
<ul style="margin-top: 0">
<?=$list_new_relation?>

</ul>

</div><!-- end nav -->

<div class="navbottom"><!-- --></div><!-- end navbottom -->




</div><!-- end sidebar -->

<hr class="clear" />

<div id="content">
<div id="contenttop"><!-- --></div><!-- end contenttop -->

<div class="main">
  <p class="title_01">人間関係スキルコラム一覧</p>
<div class="wrap">

<p class="title">11　誤解はなぜ起こるのか？</p>
<ul class="normal_list">
<?=$list_11?>
<!--<?=str_replace('http://www.direct-commu.com','http://www.direct-commu.com',$list_11)?>-->
</ul>

<p class="title">10　雑談の中の浅い話と深い話</p>
<ul class="normal_list">
<?=$list_10?>
<!--<?=str_replace('http://www.direct-commu.com','http://www.direct-commu.com',$list_10)?>-->

</ul>

<p class="title">9　傾聴</p>
<ul class="normal_list">
<?=$list_9?>
<!--<?=str_replace('http://www.direct-commu.com','http://www.direct-commu.com',$list_9)?>-->

</ul>

<p class="title">8　口癖</p>
<ul class="normal_list">
<?=$list_8?>
<!--<?=str_replace('http://www.direct-commu.com','http://www.direct-commu.com',$list_8)?>-->

</ul>

<p class="title">7　しぐさ</p>
<ul class="normal_list">
<?=$list_7?>
<!--<?=str_replace('http://www.direct-commu.com','http://www.direct-commu.com',$list_7)?>-->

</ul>

<p class="title">6　外見とコミュニケーション</p>
<ul class="normal_list">
<?=$list_6?>
<!--<?=str_replace('http://www.direct-commu.com','http://www.direct-commu.com',$list_6)?>-->

</ul>

<p class="title">5　集団とコミュニケーション</p>
<ul class="normal_list">
<?=$list_5?>
<!--<?=str_replace('http://www.direct-commu.com','http://www.direct-commu.com',$list_5)?>-->

</ul>

<p class="title">4　相手の心理を読み取る</p>
<ul class="normal_list">
<?=$list_4?>
<!--<?=str_replace('http://www.direct-commu.com','http://www.direct-commu.com',$list_4)?>-->

</ul>

<p class="title">3　他者との良好な関係２</p>
<ul class="normal_list">
<?=$list_3?>
<!--<?=str_replace('http://www.direct-commu.com','http://www.direct-commu.com',$list_3)?>-->

</ul>

<p class="title">2　他者との良好な関係</p>
<ul class="normal_list">
<?=$list_2?>
<!--<?=str_replace('http://www.direct-commu.com','http://www.direct-commu.com',$list_2)?>-->

</ul>

<p class="title">1　コミュニケーション能力</p>
<ul class="normal_list">
<?=$list_1?>
<!--<?=str_replace('http://www.direct-commu.com','http://www.direct-commu.com',$list_1)?>-->

</ul>


</div><!-- end wrap -->

</div><!-- end main -->
<div id="bg_contentbottom"><!-- --></div>


</div><!-- end content -->


</div><!-- end container -->

<br class="brclear" />

<br class="brclear" />

<h3>会話が続かないのはなぜ？改善法を学ぼう,デート,術 
人間関係を楽しもう♪</h3>
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
