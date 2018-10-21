<?php get_header(); ?>

<div id="container" class="chie">
<?php get_sidebar('colum'); ?>

<hr class="clear" />
<div id="content">
<?php
    if ( have_posts() ): the_post();
//        while ( have_posts() ): the_post();
?>
<div class="main">

<div class="cate-list-wrap single">
<div class="cate-list single radius-4px">
<h2 id="top-chie"><a href="<?php echo home_url(); ?>">知恵袋TOP</a></h2>
<img src="<?php echo get_template_directory_uri(); ?>/common/sharedimg/chie/bdr_title_colums.gif" alt="知恵袋TOPのタイトルのアンダーライン" class="underline">
</div><!-- end cate-list -->

<div class="cate-list single radius-4px">
<h2 id="mental-chie"><a href="<?php echo home_url(); ?>/mental/">心理コラム</a></h2>
<img src="<?php echo get_template_directory_uri(); ?>/common/sharedimg/chie/bdr_title_colums.gif" alt="心理コラムのタイトルのアンダーライン" class="underline">
</div><!-- end cate-list -->

<div class="cate-list single radius-4px">
<h2 id="ningenkankei-chie"><a href="<?php echo home_url(); ?>/relation/">人間関係コラム</a></h2>
<img src="<?php echo get_template_directory_uri(); ?>/common/sharedimg/chie/bdr_title_colums.gif" alt="人間関係コラムのタイトルのアンダーライン" class="underline">
</div><!-- end cate-list -->

<div class="cate-list single radius-4px">
<h2 id="business-chie"><a href="<?php echo home_url(); ?>/business/">ビジネスコラム</a></h2>
<img src="<?php echo get_template_directory_uri(); ?>/common/sharedimg/chie/bdr_title_colums.gif" alt="ビジネスコラム タイトルのアンダーライン" class="underline">
</div><!-- end cate-list -->

<div class="cate-list single radius-4px">
<h2 id="general-chie"><a href="<?php echo home_url(); ?>/general/">総合コラム</a></h2>
<img src="<?php echo get_template_directory_uri(); ?>/common/sharedimg/chie/bdr_title_colums.gif" alt="総合コラムのタイトルのアンダーライン" class="underline">
</div><!-- end cate-list -->
</div><!-- end cate-list-warp -->
<?php the_content(); ?>

<?php get_template_part('social'); ?>

<div class="pagenation">
  <div class="pagenation-container">
        <?php $prev_img = get_template_directory_uri().'/img/btn_prev.png';
              $next_img = get_template_directory_uri().'/img/btn_next.png';

        ?>

    <?php previous_post_link( '%link','<img src='.$prev_img.' >', true); ?>
    <?php next_post_link( '%link', '<img src='.$next_img.' >', true); ?>
    
  </div>
</div>

<p><?php the_field('this_chapter_and_verse'); ?></p>

</div><!-- end main -->
<?php
//        endwhile;
    else :
        echo wpautop('投稿が見つかりませんでした。');
    endif;
?>
<!--確認-->
<br /><br />
<div>
<h3 class="bottom_com"><?php the_field('this_h3_tag'); ?></h3>
</div>
</div><!-- end content -->

</div><!-- end container -->



<?php get_sidebar('spcolum'); ?>

<?php get_footer(); ?>
