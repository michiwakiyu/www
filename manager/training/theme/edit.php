<?php

require_once ("/home/users/2/lolipop.jp-dp58180317/web/www/manager/config.php");

$theme_id = $_GET["theme_id"];


$sql = "select * from article_themes where theme_id='".$theme_id."'";
$result = mysql_query($sql) or die("e");
$rows = mysql_fetch_array($result);



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>テーマを編集</title>
</head>

<body>

<p>テーマを編集　|  <a href="insert.php">テーマを追加</a>　|  <a href="../title/index.php">記事を編集</a>　|　<a href="../title/insert.php">記事を追加</a></p>

<h2>テーマを編集する</h2>


<form action="./edit2.php" method="post">
テーマ：<input type="text" name="theme" id="theme" value="<?=$rows["theme"]?>" />
<br />
flag:<input type="text" name="flag" id="flag" value="<?=$rows["flag"]?>" />
<br />
<input type="hidden" name="theme_id" value="<?=$theme_id?>" />
<input type="submit" value="編集" />


</form>
</body>
</html>