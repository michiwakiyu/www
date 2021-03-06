<?php

$db_host = "mysql5014.xserver.jp";
$db_user = "directcommu_main";
$db_pass = "JASMF3uBdNpjFJWe";
$db_name = "directcommu_main";

$db = mysqli_connect($db_host,$db_user,$db_pass);
mysqli_set_charset($db, "utf8");
mysqli_select_db($db, $db_name);


/*
$sql = <<< EOF
select * from article_themes where flag='1' order by date asc
EOF;*/


//article_idをgetで取得
//$now_article_id = "a_003";

$now_article_id = $_GET["article_id"];


//============================================================================
//cache_lite
//============================================================================

//Cache_lite読み込み
require_once '/home/directcommu/direct-commu.com/public_html/lib/PEAR/Cache/Lite.php';

$cache_id = $now_article_id;

//3時間　60 * 60 * 3
//30秒   30

//tmpディレクトリは相対パスでないとダメ    automaticSerializationは配列格納用
$options = array('cacheDir' => './tmp/','lifeTime' => 60 * 60 * 30,'automaticSerialization' => 'true');

//キャッシュオブジェクト生成
$Cache_Lite = new Cache_Lite($options);

if ($data = $Cache_Lite -> get($cache_id)) {

	echo "キャッシュがあります";
		
	$date_now = $data["date_now"];	
	$number = $data["number"];
	$number_max = $data["number_max"];
	$list = $data["list"];
	
	
	$link_next = $data["link_next"];
	$link_prev = $data["link_prev"];
	
		
	$list_article = array();
	
	$list_article[$number]["title"] = $data["title"];
	$list_article[$number]["title_page"] = $data["title_page"];
	$list_article[$number]["keywords"] = $data["keywords"];
	$list_article[$number]["description"] = $data["description"];
	
	$list_article[$number]["image1"] = $data["image1"];
	$list_article[$number]["image2"] = $data["image2"];
	$list_article[$number]["image3"] = $data["image3"];
	
	
	$list_article[$number]["h1"] = $data["h1"];
	$list_article[$number]["h2"] = $data["h2"];
	$list_article[$number]["h3"] = $data["h3"];
	$list_article[$number]["content"] = $data["content"];
	
	
	
}else{	

	echo "キャッシュがありません";


//article_id の記事がdateの若い順から何番目か算出する
//二度sql分を行っており処理は綺麗ではない。集合としてとらえる方法でより綺麗に取得可能のよう

$sql0 = "select * from article_titles where article_id='".$now_article_id."' and flag='1'";
$result0 = mysqli_query($db, $sql0) or die("e0");
$rows0 = mysqli_fetch_array($result0);
$date_now = $rows0["date"];




//
$sql_n = "select * from article_titles where flag='1' and date <='".$date_now."'";
$result_n = mysqli_query($db, $sql_n) or die("en");
$number = mysqli_num_rows($result_n);


//すべての記事の総数 $number_maxを求める　
$sql_max = "select * from article_titles where flag='1'";
$result_max = mysqli_query($db, $sql_max) or die("en");
$number_max = mysqli_num_rows($result_max);



//end 算出




$sql = "select * from article_themes where flag='1' order by date asc";
$result = mysqli_query($db, $sql) or die("e");

$list = "";
$list_num = 1;

$list_article = array();


while($rows = mysqli_fetch_array($result)){

	$list .= "<dt>".$rows["theme"]."</dt>";	
	
	$list_article[$list_num]["theme"] = $rows["theme"];
	
	//article_titles

	$sql2 = "select * from article_titles where flag='1' and theme_id='".$rows["theme_id"]."' order by date asc";
	$result2 = mysqli_query($db, $sql2) or die("e");
	while($rows2 = mysqli_fetch_array($result2)){
	
		$list_article[$list_num]["title"] = $rows2["title"];
		$list_article[$list_num]["title_page"] = $rows2["title_page"];	
		$list_article[$list_num]["content"] = $rows2["content"];
		$list_article[$list_num]["article_id"] = $rows2["article_id"];		
		
		$list_article[$list_num]["image1"] = $rows2["image1"];
		$list_article[$list_num]["image2"] = $rows2["image2"];
		$list_article[$list_num]["image3"] = $rows2["image3"];
		
		$list_article[$list_num]["h1"] = $rows2["h1"];
		$list_article[$list_num]["h2"] = $rows2["h2"];
		$list_article[$list_num]["h3"] = $rows2["h3"];		
		$list_article[$list_num]["keywords"] = $rows2["keywords"];
		$list_article[$list_num]["description"] = $rows2["description"];		
		$list_article[$list_num]["date"] = $rows2["date"];


		$list .= "<dd>"."<a href=\"/training/".$list_article[$list_num]["article_id"].".html\">".$list_num.": ".$rows2["title"]."</a></dd>";
		

		$list_num ++;
	
	}// end while

	

}// end while


$list = "<dl class=\"dl_02\">".$list."</dl>";




	$data["date_now"] = $date_now;
	$data["number"] = $number;
	$data["number_max"] = $number_max;
	$data["list"] = $list;


	$number_next = $number+1;
	$number_prev = $number-1;

	
if($number != $number_max){
	$link_next = "<a href=\"/training/".$list_article[$number_next]["article_id"].".html\"><img src=\"/common/sharedimg/training/btn_next.png\"></a>";
}

if($number != 1){
	$link_prev = "<a href=\"/training/".$list_article[$number_prev]["article_id"].".html\"><img src=\"/common/sharedimg/training/btn_prev.png\"></a>";
}


	$data["link_next"] = $link_next;
	$data["link_prev"] = $link_prev;
	
	$data["title"] = $list_article[$number]["title"];
	$data["title_page"] = $list_article[$number]["title_page"];	
	$data["keywords"] = $list_article[$number]["keywords"];	
	$data["description"] = $list_article[$number]["description"];
	
	$data["image1"] = $list_article[$number]["image1"];
	$data["image2"] = $list_article[$number]["image2"];
	$data["image3"] = $list_article[$number]["image3"];
	
	$data["h1"] = $list_article[$number]["h1"];
	$data["h2"] = $list_article[$number]["h2"];
	$data["h3"] = $list_article[$number]["h3"];
	$data["content"] = $list_article[$number]["content"];
	
	$Cache_Lite->save($data,$cache_id);
	

} //end cache







