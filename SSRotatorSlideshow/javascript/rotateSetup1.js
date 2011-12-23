		
$(document).ready(



	 play = setInterval(function() {	

	//Show Banner
	$(".main_image .desc").show(); //Show Banner
	$(".main_image .block").animate({ opacity: 0.85 }, 1 ); //Set Opacity

	//Click and Hover events for thumbnail list
	$(".image_thumb ul li:first").addClass('active'); 
	$(".image_thumb ul li").click(function(){ 
		//Set Variables
		var imgAlt = $(this).find('img').attr("alt"); //Get Alt Tag of Image
		var imgTitle = $(this).find('a').attr("href"); //Get Main Image URL
		var imgDesc = $(this).find('.block').html(); 	//Get HTML of block
		var imgDescHeight = $(".main_image").find('.block').height();	//Calculate height of block	
		
		if ($(this).is(".active")) {  //If it's already active, then...
			return false; // Don't click through
		} else {
			//Animate the Teaser		
			$(".main_image img").animate({ opacity: 0}, 450 );
			$(".main_image .block").animate({ opacity: 0, marginBottom: -imgDescHeight }, 450 , function() {
				$(".main_image .block").html(imgDesc).animate({ opacity: 0.85,	marginBottom: "0" }, 450 );
				$(".main_image img").attr({ src: imgTitle , alt: imgAlt}).animate({ opacity: 1}, 450 );
			});
		}
		
		$(".image_thumb ul li").removeClass('active'); //Remove class of 'active' on all lists
		$(this).addClass('active');  //add class of 'active' on this list only
		return false;
		
	}) .hover(function(){
		$(this).addClass('hover');
		}, function() {
		$(this).removeClass('hover');
	});
			
	//Toggle Teaser
	$("a.collapse").click(function(){
		$(".main_image .block").slideToggle();
		$("a.collapse").toggleClass("show");
	});
	
}, 7000);//Close Function

			/*
rotateSwitch = function(){
    play = setInterval(function(){ //Set timer - this will repeat itself every 7 seconds
        $active = $('.paging a.active').next(); //Move to the next paging
        if ( $active.length === 0) { //If paging reaches the end...
            $active = $('.paging a:first'); //go back to first
        }
        rotate(); //Trigger the paging and slider function
    }, 7000); //Timer speed in milliseconds (7 seconds)
};

rotateSwitch(); //Run function on launch*/