<?php

require_once ("/home/users/2/lolipop.jp-dp58180317/web/www/manager/config.php");

$id = $_GET["id"];

$sql = "select * from article_titles where id='".$id."'";
$result = mysql_query($sql) or die("e");
$rows = mysql_fetch_array($result);


//テーマid
$theme_id = $rows["theme_id"];

$sql2 = "select * from article_themes where flag='1' order by date asc";
$result2 = mysql_query($sql2) or die("e2");

$option = "";

while($rows2 = mysql_fetch_array($result2)){
	
	if($rows2["theme_id"] == $theme_id){
		$slct = "selected=\"selected\"";
	}else{
		$slct = "";
	}
	
	$option .= "<option value=\"".$rows2["theme_id"]."\" ".$slct.">".$rows2["theme"]."</option>";
}



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<script src="./ckeditor/ckeditor.js" type="text/javascript" ></script>


<title>記事を編集</title>
</head>

<body>

<p><a href="../theme/index.php">テーマを編集</a>　|  <a href="../theme/insert.php">テーマを追加</a>　|  記事を編集　|　<a href="../title/insert.php">記事を追加</a></p>

<h2>記事を編集する</h2>


<form action="./edit2.php" method="post" enctype="multipart/form-data">

テーマ:
<select name="theme_id">

<?=$option?>

</select>

<br />
<br />




記事タイトル:<input type="text" name="title" value="<?=$rows["title"]?>" />
<br />
ページタイトル:<input type="text" name="title_page" value="<?=$rows["title_page"]?>" />
<br />
<br />
記事id:<input type="text" name="article_id" value="<?=$rows["article_id"]?>" />
<br />
author:<input type="text" name="author" value="<?=$rows["author"]?>" />
<br />
h1:<input type="text" name="h1" value="<?=$rows["h1"]?>" />
<br />
h2:
<input type="text" name="h2" value="<?=$rows["h2"]?>" />
<br />
h3:
<input type="text" name="h3" value="<?=$rows["h3"]?>" />
<br />
keywords:
<input type="text" name="keywords" value="<?=$rows["keywords"]?>" />
<br />
description:
<input type="text" name="description" value="<?=$rows["description"]?>" />

<br />

<br />
<br />
※画像を上書きする場合のみ選択して下さい

<br />

image1:<input type="file" name="image1" size="30" /><br />
<img src="http://www.direct-commu.com/training/images/<?=$rows["image1"]?>" /><br />

<!--<br />
image2:<input type="file" name="image2" size="30" /><br />
<img src="http://www.direct-commu.com/training/images/<?=$rows["image2"]?>" /><br />
image3:<input type="file" name="image3" size="30" /><br />
<img src="http://www.direct-commu.com/training/images/<?=$rows["image3"]?>" /><br />-->

<br />
<br />

content:<br />
<textarea name="content" rows="5" cols="100"><?=$rows["content"]?></textarea>

<br />
exp:<br />
<textarea name="exp" rows="3" cols="30"><?=$rows["exp"]?></textarea>


<br />
<br />
flag:
<input type="text" name="flag" value="<?=$rows["flag"]?>" />
<br />
date:
<input type="text" name="date" value="<?=$rows["date"]?>" />

<br />
<br />
<input type="hidden" name="id" value="<?=$rows["id"]?>" />
<input type="submit" value="編集" />

</form>


<script type="text/javascript">
        if ( typeof CKEDITOR == 'undefined' ){
		}else{
            var editor = CKEDITOR.replace( 'content' );
        }// end if
</script>
</body>
</html>
