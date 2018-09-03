<?php

mb_language("Ja") ;
mb_internal_encoding("utf-8") ;

$to_email_masuda = "yosuke2006@gmail.com";
//$to_email_kawashima = "kawashima@direct-commu.com";


$content = "testtesttest".
"\n\n--------------------------------------------------------\n".
"●株式会社ダイレクトコミュニケーション●\n".
"\n".

"--------------------------------------------------------";


//$mailfrom= "From: direct-commu.com<info@direct-commu.com>";
$mailfrom= "From: yomasu.com<mail@yomasu.com>";

$subject = "あああ";

//masuda
mb_send_mail($to_email_masuda,$subject,$content,$mailfrom);

//kawashima
//mb_send_mail($to_email_kawashima,$subject,$content,$mailfrom);





?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>send_test</title>
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
</body>
</html>