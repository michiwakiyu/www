<?php

//require_once("/home/direct-commu/config.php");

/*mysql_connect($db_host,$db_user,$db_pass);
mysql_set_charset("utf8");
mysql_select_db($db_name_colums);*/


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
$cache_id = "http://www.direct-commu.com/business/";

//tmpディレクトリは相対パスでないとダメ    automaticSerializationは配列格納用
$options = array('cacheDir' => './tmp/','lifeTime' => 60 * 60 * 30,'automaticSerialization' => 'true');

//キャッシュオブジェクト生成
$Cache_Lite = new Cache_Lite($options);

if ($data = $Cache_Lite -> get($cache_id)) {
	
	//echo "キャッシュがあります";
	$list_new_business= $data["list_new_business"];

	$list_1= $data["list_1"];
	$list_2= $data["list_2"];
	$list_3= $data["list_3"];
	$list_4= $data["list_4"];
	$list_5= $data["list_5"];

}else{
	
	//echo "キャッシュがないです";


$sql_new_business = "select * from colums_u where category='business' and flag='1' order by date desc limit 10";
$result_new_business = mysql_query($sql_new_business) or die("em");
$list_new_business = "";

while($rows_new_business = mysql_fetch_array($result_new_business)){
	
	$list_new_business .= "<li><span>".mb_substr($rows_new_business["date"],0,10,'utf-8')."</span><a href=\"".$rows_new_business["url"]."\">".$rows_new_business["c_title"]."</a></li>";
	
}


//5
$sql_5 = "select * from colums_u where theme='5　学習すること' and flag='1' order by date desc";
$result_5 = mysql_query($sql_5) or die("e1");

$list_5 = "";

while($rows_5 = mysql_fetch_array($result_5)){
	$list_5 .= "<li><span>".mb_substr($rows_5["date"],0,10,'utf-8')."</span><a href=\"".$rows_5["url"]."\">".$rows_5["c_title"]."</a></li>";
}

//4
$sql_4 = "select * from colums_u where theme='4　販売員のセールストレーニング' and flag='1' order by date desc";
$result_4 = mysql_query($sql_4) or die("e1");

$list_4 = "";

while($rows_4 = mysql_fetch_array($result_4)){
	$list_4 .= "<li><span>".mb_substr($rows_4["date"],0,10,'utf-8')."</span><a href=\"".$rows_4["url"]."\">".$rows_4["c_title"]."</a></li>";
}

//3
$sql_3 = "select * from colums_u where theme='3　チームコミュニケーション' and flag='1' order by date desc";
$result_3 = mysql_query($sql_3) or die("e1");

$list_3 = "";

while($rows_3 = mysql_fetch_array($result_3)){
	$list_3 .= "<li><span>".mb_substr($rows_3["date"],0,10,'utf-8')."</span><a href=\"".$rows_3["url"]."\">".$rows_3["c_title"]."</a></li>";
}

//2
$sql_2 = "select * from colums_u where theme='2　ビジネスコミュニケーション' and flag='1' order by date desc";
$result_2 = mysql_query($sql_2) or die("e1");

$list_2 = "";

while($rows_2 = mysql_fetch_array($result_2)){
	$list_2 .= "<li><span>".mb_substr($rows_2["date"],0,10,'utf-8')."</span><a href=\"".$rows_2["url"]."\">".$rows_2["c_title"]."</a></li>";
}

//1
$sql_1 = "select * from colums_u where theme='1　ビジネスマナー' and flag='1' order by date desc";
$result_1 = mysql_query($sql_1) or die("e1");

$list_1 = "";

while($rows_1 = mysql_fetch_array($result_1)){
	$list_1 .= "<li><span>".mb_substr($rows_1["date"],0,10,'utf-8')."</span><a href=\"".$rows_1["url"]."\">".$rows_1["c_title"]."</a></li>";
}


$data["list_new_business"] = $list_new_business;

$data["list_1"] = $list_1;
$data["list_2"] = $list_2;
$data["list_3"] = $list_3;
$data["list_4"] = $list_4;
$data["list_5"] = $list_5;


$Cache_Lite->save($data,$cache_id);

}// end cache



?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<META name="description" content="職場や恋愛の人間関係で悩む人に役立つ、コミュニケーション能力向上のためのトレーニング法を紹介しています。">
<META name="keywords" content="人間関係,コミュニケーション能力,職場,恋愛,悩み,トレーニング">

