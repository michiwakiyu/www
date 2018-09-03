<?php

require_once ("/home/users/2/lolipop.jp-dp58180317/web/www/manager/colums/config.php");



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>admin</title>
<link href="./css/style.css" rel="stylesheet" type="text/css" media="all" />

</head>

<body>

<p><a href="insert.php" style="display: block; width: 400px; height: 40px; background:#ccc; text-align: center; padding-top: 10px">新規登録</a></p>

<hr />

<p>編集するコラムのurl</p>


<form action="./edit.php" method="post">
<input type="text" name="url" style="width: 800px" /><br />
<input type="submit" value="検索" style="background:#ccc; margin-top: 20px" />
</form>

<hr />

<p>削除するコラムのurl</p>
<form action="./delete.php" method="post">
<input type="text" name="url" style="background:#FFF; width: 100px; height: 20px" /><br />
<input type="submit" value="検索" style="background:#CCC; width: 100px; height: 20px; margin-top: 20px" />
</form>

</body>
</html>