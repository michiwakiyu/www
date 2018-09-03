<?php

require_once ("/home/users/2/lolipop.jp-dp58180317/web/www/manager/colums/config.php");



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>index</title>
<link href="./css/style.css" rel="stylesheet" type="text/css" media="all" />

</head>

<body>


<form action="./insert2.php" method="post">

category: <input type="text" name="category" /><br />
theme: <input type="text" name="theme" /><br />
tag: <input type="text" name="tag" /><br />


keywords: <input type="text" name="keywords" /><br />
description: <input type="text" name="description" /><br />
title: <input type="text" name="title" /><br />


h1: <input type="text" name="h1" /><br />
h2: <input type="text" name="h2" /><br />
h3: <input type="text" name="h3" /><br />


c_title: <input type="text" name="c_title" /><br />
c_contents: <textarea name="c_contents" cols="50" rows="6" /></textarea><br />
url: <input type="text" name="url" style="width: 800px" /><br />

<input type="submit" value="登録" style="background:#ccc; margin-top: 20px" />
</form>


<!--<form action="./insert2.php" method="post">

category: <input type="text" name="category" value="mental" /><br />
theme: <input type="text" name="theme" value="会話と傾聴" /><br />
tag: <input type="text" name="tag" value="発話,傾聴" /><br />


keywords: <input type="text" name="keywords" value="発話と傾聴,努力" /><br />
description: <input type="text" name="description" value="発話と傾聴の練習をしましょう説明" /><br />
title: <input type="text" name="title" value="タイトル" /><br />


h1: <input type="text" name="h1" value="h1" /><br />
h2: <input type="text" name="h2" value="h2" /><br />
h3: <input type="text" name="h3" value="h3" /><br />


c_title: <input type="text" name="c_title" value="c_title" /><br />
c_contents: <textarea name="c_contents" cols="30" rows="4"></textarea><br />
url: <input type="text" name="url" value="url" style="width: 800px" /><br />

<input type="submit" value="登録" style="background:#ccc; margin-top: 20px" />
</form>-->

</body>
</html>