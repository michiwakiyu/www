<?php

//session_start();

//require_once("/home/direct-commu/config.php");

$db_host = "mysql501.phy.lolipop.jp";
$db_user = "LA08419899";
$db_pass = "6B87rrUc";
$db_name = "LA08419899-directcomm";

mysql_connect($db_host,$db_user,$db_pass);
mysql_set_charset("utf8");
mysql_select_db($db_name);

//編集完了時
if(isset($_GET["edit"])){
	$edit = $_GET["edit"];
	
	if($edit == 1){
		$mes = "スケジュールの編集を完了しました";
	}else{
		$mes = "";
	}
}


//看板の情報を取得

$sql_info = "select * from classinfos where class='yokohama' and flag='1'";
$result_info = mysql_query($sql_info) or die("e3");
$rows_info = mysql_fetch_array($result_info);

if($rows_info["info_beginner"] == 1){
	$beginner = "<img src=\"../../../common/images/course/schedule/beginer.gif\" />";
	$checked_yes = "checked=\"checked\"";
	$checked_no  = "";
	
}else{
	$beginner = "";
	$checked_yes = "";
	$checked_no  = "checked=\"checked\"";	
}

$illust_name = $rows_info["info_illust"];
$illust_name = str_replace("gif","",$illust_name);
$illust_name = substr($illust_name,0,-1);


$illust = "<img src=\"../../../common/images/course/schedule/".$rows_info["info_illust"]."\" />";


//ここから先ラジオボタン自動選択のための記述

if($illust_name == "illust_mental_001"){ $checked_01 = "checked=\"checked\""; }
if($illust_name == "illust_mental_002"){ $checked_02 = "checked=\"checked\""; }
if($illust_name == "illust_relation_001"){ $checked_03 = "checked=\"checked\""; }
if($illust_name == "illust_relation_002"){ $checked_04 = "checked=\"checked\""; }
if($illust_name == "illust_relation_003"){ $checked_05 = "checked=\"checked\""; }
if($illust_name == "illust_relation_004"){ $checked_06 = "checked=\"checked\""; }
if($illust_name == "illust_business_001"){ $checked_07 = "checked=\"checked\""; }
if($illust_name == "illust_business_002"){ $checked_08 = "checked=\"checked\""; }



$hoge = <<<EOF
    <div id="illust_wrapper">
    <div class="box">
    <input type="radio" name="illust" id="illust_mental_001" $checked_01 value="<img src='http://www.direct-commu.com/common/illust/michi/schedule/illust_mental_001.gif' />">
    心理学講座
    1<br />
    <img src='http://www.direct-commu.com/common/illust/michi/schedule/illust_mental_001.gif' />
    </div>
   
    <div class="box">    
    <input type="radio" name="illust" id="illust_mental_002" $checked_02 value="<img src='http://www.direct-commu.com/common/illust/michi/schedule/illust_mental_002.gif' />">
    心理学講座２<br />
    <img src='http://www.direct-commu.com/common/illust/michi/schedule/illust_mental_002.gif' />
  </div>
  
    <div class="box">    
    <input type="radio" name="illust" id="illust_relation_001" $checked_03 value="<img src='http://www.direct-commu.com/common/illust/michi/schedule/illust_relation_001.gif' />">
    傾聴力UP<br />
    <img src='http://www.direct-commu.com/common/illust/michi/schedule/illust_relation_001.gif' /></div>
    
    <div class="box">    
    <input type="radio" name="illust" id="illust_relation_002" $checked_04 value="<img src='http://www.direct-commu.com/common/illust/michi/schedule/illust_relation_002.gif' />">
    アサーティブ<br />
    <img src='http://www.direct-commu.com/common/illust/michi/schedule/illust_relation_002.gif' /></div>
    
    <div class="box">    
    <input type="radio" name="illust" id="illust_relation_003" $checked_05 value="<img src='http://www.direct-commu.com/common/illust/michi/schedule/illust_relation_003.gif' />">
    発話力UP<br />
    <img src='http://www.direct-commu.com/common/illust/michi/schedule/illust_relation_003.gif' /></div>    
   
    <div class="box">    
    <input type="radio" name="illust" id="illust_relation_004" $checked_06 value="<img src='http://www.direct-commu.com/common/illust/michi/schedule/illust_relation_004.gif' />">
    悩みの相談技術<br />
    <img src='http://www.direct-commu.com/common/illust/michi/schedule/illust_relation_004.gif' /></div>  
    
    
      <div class="box">    
    <input type="radio" name="illust" id="illust_business_001" $checked_07 value="<img src='http://www.direct-commu.com/common/illust/michi/schedule/illust_business_001.gif' />">
    社会人基礎 <br />
    <img src='http://www.direct-commu.com/common/illust/michi/schedule/illust_business_001.gif' /></div>  
    
      <div class="box">    
    <input type="radio" name="illust" id="illust_business_002" $checked_08 value="<img src='http://www.direct-commu.com/common/illust/michi/schedule/illust_business_002.gif' />">
    集団のコミュニケーション<br />
    <img src='http://www.direct-commu.com/common/illust/michi/schedule/illust_business_002.gif' /></div>          
    
    
