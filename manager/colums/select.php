<?php

require_once ("/home/users/2/lolipop.jp-dp58180317/web/www/manager/colums/config.php");


$url = "http://www.direct-commu.com/colums/business/buisness_005_06_study.html";

$sql = "select * from colums_u where url='".$url."' and flag=1";
$result = mysql_query($sql) or die("e");

$rows = mysql_fetch_array($result)






?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>index</title>
<link href="./css/style.css" rel="stylesheet" type="text/css" media="all" />

</head>

<body>

select完了


<form action="./insert.php" method="post">

category: <input type="text" name="category" value="<?=$rows["category"]?>" /><br />
theme: <input type="text" name="theme" value="<?=$rows["theme"]?>" /><br />
tag: <input type="text" name="tag" value="<?=$rows["tag"]?>" /><br />


keywords: <input type="text" name="keywords" value="発話と傾聴,努力" /><br />
description: <input type="text" name="description" value="発話と傾聴の練習をしましょう説明" /><br />
title: <input type="text" name="title" value="タイトル" /><br />


h1: <input type="text" name="h1" value="h1" /><br />
h2: <input type="text" name="h2" value="h2" /><br />
h3: <input type="text" name="h3" value="h3" /><br />


c_title: <input type="text" name="c_title" value="c_title" /><br />
c_contents: <textarea name="c_contents" cols="30" rows="4"><?=$rows["c_contents"]?></textarea><br />
url: <input type="text" name="url" value="url" /><br />

<input type="submit" value="登録" />
</form>


</body>
</html>