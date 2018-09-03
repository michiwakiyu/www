<?php

require_once ("/home/users/2/lolipop.jp-dp58180317/web/manager/config.php");

$sql = "select * from bthreads where id='1' and flag='1'";
$result = mysql_query($sql) or die("e");
$rows = mysql_fetch_array($result)




?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>youtube</title>
</head>

<body>
<h1><?=$rows["title"]?></h1>
<hr />
<?=$rows["contents"]?>
</body>
</html>
