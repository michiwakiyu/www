<?php

//session_start();

//require_once("/home/direct-commu/config.php");

$db_host = "mysql501.phy.lolipop.jp";
$db_user = "LA08419899";
$db_pass = "6B87rrUc";
$db_name = "LA08419899-directcomm";

mysql_connect($db_host,$db_user,$db_pass);
mysql_set_charset("utf8");
mysql_select_db($db_name);


if(isset($_POST["html"])){
	$html = $_POST["html"];
}

$sql = "update schedules set html='".$html."' where class='shinjuku02'";
$result = mysql_query($sql) or die("e1");


header("Location: http://www.direct-commu.com/manager/schedule/mp/edit_shinjuku02.php?edit=1");
exit();


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="author" content="株式会社ダイレクトコミュニケーション" /><title></title>

<link href="../../css/style.css" rel="stylesheet" type="text/css" media="all" />

</head>

<body>
編集完了
</body>
</html>