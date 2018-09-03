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

$sql = "update colums set access=access+1 where url='http://www.direct-commu.com/colums/business/".$c_id.".html'";


$sql = "select * from schedules where class='kansai' and flag=1";
$result = mysql_query($sql) or die("e2");
while($rows = mysql_fetch_array($result)){
	$html = $rows["html"];
}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<META name="description" content="会話がうまくなる！実力をつける話し方教室・講座です。毎年600人が受講するセミナーです。京都,大阪,関西,神戸,滋賀で開催">
<META name="keywords" content="話し方教室,講座,セミナー,京都,大阪,関西,神戸,滋賀">

<title>よく分かる話し方教室・講座♪会場は京都,大阪,関西,神戸,滋賀で開催</title>
<link href="../../sp_common/css/base.css" rel="stylesheet" type="text/css" media="all" />
<link href="../../sp_common/css/layout.css" rel="stylesheet" type="text/css" media="all" />

<link rel="shortcut icon" href="http://www.direct-commu.com/favicon.ico" />

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />

<script type="text/javascript" src="../../sp_common/js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="../../sp_common/js/jquery.validate.js"></script>

</head>

<body>
<a name="page_top"></a>

<header class="after_clear">
<div class="header_l"><div class="img_l"><img src="../../sp_common/images/illust_header_l.png" width="50" height="70"></div>
</div><!-- end header_l -->
<div class="header_c"><a href="http://www.direct-commu.com"><h1><img src="../../sp_common/images/logo_sp_directcomm.png" width="233" height="41" alt="ダイレクトコミュニケーション" /></h1></a></div><!-- end header_c -->
<div class="header_r"><div class="img_r"><img src="../../sp_common/images/illust_header_r.png" width="95" height="61"></div>
</div><!-- end header_r -->
</header>

<div id="keyvisual">
<h1><img src="../../sp_common/images/course/img_title_kansai.jpg" alt="ダイレクトコミュニケーションバナー" /></h1>
</div><!-- end keyvisual -->



<ul id="menu" class="after_clear">
<li id="intro"><a href="http://www.direct-commu.com/course/1_intro.html" class="btn_topleft">はじめての方へ</a></li>
<li id="training"><a href="http://www.direct-commu.com/training/" class="btn_right"><span>コミュニケーション</span>トレーニング</a></li>
<li id="course"><a href="http://www.direct-commu.com/course/" class="selected"><span>コミュニケーション</span>講座</a></li>
<li id="colums"><a href="http://www.direct-commu.com/colums/" class="btn_right"><span>コミュニケーション</span>知恵袋</a></li>
<li id="text"><a href="http://www.direct-commu.com/text/"><span>ダイコミュ</span>通信講座</a></li>
<li id="teacher"><a href="http://www.direct-commu.com/profile/" class="btn_right"><span>ダイコミュ</span>講師紹介</a></li>
<li id="event"><a href="http://www.direct-commu.com/event/" class="btn_bottom">イベント</a></li>
<li id="contact"><a href="http://www.direct-commu.com/company/contact.html" class="btn_right btn_bottom">お問い合わせ</a></li>
</ul>

<br class="brclear" />
<div id="topicpath"><a href="http://www.direct-commu.com/">トップ</a> > <a href="http://www.direct-commu.com/course/">コミュニケーション講座</a> > <span>関西教室</span></div>

<section>
<h2 class="arrow01"><div>関西教室の雰囲気</div>
</h2>
<div class="text">
<p>　関西唯一の教室です。<br />
関西圏の方で仲良く開催していく予定です♪<br />
講座外での集まりも楽しみですね～<br />
青字は初参加がしやすいワークです♪<BR>
</p>
</div>
</section>

<section>
<h2 class="arrow01">
  <div>関西教室の日程</div></h2>
<div class="text">
<?=$html?></div>
</section>

<section>
<h2 class="arrow01">
  <div>地図</div></h2>

<div class="text">
<p>大阪産業創造館</p>
<p>大阪市中央区本町1-4-5<br />
  <a href="http://www.sansokan.jp/map/" target="_blank">地図はこちら</a></p>
<p>地下鉄「中央線」「堺筋線」堺筋本町駅から徒歩約5分</p>
</div><!-- end text -->

</section>


<section>
<h2 class="arrow01">
  <div>準備について</div></h2>
<div class="text">
<p>コミュニケーション講座は安価な料金を達成するために、<br />
  必要以上のアシスタントを雇わず、<br />
  生徒さんと一緒に行うことを原則としています。<br />
  お時間がある方は20分前に講座にいらっしゃって<br />
  頂けるととっても助かります（＾＾）</p>
