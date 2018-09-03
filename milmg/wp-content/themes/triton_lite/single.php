<?php $option =  get_option('trt_options'); ?>
<?php get_header(); ?>

<!--CONTENT-->
<div id="content">

<div class="center">
    <div id="posts" class="single_page_post">
    <div class="post_wrap">
              <!--THE POST-->
                <?php if(have_posts()): ?><?php while(have_posts()): ?><?php the_post(); ?>
                    <div <?php post_class(); ?> id="post-<?php the_ID(); ?>"> 
                     
                       <div class="post_content">
                        <h2 class="postitle"><a href="<?php the_permalink();?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                        <?php if($option["trt_diss_date"] == "1"){ ?><?php } else { ?>
                        <div class="single_metainfo">On <?php the_time( get_option('date_format') ); ?> by <?php the_author(); ?></div>
                        <?php } ?>
                        
                        <?php the_content(); ?>
	<div id="nextprev"><p>&nbsp;</p><p>&nbsp;</p>
	【前の記事】：<?php previous_post_link( ); ?><br />
【次の記事】：<?php next_post_link( ); ?>
	<p>&nbsp;</p></div>

<P>
<!-- tw -->
<a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php the_permalink() ?>" data-lang="ja">ツイート</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
<!-- end tw -->
<!-- hatena -->
<a href="http://b.hatena.ne.jp/entry/<?php the_permalink() ?>" class="hatena-bookmark-button" data-hatena-bookmark-title="<?php the_title(); ?> | <?php bloginfo('name'); ?>" data-hatena-bookmark-layout="standard-noballoon" data-hatena-bookmark-lang="ja" title="このエントリーをはてなブックマークに追加"><img src="http://b.st-hatena.com/images/entry-button/button-only@2x.png" alt="このエントリーをはてなブックマークに追加" width="20" height="20" style="border: none;" /></a><script type="text/javascript" src="http://b.st-hatena.com/js/bookmark_button.js" charset="utf-8" async="async"></script>
</p>
<!-- end hatena -->

<!-- fb -->
<p>
<iframe src="//www.facebook.com/plugins/like.php?href=<?php the_permalink() ?>&amp;width=200&amp;layout=standard&amp;action=like&amp;show_faces=false&amp;share=false&amp;height=35" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:200px; height:35px;" allowTransparency="true"></iframe>
<!-- end fb -->
</p>

                        <div style="clear:both"></div>
                        <?php wp_link_pages('<p class="pages"><strong>'.__('Pages:').'</strong> ', '</p>', 'number'); ?>
                    
                    
                    <!--Post Footer-->
                    <div class="post_foot">
                    <?php if($option["trt_diss_cats"] == "1"){ ?><?php } else { ?>
                        <div class="post_meta">
                        <div class="post_cat"><?php _e('Category' , 'Triton'); ?> : <?php the_category(', '); ?></div>
                        
                        <?php if( has_tag() ) { ?><div class="post_tag"><?php _e('Tags' , 'Triton'); ?> : <?php the_tags(' '); ?></div><?php } else { ?><?php } ?>
                        </div>
                       <?php } ?> 
                        
                   </div><div class="edit"><?php edit_post_link(); ?></div>

                    
                    
                    </div> 
                    

                       
                    </div>
                <!--Share This-->
                <?php if($option["trt_diss_sss"] == "1"){ ?><?php } else { ?>
                <?php get_template_part('share_this');?>
                 <?php } ?>
    
                    <?php endwhile ?>
                    
                   <div class="comments_template"><?php comments_template('',true); ?></div>   
                <?php endif ?>
                
            </div>
</div>
    <?php get_sidebar(); ?>
</div>
</div>




<?php get_footer(); ?>