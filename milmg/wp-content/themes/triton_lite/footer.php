<?php $option =  get_option('trt_options'); ?>
<!--MIDROW-->
<?php if($option["trt_diss_ftw"] == "1"){ ?><?php } else { ?>
<div id="midrow">
<div class="center">
<div class="widgets"><ul>          
        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Midrow Widgets') ) : ?> 
        <?php endif; ?></ul>
        </div>
</div>
</div>
<?php }?>

<!--FOOTER-->
<div id="footer">
<div class="center">
<div class="widgets"><ul>          
        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Widgets') ) : ?> 
        <?php endif; ?></ul>
        </div>
</div>

	<!--COPYRIGHT TEXT-->
    <div id="copyright">
    	<div class="center">
            <div class="copytext">
           <?php echo $option['trt_foot']; ?><?php _e('Theme by', 'triton');?> <a class="towfiq" target="_blank" href="http://www.towfiqi.com/">Towfiq I.</a>
            </div>
        </div>
    </div>
</div>


</div>
<?php wp_footer(); ?>


<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-46679568-1', 'hirokenji.com');
  ga('send', 'pageview');

</script>
</body>
</html>

