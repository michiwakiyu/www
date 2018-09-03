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

$keywords = $_POST["keywords"];
$description = $_POST["description"];
$title = $_POST["title"];


$h1 = $_POST["h1"];
$h2 = $_POST["h2"];
$h3 = $_POST["h3"];


$c_title = $_POST["c_title"];
$c_contents = $_POST["c_contents"];


//======================================================================
// htmlコード付きで挿入
//======================================================================

$c_contents = nl2br($c_contents);

//改行コードを削除
$c_contents = str_replace("\r\n","\n",$c_contents); // WindowsのCRLF改行をLF改行に変更
$c_contents = str_replace("\r","\n",$c_contents); // MACのCR改行をLF改行に変更
$c_contents = str_replace("\n","",$c_contents); //改行を削除

//連続改行は段落に
$c_contents = str_replace("<br /><br />","</p><p>",$c_contents);

//先頭と最後
$c_contents = "<p>".$c_contents."</p>";

//p class="title"　が入った場合の調整
$c_contents = str_replace("<p class=\"title\">","</p><p class=\"title\">",$c_contents);
$c_contents = str_replace("</p></p>","</p>",$c_contents);

//最終調整
$c_contents = str_replace("<p></p>","",$c_contents);

//======================================================================
//======================================================================


$url = $_POST["url"];



//table colums_copy
//$sql = insert into colums_copy values('$category','$theme','$tag','$h1','$h2','$h3','$keywords','$description','$title','$c_title','$c_contents',NULL,NULL,NULL,$access,'$url','$date',$flag,$id);


$sql = "insert into colums_copy values('".$category."','".$theme."','".$tag."','".$h1."','".$h2."','".$h3."','".$keywords."','".$description."','".$title."','".$c_title."','".$c_contents."',NULL,NULL,NULL,".$access.",'".$url."','".$date."',".$flag.",".$id.")";




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