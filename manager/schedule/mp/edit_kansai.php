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




$sql = "select * from schedules where class='kansai' and flag=1";
$result = mysql_query($sql) or die("e2");
while($rows = mysql_fetch_array($result)){
	$html = $rows["html"];
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="author" content="株式会社ダイレクトコミュニケーション" /><title>関西教室のスケジュール</title>

<script src="../../js/jquery.js" type="text/javascript"></script>
<script src="../../js/jquery.magicpreview.js" type="text/javascript"></script>
<script src="../../js/magicpreview/mymagicpreview.js" type="text/javascript"></script>

<link href="../../css/style.css" rel="stylesheet" type="text/css" media="all" />

</head>

<body>
<p class="title01"><?=$mes?></p>
<p style="text-align: center">教室スケジュールマネージャー</p>
<p style="text-align: center"><a href="../
edit_shinjuku01.php">新宿第１教室</a>　｜　<a href="edit_shinjuku02.php">新宿第２教室</a>　|　<a href="edit_ginza.php">銀座教室</a>　|　<a href="edit_saitama.php">埼玉教室</a>　|　<a href="edit_yokohama.php">横浜教室</a>　|　<a href="edit_kansai.php">関西教室</a></p>
<h1>関西教室スケジュール</h1>

<table class="table_col2">
<tr>
<td><h2>htmlソース</h2>
</td><td><h2>プレビュー</h2></td>
</tr>

<tr>
<td>

<form action="edit2_kansai.php" method="post" class="example">
<textarea class="test" name="html"><?=$html?></textarea>
<br />
<input type="hidden" name="cr" value="1" />
<div style="text-align: center"><input type="image" src="../../images/btn_schedule.gif" /></div>
</form>

</td>
<td id="mp_html">


</td>
</tr>
</table>


</body>
</html>