<?php

//require_once("/home/direct-commu/config.php");

/*mysql_connect($db_host,$db_user,$db_pass);
mysql_set_charset("utf8");
mysql_select_db($db_name_colums);*/


$db_host = "mysql501.phy.lolipop.jp";
$db_user = "LA08419899";
$db_pass = "6B87rrUc";
$db_name = "LA08419899-directcomm";

mysql_connect($db_host,$db_user,$db_pass);
mysql_set_charset("utf8");
mysql_select_db($db_name);


//============================================================================
//cache_lite
//============================================================================

//Cache_lite読み込み
require_once '/home/users/2/lolipop.jp-dp58180317/web/lib/PEAR/Cache/Lite.php';
$cache_id = "http://www.direct-commu.com/business/";

//tmpディレクトリは相対パスでないとダメ    automaticSerializationは配列格納用
$options = array('cacheDir' => './tmp/','lifeTime' => 60 * 60 * 30,'automaticSerialization' => 'true');

//キャッシュオブジェクト生成
$Cache_Lite = new Cache_Lite($options);

if ($data = $Cache_Lite -> get($cache_id)) {
	
	//echo "キャッシュがあります";
	$list_new_business= $data["list_new_business"];

	$list_1= $data["list_1"];
	$list_2= $data["list_2"];
	$list_3= $data["list_3"];
	$list_4= $data["list_4"];
	$list_5= $data["list_5"];

}else{
	
	//echo "キャッシュがないです";


$sql_new_business = "select * from colums_u where category='business' and flag='1' order by date desc limit 10";
$result_new_business = mysql_query($sql_new_business) or die("em");
$list_new_business = "";

while($rows_new_business = mysql_fetch_array($result_new_business)){
	
	$list_new_business .= "<li><span>".mb_substr($rows_new_business["date"],0,10,'utf-8')."</span><a href=\"".$rows_new_business["url"]."\">".$rows_new_business["c_title"]."</a></li>";
	
}


//5
$sql_5 = "select * from colums_u where theme='5　学習すること' and flag='1' order by date desc";
$result_5 = mysql_query($sql_5) or die("e1");

$list_5 = "";

while($rows_5 = mysql_fetch_array($result_5)){
	$list_5 .= "<li><span>".mb_substr($rows_5["date"],0,10,'utf-8')."</span><a href=\"".$rows_5["url"]."\">".$rows_5["c_title"]."</a></li>";
}

//4
$sql_4 = "select * from colums_u where theme='4　販売員のセールストレーニング' and flag='1' order by date desc";
$result_4 = mysql_query($sql_4) or die("e1");

$list_4 = "";

while($rows_4 = mysql_fetch_array($result_4)){
	$list_4 .= "<li><span>".mb_substr($rows_4["date"],0,10,'utf-8')."</span><a href=\"".$rows_4["url"]."\">".$rows_4["c_title"]."</a></li>";
}

//3
$sql_3 = "select * from colums_u where theme='3　チームコミュニケーション' and flag='1' order by date desc";
$result_3 = mysql_query($sql_3) or die("e1");

$list_3 = "";

while($rows_3 = mysql_fetch_array($result_3)){
	$list_3 .= "<li><span>".mb_substr($rows_3["date"],0,10,'utf-8')."</span><a href=\"".$rows_3["url"]."\">".$rows_3["c_title"]."</a></li>";
}

//2
$sql_2 = "select * from colums_u where theme='2　ビジネスコミュニケーション' and flag='1' order by date desc";
$result_2 = mysql_query($sql_2) or die("e1");

$list_2 = "";

while($rows_2 = mysql_fetch_array($result_2)){
	$list_2 .= "<li><span>".mb_substr($rows_2["date"],0,10,'utf-8')."</span><a href=\"".$rows_2["url"]."\">".$rows_2["c_title"]."</a></li>";
}

//1
$sql_1 = "select * from colums_u where theme='1　ビジネスマナー' and flag='1' order by date desc";
$result_1 = mysql_query($sql_1) or die("e1");

$list_1 = "";

while($rows_1 = mysql_fetch_array($result_1)){
	$list_1 .= "<li><span>".mb_substr($rows_1["date"],0,10,'utf-8')."</span><a href=\"".$rows_1["url"]."\">".$rows_1["c_title"]."</a></li>";
}


$data["list_new_business"] = $list_new_business;

$data["list_1"] = $list_1;
$data["list_2"] = $list_2;
$data["list_3"] = $list_3;
$data["list_4"] = $list_4;
$data["list_5"] = $list_5;


$Cache_Lite->save($data,$cache_id);

}// end cache



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<META name="description" content="職場や恋愛の人間関係で悩む人に役立つ、コミュニケーション能力向上のためのトレーニング法を紹介しています。">
<META name="keywords" content="人間関係,コミュニケーション能力,職場,恋愛,悩み,トレーニング">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="author" content="株式会社ダイレクトコミュニケーション" /><title>ビジネススキルコラム一覧</title>
<link href="../../common/css/base.css" rel="stylesheet" type="text/css" media="all" />
<link href="../../common/css/header.css" rel="stylesheet" type="text/css" media="all" />
<link href="../../common/css/sidebar.css" rel="stylesheet" type="text/css" media="all" />
<link href="../../common/css/footer.css" rel="stylesheet" type="text/css" media="all" />
<link href="../../common/css/content.css" rel="stylesheet" type="text/css" media="all" />
<link href="../../common/css/colums.css" rel="stylesheet" type="text/css" media="all" />

