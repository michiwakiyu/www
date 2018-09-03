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

//==================================
//password
//==================================

if(isset($_POST["pass"])){
	$pass = $_POST["pass"];
}


//==================================
//sql
//==================================

$sql = "select * from bpasswords where pass='".$pass."'";
$result = mysql_query($sql) or die("e");
$count = mysql_num_rows($result);

if($count != 0){
	
	$_SESSION["neruma"] = "directcomm";

	header("Location: http://www.direct-commu.com/course/mv/page.php?login=1");
	exit();
	
}else{
	header("Location: http://www.direct-commu.com/course/mv/?er=1");
	exit();
}

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