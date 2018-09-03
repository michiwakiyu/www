<?php

require_once ("/home/users/2/lolipop.jp-dp58180317/web/www/manager/config.php");

$theme_id = $_POST["theme_id"];
$theme = $_POST["theme"];
$flag  = $_POST["flag"];


//キャッシュ削除用関数
function deleteFile($dir)
{
        if (!$handle=opendir($dir)) die("ディレクトリの読み込みに失敗しました");
        while($filename=readdir($handle))
        {
                if(!preg_match("/^\./", $filename))
                {
                        if (!unlink("$dir/$filename")) die("ファイルの削除に失敗しました");
                }
        }
}// end function


$sql = "update article_themes set theme='".$theme."', flag='".$flag."' where theme_id='".$theme_id."'";
$result = mysql_query($sql) or die("e");


$dir = '/home/users/2/lolipop.jp-dp58180317/web/www/training/tmp/';
$dir2 = '/home/users/2/lolipop.jp-dp58180317/web/www/sp/training/tmp/';

deleteFile($dir);
deleteFile($dir2);


header("Location: index.php?edit=1");
exit();






?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>テーマを編集</title>
</head>

<body>

編集完了


</body>
</html>