<script type="text/javascript" src="../../common/js/smoothscroll.js"></script>
<script type="text/javascript" src="../../common/js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="../../common/js/jquery.validate.js"></script>
<script type="text/javascript" src="../../common/js/fadein.js"></script>
<script type="text/javascript" src="../../common/js/onoff.js"></script>
<script type="text/javascript" src="../../common/js/smart-crossfade.js"></script>

</head>

<body>
<a name="page_top"></a>

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
<li id="course"><a href="http://www.direct-commu.com/course/">コミュニケーション講座</a></li>
<li id="text"><a href="http://www.direct-commu.com/text/">ダイコミュ通信講座</a></li>
<li id="training"><a href="http://www.direct-commu.com/training/">コミュニケーション能力トレーニング</a></li>
<li id="ability"><a href="http://xn--zckzah9129bsdgbusdye.jp/">コミュニケーション能力診断</a></li>
<li id="colums"><a href="http://www.direct-commu.com/colums/" class="selected">コミュニケーションコラム集</a></li>
<li id="event"><a href="http://www.direct-commu.com/event/">ダイコミュイベント</a></li>
<li id="teacher"><a href="http://www.direct-commu.com/profile/">講師紹介</a></li>
</ul><!-- end gnav -->
</div><!-- end header -->

<div id="topicpath">

<div id="topicleft"><a href="http://www.direct-commu.com/">ホーム</a> > <a href="http://www.direct-commu.com/colums/">コミュニケーション知恵袋</a> > 
  <h1>ビジネススキルコラム一覧</h1>
</div><!-- end topicleft -->
<div id="topicright">
  <h2>ビジネススキルコラムはコラムから</h2>
</div><!-- end topicright -->
</div><!-- end topicpath -->


<div id="container">

<div id="sidebar">
<a href="http://www.direct-commu.com/colums/business/"><img src="../../common/sharedimg/colums/img_title_colums_business.gif" width="290" height="44" alt="ビジネスコラムタイトル" /></a>
<div class="nav">
<ul style="margin-top: 0">
<!--<?=$list_new_business?>-->
<?=str_replace("www.direct-commu.com","www.direct-commu.com",$list_new_business)?>
</ul>
</div><!-- end nav -->
<div class="navbottom"><!-- --></div><!-- end navbottom -->





</div><!-- end sidebar -->

<hr class="clear" />

<div id="content">
<div id="contenttop"><!-- --></div><!-- end contenttop -->

<div class="main">
<p class="title_01">ビジネススキルコラム一覧</p>
<div class="wrap">

<div class="imgbox"><img alt="アサーションって" src="../../colums/images/img_relation_012_01_asa-shyon1.jpg" style="width:220px" /></div>

<div class="text_wrapper">
<p class="title"><span class="red">アサーションって、なに？</span></p>

<p>　アサーションとは「自分と相手を大切にする表現技法」を意味します。 ちなみにアサーション（assertion）は 英和辞典で調べると「主張」「断言」など という意味が載っています。このような言葉を聞くと 「強く自己主張をする技術」 という印象を抱いてしまう かもしれませんね。 しかし、そうではありません。 相手に自分の意見を押し付けるのではなく <strong>自分のことも、相手のことも大切にする</strong>と いうのがアサーションなのです。</p>

<p>&nbsp;</p>

<p class="title"><span class="red">アサーションが誕生した歴史</span></p>

<p>　1970年代にアサーションに関する本が アメリカで初めて発売され、ベストセラーになりました。 この本は当時、人種差別や性差別の問題に 大きく影響を与えたといわれています。 1980年代になってから日本にも アサーションが入ってくるようになりました。</p>

<p>&nbsp;</p>

<p class="title"><span class="red">アサーションはどんな場面でつかえる？</span></p>

<p>　現在は就職活動でも求職者に対して アサーショントレーニングを行い 面接の練習するところもあります。 又、すでに働いている人に対しての アサーショントレーニングも存在します。 特に教師や医者、サービス業など 人と関わることが多い職業などは 自分を犠牲にして他者への援助を 優先してしまい「燃え尽き症候群」 になることも問題視されていますね。</p>

<p>　 このような職業の方々にアサーション トレーニングを行うことは、とても有効です。 もちろん差別問題、職場だけではなく 友人、親子、夫婦、恋人、ご近所付き合いなどの<strong>身近な所でもアサーションを活かす</strong>ことができます。</p>

