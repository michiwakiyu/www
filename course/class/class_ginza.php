<?php

//session_start();

//require_once("/home/direct-comm/config.php");

$db_host = "mysql501.phy.lolipop.jp";
$db_user = "LA08419899";
$db_pass = "6B87rrUc";
$db_name = "LA08419899-directcomm";

mysql_connect($db_host,$db_user,$db_pass);
mysql_set_charset("utf8");
mysql_select_db($db_name);

$sql = "update colums set access=access+1 where url='http://www.direct-commu.com/colums/business/".$c_id.".html'";


$sql = "select * from schedules where class='ginza' and flag=1";
$result = mysql_query($sql) or die("e2");
while($rows = mysql_fetch_array($result)){
	$html = $rows["html"];
}

//看板の情報を取得

$sql_info = "select * from classinfos where class='ginza' and flag='1'";
$result_info = mysql_query($sql_info) or die("e3");
$rows_info = mysql_fetch_array($result_info);

if($rows_info["info_beginner"] == 1){
	$beginner = "<img src=\"../../common/images/course/schedule/beginer.gif\" />";
}else{
	$beginner = "";
}

$illust = "<img src=\"../../common/illust/michi/schedule/".$rows_info["info_illust"]."\" />";


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<META name="description" content="実力がみるみるつく！話し方教室・講座ならダイコミュへ♪！会話や人間関係に関する力がつくノウハウがたっぷり！東京,銀座,有楽町,上野,千葉のスケジュール">
<META name="keywords" content="話し方教室,講座,セミナー,東京,銀座,有楽町,上野,千葉">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="author" content="株式会社ダイレクトコミュニケーション" /><title>話し方教室・講座でコミュ力UP！会場→東京,銀座,有楽町,上野,千葉</title>

<link href="../../common/css/base.css" rel="stylesheet" type="text/css" media="all" />
<link href="../../common/css/header.css" rel="stylesheet" type="text/css" media="all" />
<link href="../../common/css/sidebar.css" rel="stylesheet" type="text/css" media="all" />
<link href="../../common/css/footer.css" rel="stylesheet" type="text/css" media="all" />
<link href="../../common/css/content.css" rel="stylesheet" type="text/css" media="all" />

<script type="text/javascript" src="../../common/js/smoothscroll.js"></script>
<script type="text/javascript" src="../../common/js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="../../common/js/jquery.validate.js"></script>
<script type="text/javascript" src="../../common/js/fadein.js"></script>
<script type="text/javascript" src="../../common/js/onoff.js"></script>
<script type="text/javascript" src="../../common/js/ua.js"></script>
<script type="text/javascript" src="../../common/js/smart-crossfade.js"></script>


</head>

<body>
<a name="page_top"></a>
<div id="ua"></div>

    <div id="header" style="padding-top: 0px">

<div id="onoffbtn"><a href="http://www.direct-commu.com/course/mailmag.html" id="open"></a></div>
<div id="headercontainer">

<div id="headerright"><!-- --></div>
<div id="logowrap"><a href="http://www.direct-commu.com/"><img src="../../common/sharedimg/logo_directcomm.gif" alt="ダイレクトコミュニケーション能力,話し方教室" /></a></div>
<!--<ul>
<li><a href="http://www.direct-commu.com/reqruit/teacher.html">講師・心理士 募集</a></li>
<li><a href="http://www.direct-commu.com/reqruit/assistant.html">アシスタント 募集</a></li>
<li><a href="http://www.direct-commu.com/company/contact.html">お問い合わせ</a></li></ul>-->
<ul>
<li><a href="http://www.direct-commu.com/company/contact.html"><img src="../../common/sharedimg/header/btn_contact_cloud_off.png" class="hover" /></a></li>
</ul>
</div><!-- end headercontainer -->

<ul id="gnav">
<li id="home"><a href="http://www.direct-commu.com/">ホーム</a></li>
<li id="course"><a href="http://www.direct-commu.com/course/" class="selected">コミュニケーション講座</a></li>
<li id="text"><a href="http://www.direct-commu.com/text/">ダイコミュ通信講座</a></li>
<li id="training"><a href="http://www.direct-commu.com/training/">コミュニケーション能力トレーニング</a></li>
<li id="ability"><a href="http://xn--zckzah9129bsdgbusdye.jp/">コミュニケーション能力診断</a></li>
<li id="colums"><a href="http://www.direct-commu.com/colums/">コミュニケーションコラム集</a></li>
<li id="event"><a href="http://www.direct-commu.com/event/">ダイコミュイベント</a></li>
<li id="teacher"><a href="http://www.direct-commu.com/profile/">講師紹介</a></li>
</ul><!-- end gnav -->
</div><!-- end header -->

