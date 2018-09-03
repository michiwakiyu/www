<?php

require_once ("/home/users/2/lolipop.jp-dp58180317/web/www/manager/config.php");

$theme_id = $_POST["theme_id"];
$title = $_POST["title"];
$title_page = $_POST["title_page"];
$article_id = $_POST["article_id"];
$author = $_POST["author"];

$h1 = $_POST["h1"];
$h2 = $_POST["h2"];
$h3 = $_POST["h3"];
$keywords = $_POST["keywords"];
$description = $_POST["description"];

$content = $_POST["content"];



$exp = $_POST["exp"];
$flag = $_POST["flag"];
$date = $_POST["date"];

$id = $_POST["id"];




//iamge1の画像ファイルがある

if($_FILES["image1"]["name"] != ""){

//echo "画像ファイルアリ！".$_FILES["image1"]["name"];

	//===========================================================================================
	//画像ファイル名をmd5時分秒
	//===========================================================================================

	$image1 = $_FILES["image1"]["name"];
	$img_ext1 = mb_substr($image1,-3);
	$image1 = md5($image1).date("YmdHis").".".$img_ext1;

	//===========================================================================================
	//画像アップロード機能
	//===========================================================================================

	$updir = "/home/users/2/lolipop.jp-dp58180317/web/www/sp/training/images/";
	
	//サーバに保存される一時ファイル	
	$tmp_file1 = $_FILES["image1"]["tmp_name"];

	//画像をディレクトリ移動　$updirへ
	move_uploaded_file($tmp_file1,$updir.$image1);
	
	//PC用ディレクトリにもコピー
	copy("../../../sp/training/images/".$image1, "../../../training/images/".$image1);
	
	
	
	//sqlアップデート
	$sql_image1 = "update article_titles set image1='".$image1."' where id='$id'";
	$result_image1 = mysql_query($sql_image1) or die("e_image1");
	

	}else{

}// end iamge1 if






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



//$sql = update article_titles set theme_id='$theme_id', title='$title', title_page='$title_page', article_id='$article_id', author='$author', h1='$h1', h2='$h2', h3='$h3', keywords='$keywords', description='$description', image1='$image1', image2='$image2', image3='$image3', exp='$exp', flag='$flag', date='$date' where id='$id';

$sql = "update article_titles set theme_id='".$theme_id."', title='".$title."', title_page='".$title_page."', article_id='".$article_id."', author='".$author."', h1='".$h1."', h2='".$h2."', h3='".$h3."', keywords='".$keywords."', description='".$description."', content='".$content."', exp='".$exp."', flag='".$flag."', date='".$date."' where id='".$id."'";

$result = mysql_query($sql) or die("e");

//cache削除
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
<title>記事を編集</title>
</head>

<body>
</body>
</html>
