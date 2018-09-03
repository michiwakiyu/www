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
$sql_3 = "select * from colums_u where theme='3 好意の法則' and flag='1' order by date desc";
$result_3 = mysql_query($sql_3) or die("e1");

$list_3 = "";

while($rows_3 = mysql_fetch_array($result_3)){
	$list_3 .= "<li><span>".mb_substr($rows_3["date"],0,10,'utf-8')."</span><a href=\"".$rows_3["url"]."\">".$rows_3["c_title"]."</a></li>";
}

//2
$sql_2 = "select * from colums_u where theme='2 他者肯定と自己開示' and flag='1' order by date desc";
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
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<META name="description" content="職場や恋愛の人間関係で悩む人に役立つ、コミュニケーション能力向上のためのトレーニング法を紹介しています。">
<META name="keywords" content="人間関係,コミュニケーション能力,職場,恋愛,悩み,トレーニング">

<title>人間関係スキルコラム一覧</title>
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
<div id="topicpath"><a href="http://www.direct-commu.com/">トップ</a> > <a href="http://www.direct-commu.com/colums/">コミュニケーション知恵袋</a> > <span>人間関係スキルコラム一覧</span></div>

<section>
<h2 class="arrow01">
<div>人間関係スキルコラム一覧</div></h2>
<div class="text">

<p class="title">11　誤解はなぜ起こるのか？</p>
<ul class="list02">
<?=$list_11?>
<!--<?=str_replace('http://www.direct-commu.com','http://www.direct-commu.com',$list_11)?>-->
</ul>

<p class="title">10　雑談の中の浅い話と深い話</p>
<ul class="list02">
<?=$list_10?>
<!--<?=str_replace('http://www.direct-commu.com','http://www.direct-commu.com',$list_10)?>-->

</ul>

<p class="title">9　傾聴</p>
<ul class="list02">
<?=$list_9?>
<!--<?=str_replace('http://www.direct-commu.com','http://www.direct-commu.com',$list_9)?>-->

</ul>

<p class="title">8　口癖</p>
<ul class="list02">
<?=$list_8?>
<!--<?=str_replace('http://www.direct-commu.com','http://www.direct-commu.com',$list_8)?>-->

</ul>

<p class="title">7　しぐさ</p>
<ul class="list02">
<?=$list_7?>
<!--<?=str_replace('http://www.direct-commu.com','http://www.direct-commu.com',$list_7)?>-->

</ul>

<p class="title">6　外見とコミュニケーション</p>
<ul class="list02">
<?=$list_6?>
<!--<?=str_replace('http://www.direct-commu.com','http://www.direct-commu.com',$list_6)?>-->

</ul>

<p class="title">5　集団とコミュニケーション</p>
<ul class="list02">
<?=$list_5?>
<!--<?=str_replace('http://www.direct-commu.com','http://www.direct-commu.com',$list_5)?>-->

</ul>

<p class="title">4　相手の心理を読み取る</p>
<ul class="list02">
<?=$list_4?>
<!--<?=str_replace('http://www.direct-commu.com','http://www.direct-commu.com',$list_4)?>-->

</ul>

<p class="title">3　好意の法則</p>
<ul class="list02">
<?=$list_3?>
<!--<?=str_replace('http://www.direct-commu.com','http://www.direct-commu.com',$list_3)?>-->

</ul>

<p class="title">2　他者肯定と自己開示</p>
<ul class="list02">
<?=$list_2?>
<!--<?=str_replace('http://www.direct-commu.com','http://www.direct-commu.com',$list_2)?>-->

</ul>

<p class="title">1　コミュニケーション能力</p>
<ul class="list02">
<?=$list_1?>
<!--<?=str_replace('http://www.direct-commu.com','http://www.direct-commu.com',$list_1)?>-->

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
