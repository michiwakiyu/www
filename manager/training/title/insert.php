<?php

require_once ("/home/users/2/lolipop.jp-dp58180317/web/www/manager/config.php");


$date = date("Y/m/d H:i:s");


$sql = "select * from article_themes where flag='1' order by date asc";
$result = mysql_query($sql) or die("e2");

$option = "";

while($rows = mysql_fetch_array($result)){

	
	$option .= "<option value=\"".$rows["theme_id"]."\">".$rows["theme"]."</option>";
}




?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<script src="./ckeditor/ckeditor.js" type="text/javascript" ></script>


<title>記事を書く</title>
</head>

<body>

<p><a href="index.php">テーマを編集</a>　|  <a href="../theme/insert.php">テーマを追加</a>　|  <a href="index.php">記事を編集</a>　|　記事を追加</p>

<h2>記事を追加する</h2>


<form action="./insert2.php" method="post" enctype="multipart/form-data">

テーマ:
<select name="theme_id">

<?=$option?>

</select>

<br />
<br />




記事タイトル:<input type="text" name="title" />
<br />
ページタイトル:<input type="text" name="title_page" />
<br />
<br />
記事id:<input type="text" name="article_id" />
<br />
author:<input type="text" name="author" />
<br />
h1:<input type="text" name="h1" />
<br />
h2:
<input type="text" name="h2" />
<br />
h3:
<input type="text" name="h3" />
<br />
keywords:
<input type="text" name="keywords" />
<br />
description:
<input type="text" name="description" />

<br />

<br />
<br />

<br />

image1:<input type="file" name="image1" size="30" /><br />

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
<input type="text" name="flag" value="1" />
<br />
date:
<input type="text" name="date" value="<?=$date?>" />

<br />
<br />
<input type="hidden" name="id" value="<?=$rows["id"]?>" />
<input type="submit" value="記事を追加" />

</form>


<script type="text/javascript">
        if ( typeof CKEDITOR == 'undefined' ){
		}else{
            var editor = CKEDITOR.replace( 'content' );
        }// end if
</script>
</body>
</html>
