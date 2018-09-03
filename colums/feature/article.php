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
	
	$sql_update = "update colums_u set access=access+1 where url='http://www.direct-commu.com/colums/mental/".$c_id.".html'";
	
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
$sql = "select * from colums where url like '%".$c_id."%' and flag='1'";
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
//$sql_new = "select * from colums order by date asc";

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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<META name="description" content="<?=$description?>">
<META name="keywords" content="<?=$keywords?>">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="author" content="株式会社ダイレクトコミュニケーション" /><title><?=$title?></title>

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
  <h1><?=$h1?></h1>
</div><!-- end topicleft -->
<div id="topicright">
  <h2><?=$h2?></h2>
</div><!-- end topicright -->
</div><!-- end topicpath -->


<div id="container">

<div id="sidebar">
<a href="http://www.direct-commu.com/colums/feature/"><img src="../../common/sharedimg/colums/img_title_colums_feature.gif" width="290" height="44" alt="特集コラムタイトル" /></a>
<div class="nav">
<ul style="margin-top: 0">
<p><?=$theme?></p>
<!--<?=$list_same?>-->
<?=str_replace("www.direct-commu.com","www.direct-commu.com",$list_same)?>
</ul>

</div><!-- end nav -->

<div class="navbottom"><!-- --></div><!-- end navbottom -->



<a href="http://www.direct-commu.com/colums/mental/"><img src="../../common/sharedimg/colums/img_title_colums_new.gif" width="290" height="44" alt="新着コラムタイトル" /></a>
<div class="nav">
<ul style="margin-top: 0">
<!--<?=$list_new?>-->
<?=str_replace("www.direct-commu.com","www.direct-commu.com",$list_new)?>
</ul>

</div><!-- end nav -->

<div class="navbottom"><!-- --></div><!-- end navbottom -->


</div><!-- end sidebar -->

<hr class="clear" />

<div id="content">
<div id="contenttop"><!-- --></div><!-- end contenttop -->

<div class="main">
  <p class="title_01"><?=$c_title?></p>
<div class="wrap">
<?=$c_contents?>
<?php require_once('../lib/footer_mental.php'); ?>

<hr class="line" />

<?php require_once('../lib/footer.php'); ?>

<div class="info"> 
<p>関連したテーマのコラム: </p>
<ul><?=$list_same?></ul>
</div><!-- end info -->

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
