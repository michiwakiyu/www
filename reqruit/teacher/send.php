<?php

//==========================================================================================
//cr値
//==========================================================================================

$cr = 0;
if(isset($_POST["cr"])){
	$cr = $_POST["cr"];
}

if($cr == 0){
	header("Location: http://www.direct-commu.com/reqruit/teacher/");
	exit();
}

//==========================================================================================
//値取得
//==========================================================================================

//namae
if(isset($_POST["namae"])){
	$namae = $_POST["namae"];
}

//namae
if(isset($_POST["furigana"])){
	$furigana = $_POST["furigana"];
}

//phone
if(isset($_POST["phone"])){
	$phone = $_POST["phone"];
}

//email
if(isset($_POST["email"])){
	$phone = $_POST["email"];
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
if(isset($_POST["sex"])){
	$sex = $_POST["sex"];
}

//gakureki
if(isset($_POST["gakureki"])){
	$gakureki = $_POST["gakureki"];
}

//shokureki
if(isset($_POST["shokureki"])){
	$shokureki = $_POST["shokureki"];
}

//shokureki
if(isset($_POST["interest"])){
	$interest = $_POST["interest"];
}

//work
if(isset($_POST["work"])){
	$work = $_POST["work"];
}


//question 受講の動機 / お悩み / ご質問等
if(isset($_POST["question"])){
	$question = $_POST["question"];
}

//==========================================================================================
//スパムフィルタ
//==========================================================================================

$str = $namae;
$aa = preg_match("/^[a-zA-Z0-9<>]*[a-zA-Z0-9<>]$/",$str);
if($aa == 1){
	header("Location: http://www.direct-commu.com/reqruit/");
	exit();
}




//======================================================================
//■お問い合わせメール送信
//======================================================================
mb_language("Ja") ;
mb_internal_encoding("utf-8") ;

$to_email_masuda = "m.yosuke@kyconsul.org";
$to_email_kawashima = "kawashima@direct-comm.com";


$content = "
求人募集ページからお問い合わせがありました。\n
\n".
"お名前：".$namae."\n".
"ふりがな：".$furigana."\n".
"電話番号：".$phone."\n".
"メールアドレス：".$email."\n".
"住所：".$address."\n".
"年齢：".$age."\n".
"性別：".$sex."\n".
"学歴/資格など："."\n".$gakureki."\n".
"職歴："."\n".$shokureki."\n".
"心理学で興味がある分野："."\n".$interest."\n".
"希望する職種："."\n".$work."\n".
"ご質問："."\n".$question."\n".


"\n\n--------------------------------------------------------\n".
"●株式会社ダイレクトコミュニケーション●\n".
"\n".
"運営:株式会社ダイレクトコミュニケーション http://www.direct-commu.com\n".
"mail:info@direct-commu.com\n".
"--------------------------------------------------------";


$mailfrom= "From: direct-commu.com<info@direct-commu.com>";
$subject = "求人募集ページから問い合わせがあります";

//masuda
mb_send_mail($to_email_masuda,$subject,$content,$mailfrom);

//kawashima
mb_send_mail($to_email_kawashima,$subject,$content,$mailfrom);


//======================================================================
//■お問い合わせメール送信完了ページへ
//======================================================================


header("Location: http://www.direct-commu.com/reqruit/teacher/sended.php");
exit();	



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="author" content="株式会社ダイレクトコミュニケーション" /><title></title>
</head>

<body>
<!-- google analytics -->
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-39326739-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>
</html>
