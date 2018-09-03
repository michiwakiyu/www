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


$sql = "select * from article_titles order by date asc";
$result = mysql_query($sql) or die("e");

$list = "";

while($rows = mysql_fetch_array($result)){
	
	$list .= "<li><a href=\"edit.php?id=".$rows["id"]."\">".$rows["title"]."</a></li>";
}

$list = "<ul>".$list."</ul>";





?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>記事を編集</title>
</head>

<body>
<?=$edit?>

<p><a href="../theme/index.php">テーマを編集</a>　|  <a href="../theme/insert.php">テーマを追加</a>　|  <a href="index.php">記事を編集</a>　|　<a href="insert.php">記事を追加</a></p>



<h2>記事を編集する</h2>
<?=$list?>


</a>
</body>
</html>