<div id="topicpath">

<div id="topicleft"><a href="http://www.direct-commu.com/">ホーム</a> &gt; <a href="http://www.direct-commu.com/">コミュニケーション講座</a> &gt;
<h1>実力がつく！人数限定の話し方教室・講座です・詳しくはTOPへ,東京,銀座,有楽町,上野,千葉</h1>
</div><!-- end topicleft -->
<div id="topicright">
  <h2>話し方教室,講座,セミナー,東京,銀座,有楽町,上野,千葉</h2>
</div><!-- end topicright -->
</div><!-- end topicpath -->
<DIV id="container">

<div id="sidebar">
<a href="http://www.direct-commu.com/course/"><img src="../../common/sharedimg/course/img_title_course.gif" width="290" height="44" /></a>
<div class="nav">
<ul style="margin-top: 0">
<li><a href="http://www.direct-commu.com/course/1_intro.html">はじめての方へ</a></li>
</ul>
<p><img src="../../common/sharedimg/course/title_sidebar_01_course.gif" alt="基本コース" /></p>
<ul>
<li><a href="http://www.direct-commu.com/course/mental.html">心理学コース</a></li>
<li><a href="http://www.direct-commu.com/course/ningenkankei.html">人間関係コース</a></li>
<li><a href="http://www.direct-commu.com/course/business.html">社会人基礎コース</a></li>
</ul>
<p><img src="../../common/sharedimg/course/title_sidebar_02_tanki.gif" alt="短期集中コース" /></p>
<ul>
<li><a href="http://www.direct-commu.com/course/01_kanto/index.html">関東短期集中講座　<img src="http://www.direct-commu.com/common/images/course/icon_date_tanki.png" width="70" /></a></li>
</ul>

<p><img src="../../common/sharedimg/course/title_sidebar_03_counseling.gif" alt="カウンセリング" /></p>

<ul>
<li><a href="http://www.direct-commu.com/course/counseling/group.html">グループカウンセリング
</a>
<li><a href="http://www.direct-commu.com/course/counseling/psychology.html">心理カウンセリング</a></li>
<li><a href="http://www.direct-commu.com/course/counseling/shinri.html">心理検査</a></li>
</ul>

<p><img src="../../common/sharedimg/course/title_sidebar_04_price.gif" alt="受講料金" /></p>

<ul>
<li><a href="http://www.direct-commu.com/course/4_price.html">基本コース 受講料金
</a>
<li><a href="http://www.direct-commu.com/course/4_2_price.html">カウンセリング 受講料金</a></li>
</ul>

</div><!-- end nav -->

<div class="navbottom"><!-- --></div><!-- end navbottom -->
<img src="../../common/sharedimg/course/img_title_course_about.gif" width="290" height="44" />
<div class="nav">
<p><img src="../../common/sharedimg/course/title_sidebar_04_schedule.gif" alt="スケジュール・会場" /></p>
<ul>
<li><a href="http://www.direct-commu.com/course/class/class_shinjuku.php">新宿第１教室
</a></li>
<li><a href="http://www.direct-commu.com/course/class/class_shinjuku_02.php">新宿第２教室
</a></li>
<li><a href="http://www.direct-commu.com/course/class/class_ginza.php" class="selected">銀座教室</a></li>
<li><a href="http://www.direct-commu.com/course/class/class_yokohama.php">横浜教室</a></li>
<li><a href="http://www.direct-commu.com/course/class/class_saitama.php">埼玉教室</a></li>
<li><a href="http://www.direct-commu.com/course/class/class_kansai.php">関西教室</a></li>
</ul>
<p><img src="../../common/sharedimg/course/title_sidebar_05_reservation.gif" alt="仮予約" /></p>
<ul>
<li><a href="http://www.direct-commu.com/course/6_reservation.html">仮予約する</a></li>
</ul>

