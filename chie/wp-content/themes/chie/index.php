
<?php get_header(); ?>
<?php if (false): ?>
<div id="topicpath">
<div id="topicleft"><a href="http://www.direct-commu.com/">ホーム</a> > <h1>コミュニケーション能力がスキルアップする術満載！通信講座,通信教育,研修,本</h1></div><!-- end topicleft -->
<div id="topicright">
  <h2>コミュニケーション能力,本,通信講座,通信教育,術,スキル,研修</h2>
</div><!-- end topicright -->
</div><!-- end topicpath -->
<?php endif; ?>
<?php

    // 心理コラム
    $mental_list_args = array(
        'post_type'        => 'post',
        'category_name'    => 'mental',
        'orderby'          => 'post_date',
        'order'            => 'DESC' );
    $mental_list_cate=get_category_by_slug("mental");
        
    $mental_list = $mental_list_cate-> term_id;
 
    // 人間関係コラム
    $relation_list_cate=get_category_by_slug("relation");
    $ningenkankei_list =  $relation_list_cate->  term_id;

    // ビジネスコラム
    $business_list_cate=get_category_by_slug("business");
    $business_list =  $business_list_cate-> term_id;
    // 総合コラム
   $general_list_cate=get_category_by_slug("general");
    $general_list =  $general_list_cate->  term_id;
?>

<div id="container" class="chie">
<div id="onecontent">
<div class="onemain">
    
<div class="sns-wrap">
</div>
<div id="nyumon">
<div id="inner-nyumon">
<ul>
<li>入門知恵袋1　<a href="http://www.direct-commu.com/chie/intro_01/">コミュニケーション能力？なんぞや？</a></li>
<li>入門知恵袋2　<a href="http://www.direct-commu.com/chie/intro_02/">コミュ力改善のポイントを抑える</a></li>
</ul>
<ul>
<li>入門知恵袋3　<a href="http://www.direct-commu.com/chie/intro_03/">コミュ力に高い・低いはない！</a></li>
<li>入門知恵袋4　<a href="http://www.direct-commu.com/chie/intro_04/">効果的なトレーニング方法とは？</a></li>
</ul>
</div><!-- end inner-nyumon -->
</div><!-- end nyumon -->


<p class="text-wrap">
コミュニケーション能力を改善するには「心のあり方」「日常的な人間関係の築き方」「仕事に関するコミュニケーション」「総合コラム」
の4つの側面から対策を練るとバランスよく改善できます。<br><br>
下記コラムはさまざまなケースに対応したコラムとトレーニング方が記載されています。興味があるものから取り組んでみましょう。
</p>

<img src="<?php echo get_template_directory_uri(); ?>/common/sharedimg/chie/bdr_01.gif" alt="コミュニケーション知恵袋のドットライン" class="dottedline">

<div class="cate-list-wrap">
<div class="cate-list radius-4px">
<h2 id="mental-chie"><a href="<?php echo home_url(); ?>/mental/">心理コラム</a></h2>
<img src="<?php echo get_template_directory_uri(); ?>/common/sharedimg/chie/bdr_title_colums.gif" alt="心理コラムのタイトルのアンダーライン" class="underline">
<ul>
<?php custom_get_article_child_list($mental_list);     ?>
</ul>
<div class="cate-link">
<img src="<?php echo get_template_directory_uri(); ?>/common/sharedimg/chie/img_colums01.gif" alt="心理コラムのイメージ" class="pic">
<div class="inner-cate-link"><a href="<?php echo home_url(); ?>/mental/"><img src="<?php echo get_template_directory_uri(); ?>/common/sharedimg/chie/btn_colums.png" alt="心理コラムのもっと見るボタン" class="more"></a></div>
</div><!-- end cate-link -->
</div><!-- end cate-list -->

<div class="cate-list radius-4px">
<h2 id="ningenkankei-chie"><a href="<?php echo home_url(); ?>/relation/">人間関係コラム</a></h2>
<img src="<?php echo get_template_directory_uri(); ?>/common/sharedimg/chie/bdr_title_colums.gif" alt="人間関係コラムのタイトルのアンダーライン" class="underline">
<ul>
<?php custom_get_article_child_list($ningenkankei_list);  ?>
</ul>
<div class="cate-link">
<img src="<?php echo get_template_directory_uri(); ?>/common/sharedimg/chie/img_colums02.gif" alt="人間関係コラムのイメージ" class="pic">
<div class="inner-cate-link"><a href="<?php echo home_url(); ?>/relation/"><img src="<?php echo get_template_directory_uri(); ?>/common/sharedimg/chie/btn_colums.png" alt="人間関係コラムをもっと見るボタン" class="more"></a></div>
</div><!-- end cate-link -->
</div><!-- end cate-list -->

<div class="cate-list radius-4px">
<h2 id="business-chie"><a href="<?php echo home_url(); ?>/business/">ビジネスコラム</a></h2>
<img src="<?php echo get_template_directory_uri(); ?>/common/sharedimg/chie/bdr_title_colums.gif" alt="ビジネスコラム タイトルのアンダーライン" class="underline">
<ul>
<?php custom_get_article_child_list($business_list); ?>
</ul>
<div class="cate-link">
<img src="<?php echo get_template_directory_uri(); ?>/common/sharedimg/chie/img_colums03.gif" alt="ビジネスコラムのイメージ" class="pic">
<div class="inner-cate-link"><a href="<?php echo home_url(); ?>/business/"><img src="<?php echo get_template_directory_uri(); ?>/common/sharedimg/chie/btn_colums.png" alt="ビジネスコラムをもっと見るボタン" class="more"></a></div>
</div><!-- end cate-link -->
</div><!-- end cate-list -->

