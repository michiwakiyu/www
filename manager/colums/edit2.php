
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>edit</title>
<link href="./css/style.css" rel="stylesheet" type="text/css" media="all" />

</head>

<?php

require_once ("/home/users/2/lolipop.jp-dp58180317/web/www/manager/colums/config.php");

$category = $_POST["category"];
$theme = $_POST["theme"];
$tag = $_POST["tag"];
$keywords = $_POST["keywords"];
$description = $_POST["description"];
$title = $_POST["title"];
$h1 = $_POST["h1"];
$h2 = $_POST["h2"];
$h3 = $_POST["h3"];
$c_title = $_POST["c_title"];
$c_contents = $_POST["c_contents"];
$url = $_POST["url"];
$access = $_POST["access"];
$date = $_POST["date"];
$id = $_POST["id"];

$c_contents = str_replace('<div id="UMS_TOOLTIP" style="position: absolute; cursor: pointer; z-index: 2147483647; background-image: initial; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: transparent; top: -100000px; left: -100000px; background-position: initial initial; background-repeat: initial initial; "><img class="UMSRatingIcon" id="ums_img_tooltip" /></div>','',$c_contents);




//$sql = update colums_copy set category='$category', theme='$theme', tag='$tag', keywords='$keywords', description='$description', title='$title', h1='$h1', h2='$h2', h3='$h3', c_title='$c_title', c_contents='$c_contents', url='$url', access='$access', date='$date' where url='$url';


$sql = "update colums_u set category='".$category."', theme='".$theme."', tag='".$tag."', keywords='".$keywords."', description='".$description."', title='".$title."', h1='".$h1."', h2='".$h2."', h3='".$h3."', c_title='".$c_title."', c_contents='".$c_contents."', url='".$url."', access='".$access."', date='".$date."' where id='".$id."'";


mysql_query($sql) or die("e");


?>

<body>

<p>編集完了！</p>


</body>
</html>