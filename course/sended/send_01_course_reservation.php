<?php

//==========================================================================================
//cr値
//==========================================================================================

$cr = 0;
if(isset($_POST["cr"])){
	$cr = $_POST["cr"];
}

if($cr == 0){
	header("Location: http://www.direct-commu.com/course/6_reservation.html");
	exit();
}


//==========================================================================================
//値取得
//==========================================================================================

//namae
if(isset($_POST["namae"])){
	$namae = $_POST["namae"];
}

//furigana
if(isset($_POST["furigana"])){
	$furigana = $_POST["furigana"];
}

//phone
if(isset($_POST["phone"])){
	$phone = $_POST["phone"];
}

//address
if(isset($_POST["address"])){
	$address = $_POST["address"];
}

//age
if(isset($_POST["age"])){
	$age = $_POST["age"];
}

//sex
$sex = $_POST["sex"];

//email
if(isset($_POST["email"])){
	$email = $_POST["email"];
}

//mailmag
if(isset($_POST["mailmag"])){
	$mailmag = $_POST["mailmag"];
}


//date_join 初参加予定日
if(isset($_POST["date_join"])){
	$date_join = $_POST["date_join"];
}

//class 教室の場所 
if(isset($_POST["class"])){
	$class = $_POST["class"];
}

//payment 初回お振込み予定
if(isset($_POST["payment"])){
	$payment = $_POST["payment"];
}

//agreement 同意
if(isset($_POST["agreement"])){
	$agreement = $_POST["agreement"];
}

//question  受講の動機 / お悩み / ご質問等
if(isset($_POST["question"])){
	$question = $_POST["question"];
}


//==========================================================================================
//スパムフィルタ
//==========================================================================================

$str = $namae;
$aa = preg_match("/^[a-zA-Z0-9<>]*[a-zA-Z0-9<>]$/",$str);
if($aa == 1){
	header("Location: http://www.direct-commu.com/course/6_reservation.html");
	exit();
}



//======================================================================
//■仮予約メール送信
//======================================================================
mb_language("Ja") ;
mb_internal_encoding("utf-8") ;

$to_email_masuda = "m.yosuke@kyconsul.org";
$to_email_kawashima = "kawashima@direct-comm.com";


$content = "
仮予約のお問い合わせがありました。\n\n
\n".
"お名前：".$namae."\n".
"ふりがな：".$furigana."\n".
"電話番号：".$phone."\n".
"ご住所：".$address."\n".
"年齢：".$age."\n".
"性別：".$sex."\n".
"メールアドレス：".$email."\n".
"メルマガ希望：".$mailmag."\n".
"初参加予定日：".$date_join."\n".
"教室の場所 ：".$class."\n".
"初回お振込み予定 ：".$payment."\n".
"講座を受講されるにあたっての 注意事項を読まれましたか ：".$agreement."\n".
"受講の動機 / お悩み / ご質問等：".$question."\n".




"\n\n--------------------------------------------------------\n".
"●株式会社ダイレクトコミュニケーション●\n".
"\n".
"運営:株式会社ダイレクトコミュニケーション http://www.direct-commu.com\n".
"mail:info@direct-comm.com\n".
"--------------------------------------------------------";


$mailfrom= "From: direct-commu.com<info@direct-comm.com>";
$subject = "仮予約の問い合わせがあります";

//masuda
mb_send_mail($to_email_masuda,$subject,$content,$mailfrom);

//kawashima

mb_send_mail($to_email_kawashima,$subject,$content,$mailfrom);

//======================================================================
//■仮予約メール送信完了ページへ
//======================================================================



header("Location: http://www.direct-commu.com/course/sended/sended.php?id=1");
exit();


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title></title>
</head>

<body>
<!-- Yahoo Code for &#20206;&#20104;&#32004; Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var yahoo_conversion_id = 1000052332;
var yahoo_conversion_label = "7m3aCN6SmQQQmuvE5QM";
var yahoo_conversion_value = 7800;
/* ]]> */
</script>
<script type="text/javascript" src="http://i.yimg.jp/images/listing/tool/cv/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="http://b91.yahoo.co.jp/pagead/conversion/1000052332/?value=7800&amp;label=7m3aCN6SmQQQmuvE5QM&amp;guid=ON&amp;script=0&amp;disvt=true"/>
</div>
</noscript>

<!-- google analytics -->

<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-10783873-1");
pageTracker._trackPageview();
} catch(err) {}</script>
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-10783873-1");
pageTracker._trackPageview();
} catch(err) {}</script>
</body>
</html>