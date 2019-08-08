// source --> https://www.direct-commu.com/chie/wp-content/themes/chie/common/js/onoff.js 
$(function() {

//alert("hello");
	//$('a#open').toggle();
	
$('div#onoffbox').hide();

     $('a#open').hover(function(){
        $(this).animate({ 
    //width: "70%",
    //opacity: 0.4,
    marginLeft: "0.5in",
	paddingBottom: "15px",
    fontSize: "150%", 
    //borderWidth: "10px"
  }, 150 );
          }, function(){
             if (!$(this).hasClass('currentPage')) {
             $(this).animate({ 
    //width: "20%",
    //opacity: 1.0,
    //marginLeft: "0in",
	paddingBottom: "0px",	
	//marginBottom: "0in",	
    fontSize: "100%", 
    //borderWidth: "10px"
  }, 150 );
        }
   });


	
	/*$('a#open').click(function(){
	
		$('div#onoffbox').slideDown('slow');
		$(this).hide();
		
		$('div#header').css('background','url(./common/sharedimg/header/bg_header_illust2.gif) repeat-x center top')
	})
	
	$('a#close').click(function(){
		$('div#onoffbox').slideUp('slow');
		$('a#open').show();
		
		$('div#header').css('background','url(./common/sharedimg/header/bg_header_illust.gif) repeat-x center top')
		
	})*/
	/*多段アコーディオン */
  
jQuery(".accordion").click(function(){
  jQuery(this).children(".accordion_ul").slideToggle();
  });

jQuery(".child_category").click(function(e){
    jQuery(this).children(".child_post").slideToggle();
    e.stopPropagation();
    
    });
    
 jQuery(".accordion").click(function(){
   
  jQuery(this).children(".colum_sidenav_top").children(".sidebar-arrow").toggleClass("side-open");
  });

jQuery(".child_category").click(function(e){
     jQuery(this).find(".sidebar-arrow").toggleClass("side-open");
    e.stopPropagation();
    
    });
    //アコーディオン　読みこみページを開く。
 
   if(jQuery(".sidebar-active")[0]){
   
     jQuery(".sidebar-active").parents(".accordion_ul").slideToggle();
     
     jQuery(".sidebar-active").parent(".child_post").slideToggle();
      jQuery(".sidebar-active").parents(".child_accordion").children(".child_category_title").children(".sidebar-arrow").toggleClass("side-open");
        jQuery(".sidebar-active").parents(".accordion").children(".parent_category_title").children(".sidebar-arrow").toggleClass("side-open");


  }

    /*
    jQuery(this).find(".child_category").click(function(){
      if(jQuery(this).children(".child_post").css("display","none")){
    jQuery(this).children(".child_post").css("display","");
  
      }else{
        jQuery(this).children(".child_post").css("display","none");
      }
      
    });



jQuery(".child_category_title").children("p").each(function() {
    if(jQuery("this").text().length >16){
   alert("ww");
   jQuery(this).css("top","0");
   }
 */ 


 
   









});