<?php
//親カテゴリ
$parent_cate_ids = [1, 2, 5, 9, 17];

$cat = get_category(get_query_var('cat'));

if (in_array($cat->term_id, $parent_cate_ids, true) === false) {
	wp_redirect(home_url());
	exit;
}

$child_categories= get_term_children($cat->term_id,'category');


?>

<?php get_header(); ?>

<div id="container" class="chie">
<div id="onecontent">
<div class="onemain">
<div class="cate-list-wrap">
<div class="cate-list archive radius-4px">
<h2 id="mental-chie"><a href="<?php echo home_url(); ?>/mental/">心理コラム</a></h2>
<img src="<?php echo get_template_directory_uri(); ?>/common/sharedimg/chie/bdr_title_colums.gif" alt="心理コラムのタイトルのアンダーライン" class="underline">
</div><!-- end cate-list -->

<div class="cate-list archive radius-4px">
<h2 id="ningenkankei-chie"><a href="<?php echo home_url(); ?>/relation/">人間関係コラム</a></h2>
<img src="<?php echo get_template_directory_uri(); ?>/common/sharedimg/chie/bdr_title_colums.gif" alt="人間関係コラムのタイトルのアンダーライン" class="underline">
</div><!-- end cate-list -->

<div class="cate-list archive radius-4px">
<h2 id="business-chie"><a href="<?php echo home_url(); ?>/business/">ビジネスコラム</a></h2>
<img src="<?php echo get_template_directory_uri(); ?>/common/sharedimg/chie/bdr_title_colums.gif" alt="ビジネスコラム タイトルのアンダーライン" class="underline">
</div><!-- end cate-list -->

<div class="cate-list archive radius-4px">
<h2 id="general-chie"><a href="<?php echo home_url(); ?>/general/">総合コラム</a></h2>
<img src="<?php echo get_template_directory_uri(); ?>/common/sharedimg/chie/bdr_title_colums.gif" alt="総合コラムのタイトルのアンダーライン" class="underline">
</div><!-- end cate-list -->
</div><!-- end cate-list-warp -->

<div class="parent-cate <?php echo $cat->slug; ?>"><?php echo $cat->name; ?></div>
<?php
foreach($child_categories as $child_category):
	$child_categoryID= $child_category;
	$child_categoryName= get_category( $child_category, 'category') -> name ;
?>

<h3><?php echo $child_categoryName; ?></h3>
<ul class="child-cate-list">
	<?php
	$child_posts=  get_posts('numberposts=5&order=ASC&category='.$child_categoryID);
	foreach( $child_posts as $post ): setup_postdata( $post );
	?>

	<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><span class="date"><?php the_time('Y-m-d'); ?></span></li>

	<?php endforeach; ?>
</ul>

<?php endforeach; ?>



</div><!-- end main -->
</div><!-- end content -->
</div><!-- end container -->



<?php get_sidebar('spcolum'); ?>

<?php get_footer(); ?>
