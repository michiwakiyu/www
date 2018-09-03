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

$html = str_replace('<div id="UMS_TOOLTIP" style="position: absolute; cursor: pointer; z-index: 2147483647; background-image: initial; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: transparent; top: -100000px; left: -100000px; background-position: initial initial; background-repeat: initial initial; "><img class="UMSRatingIcon" id="ums_img_tooltip" /></div>','',$html);

$sql = "update schedules set html='".$html."' where class='yokohama'";
$result = mysql_query($sql) or die("e1");


header("Location: http://www.direct-commu.com/manager/schedule/ck/edit_yokohama.php?edit=1");
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