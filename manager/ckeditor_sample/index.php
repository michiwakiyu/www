<?php

//session_start();

//require_once("/home/direct-comm/config.php");

$db_host = "mysql501.phy.lolipop.jp";
$db_user = "LA08419899";
$db_pass = "sb4wpy";
$db_name = "LA08419899-directcomm";

mysql_connect($db_host,$db_user,$db_pass);
mysql_set_charset("utf8");
mysql_select_db($db_name);


if(isset($_GET["edit"])){
	$edit = $_GET["edit"];
	
	if($edit == 1){
		$mes = "スケジュールの編集を完了しました";
	}else{
		$mes = "";
	}
}


$url = "http://www.direct-comm.com/colums/mental/mental_004_01_stress.html";


$sql = "select * from colums where url='".$url."' and flag=1";
$result = mysql_query($sql) or die("e");
$rows = mysql_fetch_array($result);




?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>ck</title>
</head>

<body>

<h1 style="text-align: center; color: #666">コラム</h1>
<form action="./send.php" method="post" style="width: 600px; margin: auto">
<textarea id="editor1" name="editor1" rows="10" cols="80"><?=$rows["c_contents"]?></textarea>
<p><input type="image" src="../images/btn_schedule.gif" /></p>
</form>


<script type="text/javascript" src="./ckeditor/ckeditor.js"></script>
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
