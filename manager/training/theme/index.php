<?php

require_once ("/home/users/2/lolipop.jp-dp58180317/web/www/manager/config.php");

if(isset($_GET["edit"])){
	$edit = $_GET["edit"];
	if($edit == 1){
		$edit = "編集完了！";
	}else{
		$edit = "";
	}
}


$sql = "select * from article_themes order by id desc";
$result = mysql_query($sql) or die("e");

$list = "";

while($rows = mysql_fetch_array($result)){
	
	$list .= "<li><a href=\"./edit.php?theme_id=".$rows["theme_id"]."\">".$rows["theme"]."</a></li>";
}

$list = "<ul>".$list."</li>";








?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>テーマを編集</title>
</head>

<body>

<p><a href="index.php">テーマを編集</a>　|  <a href="insert.php">テーマを追加</a>　|  <a href="../title/index.php">記事を編集</a>　|　<a href="../title/insert.php">記事を追加</a></p>


<h2>テーマを編集する</h2>


<?=$edit?>

<?=$list?>


</body>
</html>