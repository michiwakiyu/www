
<?php
global $parent_category;
      $parent_categorySlug= $parent_category-> category_nicename;
      $parent_categoryID= $parent_category -> cat_ID;
      $parent_categoryName= $parent_category -> cat_name;
      ?>
       <!-- ----------------------------------------------------------------------あとでまとめる -->
       <?php 
       
          $new_posts = get_posts('numberposts=1&category_name='.$parent_categorySlug);
     ?>
    
      <li class="accordion"><!--親カテゴリー -->
      <div class="colum_sidenav_top parent_category_title ">
      <div class="sidebar-arrow"></div>
      <span class="<?php echo $parent_categorySlug . '_sidenav';?>"><?php echo $parent_categoryName; ?></span>
      </div>
    
    <?php
    foreach( $new_posts as $post ): setup_postdata( $post );
?>
    <p class="sidebar-description"><span><?php the_time('Y-m-s'); ?></span><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
    <?php
     endforeach; 
    
    $child_categories= get_term_children($parent_categoryID,'category');

     ?>
    
    <?php foreach($child_categories as $child_category): 
    
          $child_categoryID= $child_category;
          $child_categoryName= get_category( $child_category, 'category') -> name ;
         
    ?>
   <ul class="accordion_ul">     
    <li class="child_category child_accordion">
     <div class="colum_sidenav_top child_category_title">
     <div class="sidebar-arrow"></div> <p><?php echo $child_categoryName ; ?></p></div>
  
      <ul class="child_post">
      <?php $child_posts=  get_posts('numberposts=-1&category='.$child_categoryID);
         foreach( $child_posts as $post ): setup_postdata( $post );
          if(is_single($post->post_name)):
         ?>
        
      <li class="sidebar-description sidebar-active "><span><?php the_time('Y-m-s'); ?></span><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
     <?php else: ?>
      <li class="sidebar-description"><span><?php the_time('Y-m-s'); ?></span><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
     
        <?php endif; endforeach ;?>
         
      </ul> <!--child-post -->
    </li>
      <?php endforeach; ?>
  </ul>
 
    
 </li> 
