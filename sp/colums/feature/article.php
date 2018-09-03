<?php

//session_start();

//require_once("/home/direct-commu/config.php");

$db_host = "mysql501.phy.lolipop.jp";
$db_user = "LA08419899";
$db_pass = "6B87rrUc";
$db_name = "LA08419899-directcomm";

mysql_connect($db_host,$db_user,$db_pass);
mysql_select_db($db_name);


//============================================================================
//c_id取得
//============================================================================

$c_id = $_GET["c_id"];
//$c_id = "mental_001_02_kokoro-kara2";


//============================================================================
//access
//============================================================================

/*
if(isset($_SESSION["c_id"])){
	//nothing to do
}else{		
	mysql_connect($db_host,$db_user,$db_pass);
	mysql_set_charset("utf8");
	mysql_select_db($db_name);
	
	$sql_update = "update colums_u set access=access+1 where url='http://www.direct-commu.com/colums/mental/".$c_id.".html'";
	
	//echo $sql_update;
	mysql_query($sql_update) or die("er");
	
	$_SESSION["c_id"] = $c_id;
		
}
*/

if(!isset($HTTP_COOKIE_VARS["$c_id"])){
	
	mysql_connect($db_host,$db_user,$db_pass);
	mysql_set_charset("utf8");
	mysql_select_db($db_name_colums);
	
	$sql_update = "update colums_u set access=access+1 where url='http://www.direct-commu.com/colums/feature/".$c_id.".html'";
	
	//echo $sql_update;
	mysql_query($sql_update) or die("er");
	
	//cookieをset
	$count = 1;
	setcookie($c_id,$count,time()+60); //60秒

}else{
	
	//nothing to do
	//echo "cookie already set";
}

//============================================================================
//cache_lite
//============================================================================

//Cache_lite読み込み
require_once '/home/users/2/lolipop.jp-dp58180317/web/lib/PEAR/Cache/Lite.php';



$cache_id = $c_id;

//3時間　60 * 60 * 3
//30秒   30

//tmpディレクトリは相対パスでないとダメ    automaticSerializationは配列格納用
$options = array('cacheDir' => './tmp/','lifeTime' => 60 * 60 * 30,'automaticSerialization' => 'true');

//キャッシュオブジェクト生成
$Cache_Lite = new Cache_Lite($options);

if ($data = $Cache_Lite -> get($cache_id)) {

	//echo "キャッシュがあります";
	
	$list_new = $data["list_new"];
	$list_same = $data["list_same"];	
	
	$category = $data["category"];
	$theme = $data["theme"];
	$tag = $data["tag"];
	$h1  = $data["h1"];
	$h2 = $data["h2"];
	$h3 = $data["h3"];
	$keywords = $data["keywords"];
	$description = $data["description"];
	$title = $data["title"];
	$c_title = $data["c_title"];
	$c_contents = $data["c_contents"];
	$photo1 = $data["photo1"];
	$photo2 = $data["photo2"];
	$photo3 = $data["photo3"];
	$access = $data["access"];
	$url = $data["url"];
	$date = $data["date"];
	$id = $data["id"];

}else{
	
	//echo "キャッシュがないです";

//============================================================================
//db
//============================================================================

mysql_connect($db_host,$db_user,$db_pass);
mysql_set_charset("utf8");
mysql_select_db($db_name_colums);

//
$sql = "select * from colums_u where url like '%".$c_id."%' and flag='1'";
$result = mysql_query($sql) or die("e");
$rows = mysql_fetch_array($result);

$category = $rows["category"];
$theme = $rows["theme"];
$tag = $rows["tag"];
$h1 = $rows["h1"];
$h2 = $rows["h2"];
$h3 = $rows["h3"];
$keywords = $rows["keywords"];
$description = $rows["description"];
$title = $rows["title"];
$c_title = $rows["c_title"];
$c_contents = $rows["c_contents"];
$photo1 = $rows["photo1"];
$photo2 = $rows["photo2"];
$photo3 = $rows["photo3"];
$access = $rows["access"];
$url = $rows["url"];
$date = $rows["date"];
$flag = $rows["flag"];
$id = $rows["id"];

//同テーマコラム取得

$list_same = "";

$sql_same = "select * from colums_u where theme='".$theme."' order by date asc";
$result_same = mysql_query($sql_same) or die("e_same");

while($rows_same = mysql_fetch_array($result_same)){
	
	$list_same .= "<li><span>".mb_substr($rows_same["date"],0,10,'utf-8')."</span>"."<a href=\"".$rows_same["url"]."\">".$rows_same["c_title"]."</a></li>";
	
	//$list_same .= "<li><span>".mb_substr($rows_same["date"],0,10,'utf-8')."</span>"."<a href=\"".$rows_same["url"]."\">".$rows_same["c_title"]."</a></li>";
	
}




//新着コラム取得

$sql_new = "select * from colums_u where flag='1' order by date desc limit 10";
//$sql_new = "select * from colums_u order by date asc";

$result_new = mysql_query($sql_new) or die("e2");

$list_new = "";

while($rows_new = mysql_fetch_array($result_new)){
	
	$list_new .= "<li><span>".mb_substr($rows_new["date"],0,10,'utf-8')."</span>"."<a href=\"".$rows_new["url"]."\">".$rows_new["c_title"]."</a></li>";	
}	


	
	$data["list_new"] = $list_new;
	$data["list_same"] = $list_same;
		
	$data["theme"] = $theme;
	$data["tag"] = $tag;
	$data["h1"] = $h1;
	$data["h2"] = $h2;
	$data["h3"] = $h3;
	$data["keywords"] = $keywords;
	$data["description"] = $description;
	$data["title"] = $title;
	$data["c_title"] = $c_title;
	$data["c_contents"] = $c_contents;
	$data["photo1"] = $photo1;
	$data["photo2"] = $photo2;
	$data["photo3"] = $photo3;
	
	$data["access"] = $access;
	$data["url"] = $url;
	$data["date"] = $date;
	$data["id"] = $id;

	
	$Cache_Lite->save($data,$cache_id);
	


}// end if



?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<meta name="description" content="<?=$description?>">
<meta name="keywords" content="<?=$keywords?>">

<title><?=$title?></title>
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
<div id="topicpath"><a href="http://www.direct-commu.com/">トップ</a> > <a href="http://www.direct-commu.com/colums/">コミュニケーション知恵袋</a> > <a href="http://www.direct-commu.com/colums/feature/">特集コラム</a> > <span><?=$c_title?></span></div>

<section>
<h2 class="arrow01"><div><?=$c_title?></div></h2>
<div class="text">

<?=$c_contents?>

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
