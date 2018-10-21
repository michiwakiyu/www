<div id="container" class="chie">
<?php
$intro_1 = get_page_by_path( 'intro_01' );
$intro_2 = get_page_by_path( 'intro_02' );
$intro_3= get_page_by_path('intro_03');
$intro_4= get_page_by_path('intro_04');

 
?>
<div id="sidebar" class="col-side-intro" >
<a href="<?php echo get_permalink($intro_1->ID); ?>"><img src="../../common/sharedimg/colums/img_title_colums_beginner.gif" width="290" height="44" alt="初めての方への知恵袋" /></a>
<div class="nav " style="width:100%;">
<ul style="margin-top: 0">
<li><a href="<?php echo get_permalink($intro_1->ID); ?>"><span>入門知恵袋１</span>　<br />
  コミュニケーション能力ってなんぞや？</a></li>
<li><a href="<?php  echo get_permalink($intro_2->ID); ?>"><span>入門知恵袋２</span>　<br />
  コミュ力は３つのポイントを抑えれば充分</a></li>
<li><a href="<?php echo  get_permalink($intro_3->ID); ?>"><span>入門知恵袋３</span><br />
  コミュニケーション能力に高い・低いはない！</a></li>

<li><a href="<?php  echo get_permalink($intro_4->ID); ?>"><span>入門知恵袋４</span><br />
  効果的にトレーニングをするために</a></li>
  
</ul>

</div><!-- end nav -->

<div class="navbottom "style="
    width: 100%;
"><!-- --></div><!-- end navbottom -->


</div><!-- end sidebar -->