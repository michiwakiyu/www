<?php

/*
 * 投稿画面でもCSSを適用する、また、フォントをゴシック系にする
 */
add_editor_style('editor-style.css');
add_filter( 'tiny_mce_before_init', 'custom_editor_settings' );
function custom_editor_settings( $initArray ){
    return $initArray;
}

// TinyMCEの editor-style.css キャッシュ対策
add_filter( 'tiny_mce_before_init', 'extend_tiny_mce_before_init' );
function extend_tiny_mce_before_init( $mce_init ) {
 
    $mce_init['cache_suffix'] = 'v='.time();
 
    return $mce_init;    
}

/*
 * ドメインを取得する
 */
function colums_get_domain( $second_domain = '' ) {
    $tmp_url = get_template_directory_uri();
    $my_url = parse_url($tmp_url);

    $my_scheme = $my_url['scheme'];
    $my_host = $my_url['host'];

    if ( $my_scheme && $my_host ):
        $url = $my_scheme . '://' . $my_host;
        if ( $second_domain ):
            $url .= '/' . $second_domain;
        endif;
    else:
        $url = '';
    endif;

    return $url;
}


/*
 * パンくずを生成する
 */
function the_topicpath(){
    global $post;
    $str ='';

    if( !is_admin() ) {

        $str.= '<div itemscope itemtype="http://data-vocabulary.org/Breadcrumb">';
        $str.= '<a href="'. colums_get_domain() .'" itemprop="url"><span itemprop="title">ホーム</span></a> &gt;</div>'."\n";

        if ( is_home() ) {

            $str.='<div itemscope itemtype="http://data-vocabulary.org/Breadcrumb">';
            $str.='<a href="'. colums_get_domain('chie') .'" itemprop="url"><span itemprop="title">コミュニケーション知恵袋</span></a></div>'."\n";

        } else {

            $str.='<div itemscope itemtype="http://data-vocabulary.org/Breadcrumb">';
            $str.='<a href="'. colums_get_domain('chie') .'" itemprop="url"><span itemprop="title">コミュニケーション知恵袋</span></a> &gt;</div>'."\n";

            if( is_category() ) {

                $cat = get_queried_object();

                if( $cat->parent != 0 ) {
                    $ancestors = array_reverse(get_ancestors( $cat->cat_ID, 'category' ));
                    foreach($ancestors as $ancestor){
                        $str.='<div itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="'. get_category_link($ancestor) .'" itemprop="url"><span itemprop="title">'. get_cat_name($ancestor) .'</span></a> &gt;</div>'."\n";
                    }
                }

                $str.='<div itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="'. get_category_link($cat->term_id). '" itemprop="url"><span itemprop="title">'. $cat->cat_name . '</span></a></div>'."\n";

            } elseif( is_page() ) {

                $ancestors = array_reverse(get_post_ancestors( $post->ID ));
                foreach($ancestors as $ancestor){
                    $str.='<div itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="'. get_permalink($ancestor).'" itemprop="url"><span itemprop="title">'. get_the_title($ancestor) .'</span></a></div>'."\n";
                }

            } elseif( is_single() ) {

                $categories = get_the_category($post->ID);
                $cat = $categories[0];

                $ancestors = array_reverse(get_ancestors( $cat->cat_ID, 'category' ));
                foreach($ancestors as $ancestor){
                    $str.='<div itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="'. get_category_link($ancestor).'" itemprop="url"><span itemprop="title">'. get_cat_name($ancestor). '</span></a> &gt;</div>'."\n";
                }

            }

            if( !is_category() ) {
                $this_h1_tag = get_field('this_h1_tag');
                if ( $this_h1_tag ) {
                    $str.='<h1>'. $this_h1_tag .'</h1>'."\n";
                } else {
                    $str.='<h1>'. wp_title('', false) .'</h1>'."\n";
                }
            }
        }
    }
    echo $str;
}

/*
 *
 */
/*function custom_get_article_list ( $parent_id, $show_flg = true ) {

    $html = '';
    $a_week_ago = date("Y/m/d",strtotime("-1 week"));


    if ( $list ):
        foreach( $list as $post ): setup_postdata( $post );
            $post_date = get_the_date("Y/m/d", $post->ID);

            if ( strtotime($post_date) >= strtotime($a_week_ago) ):
                $new_class = ' class="new-chie"';
            else:
                $new_class = '';
            endif;

            $title = get_the_title($post->ID);
            if ( mb_strlen($title) > 23 ):
                $title = mb_substr($title, 0, 23) . '...';
            endif;

            $html = '<li' . $new_class . '><a href="' . get_permalink($post->ID) . '">' . $title . '</a></li>'."\n";

        endforeach;
    else:
        $html = '<li>該当する記事はありません。</li>'."\n";

    endif; wp_reset_postdata();




    if ( $show_flg ):
        echo $html;
    else:
        return $html;
    endif;
}

*/
function custom_get_article_child_list ( $parent_id, $show_flg = true ) {

    $html = '';
    $a_week_ago = date("Y/m/d",strtotime("-1 week"));

     $child_categories= get_term_children($parent_id,'category');//親カテIDから子カテのID配列取得

    //rsort($child_categories, SORT_NUMERIC);//降順に子カテのID変更、別に変更しなくていいかも

    foreach($child_categories as $child_category):

     $list= get_posts('order=ASC&numberposts=1&category=' .$child_category); //子カテの最新記事を１件引っ張る

    if ( $list ):
        $post=$list[0];
        setup_postdata( $post );
            $post_date = get_the_date("Y/m/d", $post->ID);

            if ( strtotime($post_date) >= strtotime($a_week_ago) ):
            $new_class = ' class="new-chie"';

            else:
                $new_class = '';
            endif;
            $cat_post=get_the_category($post->ID);

            $cat_post_name=$cat_post[0]->name;

            $title = get_the_title($post->ID);
            if ( mb_strlen($title) > 16 ):
                $title = mb_substr($title, 0, 20) . '...';
            endif;

           echo '<li' . $new_class . '><a href="' . get_permalink($post->ID) . '">' . $cat_post_name . '</a></li>'."\n";

    else:
        echo '<li>該当する記事はありません。</li>'."\n";

    endif; wp_reset_postdata();

endforeach;

}

