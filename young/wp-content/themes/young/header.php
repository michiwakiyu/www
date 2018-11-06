<?php
global $post;
$page = get_post($post->ID);
$page_slug = $page->post_name;

?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="author" content="株式会社ダイレクトコミュニケーション" />
<?php if ($page_slug == 'profile'): ?>
<meta name="robots" content="noindex, nofollow" />
<?php endif; ?>
<title><?php bloginfo('name'); ?></title>

<link href="<?php echo get_template_directory_uri(); ?>/common/css/base.css?ver=2017080201" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo get_template_directory_uri(); ?>/common/css/header.css?ver=2017080201" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo get_template_directory_uri(); ?>/common/css/sidebar.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo get_template_directory_uri(); ?>/common/css/footer.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo get_template_directory_uri(); ?>/common/css/content.css?ver=2017080201" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo get_template_directory_uri(); ?>/editor-style.css?ver=2017082101" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo get_template_directory_uri(); ?>/common/css/rwd/sp.css?ver=2017080201" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo get_template_directory_uri(); ?>/style.css?ver=2017102301" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/common/js/smoothscroll.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/common/js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/common/js/jquery.validate.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/common/js/fadein.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/common/js/onoff.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/common/js/smart-crossfade.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/common/js/sp.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/common/js/init.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/common/js/recaptcha.js"></script>
<?php if (is_singular()) wp_enqueue_script("comment-reply"); ?>
<script src='https://www.google.com/recaptcha/api.js'></script>

<!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '285912941904269');
  fbq('track', 'PageView');
  fbq('track', 'Lead');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=285912941904269&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->

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
<div id="logowrap"><a href="http://www.direct-commu.com/"><img src="<?php echo get_template_directory_uri(); ?>/common/sharedimg/logo_directcomm.gif" alt="ダイレクトコミュニケーション能力,話し方教室" /></a></div>
<ul id="cloud_nav">
<li><a href="<?php echo home_url().'/contact'; ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/btn_contact_cloud_off.gif" class="hover" /></a></li>
<li><a href="http://www.direct-commu.com/course/mailmag.php"><img src="<?php echo get_template_directory_uri(); ?>/img/btn_mmagazine_cloud_off.gif" class="hover" /></a></li>
<li><a href="http://www.direct-commu.com/activity/index.html"><img src="<?php echo get_template_directory_uri(); ?>/img/btn_seminer_cloud_off.gif" class="hover" /></a></li>
<li><a href="http://www.direct-commu.com/colums/"><img src="<?php echo get_template_directory_uri(); ?>/img/btn_chie_cloud_off.gif" class="hover" /></a></li>
</ul>
</div><!-- end headercontainer -->
<ul id="gnav">
<li id="home"><a href="<?php echo home_url(); ?>">はじめての方へ</a></li>
<li id="course"><a href="<?php echo home_url().'/course'; ?>">講座の説明</a></li>
<li id="price"><a href="<?php echo home_url().'/price'; ?>">受講料金</a></li>
<li id="schedule"><a href="<?php echo home_url().'/schedule'; ?>">開催日程</a></li>
<li id="profile"><a href="<?php echo home_url().'/profile'; ?>">講師プロフィール</a></li>
<li id="parents"><a href="<?php echo home_url().'/parents'; ?>">保護者の方へ</a></li>
<li id="apply"><a href="<?php echo home_url().'/apply'; ?>">お申し込み</a></li>
</ul><!-- end gnav -->


<?php if ( is_home() ): ?>
<div id="spvisual"><img src="<?php echo get_template_directory_uri(); ?>/common/sharedimg/young/main_image.jpg" alt="未成年向け講座" /></div>
<?php else: ?>
<div id="spvisual"><img src="<?php echo get_template_directory_uri(); ?>/common/sharedimg/young/main_image_<?php echo $page_slug; ?>.jpg" alt="<?php echo $cat_name; ?>" /></div>
<?php endif; ?>

<div id="spnav">
<ul>
<li class="n01"><a href="<?php echo home_url(); ?>">はじめての方へ</a></li>
<li class="n02"><a href="<?php echo home_url().'/course'; ?>">講座の説明</a></li>
<li class="n03"><a href="<?php echo home_url().'/price'; ?>">受講料金</a></li>
<li class="n04"><a href="<?php echo home_url().'/schedule'; ?>">開催日程</a></li>
<li class="n05"><a href="<?php echo home_url().'/profile'; ?>">講師プロフィール</a></li>
<li class="n07"><a href="<?php echo home_url().'/parents'; ?>">保護者の方へ</a></li>
<li class="n06"><a href="<?php echo home_url().'/apply'; ?>">お申し込み</a></li>
<li class="n10"><a href="<?php echo home_url().'/contact'; ?>">お問い合わせ</a></li>
</ul>
</div>
</div><!-- end header -->

<div id="topicpath">
    <div id="topicleft">
        <?php the_topicpath(); ?>
    </div><!-- end topicleft -->
    <div id="topicright">
        <?php if ( is_home() ): ?>
        <!--<h2>心理療法,精神分析,行動療法,森田療法,アドラー心理学</h2>-->
        <?php else: ?>
        <h2><?php echo $cat_name; ?></h2>
        <?php endif; ?>
    </div><!-- end topicright -->
</div><!-- end topicpath -->
<?php if ( is_home() ): ?>
<div id="keyvisual"><img src="<?php echo get_template_directory_uri(); ?>/common/sharedimg/young/main_image.jpg" alt="未成年向け講座" /></div><!-- end keyvisual -->
<?php else: ?>
<div id="keyvisual"><img src="<?php echo get_template_directory_uri(); ?>/common/sharedimg/young/main_image_<?php echo $page_slug; ?>.jpg" alt="<?php echo $cat_name; ?>" /></div><!-- end keyvisual -->
<?php endif; ?>