<p>準備時間に交流が進んだり、緊張が解けたりしますよ！<br />
  わいわいがやがや一緒に準備をしましょう♪</p>
<p>もちろん時間がない方はゆっくりいらっしゃってくださいね。</p>
</div>
</section>

<section>
<h2 class="arrow01">
  <div>チームミーティングについて～1人ではなく皆で練習しましょう～</div></h2>
<div class="text">
<p>コミュニケーション講座では、講座の効果を<br />
  確実なものにするために、<br />
  1時間程度のチームミーティング宿題が出ます。</p>
<p>チーム宿題とは4,5人のチームを作って<br />
  行う宿題です。会話の練習などを講座後に行って行きます。<br />
  なるべくスケジュールを空けておいてください♪</p>
<p>但し、お仕事の都合や通い方にはそれぞれ<br />
  スタンスがあると思うのでそのまま帰るのもOKです！</p>
</div>
</section>

<section>
<h2 class="arrow01">
  <div>実際の人間関係を築こう～イベント・練習会・食事会も開いてみましょう～</div></h2>
<div class="text">
<p>講座で成果を出すには、講義を受けるだけでなく、<br />
  生徒さん同士、一緒に考えたり、支えあうことが<br />
  何より大事になります。</p>
<p>伝統的に講座では誰かが、練習会、飲み会、<br />
  悩みの相談会、山登りをすることを<br />
  大事にしています。</p>
<p>こういった生の人間関係を築くことはちょっと勇気が<br />
  必要なのかもしれません。でも失敗するのはあたりまえです♪<br />
  お互い失敗しながら、ゆっくり一緒に成長していきましょう。<br />
  そして、もし講座の中で企画をしてくれる人が出てきたり、<br />
  何か落ち込んでいる人がいたら、皆で支えあっていきましょう。</p>
<p>もちろん、ご自身が成長するために、<br />
  企画をしてみるのもOK！応援しています！</p>
</div>
</section>

<section>
<h2 class="arrow01">
  <div>mixiへの登録について</div></h2>
<div class="text">
<p>コミュニケーション講座の効果を向上させるには、<br />
  生徒さん同士で助けあうことがとても大事です。<br />
  そこで宿題を効率よく行ったり、ワーク外での繋がりを作るために、<br />
  mixiの登録をおススメしています。<br />
  生徒さんの7割が入って楽しくやり取りしています。<br />
  講座へご参加される前にMIXIに入ることをおススメします^^</p>
<p><a href="http://www.direct-commu.com/company/mixi.html">mixiの利用の仕方についてはこちら</a></p>
</div>
</section>

<section>
<h2 class="arrow01">
  <div>途中参加について</div></h2>
<div class="text">
<p>講座については原則として途中参加がしやすいようにカリキュラムを組んでおります。<br />
  各教室原則として1年間で一巡致しますので、まずは気軽にご参加ください^^<br />
  月の後半から途中参加の場合は次月分を含めた1.5ヶ月払い（4%off）となります。</p>
<p>＊　多くの方が途中参加されています♪<br />
  ＊　拍子抜けするぐらいリラックスした講座です。<br />
  是非気軽にご参加下さい！</p>
</div>
</section>

<section>
<h2 class="arrow01">
  <div>定員</div></h2>
<div class="text">
<p>＊定員20名前後、受講は仮予約の先着順となります<br />
  ＊定員に達した場合、欠員が出てからの受講になります</p>
</div>
</section>

<section>
<h2 class="arrow01">
  <div>服装について</div></h2>
<div class="text">
<p>私服でいらっしゃってください♪講師も私服です</p>
</div>
</section>

<section>
<h2 class="arrow01">
  <div>持ち物</div></h2>
<div class="text">
<p>・黒と赤のボールペン　<br />
  ・A4の紙が入るファイル　<br />
  ・過去のプリント類　<br />
  ・下敷き</p>
</div>
</section>



<div class="to_page_top"><a href="">このページのTOPへ</a></div>
<footer id="footer">
<p><a onclick='document.cookie="mode=pc;path=/;"; window.location.reload();' href="#">PC版</a>　/　スマートフォン版</p>
<div id="copyright">&copy; Direct Communication, Inc.<br>
	All Rights Reserved.</div>
</footer>

<script type="text/javascript" src="../../sp_common/js/image.js"></script>
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
