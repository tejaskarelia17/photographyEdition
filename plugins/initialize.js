jQuery(function($){			
		$('.example dd').hide(); 
		$('.example dt').hover(function(){$(this).addClass('hover')},function(){$(this).removeClass('hover')}).click(function(){
		$(this).next().slideToggle('normal');
		}); 
	
});
jQuery(function($){			
		$('.toggle dd').hide(); 
		$('.toggle dt').hover(function(){$(this).addClass('hover')},function(){$(this).removeClass('hover')}).click(function(){
		$(this).next().slideToggle('normal');
		}); 
	
});
jQuery(function($){			
		$('.timeline dd').hide(); 
		$('.timeline dt').hover(function(){$(this).addClass('hover')},function(){$(this).removeClass('hover')}).click(function(){
		$(this).next().slideToggle('normal');
		}); 
	
});
	$('.img-box img').each(function() {
		var imgClass = $(this).attr('class');
		$(this).wrap('<span class="image-wrap ' + imgClass + '" style="width: auto; height: auto;"/>');
		$(this).removeAttr('class');
	});

function sizebanner() {
	windowHeight = $(window).height();
	windowWidth = $(window).width();
 	var bannerHeight = $(".hero > div").height();
 	
	if (windowWidth >= 768) {
		$(".hero").css({ 'height' : windowHeight + "px"});
		$(".hero > div").not(".hero2").css('padding-top', parseInt((windowHeight - bannerHeight) / 2));
	} else if (windowWidth >= 480 ) {
		$(".hero").css('height','485px'); 
		$(".hero > div").css('padding-top','183px');
		$(".hero > div").not(".hero2").css('padding-top','150px');
	} 
	else {
		$(".hero").css('height','312px'); 
		$(".hero > div").css('padding-top','105px');
		$(".hero").css('height','420px'); 
		$(".hero > div").not(".hero2").css('padding-top','105px');
	} 
};



sizebanner();

$(window).on("resize", function(){ 
	sizebanner(); 
});
jQuery(function($){
$('.hero_slide').bxSlider({
  mode: 'horizontal',
  useCSS: false,
  infiniteLoop: true,
  controls: true,
  auto: true,
  autoControls: true,
  easing: 'easeInQuart',
  speed: 800,
  captions: true
});
});

jQuery(function($){
$('.news_slide').bxSlider({
  mode: 'horizontal',
  useCSS: false,
  infiniteLoop: true,
  hideControlOnEnd: false,
  auto: true,
  autoControls: true,
  easing: 'easeInQuart',
  speed: 800
});
});

jQuery(function($){
$('.client_slide').bxSlider({
  minSlides: 3,
  maxSlides: 4,
  slideWidth: 221,
  slideMargin: 10,
  mode: 'horizontal',
  useCSS: false,
  infiniteLoop: true,
  controls: false,
  auto: true,
  autoControls: true,
  easing: 'easeInQuart',
  speed: 800
});
});


jQuery(function($){
  	$('#clienttest').easySlider({autoPlay: true, autoPlayInterval: 7000});
  });