<?php

require_once ("/home/users/2/lolipop.jp-dp58180317/web/www/manager/config.php");




?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>テーマを追加</title>
</head>

<body>

<p><a href="index.php">テーマを編集</a>　|  テーマを追加　|  <a href="../title/index.php">記事を編集</a>　|　<a href="../title/insert.php">記事を追加</a></p>

<h2>テーマを追加する</h2>


<form action="./insert2.php" method="post">
テーマ：<input type="text" name="theme" id="theme" />
<br />
<input type="submit" value="追加" />


</form>
</body>
</html>