<p><img src="../../common/sharedimg/course/title_sidebar_06_other.gif" alt="その他・注意事項" /></p>
<ul>
<!--<li><a href="http://www.direct-commu.com/course/5_confirmation.html">注意事項</a></li>-->
<!--<li><a href="http://www.direct-commu.com/course/4_price.html">受講料金</a></li>-->
<li><a href="http://www.direct-commu.com/course/keizoku.html">継続について</a></li>
<li><a href="http://www.direct-commu.com/course/furikae.html">振替について</a></li>
<li><a href="http://www.direct-commu.com/course/seitosannokoe.html">生徒さんの声</a></li>
<li><a href="http://www.direct-commu.com/course/yokuarushitumon.html">よくある質問</a></li>
</ul>


</div><!-- end nav -->
<div class="navbottom"><!-- --></div><!-- end navbottom -->
</div><!-- end sidebar -->

<hr class="clear" />

<div id="content">
<div id="contenttop"><!-- --></div><!-- end contenttop -->

<div class="main">
<div id="info" class="class_ginza">
<span id="date"><?=$rows_info["info_date"]?></span>
<span id="beginner"><?=$beginner?></span>
<span id="title"><?=$rows_info["info_title"]?></span>
<?=$rows_info["info_exp"]?>
<div id="illustbox"><?=$illust?></div>

</div><!-- end info -->


<P class="title_01">銀座教室の雰囲気</P>

<div class="wrap">

<p>銀座教室は心理学講座を3ヶ月,人間関係講座を10ヶ月で一巡しています。<br />
国際フォーラムなので講座後のお茶会も場所が豊富です。楽しみですね♪<br />
メンバーは気さくな方が多いですよ♪初参加の方もお待ちしています<br />
</p>
</div><!-- end wrap -->



<p class="title_01">銀座教室の日程</p>

<div class="wrap">
<?=$html?>
</div><!-- end wrap -->

<p class="title_01">準備について</p>

<div class="wrap">
<p>コミュニケーション講座は安価な料金を達成するために、<br />
必要以上のアシスタントを雇わず、<br />
生徒さんと一緒に行うことを原則としています。<br />
お時間がある方は20分前に講座にいらっしゃって<br />
頂けるととっても助かります（＾＾）<br />
<br />
準備時間に交流が進んだり、緊張が解けたりしますよ！<br />
わいわいがやがや一緒に準備をしましょう♪<br />
<br />
もちろん時間がない方はゆっくりいらっしゃってくださいね。</p>
</div><!-- end wrap -->

<p class="title_01">チームミーティングについて～1人ではなく皆で練習しましょう～</p>
 
<div class="wrap">
<p>コミュニケーション講座では、講座の効果を<BR>
確実なものにするために、<BR>
1時間程度のチームミーティング宿題が出ます。<BR>
<BR>
チーム宿題とは4,5人のチームを作って<BR>
行う宿題です。会話の練習などを講座後に行って行きます。<BR>
なるべくスケジュールを空けておいてください♪<BR>
<BR>
但し、お仕事の都合や通い方にはそれぞれ<BR>
スタンスがあると思うのでそのまま帰るのもOKです！<BR>
<br />
</p>
</div><!-- end wrap -->
 
<p class="title_01">実際の人間関係を築こう～イベント・練習会・食事会も開いてみましょう～</p>
 
<div class="wrap">
<p>講座で成果を出すには、講義を受けるだけでなく、<BR>
生徒さん同士、一緒に考えたり、支えあうことが<BR>
何より大事になります。<BR>
<BR>
伝統的に講座では誰かが、練習会、飲み会、<BR>
悩みの相談会、山登りをすることを<BR>
大事にしています。<BR>
<BR>
こういった生の人間関係を築くことはちょっと勇気が<BR>
必要なのかもしれません。でも失敗するのはあたりまえです♪<BR>
お互い失敗しながら、ゆっくり一緒に成長していきましょう。<BR>
そして、もし講座の中で企画をしてくれる人が出てきたり、<BR>
何か落ち込んでいる人がいたら、皆で支えあっていきましょう。<BR>
<BR>
もちろん、ご自身が成長するために、<BR>
企画をしてみるのもOK！応援しています！<BR>
<BR>
<br />
</p>
</div><!-- end wrap -->

<p class="title_01">mixiへの登録について</p>

