<!DOCTYPE html>
<html lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="author" content="株式会社ダイレクトコミュニケーション" />
<?php if ( is_home() ): ?>
<title>コミュニケーション知恵袋｜ダイレクトコミュニケーション</title>

<?php else: ?>
<title><?php the_title(); ?>｜ダイレクトコミュニケーション</title>

<?php endif; ?>

<link href="<?php echo get_template_directory_uri(); ?>/common/css/base.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo get_template_directory_uri(); ?>/common/css/header.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo get_template_directory_uri(); ?>/common/css/sidebar.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo get_template_directory_uri(); ?>/common/css/footer.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo get_template_directory_uri(); ?>/common/css/content.css?v=2017082101" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo get_template_directory_uri(); ?>/editor-style.css?v=2017082101" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo get_template_directory_uri(); ?>/common/css/rwd/sp.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo get_template_directory_uri(); ?>/style.css?v=20180114" rel="stylesheet" type="text/css" media="all" />

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/common/js/smoothscroll.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/common/js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/common/js/jquery.validate.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/common/js/fadein.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/common/js/onoff.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/common/js/smart-crossfade.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/common/js/sp.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/common/js/init.js?ver=2017082202"></script>

<?php wp_head(); ?>
</head>

<body>
<a name="page_top"></a>
<div id="ua"></div>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/ja_JP/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div id="header" class="pt00">
<div id="headercontainer">
<div id="headerright"><!-- --></div>
<div id="logowrap"><a href="/"><img src="<?php echo get_template_directory_uri(); ?>/common/sharedimg/logo_directcomm.gif" alt="ダイレクトコミュニケーション能力,話し方教室" /></a></div>
<ul id="cloud_nav">
<li><a href="/company/contact.html"><img src="<?php echo get_template_directory_uri(); ?>/img/btn_contact_cloud_off.gif" class="hover" /></a></li>
<li><a href="/young"><img src="<?php echo get_template_directory_uri(); ?>/img/btn_young_cloud_off.gif" class="hover" /></a></li>
<li><a href="/activity/index.html"><img src="<?php echo get_template_directory_uri(); ?>/img/btn_seminer_cloud_off.gif" class="hover" /></a></li>
<li><a href="/colums/"><img src="<?php echo get_template_directory_uri(); ?>/img/btn_chie_cloud_off.gif" class="hover" /></a></li>
</ul>
</div><!-- end headercontainer -->
<ul id="gnav">
<li id="home"><a href="/">ホーム</a></li>
<li id="course"><a href="/course/">コミュニケーション講座</a></li>
<li id="text"><a href="/text/">ダイコミュ通信講座</a></li>
<li id="training"><a href="/training/">コミュニケーション能力トレーニング</a></li>
<li id="ability"><a href="http://commutest.com">コミュニケーション能力診断</a></li>
<li id="colums"><a href="/chie/" class="selected">コミュニケーション知恵袋</a></li>
<li id="event"><a href="/event/">ダイコミュイベント</a></li>
<li id="teacher"><a href="/profile/">講師紹介</a></li>
</ul><!-- end gnav -->

<div id="spvisual">
<img src="<?php echo get_template_directory_uri(); ?>/common/sharedimg/chie/index/main_image.jpg" height="208" width="640" alt="ダイコミュ通信講座" />
</div>

<div id="spnav">
<ul>
<li class="n01"><a href="/course/1_intro.html">初めての方へ</a></li>
<li class="n02"><a href="/training/"><span>コミュニケーション</span>トレーニング</a></li>
<li class="n03"><a href="/course/"><span>コミュニケーション</span>講座</a></li>
<li class="n04 on"><a href="/chie/"><span>コミュニケーション</span>知恵袋</a></li>
<li class="n05"><a href="/text/"><span>ダイコミュ</span>通信講座</a></li>
<li class="n06"><a href="/profile/"><span>ダイコミュ</span>講師紹介</a></li>
<li class="n07"><a href="/event/">イベント</a></li>
<li class="n08"><a href="/company/contact.html">お問い合わせ</a></li>
</ul>
</div>
</div><!-- end header -->

<div id="topicpath">
    <div id="topicleft">
        <?php the_topicpath(); ?>
    </div><!-- end topicleft -->
    <div id="topicright">
        <?php if ( is_home() ): ?>
        <h2>知恵袋,心理コラム,人間関係コラム,ビジネスコラム</h2>
        <?php else: ?>
        <h2><?php the_field('this_h2_tag'); ?></h2>
        <?php endif; ?>
    </div><!-- end topicright -->
</div><!-- end topicpath -->
