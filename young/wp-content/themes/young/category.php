<?php get_header(); ?>
<div id="container" class="waiwai">
<?php get_sidebar(); ?>
<div id="content">
<?php if ( have_posts() ) : ?>
<div class="main category">
	<ul class="post_list">
	<?php while ( have_posts() ) : the_post(); ?>
		<li class="clearfix">
			<div class="left">
    				<?php if (has_post_thumbnail()) : ?>
        				<?php the_post_thumbnail('category_thumb'); ?>
    				<?php elseif ($first_img = catch_that_image()) : ?>
        			<img src="<?php echo $first_img; ?>" alt="<?php the_title(); ?>" />
				<?php elseif ($avatar = get_post_meta($post->ID, 'avatar', true)) : ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/img/admin/<?php echo $avatar; ?>.png" alt="<?php the_title(); ?>" />
    				<?php else : ?>
        			<!--<img src="<?php bloginfo('template_url'); ?>/common/sharedimg/waiwai/cate-thumb_noimage.png" alt="<?php the_title(); ?>" />-->
                                <img src="<?php echo get_template_directory_uri(); ?>/img/admin/<?php echo $_post_avatars[array_rand($_post_avatars, 1)]; ?>.png" alt="<?php the_title(); ?>" />
    				<?php endif ; ?>
			</div>
			<div class="right">
				<div class="date"><?php the_time('Y.m.d'); ?><span class="view-count"><?php echo get_post_views($post->ID); ?> Views</span><?php if( time() - get_the_time('G') < 604800 ): ?><span class="new-entry">NEW</span><?php endif; ?></div>
				<div class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
				<div class="excerpt"><?php the_excerpt(); ?></div>
			</div>
		</li>
	<?php endwhile; ?>
	</ul>
<?php endif; ?>
<!--ページネーション-->
<?php if (function_exists('responsive_pagination')) {
  responsive_pagination($additional_loop->max_num_pages);
} ?>
<?php if ( have_posts() ) : ?>
</div><!-- end main -->
<?php endif; ?>
</div><!-- end content -->
</div><!-- end container -->


<!--
<div class="wid">
<h3 class="bottom_com">コミュニケーション能力を向上させるノウハウたっぷり！通信講座,教育のご案内です。<br />
スキルアップする研修のノウハウをたっぷり詰め込んだ本です</h3>
</div>
-->

<?php get_sidebar('sp'); ?>

<?php get_footer(); ?>