//$number　minの時の処理　前へなし



//echo $list_article[3]["article_id"];



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<META name="description" content="<?=$list_article[$number]["description"]?>">
<META name="keywords" content="<?=$list_article[$number]["keywords"]?>">

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="author" content="株式会社ダイレクトコミュニケーション" /><title><?=$list_article[$number]["title_page"]?></title>
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
<script type="text/javascript" src="../common/js/smart-crossfade.js"></script>



</head>

<body>
<a name="page_top"></a>

<div id="header" style="padding-top: 0px">

<div id="onoffbtn"><a href="/course/mailmag.php" id="open"></a></div>

<div id="headercontainer">

<div id="headerright"><!-- --></div>
<div id="logowrap"><a href="/"><img src="../common/sharedimg/logo_directcomm.gif" alt="ダイレクトコミュニケーション能力,話し方教室" /></a></div>
<!--<ul>
<li><a href="/reqruit/teacher.html">講師・心理士 募集</a></li>
<li><a href="/reqruit/assistant.html">アシスタント 募集</a></li>
<li><a href="/company/contact.html">お問い合わせ</a></li></ul>-->
<ul>
<li><a href="/company/contact.html">お問い合わせ</a></li>
</ul>
</div><!-- end headercontainer -->

<ul id="gnav">
<li id="home"><a href="/">ホーム</a></li>
<li id="course"><a href="/course/">コミュニケーション講座</a></li>
<li id="text"><a href="/text/">ダイコミュ通信講座</a></li>
<li id="training"><a href="/training/" class="selected">コミュニケーション能力トレーニング</a></li>
<li id="ability"><a href="https://commutest.com">コミュニケーション能力診断</a></li>
<li id="colums"><a href="/colums/">コミュニケーションコラム集</a></li>
<li id="event"><a href="/event/">ダイコミュイベント</a></li>
<li id="teacher"><a href="/profile/">講師紹介</a></li>
</ul><!-- end gnav -->
</div><!-- end header -->

<div id="topicpath">

<div id="topicleft"><a href="/">ホーム</a> > <a href="/training/">コミュニケーショントレーニング</a> > <h1><?=$list_article[$number]["h1"]?></h1>
</div>
<!-- end topicleft -->
<div id="topicright">
 <h2><?=$list_article[$number]["h2"]?></h2>
</div>
<!-- end topicright -->
</div><!-- end topicpath -->


<div id="container">

<div id="sidebar">
<a href="/training/"><img src="../common/sharedimg/training/img_title_training.gif" alt="コミュニケーショントレーニング" width="290" height="44"/></a>
<div class="nav">

<?=$list?>




</div><!-- end nav -->
<div class="navbottom"><!-- --></div><!-- end navbottom -->
</div><!-- end sidebar -->

<hr class="clear" />

<div id="content">
<div id="contenttop"><!-- --></div><!-- end contenttop -->

<div class="main">

<!-- end wrap -->

<p class="title_01"><?=$number." : "?><?=$list_article[$number]["title"]?></p>
<div class="wrap">


<div class="imgbox"><img src="images/<?=$list_article[$number]["image1"]?>" /></div>
<?=$list_article["$number"]["content"]?>


<hr />


<p style="text-align: center; padding-top: 20px"><?=$link_prev?>　|　<?=$link_next?></p>

</div><!-- end wrap -->


</div><!-- end main -->
<div id="bg_contentbottom"><!-- --></div>


</div><!-- end content -->


</div><!-- end container -->

<br class="brclear" />

<br class="brclear" />

<h3><?=$list_article[$number]["h3"]?></h3>
<?php require_once(dirname(__FILE__).'/../templates/footer.html'); ?>



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
