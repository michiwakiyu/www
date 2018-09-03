<?php

require_once ("/home/users/2/lolipop.jp-dp58180317/web/www/manager/config.php");


//article_id
$sql0 = "select * from article_themes";
$result0 = mysql_query($sql0) or die("e");
$article_id = mysql_num_rows($result0) + 1;


$theme = $_POST["theme"];

$flag=1;
$date = date("Y/m/d H:i:s");
$id = 0;


$sql = "insert into article_themes values('".$theme."','".$article_id."',".$flag.",'".$date."',".$id.")";
$result = mysql_query($sql) or die("e");



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

//cache削除
$dir = '/home/users/2/lolipop.jp-dp58180317/web/www/training/tmp/';
$dir2 = '/home/users/2/lolipop.jp-dp58180317/web/www/sp/training/tmp/';

deleteFile($dir);
deleteFile($dir2);




?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>テーマを追加</title>
</head>

<body>
テーマ追加完了
</body>

</html>