<?php

//==================================
//session
//==================================

session_start();
require_once ("/home/users/2/lolipop.jp-dp58180317/web/manager/config.php");

//==================================
//cr値
//==================================

if(isset($_POST["cr"])){
	$cr = $_POST["cr"];
}

if($cr == 0){
	header("Location: http://www.direct-commu.com/course/mv/");
	exit();
}

if(isset($_GET["t_id"])){
	$t_id = $_GET["t_id"];
}

if(isset($_POST["namae"])){
	$namae = $_POST["namae"];
}

if(isset($_POST["target"])){
	$target = $_POST["target"];
}

if(isset($_POST["comment"])){
	$comment = $_POST["comment"];
}

$date = date("Y/m/d H:i:s");


//==================================
//sql
//==================================

$sql = "insert into bcomments values('".$comment."','".$namae."','".$target."','".$t_id."',1,'".$date."',0)";
//insert into bcomments values('$comment','$namae','$target','$t_id',1,'$date',0);


$result = mysql_query($sql) or die("e");


header("Location: http://www.direct-commu.com/course/mv/single.php?id=".$t_id."&comment=1#comment");
exit();


?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title></title>
</head>

<body>
</body>
</html>