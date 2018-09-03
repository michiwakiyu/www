<?php

//==========================================================================================
//cr値
//==========================================================================================

$cr = 0;
if(isset($_POST["cr"])){
	$cr = $_POST["cr"];
}

if($cr == 0){
	header("Location: http://www.direct-commu.com/course/");
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


//date_join 初回面接予定月
if(isset($_POST["date_join"])){
	$date_join = $_POST["date_join"];
}


//agreement 同意
if(isset($_POST["agreement"])){
	$agreement = $_POST["agreement"];
}

//question  受講の動機 / お悩み / ご質問等
if(isset($_POST["question"])){
	$question = $_POST["question"];
}


//======================================================================
//■心理カウンセリングメール送信
//======================================================================
mb_language("Ja") ;
mb_internal_encoding("utf-8") ;

$to_email_masuda = "m.yosuke@kyconsul.org";
$to_email_kawashima = "kawashima@direct-comm.com";


$content = "
心理カウンセリング申し込みのお問い合わせがあります。\n\n
\n".
"お名前：".$namae."\n".
"ふりがな：".$furigana."\n".
"電話番号：".$phone."\n".
"ご住所：".$address."\n".
"年齢：".$age."\n".
"性別：".$sex."\n".
"メールアドレス：".$email."\n".
"メルマガ希望：".$mailmag."\n".
"初回面接予定月：".$date_join."\n".
"講座を受講されるにあたっての 注意事項を読まれましたか ：".$agreement."\n".
"受講の動機 / お悩み / ご質問等：".$question."\n".




"\n\n--------------------------------------------------------\n".
"●株式会社ダイレクトコミュニケーション●\n".
"\n".
"運営:株式会社ダイレクトコミュニケーション http://www.direct-commu.com\n".
"mail:info@direct-commu.com\n".
"--------------------------------------------------------";


$mailfrom= "From: direct-commu.com<info@direct-comm.com>";
$subject = "心理カウンセリングの問い合わせがあります";

//masuda
mb_send_mail($to_email_masuda,$subject,$content,$mailfrom);
//kawashima
mb_send_mail($to_email_kawashima,$subject,$content,$mailfrom);



//======================================================================
//■心理カウンセリングメール送信完了ページへ
//======================================================================



header("Location: http://www.direct-commu.com/course/sended/sended.php?id=3");
exit();


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title></title>
</head>

<body>
<p>スマートフォン</p>
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