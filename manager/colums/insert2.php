<?php

require_once ("/home/users/2/lolipop.jp-dp58180317/web/www/manager/colums/config.php");


//parameter

$date = date("Y/m/d H:i:s");
$flag = 1;
$id = 0;
$access = 0;


$category = $_POST["category"];
$theme = $_POST["theme"];

$tag = $_POST["tag"];
$tag = str_replace("、",",",$tag);//半角
$tag = str_replace(" ","",$tag);//半角スペース
$tag = str_replace("　","",$tag);//全角スペース


$keywords = $_POST["keywords"];
$keywords = str_replace("、",",",$keywords);//半角
$keywords = str_replace(" ","",$keywords);//半角スペース
$keywords = str_replace("　","",$keywords);//全角スペース


$description = $_POST["description"];
$title = $_POST["title"];


$h1 = $_POST["h1"];
$h1 = str_replace("、",",",$h1);//半角
$h1 = str_replace(" ","",$h1);//半角スペース
$h1 = str_replace("　","",$h1);//全角スペース

$h2 = $_POST["h2"];
$h2 = str_replace("、",",",$h2);//半角
$h2 = str_replace(" ","",$h2);//半角スペース
$h2 = str_replace("　","",$h2);//全角スペース

$h3 = $_POST["h3"];
$h3 = str_replace("、",",",$h3);//半角
$h3 = str_replace(" ","",$h3);//半角スペース
$h3 = str_replace("　","",$h3);//全角スペース


$c_title = $_POST["c_title"];
$c_contents = $_POST["c_contents"];

$url = $_POST["url"];



$sql = "insert into colums_u values('".$category."','".$theme."','".$tag."','".$h1."','".$h2."','".$h3."','".$keywords."','".$description."','".$title."','".$c_title."','".$c_contents."',NULL,NULL,NULL,".$access.",'".$url."','".$date."',".$flag.",".$id.")";




$result = mysql_query($sql) or die("e");








?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>index</title>
<link href="./css/style.css" rel="stylesheet" type="text/css" media="all" />

</head>

<body>

insert完了

</body>
</html>