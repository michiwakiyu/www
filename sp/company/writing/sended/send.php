<?php

//==========================================================================================
//cr値
//==========================================================================================

$cr = 0;
if(isset($_POST["cr"])){
	$cr = $_POST["cr"];
}

if($cr == 0){
	header("Location: http://www.direct-commu.com/company/writing/index.html");
	exit();
}

//==========================================================================================
//値取得
//==========================================================================================

//namae1
if(isset($_POST["namae1"])){
	$namae1 = $_POST["namae1"];
}

//namae2
if(isset($_POST["namae2"])){
	$namae2 = $_POST["namae2"];
}

//phone1
if(isset($_POST["phone1"])){
	$phone1 = $_POST["phone1"];
}

//phone2
if(isset($_POST["phone2"])){
	$phone2 = $_POST["phone2"];
}

//email
if(isset($_POST["email"])){
	$email = $_POST["email"];
}

//quantity
if(isset($_POST["quantity"])){
	$quantity = $_POST["quantity"];
}

//question1
if(isset($_POST["question1"])){
	$question1 = $_POST["question1"];
}

//question2
if(isset($_POST["question2"])){
	$question2 = $_POST["question2"];
}



//======================================================================
//■仮予約メール送信
//======================================================================
mb_language("Ja") ;
mb_internal_encoding("utf-8") ;

$to_email_masuda = "m.yosuke@kyconsul.org";
$to_email_kawashima = "kawashima@direct-commu.com";


$content = "
スマホサイトから執筆依頼のお問い合わせがありました。\n\n
\n".
"会社・団体名：".$namae1."\n".
"ご担当者様氏名：".$namae2."\n".
"電話番号：".$phone1."\n".
"電話連絡のご希望：".$phone2."\n".
"メールアドレス：".$email."\n".
"予定している文章量：".$quantity."\n".
"内容についてのご要望：".$question1."\n".
"弊社へのご質問：".$question2."\n".



"\n\n--------------------------------------------------------\n".
"●株式会社ダイレクトコミュニケーション●\n".
"\n".
"運営:株式会社ダイレクトコミュニケーション http://www.direct-commu.com\n".
"mail:info@direct-commu.com\n".
"--------------------------------------------------------";


$mailfrom= "From: direct-commu.com<info@direct-commu.com>";
$subject = "スマホサイトから執筆依頼の問い合わせがあります";

//masuda
mb_send_mail($to_email_masuda,$subject,$content,$mailfrom);
//kawashima
mb_send_mail($to_email_kawashima,$subject,$content,$mailfrom);




//======================================================================
//■執筆依頼メール送信完了ページへ
//======================================================================



header("Location: http://www.direct-commu.com/company/writing/sended/sended.php?id=1");
exit();




?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>

<body>
<p>スマートフォン</p>
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