<title>ビジネススキルコラム一覧</title>
<link href="../../sp_common/css/base.css" rel="stylesheet" type="text/css" media="all" />
<link href="../../sp_common/css/layout.css" rel="stylesheet" type="text/css" media="all" />
<link href="../../sp_common/css/colums.css" rel="stylesheet" type="text/css" media="all" />


<link rel="shortcut icon" href="http://www.direct-commu.com/favicon.ico" />

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />

<script type="text/javascript" src="../../sp_common/js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="../../sp_common/js/jquery.validate.js"></script>

</head>

<body>
<a name="page_top"></a>

<header class="after_clear">
<div class="header_l"><div class="img_l"><img src="../../sp_common/images/illust_header_l.png" width="50" height="70"></div></div><!-- end header_l -->
<div class="header_c"><a href="http://www.direct-commu.com"><h1><img src="../../sp_common/images/logo_sp_directcomm.png" width="233" height="41" alt="ダイレクトコミュニケーション" /></h1></a></div><!-- end header_c -->
<div class="header_r"><div class="img_r"><img src="../../sp_common/images/illust_header_r.png" width="95" height="61"></div></div><!-- end header_r -->
</header>


<ul id="menu" class="after_clear">
<li id="intro"><a href="http://www.direct-commu.com/course/1_intro.html" class="btn_topleft">はじめての方へ</a></li>
<li id="training"><a href="http://www.direct-commu.com/training/" class="btn_right"><span>コミュニケーション</span>トレーニング</a></li>
<li id="course"><a href="http://www.direct-commu.com/course/"><span>コミュニケーション</span>講座</a></li>
<li id="colums"><a href="http://www.direct-commu.com/colums/" class="btn_right selected"><span>コミュニケーション</span>知恵袋</a></li>
<li id="text"><a href="http://www.direct-commu.com/text/"><span>ダイコミュ</span>通信講座</a></li>
<li id="teacher"><a href="http://www.direct-commu.com/profile/" class="btn_right"><span>ダイコミュ</span>講師紹介</a></li>
<li id="event"><a href="http://www.direct-commu.com/event/" class="btn_bottom">イベント</a></li>
<li id="contact"><a href="http://www.direct-commu.com/company/contact.html" class="btn_right btn_bottom">お問い合わせ</a></li>
</ul>

<br class="brclear" />
<div id="topicpath"><a href="http://www.direct-commu.com/">トップ</a> > <a href="http://www.direct-commu.com/colums/">コミュニケーション知恵袋</a> > <span>ビジネスコラム</span></div>

<section>
<h2 class="arrow01"><div>ビジネスコラム</div></h2>
<div class="text">

<p class="title">5　学習すること</p>
<ul class="list02">
<!--<?=$list_5?>-->
<?=str_replace('http://www.direct-commu.com','http://www.direct-commu.com',$list_5)?>

</ul>

<p class="title">4　販売員のセールストレーニング</p>
<ul class="list02">
<!--<?=$list_4?>-->
<?=str_replace('http://www.direct-commu.com','http://www.direct-commu.com',$list_4)?>
</ul>

<p class="title">3　チームコミュニケーション</p>
<ul class="list02">
<!--<?=$list_3?>-->
<?=str_replace('http://www.direct-commu.com','http://www.direct-commu.com',$list_3)?>

</ul>

<p class="title">2　ビジネスコミュニケーション</p>
<ul class="list02">
<!--<?=$list_2?>-->
<?=str_replace('http://www.direct-commu.com','http://www.direct-commu.com',$list_2)?>

</ul>
	
<p class="title">1　ビジネスマナー</p>
<ul class="list02">
<!--<?=$list_1?>-->
<?=str_replace('http://www.direct-commu.com','http://www.direct-commu.com',$list_1)?>

</ul>


</div><!-- end text -->
</section>





<div class="to_page_top"><a href="">このページのTOPへ</a></div>
<footer id="footer">
<p><a onclick='document.cookie="mode=pc;path=/;"; window.location.reload();' href="#">PC版</a>　/　スマートフォン版</p>
<div id="copyright">&copy; Direct Communication, Inc.<br>
	All Rights Reserved.</div>
</footer>

<!--<script type="text/javascript" src="../../common/js/image.js"></script>-->
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
