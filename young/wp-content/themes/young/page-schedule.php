<?php
$db_host = "mysql5014.xserver.jp";
$db_user = "directcommu_main";
$db_pass = "JASMF3uBdNpjFJWe";
$db_name = "directcommu_main";

/*
$db_host = "localhost";
$db_user = "root";
$db_pass = "wordpress";
$db_name = "LA08419899-directcomm";
*/

$db = mysqli_connect($db_host,$db_user,$db_pass);
mysqli_set_charset($db, "utf8");
mysqli_select_db($db, $db_name);

$sql = "select * from schedules where class='young' and flag=1";
$result = mysqli_query($db, $sql) or die("e2");
while($rows = mysqli_fetch_array($result)){
	$html = $rows["html"];
}
?>
<?php get_header(); ?>
<div id="container" class="young">
<?php get_sidebar(); ?>
<div id="content">
<div class="main">
<h1 class="headline-01">開催日程</h1>
<?php echo $html; ?>

<h1 class="headline-01">アイコンの説明</h1>
<ul class="icon_list">
<li class="manseki">継続中の方のみご参加可能です</li>
<li class="hoboman">残り1～3席となっています</li>
<li class="hatsusanka">講座初参加の方でも安心してご参加いただけます</li>
</ul>

<h1 class="headline-01">定員</h1>
＊定員20名前後、受講は仮予約の先着順となります<br />
＊定員に達した場合、欠員が出てからの受講になります<br /><br />

<h1 class="headline-01">お休みされる場合</h1>
お休みをされる場合は、３日以内であれば代金は来月へストックされます。<br />
下記フォームからお休みする日程をご記入の上ご送信ください。<br />
その際、未成年講座の参加中とご記入頂けると幸いです。<br /><br />
<a href="http://www.direct-commu.com/company/contact.html">http://www.direct-commu.com/company/contact.html</a><br /><br />

<h1 class="headline-01">満席時でも継続は最優先</h1>
教室が満席の場合でも原則として、継続されている方のお席は確保されています。<br />
満席でも教室の変更がない場合はお振込みを頂き、そのままご継続頂けると幸いです。<br /><br />

<h1 class="headline-01">未成年教室の場所</h1>
■JR中央線・総武線、東京メトロ丸ノ内線／御茶ノ水駅　下車徒歩約3分 <br />
■東京メトロ千代田線／新御茶ノ水駅　下車徒歩約5分<br />
■都営地下鉄三田線・新宿線、東京メトロ半蔵門線／神保町駅　下車徒歩約5分<br /><br />
<img src="<?php echo get_template_directory_uri(); ?>/img/surugadai_1.png">
<br />
※公式ホームページより引用<br /><br />

<h1 class="headline-01">服装について</h1>
私服でいらっしゃってください♪

</div><!-- end main -->
</div><!-- end content -->
</div><!-- end container -->

<?php get_sidebar('sp'); ?>

<?php get_footer(); ?>
