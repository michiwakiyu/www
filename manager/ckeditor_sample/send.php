<?php

$editor1 = $_POST["editor1"];

$editor1 = str_replace('<div id="UMS_TOOLTIP" style="position: absolute; cursor: pointer; z-index: 2147483647; background-image: initial; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: transparent; top: -100000px; left: -100000px; background-position: initial initial; background-repeat: initial initial; "><img class="UMSRatingIcon" id="ums_img_tooltip" /></div>','',$editor1);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>send</title>


</head>

<body>
<?=htmlspecialchars($editor1)?>
</body>
</html>
