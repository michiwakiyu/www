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


	
	$('a#open').click(function(){
	
		$('div#onoffbox').slideDown('slow');
		$(this).hide();
		
		$('div#header').css('background','url(./common/sharedimg/header/bg_header_illust2.gif) repeat-x center top')
	})
	
	$('a#close').click(function(){
		$('div#onoffbox').slideUp('slow');
		$('a#open').show();
		
		$('div#header').css('background','url(./common/sharedimg/header/bg_header_illust.gif) repeat-x center top')
		
	})
								


});