<div class="cate-list radius-4px">
<h2 id="general-chie"><a href="<?php echo home_url(); ?>/general/">総合コラム</a></h2>
<img src="<?php echo get_template_directory_uri(); ?>/common/sharedimg/chie/bdr_title_colums.gif" alt="総合コラムのタイトルのアンダーライン" class="underline">
<ul>
<?php custom_get_article_child_list($general_list); ?>
</ul>
<div class="cate-link">
<img src="<?php echo get_template_directory_uri(); ?>/common/sharedimg/chie/img_colums04.gif" alt="総合コラムのイメージ" class="pic">
<div class="inner-cate-link"><a href="<?php echo home_url(); ?>/general/"><img src="<?php echo get_template_directory_uri(); ?>/common/sharedimg/chie/btn_colums.png" alt="総合コラムのもっと見るボタン" class="more"></a></div>
</div><!-- end cate-link -->
</div><!-- end cate-list -->
</div><!-- end cate-list-warp -->

<hr class="horizon">
<p class="text-wrap radius-4px">
当サイトではコミュニケーションに関する心理学的な知識や学術的な理論をお伝えし、日々の生活を健康的に過ごせるようなトレーニング
方法を積極的にお伝えしています。執筆者は臨床心理士や精神保健福祉士、大学院で研究を重ねた講師を条件としています。
人生は人と人とのコミュニケーションの連続です。何か戸惑ったとき、困った時に手助けできるように、講師陣が精一杯お手伝いしたいと
思います。まずはコミュニケーションについて正しい理解をして頂くには下記のコラムをおすすめします。
是非参考にしてみてくださいね。 
</p>

<p class="text-wrap">
コミュニケーション能力知恵袋の使い方<br>
<br>
・コミュニケーション能力に関する悩みは原因が複雑に絡み合って発生しています。<br>
原因は物理学のようにはっきりとしたものではありません。コミュニケーション能力に関する悩みは一般化することができず、とても厄介な
ものです。さりとて、悩みを悩みのまま放置しておくのも投げやりだと言えます。よく分からないからほうっておこう・・・という態度では、
問題が溜まってくばかりで成長がありません。当サイトでは専門的な研究を重ねた講師陣が難敵とも言えるコミュニケーション能力について
の対策を解説していきます。<br>
<br>
・発起人は大学院でソーシャルスキルトレーニング(SSTと言います)を中心に研究をした川島達史です。<br>
私自身も以前はコミュニケーション能力について散々悩まされてきました。ひどいときは引きこもりも経験し、まったくコミュニケーション
ができない時期がありました。私自身、様々な書物や先人たちの知恵に助けられ、心のあり方が安定し、日々の人間関係や仕事上のコミュニ
ケーションを楽しむことができるようになりました。今度は私自身が何か恩返しができないかと考えています。<br>
<br>
人間は生きていくために社会に出なくてはなりません。<br>
社会は時に理不尽で、非人間的な扱いを押し付けられることがあります。雑談を禁止された職場、一日中パソコンに向かわせる職場、四六時
中眉間にシワを寄せ笑いのない職場、ブースが区切られ隣の人の顔が見えない職場・・・人間は機械ではありません。効率を追求することと
対人コミュニケーションを奪う事は違います。それでも生きていくためにその場所に居続けざるを得ないこともあります。<br>
<br>
・ジニ係数は1980年から右肩上がりで上昇し、金持ちと貧乏人の格差はますます鮮明になっていると言われますが、同時にコミュニケーショ
ンの格差も同じく生じています。例えば営業職とプログラマーは圧倒的にコミュニケーションの頻度が異るのです。それは金銭的な格差以上
にコミュニケーション能力の格差に繋っていきます。コミュニケーション能力は仕事のためだけに存在するのではなく、家族を作ったり、友
人と余暇を楽しんだりするためにも存在する。恋人と楽しく話すにもコミュニケーション能力は必要です。コミュニケーションの機会の格差
は、人間としての幸せの格差へと繋るのです。私はそういった社会の歪みについてコミュニケーションをテーマにする会社を通して正して行
きたいと考えています。<br>
<br>
当知恵袋は画一的な視点に限らず、様々な視点から様々なコラムを書き、コミュニケーションの問題と真摯に向き合い、またその意味と展望
を探って行きたいと考えています。そして何よりこのサイトを訪れる方がコミュニケーションについて考え、それぞれの人生を少しでも意味
のあるものとして感じ取られることを心から願っています。<br>
<br>
<br>
講師 : 川島達史　2015年9月1日
</p>

</div><!-- end onemain -->
</div><!-- end onecontent -->
</div><!-- end container -->


<div class="wid">
<h3 class="bottom_com">コミュニケーション能力を向上させるノウハウたっぷり！通信講座,教育のご案内です。<br />
スキルアップする研修のノウハウをたっぷり詰め込んだ本です</h3>
</div>

<?php get_sidebar('sp'); ?>

<?php get_footer(); ?>
