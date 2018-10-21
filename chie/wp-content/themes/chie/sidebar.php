<?php

    $cate_name;
    $cate_id;
    $cate_url;
    $obj_category;

    $category = get_the_category();

    // 所属カテゴリリストの取得
    if ( is_array($category) ):
        $obj_category = $category[0];
    else:
        $obj_category = $category;
    endif;

    // 所属カテゴリ名（親）の取得
    if ( $obj_category->parent != 0 ):
        $cate_name = get_category_parents( $obj_category->parent, true, '' );
        $cate_id = $obj_category->parent;
    else:
        $cate_name = get_category_parents( $obj_category->cat_ID, true, '' );
        $cate_id = $obj_category->cat_ID;
    endif;

    // 当該カテゴリのコラム
    $article_list_args = array(
        'post_type'        => 'post',
        'cat'              => $cate_id,
        'orderby'          => 'post_date',
        'order'            => 'ASC' );
    $article_list = get_posts($article_list_args);

    // 新着コラム
    $newarrival_list_args = array(
        'posts_per_page'   => 10,
        'post_type'        => 'post',
        'orderby'          => 'post_date',
        'order'            => 'DESC' );
    $newarrival_list = get_posts($newarrival_list_args);
?>
<div id="sidebar">
<?php if ( $article_list ): ?>
<div class="cate-name"><?php echo $cate_name; ?></div>
<div class="nav">
<ul class="mt00">
<?php
    foreach( $article_list as $post ): setup_postdata( $post );
?>
<li><span><?php the_time('Y-m-s'); ?></span><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
<?php
    endforeach;
?>
</ul>
</div><!-- end nav -->
<div class="navbottom"><!-- --></div><!-- end navbottom -->
<?php endif; wp_reset_postdata(); ?>

<?php if ( $newarrival_list ): ?>
<div class="cate-name"><a>新着コラム</a></div>
<div class="nav">
<ul class="mt00">
<?php
    foreach( $newarrival_list as $post ): setup_postdata( $post );
?>
<li><span><?php the_time('Y-m-s'); ?></span><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
<?php
    endforeach;
?>
</ul>
</div><!-- end nav -->
<div class="navbottom"><!-- --></div><!-- end navbottom -->
<?php endif; wp_reset_postdata(); ?>

<div class="cate-name"><a>カテゴリ一覧</a></div>
<div class="nav">
<ul class="mt00">
<?php wp_list_categories('orderby=ID&depth=3&hide_empty=0exclude_tree=1&title_li='); ?>
</ul>
</div><!-- end nav -->
<div class="navbottom"><!-- --></div><!-- end navbottom -->
</div><!-- end sidebar -->