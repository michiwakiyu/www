<?php
/*
Template Name: columsIntoroPage
*/
?>
<?php get_header(); ?>

<?php get_sidebar('columIntro'); ?>
<hr class="clear" />

<div id="content">
<!-- 角丸はCSSで対応なのでいらない。<div id="contenttop"></div> -->

<!-- end contenttop -->


 
<?php

if(have_posts()): while(have_posts()): the_post();?>
<?php the_content(); ?>

<?php endwhile; endif; ?>

<?php 
//   sidebarの中にcontainerがあります。//
;?>
<!-- <div id="bg_contentbottom"></div> wpは 角丸はcssで対応しているのでいらない -->
</div>
<!-- end content -->
<p>&nbsp;</p>
</div>
<!-- end container -->
<p>&nbsp;</p>
<?php 
// SEO対策のh3タグですが、カスタムフィールドで投稿ページは対応しています。どうするか応確認 //


if(is_page('intro_01')){ 
    echo '<h3 class="sp_dis_none">スキルアップに役立ててくださいね</h3>';
}else 
  if(is_page('intro_02')){
    echo '<h3 class="sp_dis_none">・・・低下したなあ・・・と悩んでいる方は当サイトが絶対おススメです！スキルを高める！
</h3>';
  }else
  if(is_page('intro_03')){
    echo '<h3 class="sp_dis_none">改善するには？使える会話術♪仕事や恋愛に必要な知識とスキルを学ぶ！
</h3>';
  }else
    if(is_page('intor_04')){
    echo '<h3 class="sp_dis_none">スコミュ力がないなあと悩んだ役立つ知識が満載！スキル・能力の鍛え方を解説します。診断コンテンツもあり
</h3>';
 }
 ?>

<?php get_footer(); ?>