<p>&nbsp;</p>

<p class="title"><span class="red">あなたはＮＯと断れますか？</span></p>

<p>　アサーションでは、相手に言いにくいことも 主張する権利があります。 例えば、嫌だと思ったときに「ＮＯ」と断ることができず 後でモヤモヤになってしまうことはありませんか？ 私たちはその場しのぎで言いたいことを我慢しても 長期的な目で見ると相手との関係で無理が出てきたり 人と付き合うことが億劫になることがあります。</p>

<p>　そこで今回は自己主張の中でも特に難しい 「ＮＯ」と断る練習をしてみましょう♪</p>

<p>&nbsp;</p>

<p class="title"><span class="red">練習問題―ＮＯと断る練習 </span></p>

<p>例１</p>

<p>Ａさんは<span class="green">おとなしく、口下手なタイプ</span>です。 新しい部署に配属されてから、慣れないながらも 頑張っていましたが、周囲のフォローもなく 同僚や上司から色々な仕事を押し付けられることが多くなりました。</p>

<p><br />
最初は角が立つと思いどんな仕事も引き受けていましたが、次第にＡさんはそれが負担に感じるようになってきました。同時に気の弱い自分は舐められているような気もして、悔しい感情も湧いてきました。</p>

<p><br />
そんなとき、Ａさんは 上司から声をかけられました。<br />
<span class="red">「君、今大丈夫？悪いけど、今すぐにこの書類を作成して欲しいんだけど。」</span></p>

<p>&nbsp;</p>

<p><strong>このときあなたは何と返事をしますか？</strong></p>

<p>「は、はい、わかりました。」</p>

<p>「今はちょっと忙しくて&hellip;。」</p>

<p>「あの・・・それは○○さんの担当じゃないですか？」</p>

<p>&nbsp;</p>

<p>など、返し方ひとつで相手が受ける印象は異なってきます。組織の中では仕事ができる人ほど 仕事が回ってきやすいというのも 事実ですが、それを全て引き受けていたら どんどん負担も大きくなっていきますよね。 かといって、組織で働く上で仕事を断ることは 立場が悪くなったり、上手に断ることは中々ハードルが高かったりします。</p>

</div>
<!-- end text_wrapper -->

<div class="imgbox"><img alt="上手に断る" src="../../colums/images/img_relation_012_01_asa-shyon2.jpg" style="width:220px" /></div>

<div class="text_wrapper">
<p class="title"><span class="red">上手に断る3つのポイント！</span></p>

<p>ここで上手に「ＮＯ」と断るときのポイントを伝授します。</p>

<p><span class="green">①　自分の気持ちや状況を伝える </span></p>

<p><span class="green">②　相談してみる </span></p>

<p><span class="green">③　譲歩案を出してみる </span></p>

<p>　このポイントを踏まえるとどのような言い方が良いでしょうか。例えば下記にような言い方が良いでしょう。</p>

<p>&nbsp;</p>

<p>「今は他にＡの業務もやっている状況です。いつまでにやらなくてはいけない状況です（状況）。この仕事が終わるのが２日後ならそのあとなら手が回りそうなのですが・・・（譲歩）こういった時はどうすれば良いでしょうか？（相談）」</p>

<p>&nbsp;</p>

<p>と&ldquo;<strong>自分の状況</strong>&rdquo;を伝えて、まず相手に<span class="blue"><strong>相談</strong></span>します。その上で 「Ａの業務が終わったあとでしたら、書類作成に取り掛かれますが どうでしょうか。」 と<strong>譲歩案</strong>を出してみるといいでしょう。 みなさんも上記のポイントを参考に考えてみて下さい。</p>
</div>
<!-- end text_wrapper -->

<div class="point_top"><!-- --></div>

<div class="point">
<ul>
	<li>アサーションは身近な場面で使える！</li>
	<li>ポイントは状況の説明と譲歩案を出すこと</li>
</ul>
</div>
<!-- end point -->

<div class="point_bottom"><!-- --></div>

<p class="colums_next"><a href="http://www.direct-commu.com/colums/relation/relation_012_02_asa-shyon.html"><img alt="次のコラムへ" src="../../common/sharedimg/colums/btn_next_colums.gif" style="height:80px; width:276px" /></a></p>
</div><!-- end wrap -->

</div><!-- end main -->
<div id="bg_contentbottom"><!-- --></div>


</div><!-- end content -->


</div><!-- end container -->

<br class="brclear" />

<br class="brclear" />

<h3>会話が続かないのはなぜ？改善法を学ぼう,デート,術 
人間関係を楽しもう♪</h3>
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
<div id="small"><div id="small"><span>Copyright(c) 2006-2013 Direct Communication co.,Ltd all right reserved<br />
<a href="http://www.direct-commu.com/">コミュニケーション能力のことなら「ダイレクトコミュニケーション」</a></span></div><!-- end small --></div><!-- end small -->


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

</body>
</html>
