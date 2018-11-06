<?php get_header(); ?>
<div id="container" class="waiwai">
<?php get_sidebar(); ?>
<div id="content">
<div class="main">
<?php if( !is_bot() ) { set_post_views( get_the_ID() ); } ?>
<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>
	<h1 class="headline-01"><?php the_title(); ?></h1>
	<p class="views"><i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;<?php the_time('Y/m/d'); ?>　<span><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;<?php echo get_post_views($post->ID); ?> Views</span></p>
		<?php the_content(); ?>
		<?php comments_template(); ?>
	<?php endwhile; ?>
<?php endif; ?>
</div><!-- end main -->
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
