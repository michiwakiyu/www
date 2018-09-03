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


if(isset($_GET["edit"])){
	$edit = $_GET["edit"];
	
	if($edit == 1){
		$mes = "スケジュールの編集を完了しました";
	}else{
		$mes = "";
	}
}




$sql = "select * from schedules where class='saitama' and flag=1";
$result = mysql_query($sql) or die("e2");
while($rows = mysql_fetch_array($result)){
	$html = $rows["html"];
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="author" content="株式会社ダイレクトコミュニケーション" /><title>埼玉教室のスケジュール</title>

<script src="../../js/jquery.js" type="text/javascript"></script>
<script src="../ckeditor/ckeditor.js" type="text/javascript" ></script>

<link href="../../css/style.css" rel="stylesheet" type="text/css" media="all" />

</head>

<body>
<p class="title01"><?=$mes?></p>
<p style="text-align: center">教室スケジュールマネージャー</p>
<p style="text-align: center"><a href="edit_shinjuku01.php">新宿第１教室</a>　｜　<a href="edit_shinjuku02.php">新宿第２教室</a>　|　<a href="edit_ginza.php">銀座教室</a>　|　<a href="edit_saitama.php">埼玉教室</a>　|　<a href="edit_yokohama.php">横浜教室</a>　|　<a href="edit_kansai.php">関西教室</a></p>
<h1>埼玉教室スケジュール</h1>

<div id="form">
<form action="./edit2_saitama.php" method="post" style="width: 600px; margin: auto">
<textarea id="editor1" name="html" rows="10" cols="80"><?=$html?></textarea>
<p><input type="image" src="../../images/btn_schedule.gif" /></p>
</form>

</div>

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