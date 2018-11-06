$(function() {

    $('div#onoffbox').hide();

    $('a#open').hover(function(){
        $(this).animate({
            marginLeft: "0.5in",
            paddingBottom: "15px",
            fontSize: "150%"
        }, 150 );
    }, function(){
        if (!$(this).hasClass('currentPage')) {
            $(this).animate({
                paddingBottom: "0px",
                fontSize: "100%"
            }, 150 );
        }
    });


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
     * 左サイドのカテゴリー途中からアコーディオン
     */
    jQuery(".accordion_toggle_down").click(function(){
        jQuery(".accordion_ul_middle").find("li").slideToggle();
    });
    jQuery(".accordion_toggle_up").click(function(){
        jQuery(".accordion_ul_middle").find("li").slideToggle();
    });

 
   





});
