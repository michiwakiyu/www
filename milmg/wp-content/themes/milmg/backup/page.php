<?php get_header(); ?>

<?php get_sidebar(); ?>

<div id="maincontents">

<?php if(have_posts()): while(have_posts()): the_post(); ?>

	<?php get_template_part('content'); ?>

<?php endwhile; endif; ?>

<?php get_template_part('pagenation'); ?>


</div><!-- end maincontents -->

<?php get_footer(); ?>