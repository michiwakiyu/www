<?php
$cats = get_the_category();
$current_category = $cats[0];
$parent_category = get_term($current_category->parent, 'category');
?>
  <div id="sidebar" class="sidebar">
  <div class="nav">
  <ul class="sidecategory"> 
      
      <?php
      $parent_categorySlug= $parent_category-> slug;
      $parent_categoryID= $parent_category -> term_id;
      $parent_categoryName= $parent_category -> name;
      ?>
       <!-- ----------------------------------------------------------------------あとでまとめる -->
    
      <li class="accordion"><!--親カテゴリー -->
      <div class="colum_sidenav_top parent_category_title ">
      <div class="sidebar-arrow"></div>
      <a href="/chie/<?php echo $parent_categorySlug; ?>/"><span class="<?php echo $parent_categorySlug . '_sidenav';?>"><?php echo $parent_categoryName; ?></span></a>
      </div>

    <ul class="accordion_ul"> 
    <li class="child_category child_accordion">
     <div class="colum_sidenav_top child_category_title">
     <div class="sidebar-arrow"></div> <p><?php echo $current_category->name ; ?></p></div>
  
      <ul class="child_post">
      <?php $child_posts=  get_posts('numberposts=-1&order=ASC&category='.$current_category->term_id);
         foreach( $child_posts as $post ): setup_postdata( $post );
          if(is_single($post->post_name)):
         ?>
        
      <li class="sidebar-description sidebar-active "><span><?php the_time('Y-m-d'); ?></span><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
     <?php else: ?>
      <li class="sidebar-description"><span><?php the_time('Y-m-d'); ?></span><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
     
        <?php endif; endforeach ;?>
         
      </ul> <!--child-post -->
    </li>
  </ul>
 
    
 </li> 

  </ul>
  </div> <!-- nav-->
  <div class="navbottom"><!-- --></div>
  </div>