</div><!-- end illust_wrapper -->
EOF;





?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="author" content="株式会社ダイレクトコミュニケーション" /><title>横浜教室の看板</title>
<link href="./css/style.css" rel="stylesheet" type="text/css" media="all" />

<link href="./css/style.css" rel="stylesheet" type="text/css" media="all" />
<script src="./js/jquery.js" type="text/javascript"></script>
<script src="./js/jquery.magicpreview.js" type="text/javascript"></script>
<script src="./js/mymagicpreview.js" type="text/javascript"></script>
<script src="./ckeditor/ckeditor.js" type="text/javascript" ></script>

<!-- 以下JSは使わなかった-->
<script>
$(function(){
	//$("input[name='mobilephone'][value='au']").attr("checked", true);	
	var hensu = "<?=$illust_name?>";
	$('input#'+hensu).attr("checked",true);
});
</script>


</head>

<body>

<p class="title01"><?=$mes?></p>
<p style="text-align: center">教室看板マネージャー</p>
<p style="text-align: center"><a href="edit_shinjuku01.php">新宿第１教室</a>　｜　<a href="edit_shinjuku02.php">新宿第２教室</a>　|　<a href="edit_ginza.php">銀座教室</a>　|　<a href="edit_saitama.php">埼玉教室</a>　|　<a href="edit_yokohama.php">横浜教室</a>　|　<a href="edit_kansai.php">関西教室</a></p>
<h1>横浜教室の看板</h1>


<div id="container">
<form action="./edit2_yokohama.php" method="post" class="example">

<table>
<tr>
<td class="left">
  ①開催日：
    <input type="text" name="date" class="test" value="<?=$rows_info["info_date"]?>" />
    <br />
    <br />
②講座タイトル：
<input type="text" name="title" class="test" value="<?=$rows_info["info_title"]?>" />
<br />
<br />
③初参加おススメ？：　
<br />
<input type="radio" name="beginner" <?=$checked_yes?> value="<img src='http://www.direct-commu.com/common/images/course/schedule/beginer.gif'>">
はい
<input type="radio" name="beginner" <?=$checked_no?>  value="<img src='http://www.direct-commu.com/common/images/course/schedule/no_beginer.gif'>">いいえ

<!--<input type="radio" name="beginner" id="checked_yes" value="<img src='http://www.direct-commu.com/common/images/course/schedule/beginer.gif'>">はい
<input type="radio" name="beginner" id="checked_no"  value="<img src='http://www.direct-commu.com/common/images/course/schedule/no_beginer.gif'>">いいえ-->
<br />
<br />


④講座内容<br />
<textarea id="exp" name="exp" class="test"><?=$rows_info["info_exp"]?></textarea>
<br />
<br />

<p>⑤イラストを選択：  </p>
<?=$hoge?>
</td>

<td class="right" valign="top">

<p style="text-align: center">プレビュー</p>

<div id="info" class="class_yokohama">
<span id="date"><span id="mp_date"></span></span>
<span id="beginner"><span id="mp_beginner"></span></span>
<span id="title"><span id="mp_title"></span></span>
<span id="mp_exp"></span>
<div id="illustbox"><span id="mp_illust"></span></div>
</div><!-- end info -->

<p>&nbsp;    </p>
<p style="text-align: center"><input type="image" src="../../images/btn_schedule.gif" /></p>
  
</td>
</tr>
</table>
</form>
</div><!-- end container -->


<script type="text/javascript">
        if ( typeof CKEDITOR == 'undefined' )
        {
        }
        else
        {
            var editor = CKEDITOR.replace( 'exp' );
            //editor.setData( '' );

			//editor.on( 'change', function(e) { console.log(e) }); 
			/*for (var i in CKEDITOR.instances) {
					CKEDITOR.instances[i].on('change', function() {alert('変化した')});
				}  */
			for (var i in CKEDITOR.instances) {
					CKEDITOR.instances[i].on('change', 
						function() {
							//alert('変化した');
							$(function(){ // start jquery
								
								//var neruma = $('#exp').val();
								//alert(neruma);
							data = CKEDITOR.instances[i].getData();
							$('#mp_exp').html(data);
	
							});//end jquery
							
									   
						}); //end function
			}//end for		
				
        }// end if
</script>

</body>
</html>
