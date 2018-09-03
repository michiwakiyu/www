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


$class = "kansai";
$info_date = $_POST["date"];
$info_title = $_POST["title"];
$info_exp = $_POST["exp"];

$iii = $_POST["illust"];
$iii = str_replace("<img src='http://www.direct-commu.com/common/illust/michi/schedule/",'',$iii);
$info_illust = str_replace("' />",'',$iii);


$bbb = $_POST["beginner"];
if($bbb == "<img src='http://www.direct-commu.com/common/images/course/schedule/beginer.gif'>"){
	$info_beginner = 1;
}else{
	$info_beginner = 0;
}

$date = date("Y/m/d H:i:s");
$flag = 1;
$id = 0;


//update classinfos set info_date='$info_date',info_title='$info_title',info_exp='$info_exp',info_illust='$info_illust',info_beginner='$info_beginner', date='$date',flag='$flag' where class='$class'

if(!isset($_POST["date"])){
	header("Location: http://www.direct-commu.com/manager/schedule/class/edit_kansai.php");
	exit();
}


$sql = "update classinfos set info_date='".$info_date."',info_title='".$info_title."',info_exp='".$info_exp."',info_illust='".$info_illust."', info_beginner='".$info_beginner."', date='".$date."',flag='".$flag."' where class='".$class."'";

$result = mysql_query($sql) or die("e");

header("Location: http://www.direct-commu.com/manager/schedule/class/edit_kansai.php?edit=1");
exit();


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title></title>
</head>

<body>
編集完了
</body>
</html>