// 子カテの最新記事を取得して、それに、子カテの一番最初にリンクを貼るというファンクション
function custom_get_article_list ( $parent_id, $show_flg = true ) {

    $html = '';
    $a_week_ago = date("Y/m/d",strtotime("-1 week"));

     $child_categories= get_term_children($parent_id,'category');//親カテIDから子カテのID配列取得

    rsort($child_categories, SORT_NUMERIC);//降順に子カテのID変更、別に変更しなくていいかも

    foreach($child_categories as $child_category):

     $list= get_posts('numberposts=1&category=' .$child_category); //子カテの最新記事を１件引っ張る

    if ( $list ):
        $post=$list[0];
        setup_postdata( $post );
            $post_date = get_the_date("Y/m/d", $post->ID);

            if ( strtotime($post_date) >= strtotime($a_week_ago) ):
            $new_class = ' class="new-chie"';

            else:
                $new_class = '';
            endif;
            $cat_post=get_the_category($post->ID);//カテゴリーIDをサイド取得
           $p =get_posts('order=ASC&numberposts=1&category='.$cat_post[0]->term_id);//カテゴリーの一番古い記事を取得
            $permalink=get_permalink($p[0]-> ID);

            $title = get_the_title($post->ID);
            if ( mb_strlen($title) > 16 ):
                $title = mb_substr($title, 0, 20) . '...';
            endif;

           echo '<li' . $new_class . '><a href="' . $permalink . '">' . $title . '</a></li>'."\n";

    else:
        echo '<li>該当する記事はありません。</li>'."\n";

    endif; wp_reset_postdata();

endforeach;

}


/*
 * 管理画面のカテゴリー自動ソートを禁止
 */
add_action( 'wp_terms_checklist_args', 'custom_wp_terms_checklist_args' );
function custom_wp_terms_checklist_args( $args, $post_id = null ) {
    $args['checked_ontop'] = false;
    return $args;
}


/*
 * コミュニケーション講座のバナーを表示する
 */
// 心理学講座用
function shortcode_communication_banner() {
	$html = '<div class="effect_show"><a class="max-width--80" href="/course/mental.html"><img style="max-width:100%;" src="' . get_template_directory_uri() . '/img/communication_banner.jpg" alt="コミュニケーション講座"></a></div>';
	return $html;
}
add_shortcode('communication_banner', 'shortcode_communication_banner');

// 人間関係用
function shortcode_ningenkankei_banner() {
	$html = '<div class="effect_show"><a class="max-width--80" href="/course/ningenkankei.html"><img style="max-width:100%;" src="' . get_template_directory_uri() . '/img/ningenkankei_banner.jpg" alt="人間関係講座"></a></div>';
	return $html;
}
add_shortcode('ningenkankei_banner', 'shortcode_ningenkankei_banner');

// 社会人講座用
function shortcode_business_banner() {
	$html = '<div class="effect_show"><a class="max-width--80" href="/course/business.html"><img style="max-width:100%;" src="' . get_template_directory_uri() . '/img/business_banner.jpg" alt="社会人講座"></a></div>';
	return $html;
}
add_shortcode('business_banner', 'shortcode_business_banner');

// fb18バナー用
function shortcode_fb18_banner() {
    $html = '<div class="effect_show"><a class="max-width--80" href="/course/mental.html"><img style="max-width:100%;" src="' . get_template_directory_uri() . '/img/fbbana-18.jpg" alt="心理学講座"></a></div>';
    return $html;
}
add_shortcode('fb18_banner', 'shortcode_fb18_banner');

// fb19バナー用
function shortcode_fb19_banner() {
    $html = '<div class="effect_show"><a class="max-width--80" href="/course/ningenkankei.html"><img style="max-width:100%;" src="' . get_template_directory_uri() . '/img/fbbana-19.jpg" alt="人間関係講座"></a></div>';
    return $html;
}
add_shortcode('fb19_banner', 'shortcode_fb19_banner');

// fb20バナー用
function shortcode_fb20_banner() {
    $html = '<div class="effect_show"><a class="max-width--80" href="/course/business.html"><img style="max-width:100%;" src="' . get_template_directory_uri() . '/img/fbbana-20.jpg" alt="社会人講座"></a></div>';
    return $html;
}
add_shortcode('fb20_banner', 'shortcode_fb20_banner');

// 「不安定」用
function shortcode_fuantei_banner() {
    $html = '<div class="effect_show"><a class="max-width--80" href="/course/1_intro.html"><img style="max-width:100%;" src="' . get_template_directory_uri() . '/img/fuantei.jpg" alt="心理学講座"></a></div>';
    return $html;
}
add_shortcode('fuantei_banner', 'shortcode_fuantei_banner');

// 「苦手」用
function shortcode_nigate_banner() {
    $html = '<div class="effect_show"><a class="max-width--80" href="/course/1_intro.html"><img style="max-width:100%;" src="' . get_template_directory_uri() . '/img/nigate.jpg" alt="人間関係講座"></a></div>';
    return $html;
}
add_shortcode('nigate_banner', 'shortcode_nigate_banner');