<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>search2</title>
</head>

<body>
<?php

require_once ("/home/users/2/lolipop.jp-dp58180317/web/www/manager/colums/config.php");

$word = $_POST["word"];

echo $word;

$sql = "select * from colums_u where title like '%".$word."%' or c_title like '%".$word."%' or c_contents like '%".$word."%' and flag=1";

$result = mysql_query($sql) or die("e");

$list = "";

while($rows = mysql_fetch_array($result)){
	
	$list .= "<li>".$rows["c_title"]."</li>";
}

?>


<ul>
<?=$list?>
</ul>

</body>
</html>