<div class="wrap">
<p>コミュニケーション講座の効果を向上させるには、<br />
生徒さん同士で助けあうことがとても大事です。<br />
そこで宿題を効率よく行ったり、ワーク外での繋がりを作るために、<br />
mixiの登録をおススメしています。<br />
生徒さんの7割が入って楽しくやり取りしています。<br />
講座へご参加される前にMIXIに入ることをおススメします^^</p>
<p><a href="http://www.direct-commu.com/mixi.html">mixiの利用の仕方についてはこちら</a></p>
</div><!-- end wrap -->

<p class="title_01">途中参加について</p>

<div class="wrap">
<p>講座については原途中参加がしやすいようにカリキュラムを組んでおります。<br />
各教室原則として1年間で一巡致しますので、まずは気軽にご参加ください^^<br />
月の後半から途中参加の場合は次月分を含めた1.5ヶ月払い（4%off）となります。</p>
<p>＊　多くの方が途中参加されています♪<br />
  ＊　拍子抜けするぐらいリラックスした講座です。<br />
  是非気軽にご参加下さい！</p>
</div><!-- end wrap -->

<p class="title_01">定員</p>

<div class="wrap">
<p>＊定員20名、受講は仮予約の先着順となります<br />
＊定員に達した場合、欠員が出てからの受講になります</p>
</div><!-- end wrap -->


<p class="title_01">振替について（お休みされる場合）</p>

<div class="wrap">
<p>振替をご希望の方は<a href="http://www.direct-commu.com/course/schedule.html">こちら</a>の全体スケジュールを参照の上<br />
<a href="http://www.direct-commu.com/course/furikae.html">振替ページ</a>からご希望日をご連絡ください<br />
受講できない日も他の教室で振替が可能です<br />
</p>
</div><!-- end wrap -->


<p class="title_01">銀座教室の場所</p>


<table class="table010">

<tr>
  <td><strong>東京国際フォーラム</strong> </td>
  <td><br />
    東京都千代田区丸の内3丁目5番1号<br />
    <A target="_blank" href="http://www.t-i-forum.co.jp/function/map/zoom.html">地図はこちら</A><BR>
    <BR>JR線<BR>
有楽町駅より徒歩1分<BR>
    東京駅より徒歩5分<BR>
    (京葉線東京駅とB1F地下コンコースにて連絡)<BR>
    <BR>
地下鉄<BR>
有楽町線 : 有楽町駅とB1F地下コンコースにて連絡<BR>
日比谷線 : 銀座駅より徒歩5分/日比谷駅より徒歩5分<BR>
千代田線 : 二重橋前駅より徒歩5分/日比谷駅より徒歩7分<BR>
丸ノ内線 : 銀座駅より徒歩5分<BR>
銀座線 : 銀座駅より徒歩7分/京橋駅より徒歩7分<BR>
    三田線 : 日比谷駅より徒歩5分<BR>
    </td>
</tr>
<!--<tr>
  <td><strong>銀座フェニックスプラザ（紙パルプ会館）</strong></td>
  <td><br />
東京都中央区銀座3-9-11<br />
<a target="_blank" href="http://maps.google.com/maps/ms?hl=ja&amp;ie=UTF8&amp;oe=UTF8&amp;msa=0&amp;msid=103805270919013260848.00044f618f63eba32170c&amp;ll=35.67123,139.76768&amp;spn=0.006336,0.013647&amp;z=17&amp;iwloc=00044f619616d4e237d86">地図はこちら（Googlemap）</a></td>
</tr>-->
<tr>
<td><strong>千代田プラットフォーム</strong></td>
<td>東京都千代田区神田錦町3‐21　ちよだプラットフォームスクエア<A target="_blank" href="http://maps.google.co.jp/maps/ms?ie=UTF8&hl=ja&brcurrent=3,0x60188c0fc8ca127f:0xc967560c0ae0e787,0&msa=0&msid=101199612788443757659.00047c9ee76b9ce6b4a6c&ll=35.692036,139.762841&spn=0.006221,0.009645&z=17"><br>
  アクセスルートマップ(Googlemap)</A><br><A target="_blank" href="http://www.mapion.co.jp/m/35.68811944_139.76490833_10/">ケータイに詳細地図を送る(Mapion)</A><BR>
    <BR>
    <BR>
