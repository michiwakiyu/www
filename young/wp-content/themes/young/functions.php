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

        //$str.= '<div itemscope itemtype="http://data-vocabulary.org/Breadcrumb">';
        //$str.= '<a href="'. colums_get_domain() .'" itemprop="url"><span itemprop="title">ホーム</span></a> &gt;</div>'."\n";
        
        if ( is_home() ) {
        
            $str.='<div itemscope itemtype="http://data-vocabulary.org/Breadcrumb">';
            $str.='<a href="'. colums_get_domain('young') .'" itemprop="url"><span itemprop="title">ホーム</span></a></div>'."\n";

        } else {
            
            $str.='<div itemscope itemtype="http://data-vocabulary.org/Breadcrumb">';
            $str.='<a href="'. colums_get_domain('young') .'" itemprop="url"><span itemprop="title">ホーム</span></a> &gt;</div>'."\n";
            
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
		if ($ancestors) {
                	foreach($ancestors as $ancestor){
                    		$str.='<div itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="'. get_category_link($ancestor).'" itemprop="url"><span itemprop="title">'. get_cat_name($ancestor). '</span></a> &gt;</div>'."\n";
                	}
		}
		else {
                    	$str.='<div itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="'. get_category_link($cat->cat_ID).'" itemprop="url"><span itemprop="title">'. get_cat_name($cat->cat_ID). '</span></a> &gt;</div>'."\n";
		}
            
            }
            
            if( !is_category() ) {
                    if (is_single()) {
                    	$str.='<h1>'. title_substr($post->post_title, 30) .'</h1>'."\n";
                    }
                    else {
                    	$str.='<h1>'. wp_title('', false) .'</h1>'."\n";
                    }
            }
        }
    }
    echo $str;
}


/*
 * 管理画面のカテゴリー自動ソートを禁止
 */
add_action( 'wp_terms_checklist_args', 'custom_wp_terms_checklist_args' );
function custom_wp_terms_checklist_args( $args, $post_id = null ) {
    $args['checked_ontop'] = false;
    return $args;
}

/* アイキャッチ登録許可 */

 add_theme_support('post-thumbnails'); 
 add_image_size('category_thumb', '100', '100', ture);

/*
 * アイキャッチが登録されていない場合に記事の一番最初の画像を取得する
 */
//画像URLからIDを取得
function get_attachment_id_by_url( $url ) {
	global $wpdb;
	$sql = "SELECT ID FROM {$wpdb->posts} WHERE post_name = %s";
	preg_match( '/([^\/]+?)(-e\d+)?(-\d+x\d+)?(\.\w+)?$/', $url, $matches );
	$post_name = $matches[1];
	return ( int )$wpdb->get_var( $wpdb->prepare( $sql, $post_name ) );
}
 
//画像をサムネイルで出力
function catch_that_image() {
	global $post;
	$first_img = '';
	$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches );
	$first_img_src = $matches[1][0];
	$attachment_id = get_attachment_id_by_url( $first_img_src );
	$first_img = wp_get_attachment_image_src( $attachment_id, array(100, 100), false );

	return $first_img[0];
}
 

/*
 * サイト全体で表示順を古い順にする
 */
/*
add_action('pre_get_posts', 'theme_pre_get_posts');
function theme_pre_get_posts($query) {
    $query->set('order', 'ASC');
}
*/

/* タイトルの文字数制限 */
function title_substr($title, $count=20) {
	if(mb_strlen($title, 'UTF-8')>$count){
		$title= mb_substr($title, 0, $count, 'UTF-8');
		return $title.'...';
	}else{
		return $title;
	}
}

/*
 * 抜粋の長さ変更
 */
function new_excerpt_mblength($length) {
	return 110;
}
add_filter('excerpt_mblength', 'new_excerpt_mblength');

/*
 * 抜粋に続きを読むを追加
 */
function new_excerpt_more($post) {
	return '・・・<a href="'. get_permalink($post->ID) . '">' . '続きを読む' . '</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

/*
 * 抜粋のPタグを除去
 */
remove_filter('the_excerpt', 'wpautop');

/*
 * レスポンシブなページネーションを作成する
 */
function responsive_pagination($pages = '', $range = 4){
  $showitems = ($range * 2)+1;

  global $paged;
  if(empty($paged)) $paged = 1;

  //ページ情報の取得
  if($pages == '') {
    global $wp_query;
    $pages = $wp_query->max_num_pages;
    if(!$pages){
      $pages = 1;
    }
  }

  if(1 != $pages) {
    echo '<ul class="pagination" role="menubar" aria-label="Pagination">';
    if (($paged-1) > 0) {
        //先頭へ
        echo '<li class="first"><a href="'.get_pagenum_link(1).'"><span>First</span></a></li>';
        //1つ戻る
        echo '<li class="previous"><a href="'.get_pagenum_link($paged - 1).'"><span>Previous</span></a></li>';
    }
    //番号つきページ送りボタン
    for ($i=1; $i <= $pages; $i++)     {
      if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))       {
        echo ($paged == $i)? '<li class="current"><a>'.$i.'</a></li>':'<li><a href="'.get_pagenum_link($i).'" class="inactive" >'.$i.'</a></li>';
      }
    }
    //1つ進む
    if (($paged+1) <= $pages) {
        echo '<li class="next"><a href="'.get_pagenum_link($paged + 1).'"><span>Next</span></a></li>';
    	//最後尾へ
    	echo '<li class="last"><a href="'.get_pagenum_link($pages).'"><span>Last</span></a></li>';
    }
    echo '</ul>';
  }
}


/*
 * shortcode
 */

//テンプレートディレクトリへのパス
add_shortcode('template_path', 'shortcode_template_path');
function shortcode_template_path() {
	return get_template_directory_uri();
}

/*
 * お申し込みフォーム
 * 注意事項の確認、保護者の許可チェック
 */
function wpcf7_validate_accept($result) {
	if ($_POST['note'] == 'いいえ') {
		$result['valid'] = false;
		$result['reason'] = array( 'note' => '注意事項を確認してください。');
	}

	if ($_POST['permission'] == 'いいえ') {
		$result['valid'] = false;
		$result['reason'] = array( 'permission' => '保護者の許可を得てください。');
	}

	if ($_POST['gender'] == '') {
		$result['valid'] = false;
		$result['reason'] = array( 'gender' => '必須項目に入力してください。');
	}

	return $result;
}
add_filter( 'wpcf7_validate', 'wpcf7_validate_accept' );
?>
