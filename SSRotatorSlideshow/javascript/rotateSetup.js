$(document).ready(function() {

//Show Banner
$(".main_image .desc").show(); //Show Banner
$(".main_image .block").animate({ opacity: 0.85 }, 1 ); //Set Opacity

//Click and Hover events for thumbnail list
$(".image_thumb ul li:first").addClass('active');

// * Code added by Jeff Schram, SchramDesign, http://schramdesign.com, email@schramdesign.com
// * Adds a class 'last' to the last li to let the rotator know when to return to the first
$(".image_thumb ul li:last").addClass('last');

$(".image_thumb ul li").click(function(){
//Set Variables
var imgAlt = $(this).find('img').attr("alt"); //Get Alt Tag of Image
var imgTitle = $(this).find('a').attr("href"); //Get Main Image URL
var imgDesc = $(this).find('.block').html(); //Get HTML of block
var imgDescHeight = $(".main_image").find('.block').height(); //Calculate height of block
var imgLinkTo= $(this).find('.linkTo').html();  //Get the page link 

if ($(this).is(".active")) { //If it's already active, then
return false; // Don't click through
} else {
//Animate the Teaser
$(".main_image .linkTo").attr({ href: imgLinkTo})
$(".main_image img").animate({ opacity: 0}, 450 );
$(".main_image .block").animate({ opacity: 0, marginBottom: -imgDescHeight }, 450 , function() {
$(".main_image .block").html(imgDesc).animate({ opacity: 0.85, marginBottom: "0" }, 450 );
$(".main_image img").attr({ src: imgTitle , alt: imgAlt}).animate({ opacity: 1}, 450 );
});}

$(".image_thumb ul li").removeClass('active'); //Remove class of 'active' on all lists
$(this).addClass('active'); //add class of 'active' on this list only
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

// * Code added by Jeff Schram
// * if we are hovering over the image area, pause the clickNext function
// * by default, our new pauseClickNext variable is false
pauseClickNext = false;
$(".main_image").hover(
function () {
pauseClickNext = true;
},
function () {
pauseClickNext = false;
}
);

// * Code added by Jeff Schram
// * Define function to click the next li
// * notice that it checks for a class of 'last', we added that above
var clickNext = function(){
if(!pauseClickNext) {
// / find the next li after .active
var $next_li = $("li.active").next("li");
if($("li.active").hasClass("last") ){
$(".image_thumb ul li:first").trigger("click");
} else {
$next_li.trigger("click");
}
}
};

// * Code added by Jeff Schram
// * setTimeInterval to run clickNext
setInterval(clickNext, 7000);

});//Close Function