【地下鉄】<BR>
■竹橋駅（東西線）　　　　　　　　　　　　　　　　　　<BR>
3b KKRホテル東京玄関前出口より徒歩2分<BR>
■神保町駅（三田線・新宿線・半蔵門線）　　　　 <BR>
A9出口より徒歩7分<BR>
■大手町駅（三田線・千代田線・半蔵門線・丸の内線） <BR>
C2b出口より徒歩8分　　　　　　　　　　　　　　　　　<BR>
■小川町駅（新宿線・千代田線）　　　　　　　　　<BR>
B7出口より徒歩8分【JR】<BR>
■神田駅　　　　　　　　　　<BR>
西口出口・出世不動通りより徒歩12分<BR>
    　 </td>
</tr>
</table>


<p class="title_01">服装について</p>

<div class="wrap">
<p>気軽な私服でいらっしゃってください♪講師も私服です。</p>
</div><!-- end wrap -->

<p class="title_01">チームミーティングと飲み会について</p>

<div class="wrap">
<p>講義後に1時間程度のチーム宿題が出ます。<br />
なるべくスケジュールを空けておいてください。<br />
たくさん友人を作りましょう（＾＾）</p>
<p>また、飲み会を各コースに2回程度行っています♪<br />
  気軽にご参加ください。</p>
</div><!-- end wrap -->

<p class="title_01">持ち物</p>

<div class="wrap">
<p>・黒と赤のボールペン　<br />
・A4の紙が入るファイル　 <br />
・過去のプリント類　 <br />
・下敷き</p>
</div><!-- end wrap -->




</div><!-- end main -->
<div id="bg_contentbottom"><!-- --></div>


</div><!-- end content -->


</div><!-- end container -->

<br class="brclear" />

<br class="brclear" />

<h3>横浜,神奈川,話し方教室,セミナー,講座</h3>
<div id="footer">

<div id="pagetop">
<div id="btn_pagetop">
<a href="#page_top"><!-- --></a>
</div>
</div><!-- end pagetop -->
<div id="footercontainer">
<div id="nav">
<div class="section">
<P>●ダイレクトコミュニケーション</p>
<ul>
<li><a href="http://www.direct-commu.com/company/">・会社概要</a></li>
<li><a href="http://www.direct-commu.com/profile/">・講師紹介</a></li>
<li><a href="http://www.direct-commu.com/company/contact.html">・お問い合わせ</a></li>
<li><a href="http://www.direct-commu.com/company/privacy.html">・プライバシーポリシー</a></li>
</ul>

</div><!-- end section -->
<div class="section">
<P>●開催講座一覧</p>
<ul>
<li><a href="http://www.direct-commu.com/course/1_intro.html">・はじめての方へ</a></li>
<li><a href="http://www.direct-commu.com/course/mental.html">・心理学コース</a></li>
<li><a href="http://www.direct-commu.com/course/ningenkankei.html">・人間関係コース</a></li>
<li><a href="http://www.direct-commu.com/course/business.html">・社会人基礎コース</a></li>
</ul>

</div><!-- end section -->
<div class="section">
<P>●ダイコミュ通信教材</p>
<ul>
<li><a href="http://www.direct-commu.com/text/">・通信講座について</a></li>
<li><a href="http://www.direct-commu.com/text/mental.html">・心理学教材</a></li>
<li><a href="http://www.direct-commu.com/text/ningenkankei.html">・人間関係教材</a></li>
<li><a href="http://www.direct-commu.com/text/katsuzetsu.html">・滑舌・ボイストレーニング教材</a></li>
</ul>
</div><!-- end section -->

<div class="section"> <a href="http://www.direct-commu.com/company/contact.html"><img src="../../common/sharedimg/footer/banner_footer2.gif" alt="お問い合わせ" /></a></div><!-- end section -->
</div><!-- end nav -->
<br class="brclear" />
<div id="small"><div id="small"><div id="small"><span>Copyright(c) 2006-2013 Direct Communication co.,Ltd all right reserved<br />
<a href="http://www.direct-commu.com/">コミュニケーション能力のことなら「ダイレクトコミュニケーション」</a></span></div><!-- end small --></div><!-- end small --></div><!-- end small -->


</div><!-- end footercontainer -->
</div><!-- end footer -->



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
</DIV>
</body>
</html>