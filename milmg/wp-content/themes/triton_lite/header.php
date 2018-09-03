<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<?php $option =  get_option('trt_options'); ?>

<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />	
<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
   
   <?php if($option["trt_lft_logo"] == "1"){ ?>
	<style>#logo h1 a, .desc { text-align:left;}</style>
   <?php } ?>
<?php wp_enqueue_style('triton_customfont',get_template_directory_uri().'/fonts/'.$option['trt_fonts'].'.css'); ?>
<?php get_template_part('colors');?>

	<?php //comments_popup_script(); // off by default ?>
    <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
	<?php wp_head(); ?>
<style type="text/css">
<!--

div#masthead {
	width: 100%;
	height: 30px;
	background: #333;
}
div#masthead img {
	padding: 0;
	margin: 0;
}


div#wrap_header {
	max-width: 950px;
	height: 24px;
	padding-top: 6px;
	margin: auto;
}
div#wrap_header a {
	color: #fff;
	text-decoration: none;
	font-size: 14px;
}

div#wrap_header a:hover {
	color: #777;
}
div#wrap_header a.selected {
	color: #777;
}


div#wrap_hdr_l {
	width: 50%;
	float: left;
	text-align: left;
}
div#wrap_hdr_r {
	width: 50%;
	float: right;
	text-align: right;
}

.post_content {
	color: #333;
}

div#nextprev {
}

div#nextprev a {
	text-decoration: underline;
	font-size: 14px;
}


-->
</style>
     
</head>


<body <?php body_class(); ?>>

<!--[if lte IE 6]><script src="<?php get_template_directory_uri(); ?>/ie6/warning.js"></script><script>window.onload=function(){e("<?php get_template_directory_uri(); ?>/ie6/")}</script><![endif]-->
<div class="pattern">

<!--TOPMENU-->
<div id="masthead">
<div id="wrap_header" class="cf">
	<div id="wrap_hdr_l">
    	<a href="http://hirokenji.com">HOME</a> |  <a href="http://hirokenji.com/blog/">BLOG TOP</a>
    </div>
    
    <div id="wrap_hdr_r"><a href="http://hirokenji.com/blog/" class="selected">BLOG</a>　　　<a href="http://hirokenji.com/gallery/">GALLERY</a>
    </div>
</div><!-- end wrap_header -->
</div>



<!--HEADER-->
<div id="header">
    <div class="center">
    	<!--LOGO-->
       
        <div id="logo">
        <h1><a class="text_logo" href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
        <?php if($option["trt_description"] == "1"){ ?><?php } else { ?><div class="desc"><?php bloginfo('description')?></div><?php } ?>
        </div>
    </div>
</div>
