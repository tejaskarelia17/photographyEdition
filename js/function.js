	/////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////
	// MAIN PRELOADER FOR HOME PAGE

		$('#masterload').toggleClass('hide'); 

		$(window).bind("load", function() {
		
		  $('#masterload').toggleClass('hide'); 

		});

	/////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////
	// PRELOADER FOR IMAGES
	
		$(function(){

		$.fn.preloadify = function(options){
			
			var defaults = {
							 delay:0,
							 imagedelay:0,
							 mode:"sequence",
							 preload_parent:"a",
							 check_timer:200,
							 ondone:function(){ },
							 oneachload:function(image){  },
							 fadein:700 ,
							 force_icon:false
							};
			
			// variables declaration and precaching images and parent container
			 var options = $.extend(defaults, options),
				 parent = $(this),
				 timer,i=0,j=options.imagedelay,counter=0,images = parent.find("img").css({display:"block",visibility:"hidden",opacity:0}),
				 checkFlag = [],
				 imagedelayer = function(image,time){
					
					$(image).css("visibility","visible").delay(time).animate({opacity:1},options.fadein,function(){ $(this).parent().removeClass("preloader");  });
					
					};
				
			// add preloader to parent or wrap anchor depending on option	
			images.each(function(){
				
				if($(this).parent(options.preload_parent).length==0)
				$(this).wrap("<a class='preloader' />");
				else
				$(this).parent().addClass("preloader");
				
				checkFlag[i++] = false;
						
				});
			
			// convert into image array
			images = $.makeArray(images);
			counter = 0;
			
			// function to show image 
			function showimage(i)
			{
				if(checkFlag[i]==false)
					{
						counter++; 
						options.oneachload(images[i]);
						checkFlag[i] = true;
					}
						
				if(options.imagedelay==0&&options.delay==0)
					$(images[i]).css("visibility","visible").animate({opacity:1},700);
				else if(options.delay==0)
				{
					imagedelayer(images[i],j);
					j += options.imagedelay;
				}
				else if(options.imagedelay==0)
				{
					imagedelayer(images[i],options.delay);
					
				}
				else
				{
					imagedelayer(images[i],(options.delay+j));
					j += options.imagedelay;
				}
						
			}
			
			// 	preload images parallel
			function preload_parallel()
			{
				for(i=0;i<images.length;i++)
				{
					if(images[i].complete==true)
					{
						showimage(i);
					 
					}
				}
			}
			
			// shows images based on index with respect to parent container
			function preload_sequential()
			{
				
					if(images[i].complete==true)
					{
						showimage(i);
						 i++;
					}
			}
			
			i=0;j=options.imagedelay;
			// keep on checking after predefined time, if image is loaded
			function init(){
			timer = setInterval(function(){
				
				if(counter>=checkFlag.length)
				{
					clearInterval(timer);
					options.ondone();
					
					return;
				}
				
				if(options.mode=="parallel")
				preload_parallel();
				else
				preload_sequential();
				
				},options.check_timer);
				
			}
			
		  if(options.force_icon==true){	
		  var src = $(".preloader").css("background-image");
		 
			var pattern = /url\(|\)|"|'/g;
			//src = src.replace(pattern,'');
			
			
			var icon = jQuery("<img />",{
				
				id : 'loadingicon' ,
				src : src
				
				}).hide().appendTo("body");
			
			timer = setInterval(function(){
				
				if(icon[0].complete==true)
				{
					clearInterval(timer);
					setTimeout(function(){ init(); },options.check_timer);
					 icon.remove();
					return;
				}
				
				},50);
				
			
		  }
		  else
			init();
			
			
			
			}
			
		})

	/////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////
	// DISABLE RIGHT CLICK
	
		$(document).ready(function(){
			$(document).bind("contextmenu",function(e){
				alert("You are not allowed to download images.");
				return false;
			});
		});		
	  
	/////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////
	// top button action for full screen
	
		$(document).ready(function() {
			
			$("span.fullscreen").click(function () {
			
				
				if($("#th-animation").length > 0) {	

					$("#th-animation").animate({width:'toggle'},500, "easeOutCirc");
				
				}
				
				$("#sliding-thumbnails").thumbnailScroller({ 
					scrollerType:"hoverPrecise", 
					scrollerOrientation:"vertical", 
					scrollSpeed:2, 
					scrollEasing:"easeOutCirc", 
					scrollEasingAmount:800, 
					acceleration:4, 
					scrollSpeed:800, 
					noScrollCenterSpace:10, 
					autoScrolling:4, 
					autoScrollingSpeed:10000, 
					autoScrollingEasing:"easeInOutSine", 
					autoScrollingDelay:200 
				});
		
				$("#wrap").animate({width:'toggle'},500, "easeOutCirc");
				$("#left-menu-animation").animate({width:'toggle'},300, "easeOutCirc");
				$("#right-menu-animation").animate({width:'toggle'},500, "easeOutCirc");
				$("#tags-scroll").animate({width:'toggle'},500, "easeOutCirc");
				$('#tourcontrols').animate({'right':'-300px'},500);
				$('#tour_overlay').remove();
				$('#tour_tooltip').remove();
				$('.social-container-right').toggleClass("right-pos-fix");
				$( ".search-container-right" ).toggleClass("right-search-pos-fix");
				$( "#player-right" ).css('right', '50px');
			});
		});	
	  	  
	/////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////
	// info button action for website tour
	
		$(document).ready(function() {
			
			$("span.help").click(function () {
			
				$('#tourcontrols').animate({'right':'130px'},500);
				$('#tourcontrols').show();
				
				var $overlay	= '<div id="tour_overlay" class="overlay"></div>';
				$('BODY').prepend($overlay);
				
				if($("#wrap").is(":hidden")) {	
					$("#wrap").animate({width:'toggle'},500, "easeOutCirc");
				}

				if($("#wrap-calendar").is(":hidden")) {	
					$("#wrap-calendar").animate({width:'toggle'},500, "easeOutCirc");
				}

				if($("#left-scroll-menu").is(":hidden")) {	
					$("#left-scroll-menu").animate({width:'toggle'},500, "easeOutCirc");
				}

				if($("#right-scroll-menu").is(":hidden")) {	
					$("#right-scroll-menu").animate({width:'toggle'},500, "easeOutCirc");
				}

				if($("#tags-scroll").is(":hidden")) {	
					$("#tags-scroll").animate({width:'toggle'},500, "easeOutCirc");
				}

			});
		});	
		
		$(document).ready(function() {
			
			$("#endtour, #canceltour").click(function () {
			
				$('#tour_overlay').remove();
				
				$('.scroll-container').jScrollbar({
				  allowMouseWheel : true,
				  scrollStep : 10
				});
			
			});
		});	
		
	/////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////
	//EFFECT CUSTOM WP MENU
	
		$(document).ready(function() {	

			//Background color, mouseover and mouseout
			var colorOver = '#333333';
			var colorOut = '#111111';

			//Animate the LI on mouse over, mouse out
			$('#left-menu li, #menu li').click(function () {	
				//Make LI clickable
				window.location = $(this).find('a').attr('href');
				
			}).mouseover(function (){
				
				//mouse over LI and look for A element for transition
				$(this).find('a')
				.animate( { backgroundColor: colorOver }, { queue:false, duration:200 });

			}).mouseout(function () {
			
				//mouse oout LI and look for A element and discard the mouse over transition
				$(this).find('a')
				.animate( { backgroundColor: colorOut }, { queue:false, duration:500 });
			});	
			
		});
		
	/////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////
	// SCROLL MENUS, TAGS, THUMBS
		
		window.onload=function(){ 
			$("#sliding-thumbnails").thumbnailScroller({ 
				scrollerType:"hoverPrecise", 
				scrollerOrientation:"vertical", 
				scrollSpeed:2, 
				scrollEasing:"easeOutCirc", 
				scrollEasingAmount:800, 
				acceleration:4, 
				scrollSpeed:800, 
				noScrollCenterSpace:10, 
				autoScrolling:0, 
				autoScrollingSpeed:10000, 
				autoScrollingEasing:"easeInOutSine", 
				autoScrollingDelay:200 
			});
		
			$("#left-scroll-menu").thumbnailScroller({ 
				scrollerType:"hoverPrecise", 
				scrollerOrientation:"vertical", 
				scrollSpeed:2, 
				scrollEasing:"easeOutCirc", 
				scrollEasingAmount:800, 
				acceleration:4, 
				scrollSpeed:800, 
				noScrollCenterSpace:10, 
				autoScrolling:0, 
				autoScrollingSpeed:10000, 
				autoScrollingEasing:"easeInOutSine", 
				autoScrollingDelay:600 
			});
			
			$("#right-scroll-menu").thumbnailScroller({ 
				scrollerType:"hoverPrecise", 
				scrollerOrientation:"vertical", 
				scrollSpeed:2, 
				scrollEasing:"easeOutCirc", 
				scrollEasingAmount:800, 
				acceleration:4, 
				scrollSpeed:800, 
				noScrollCenterSpace:10, 
				autoScrolling:0, 
				autoScrollingSpeed:2000, 
				autoScrollingEasing:"easeInOutQuad", 
				autoScrollingDelay:500 
			});
			$("#tags-scroll").thumbnailScroller({ 
				scrollerType:"hoverPrecise", 
				scrollerOrientation:"vertical", 
				scrollSpeed:2, 
				scrollEasing:"easeOutCirc", 
				scrollEasingAmount:800, 
				acceleration:4, 
				scrollSpeed:800, 
				noScrollCenterSpace:10, 
				autoScrolling:0, 
				autoScrollingSpeed:2000, 
				autoScrollingEasing:"easeInOutQuad", 
				autoScrollingDelay:500 
			});
		}
		
		/* function to fix the -10000 pixel limit of jquery.animate */
		$.fx.prototype.cur = function(){
			if ( this.elem[this.prop] != null && (!this.elem.style || this.elem.style[this.prop] == null) ) {
			  return this.elem[ this.prop ];
			}
			var r = parseFloat( jQuery.css( this.elem, this.prop ) );
			return typeof r == 'undefined' ? 0 : r;
		}		
		
	/////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////
	// PRELOADER AND SLIDER FOR BACKGROUND IMAGES 
	
	// add bg class for single post background
		
		$( function() {
			$('.innerSliderContent img').wrap("<div class='item bg'></div>");		
		});
		
	// slider

		$( function() {
		
			if ($(".item").length > 1) {
					
					$('.slideshow').mobilyslider({
						content: '.sliderContent, .innerSliderContent',
						children: 'div',
						transition: 'fade',
						animationSpeed: 500,
						autoplay: true,
						autoplaySpeed: 10000,
						pauseOnHover: false,
						bullets: true,
						arrows: false,
						arrowsHide: true,
						prev: 'prev',
						next: 'next',
						animationStart: function(){},
						animationComplete: function(){}
					});
					
			} else {
				
				$(".item img").css("display", "block");
				
			}
			
		});
		
	// full screen image class
		
		$( function() {
		
			var theWindow        = $(window),
			    $bg              = $(".item img"),
			    aspectRatio      = $bg.width() / $bg.height();
			    			    		
			function resizeBg() {
				
				if ( (theWindow.width() / theWindow.height()) < aspectRatio ) {
				    $bg
				    	.removeClass()
				    	.addClass('bgheight');
				} else {
				    $bg
				    	.removeClass()
				    	.addClass('bgwidth');
				}
							
			}
			                   			
			theWindow.resize(function() {
				resizeBg();
			}).trigger("resize");
		
		});
		
	/////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////
	// SEARCH FORM LEFT
		
		$( function() {
			
			$( ".search" ).click( function() {
				$( ".search-container" ).animate({width:'toggle'},250, 'easeInCubic');
				return false;
			});
			
			$('.search-container').click(function(e) {
				e.stopPropagation();
			});		
			
			$(document).click(function() {
				$('.search-container').hide();
			});	
			
		});	
		
	/////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////
	// SEARCH FORM RIGHT
		
		$( function() {
		
			$( ".search" ).click( function() {
			
				if($("#right-scroll-menu").length == 0) {	
					$(".search-container-right").css('right', '50px');
				}
				
				if($("#tags-scroll").length > 0) {	
					$(".search-container-right").css('right', '150px');
				}
			
				$( ".search-container-right" ).animate({width:'toggle'},250, 'easeInCubic');
				return false;
			});
			
			$('.search-container-right').click(function(e) {
				e.stopPropagation();
			});		
			
			$(document).click(function() {
				$('.search-container-right').hide();
			});	
			
		});	

	/////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////
	// SOCIAL BOX LEFT
		
		$( function() {

			$( ".social" ).click( function() {
				$( ".social-container" ).animate({width:'toggle'},250, 'easeInCubic');
				return false;
			});
			
			$('.social-container').click(function(e) {
				e.stopPropagation();
			});		
			
			$(document).click(function() {
				$('.social-container').hide();
			});	
			
			$("span.sound").click(function() {
				$('.social-container').hide();
			});	
			
		});	
		
	/////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////
	// SOCIAL BOX RIGHT
		
		$( function() {
		
			$( "span.social" ).click( function() {
			
				if($("#right-scroll-menu").length == 0) {	
					$(".social-container-right").css('right', '50px');
				}
				
				if($("#tags-scroll").length > 0) {	
					$(".social-container-right").css('right', '150px');
				}
			
				$( ".social-container-right" ).animate({width:'toggle'},250, 'easeInCubic');
				return false;
			});
			
			$('.social-container-right').click(function(e) {
				e.stopPropagation();
			});		
			
			$(document).click(function() {
				$('.social-container-right').hide();
			});	
			
			$("span.sound").click(function() {
				$('.social-container-right').hide();
			});	
			
		});	
		
	/////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////
	// CALENDAR
	
		/*$(document).ready(function() {
		$('#calendar').fullCalendar({
		
			header: {
				left: 'prev,next',
				center: 'title',
				right: 'month,basicWeek,basicDay'	
			}
			});
		});*/

	/////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////
	// CONTACT FORM
	
		/*$(document).ready(function(){
			$("#contactForm").validate();
		});	*/

	/////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////
	// CONTENT SCROLL
		
		$(document).ready(function(){
			$('.scroll-container').jScrollbar({
			  allowMouseWheel : true,
			  scrollStep : 10
			});
		})             

	/////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////
	// Tooltip left scroll menu
	
		$(document).ready(function(){
			$('ul#left-menu li a').attr("title", "See more images");
		});	
		
		function scroll_tooltip(target_items, name){
		 $(target_items).each(function(i){
				$("body").append("<div class='"+name+"' id='"+name+i+"'><p>"+$(this).attr('title')+"</p></div>");
				var my_tooltip = $("#"+name+i);

				if($(this).attr("title") != ""){ // checks if there is a title

				$(this).removeAttr("title").mouseover(function(){
						my_tooltip.css({opacity:0.8, display:"none"}).fadeIn(10);
				}).mousemove(function(kmouse){
						my_tooltip.css({left:kmouse.pageX+40, top:kmouse.pageY-15});
				}).mouseout(function(){
						my_tooltip.fadeOut(10);
				});

				}
			});
		}

		$(document).ready(function(){
			 scroll_tooltip("ul#left-menu li a","scroll-menu-tooltip");
		});	
		
	/////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////
	// Tooltip left std menu
		
		function simple_tooltip(target_items, name){
		 $(target_items).each(function(i){
				$("body").append("<div class='"+name+"' id='"+name+i+"'><p>"+$(this).attr('title')+"</p></div>");
				var my_tooltip = $("#"+name+i);

				if($(this).attr("title") != ""){ // checks if there is a title

				$(this).removeAttr("title").mouseover(function(){
						my_tooltip.css({opacity:0.8, display:"none"}).fadeIn(200);
				}).mousemove(function(kmouse){
						my_tooltip.css({left:kmouse.pageX+40, top:kmouse.pageY-15});
				}).mouseout(function(){
						my_tooltip.fadeOut(100);
				});

				}
			});
		}

		$(document).ready(function(){
			 simple_tooltip("#menu-left li a","icon-tooltip");
		});	
		
	/////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////
	// Tooltip right std menu

		function simple_right_tooltip(target_items, name){
		 $(target_items).each(function(i){
				$("body").append("<div class='"+name+"' id='"+name+i+"'><p>"+$(this).attr('title')+"</p></div>");
				var my_tooltip = $("#"+name+i);

				if($(this).attr("title") != ""){ // checks if there is a title

				$(this).removeAttr("title").mouseover(function(){
						my_tooltip.css({opacity:0.8, display:"none"}).fadeIn(200);
				}).mousemove(function(kmouse){
						my_tooltip.css({left:kmouse.pageX-120, top:kmouse.pageY-15});
				}).mouseout(function(){
						my_tooltip.fadeOut(100);
				});

				}
			});
		}

		$(document).ready(function(){
			 simple_right_tooltip("#menu-right li a","tag-tooltip");
		});	
		
	/////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////
	// Tooltip right tag menu

		function tag_tooltip(target_items, name){
			 $(target_items).each(function(i){
					$("body").append("<div class='"+name+"' id='"+name+i+"'><p>"+$(this).attr('title')+"</p></div>");
					var my_tooltip = $("#"+name+i);

					if($(this).attr("title") != ""){ // checks if there is a title

					$(this).removeAttr("title").mouseover(function(){
							my_tooltip.css({opacity:0.8, display:"none"}).fadeIn(200);
					}).mousemove(function(kmouse){
							my_tooltip.css({left:kmouse.pageX-120, top:kmouse.pageY-15});
					}).mouseout(function(){
							my_tooltip.fadeOut(100);
					});

					}
				});
			}

		$(document).ready(function(){
			 tag_tooltip("ul.wp-tag-cloud li a","tag-tooltip");
		});	
			
	/////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////
	// Tooltip right scroll menu

		$(document).ready(function(){
			$('ul#menu li a').attr("title", "See more images");
		});	
		
		function right_scroll_tooltip(target_items, name){
			 $(target_items).each(function(i){
					$("body").append("<div class='"+name+"' id='"+name+i+"'><p>"+$(this).attr('title')+"</p></div>");
					var my_tooltip = $("#"+name+i);

					if($(this).attr("title") != ""){ // checks if there is a title

					$(this).removeAttr("title").mouseover(function(){
							my_tooltip.css({opacity:0.8, display:"none"}).fadeIn(200);
					}).mousemove(function(kmouse){
							my_tooltip.css({left:kmouse.pageX-140, top:kmouse.pageY-15});
					}).mouseout(function(){
							my_tooltip.fadeOut(100);
					});

					}
				});
			}

		$(document).ready(function(){
			 right_scroll_tooltip("ul#menu li a","right-scroll-menu-tooltip");
		});	
			
	/////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////
	// EXIF BUTTON ACTION

		
		
	/////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////
	// SOUND BUTTON ACTION
	
		$(document).ready(function() {
		
			$( "#player, #player-right" ).toggleClass("close-action");
			
			$( ".sound" ).click( function() {
			
				if($("#right-scroll-menu").is(":visible")) {	
					$("#player-right").css('right', '150px');
				}

				if($("#right-scroll-menu").is(":hidden")) {	
					$("#player-right").css('right', '50px');
				}

				if($("#tags-scroll").is(":visible")) {	
					$("#player-right").css('right', '150px');
				}

				if($("#tags-scroll").is(":hidden")) {	
					$("#player-right").css('right', '50px');
				}

				$( "#player, #player-right" ).css('top', '363px');
				return false;
			});
			
			$( ".sound" ).click( function() {
				$( "#player, #player-right" ).toggleClass("close-action");
			});	
			
			$('#player, #player-right').click(function(e){
			   e.stopPropagation();
			});
			
			$(document).click(function() {
				$("#player, #player-right").addClass("close-action");
			});	

			$("span.social").click(function() {
				$("#player, #player-right").addClass("close-action");
			});	

		});	
		
	// youtubeplayer for background
	/*
	    $(document).ready(function() {
		  $(".movie").mb_YTPlayer();
		});
*/