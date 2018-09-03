<?php

require_once ("/home/users/2/lolipop.jp-dp58180317/web/www/manager/colums/config.php");

$url = $_POST["url"];


$sql = "select * from colums_u where url='".$url."' and flag=1";
$result = mysql_query($sql) or die("e");
$rows = mysql_fetch_array($result);



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>edit</title>

<script src="ckeditor/ckeditor.js" type="text/javascript" ></script>


<link href="./css/style.css" rel="stylesheet" type="text/css" media="all" />

</head>

<body>

<p>編集する</p>

<form action="./edit2.php" method="post">

category: <input type="text" name="category" value="<?=$rows["category"]?>" /><br />
theme: <input type="text" name="theme" value="<?=$rows["theme"]?>" /><br />
tag: <input type="text" name="tag" value="<?=$rows["tag"]?>" /><br />


keywords: <input type="text" name="keywords" value="<?=$rows["keywords"]?>" /><br />
description: <input type="text" name="description" value="<?=$rows["description"]?>" /><br />
title: <input type="text" name="title" value="<?=$rows["title"]?>" /><br />


h1: <input type="text" name="h1" value="<?=$rows["h1"]?>" /><br />
h2: <input type="text" name="h2" value="<?=$rows["h2"]?>" /><br />
h3: <input type="text" name="h3" value="<?=$rows["h3"]?>" /><br />


c_title: <input type="text" name="c_title" value="<?=$rows["c_title"]?>" /><br />
c_contents: <textarea id="editor1" name="c_contents" cols="30" rows="4"><?=$rows["c_contents"]?></textarea><br />
url: <input type="text" name="url" value="<?=$rows["url"]?>" style="width: 800px" /><br />

access: <input type="text" name="access" value="<?=$rows["access"]?>" /><br />
flag: <input type="text" name="flag" value="<?=$rows["flag"]?>" /><br />
date: <input type="text" name="date" value="<?=$rows["date"]?>" /><br />
<input type="hidden" name="id" value="<?=$rows["id"]?>" /><br />

<input type="submit" value="編集" style="background:#ccc; margin-top: 20px" />
</form>


<script type="text/javascript">
        if ( typeof CKEDITOR == 'undefined' )
        {
        }
        else
        {
            var editor = CKEDITOR.replace( 'editor1' );
            //editor.setData( '' );
        }
</script>

</body>
</html>