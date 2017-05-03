var cl = new CanvasLoader('loading');
cl.setColor('#595959');
cl.setShape('roundRect');
cl.setDiameter(80);
cl.setDensity(63);
cl.setRange(1.1);
cl.setFPS(52);
cl.show();

$(function() {
	$('.grid .box img').imgpreload({
		all: function() {
			$('#loading').delay(800).fadeOut(280, function() {
				$('.grid').fadeIn(300);
			});
		}
	});

	//------------------------------------------------------------------------------------------------

	var windowWidth = $(window).width();
	var windowHeight = $(window).height();

	if(Modernizr.localstorage) {
		if(localStorage['hello-bar-status'] != 'hidden') {
			$('#category-parents').height(windowHeight - 113);
			$('.categories-panel').height(windowHeight);
			$('.scroll-pane').height(windowHeight - 111);
			$('.scroll-pane').jScrollPane();
			$('.grid').css('height', ($(window).innerHeight() - 99));

			if(windowHeight < 658) {
				var navHeight = $('nav li').height() * $('nav .parent').length;

				$('.submit').css({position: 'relative', marginTop: (navHeight + 7)});
				$('#arrow-down').show();
			}

		} else {
			if(windowHeight < 608) {
				var navHeight = $('nav li').height() * $('nav .parent').length;

				$('.submit').css({position: 'relative', marginTop: (navHeight + 7)});
				$('#arrow-down').fadeIn(500);
			}
		}
	}

	$('.categories-panel h2').each(function() {
		$(this).html($(this).parents().eq(1).find('.parent').html());
	});

	$('#category-parents .parent').each(function() {
		$(this).after('<span class="hover"></span>');
	});

	$('.scroll-pane .menu-item a').after('<span></span>');

	//------------------------------------------------------------------------------------------------

	// close hello bar
	$('.hello-bar .close').click(function(e) {
		$(this).parent().fadeTo(270, 0, function() { $(this).slideUp(270); });
		$('.logo a').animate({marginTop: 0}, 270);
		$('#category-parents').animate({top : 62, height: ($(window).height() - 62)}, 270);
		$('.breadcrumbs-search').animate({top: 0}, 270);
		$('.categories-panel').css({top : 0 });
		$('.scroll-pane').height($(window).height() - 62);
		$('.scroll-pane').jScrollPane({autoReinitialise: true});
		$('.grid').css('height', ($(window).innerHeight() - 49)).animate({marginTop : 0}, 270);

		$.ajax({
			type: 'post',
			url: 'wp-content/themes/unheap/library/hello.php'
		});

		localStorage.setItem('hello-bar-status', 'hidden');

		e.preventDefault();
	});

	//------------------------------------------------------------------------------------------------

	$(window).resize(function() {

		var windowWidth = $(window).width();
		var windowHeight = $(window).height();

		if($('.hello-bar').is(':visible')) {
			if($('nav').attr('data-is-hidden') == 'true') {
				$('#category-parents').height(windowHeight * 6);
			} else {
				$('#category-parents').height(windowHeight - 113);
			}

			$('.categories-panel').height(windowHeight);
			$('.scroll-pane').height(windowHeight - 111);
			$('.scroll-pane').jScrollPane({autoReinitialise: true});
			$('.grid').css('height', (windowHeight - 99));

			if(windowHeight < 658) {
				var navHeight = $('nav li').height() * $('nav .parent').length;

				$('.submit').css({position: 'relative', marginTop: (navHeight + 7)});
				$('#arrow-down').fadeIn(500);
			} else {
				if($('nav').attr('data-is-hidden') != 'true') {
					$('.submit').removeAttr('style');
					$('#arrow-down').fadeOut(300);
				}
			}

		} else {
			if($('nav').attr('data-is-hidden') == 'true') {
				$('#category-parents').height(windowHeight * 6);
			} else {
				$('#category-parents').height(windowHeight - 62);
			}

			$('.grid').css('height', (windowHeight - 55));
			$('.categories-panel').height(windowHeight);
			$('.scroll-pane').height(windowHeight - 75);
			$('.scroll-pane').jScrollPane({autoReinitialise: true});

			if(windowHeight < 608) {
				var navHeight = $('nav li').height() * $('nav .parent').length;

				$('.submit').css({position: 'relative', marginTop: (navHeight + 7)});
				$('#arrow-down').fadeIn(500);
			} else {
				if($('nav').attr('data-is-hidden') != 'true') {
					$('.submit').removeAttr('style');
					$('#arrow-down').fadeOut(300);
				}
			}
		}
	});

	//------------------------------------------------------------------------------------------------

	$('#arrow-up').click(function(e) {

		var currentItem = $('#arrow-up').attr('data-nav-up');

		currentItem == 1 ? $(this).fadeOut(250, function() {$('nav').removeAttr('data-is-hidden')}) : '';

		if(currentItem == 0) {
			return;
		}

		$('#arrow-down').fadeIn(500);
		$('#arrow-up').attr('data-nav-up', --currentItem);
		$('#category-parents').css({height : ($('#category-parents').height() - 90)}).animate({top: '+=90'}, 600, 'easeInOutBack');
		$('.submit').animate({top: '+=90'}, 600, 'easeInOutBack');

		e.preventDefault();
	});

	$('#arrow-down').click(function(e) {

		$('nav').attr('data-is-hidden', true);

		var currentItem = $('#arrow-up').attr('data-nav-up');

		currentItem == 4 ? $(this).fadeOut(250) : '';

		if(currentItem == 5) {
			return;
		}

		if(localStorage['hello-bar-status'] == 'hidden') {
			$('head style').remove();
			$('.hello-bar').css({display : 'none'});
			$('.logo a, .grid').css({marginTop: 0});
			$('.breadcrumbs-search').css({marginTop: 0});
			$('.categories-panel').css('top', 0);
		}

		$('#arrow-up').attr('data-nav-up', ++currentItem);

		$('#category-parents').animate({
			top: '-=90',
			height: ($('#category-parents').height() + 90)
		}, 600, 'easeInOutBack');

		$('.submit').animate({top: '-=90'}, 600, 'easeInOutBack');
		$('#arrow-up').fadeIn(500);

		e.preventDefault();
	});

	//------------------------------------------------------------------------------------------------

	$('#category-parents li').hoverIntent({
		over: function() {
			var selfPos = $(this).position();

			$(this).find('.hover').css({'opacity' : 1, 'top' : (selfPos.top - 2)});
			$(this).find('.parent').append('<div class="nav-arrow-right"></div>');
			$('.nav-arrow-right').animate({opacity: 1}, 375);

			if($(this).find('.categories-panel').attr('data-hover-active') == 'true') {
				$(this).find('.categories-panel').stop(true, true).animate({left : 86}, 375, 'easeInOutExpo');
			}

			$('.author-twitter-handle').css('z-index', 0);
			$('.in-categories').css('z-index', 0);
		},

		out: function() {
			$(this).find('.hover').css('opacity', 0);
			$(this).find('.nav-arrow-right').remove();
			$(this).find('.categories-panel').stop(true, true).animate({left : -400}, 375, 'easeInOutExpo');
		},

		interval:50,
		timeout: 150
	});

	//------------------------------------------------------------------------------------------------

	$('nav ul .parent').mouseenter(function() {
		var parentContent = $(this).parent();
		parentContent.find('.categories-panel').attr('data-hover-active', 'true');
	})
	.mouseleave(function() {
		var parentContent = $(this).parent();
		parentContent.find('.categories-panel').attr('data-hover-active', 'false');
	});

	//------------------------------------------------------------------------------------------------

	$('input').data('holder', $('input').attr('placeholder'));

	$('input').focusin(function(){
		$(this).attr('placeholder', '');
	});

	$('input').focusout(function(){
		$(this).attr('placeholder', $(this).data('holder'));
	});

	//------------------------------------------------------------------------------------------------

	$('.search input').focusin(function() {
		$('.search').stop(true, true).animate({width: 262, marginRight: 30}, 250);
		$(this).stop(true, true).animate({width: 200}, 250);
		$('.social-sharing').stop(true, true).animate({right: -$('.social-sharing').width()}, 250);
	});

	$('.search input').focusout(function() {
		$('.social-sharing').stop(true, true).animate({right: 35}, 250);
		$(this).stop(true, true).animate({width: 70}, 250);
		$('.search').stop(true, true).animate({width: 115, marginRight: 177}, 250);
	});

	//------------------------------------------------------------------------------------------------

	$('.grid .box').hoverIntent({

		over: function() {
			if(!$(this).find('.full-desc').is(':visible')) {
				$(this).find('.overlay').stop(true, true).fadeIn(330);
				$(this).find('.plugin-stats').stop(true, true).animate({bottom: 0}, 330, 'easeOutQuad');
			}
		},

		out: function() {
			if($(this).find('.inner-content').is(':animated')) {
				return false;
			} else {
				if(!$(this).find('.full-desc').is(':visible')) {
					$(this).find('.overlay').stop(true, true).fadeOut(300);
					$(this).find('.plugin-stats').stop(true, true).animate({bottom: -33}, 300, 'easeOutQuad');
				}
			}
		},

		interval: 0,
		timeout: 0
	});

	//------------------------------------------------------------------------------------------------

	$('.show-full-desc').click(function(e) {

		$('.author-twitter-handle').css('z-index', 10);
		$('.in-categories').css('z-index', 10);

		$(this).fadeOut(300, function() {
			$(this).parents().eq(1)
			.addClass('border-radius')
			.css('height', 255)
			.animate({top: -140}, 225, function() {
				$(this).find('.full-desc').fadeIn(300);
				$(this).find('.hide-full-desc').css('display', 'block').hide().fadeIn(300);
			});
		});

		e.preventDefault();
	});

	$('.hide-full-desc').click(function(e) {

		$(this).fadeOut(300, function() {
			$(this).parents().eq(0).find('.full-desc').hide();

			$(this).parents().eq(0)
			.removeClass('border-radius')
			.animate({top: 0}, 250, function() {
				$('.in-categories').css('z-index', 5);
				$(this).parents().eq(0).find('.show-full-desc').fadeIn(300);
				$(this).removeAttr('style');
			});
		});

		e.preventDefault();
	});

	//------------------------------------------------------------------------------------------------

	$('.hello-bar #facebook-share').mouseenter(function() {
		$('#hide').stop(true, true).animate({'opacity': 0}, 300);
		$('#facebook-button').css({'top' : 6, 'left' : 58}).stop(true, true).animate({opacity: 1}, 300);
	}).mouseleave(function() {
		$('#facebook-button').stop(true, true).animate({opacity: 0}, 200).css('top', -1000);
		$('#hide').stop(true, true).animate({'opacity': 1}, 300);
	});

	//------------------------------------------------------------------------------------------------

	$('.social-sharing .rss').tooltip({
		position: 'bottom center',
		offset: [28, 0],
		tip: '.tooltip-rss-wrap',
		delay: 300,
		predelay: 100,
		effect: 'slide'
	});

	$('.social-sharing .twitter').tooltip({
		position: 'bottom center',
		offset: [33, 0],
		tip: '.tooltip-twitter-wrap',
		predelay: 100,
		delay: 300,
		effect: 'slide',
		direction: 'top',

		onBeforeShow: function() {
			$('.tooltip-twitter-wrap').removeClass('twitter-welcome').addClass('twitter-toolbar');
		}
	});

	$('.social-sharing .buttons').tooltip({
		position: 'bottom left',
		offset: [28, 48],
		tip: '.tooltip-share-wrap',
		delay: 300,
		predelay: 100,
		effect: 'slide',
		api: true,

		onBeforeShow: function() {
			$('.tooltip-share-wrap').addClass('toolbar-share').removeClass('welcome-share');
		}
	});

	$('.plugin-stats .related').tooltip({
		position: 'top center',
		offset: [-11, 0],
		predelay: 100,
		tip: '.tooltip-permalink-wrap',
		effect: 'slide',

		onBeforeShow: function() {
			$('.tooltip-permalink-wrap .content').html('Related Posts');
		}
	});

	$('.plugin-stats .sharing .share').tooltip({
		position: 'top center',
		offset: [-11, 0],
		predelay: 100,
		tip: '.tooltip-permalink-wrap',
		effect: 'slide',

		onBeforeShow: function() {
			$('.tooltip-permalink-wrap .content').html('Save & Share');
		}
	});

	$('.plugin-stats .report-bug').tooltip({
		position: 'top left',
		offset: [-11, 45],
		predelay: 100,
		tip: '.tooltip-report-error-wrap',
		effect: 'slide'
	});

	$('.plugin-stats .share').each(function (i, e) {
		$this = $(this);
		$h = $this.parents('.box').find('.inner-content h4 a');

		addthis.button($this[0], {ui_click: false}, { url: $h.attr('href'), title: $h.text() });
	});

	$('.welcome .twitter').tooltip({
		position: 'top center',
		offset: [5, 0],
		tip: '.tooltip-twitter-wrap',
		delay: 300,
		predelay: 100,
		effect: 'slide',

		onBeforeShow: function() {
			$('.tooltip-twitter-wrap').addClass('twitter-welcome').removeClass('twitter-toolbar');
		}
	});

	$('.welcome .share').tooltip({
		position: 'top center',
		offset: [-10, 7],
		tip: '.tooltip-share-wrap',
		delay: 300,
		predelay: 100,
		effect: 'slide',
		api: true,

		onBeforeShow: function() {
			$('.tooltip-share-wrap').addClass('welcome-share').removeClass('toolbar-share');
		}
	});

	$('.key .paid').tooltip({
		position: 'top center',
		offset: [-10, 0],
		tip: '.tooltip-premium',
		delay: 300,
		predelay: 200,
		effect: 'slide'
	});

	$('.key .featured').tooltip({
		position: 'top center',
		offset: [-10, 0],
		tip: '.tooltip-spotlight',
		delay: 300,
		predelay: 200,
		effect: 'slide'
	});

	$('.key .video').tooltip({
		position: 'top center',
		offset: [-10, 0],
		tip: '.tooltip-video',
		delay: 300,
		predelay: 200,
		effect: 'slide'
	});

	//------------------------------------------------------------------------------------------------

	$('.button-video').click(function(e) {
		var embedData = $(this).attr('data-video');

		var videoURL = $.url(embedData);
		var protocol = videoURL.attr('protocol');
		var host = videoURL.attr('host');
		var videoID = videoURL.attr('relative');

		if(host == 'www.youtube.com' || host == 'youtube.com') {
			var content = '<iframe width="853" height="480" src="' + embedData + '" frameborder="0" allowfullscreen></iframe>';
		}

		if(host == 'www.vimeo.com' || host == 'vimeo.com') {
			var content = '<iframe src="http://player.vimeo.com/video' + videoID + '" width="853" height="480" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';
		}

		if($(this).attr('data-launch') != '') {
			var launchButton = '<a href="' + $(this).attr('data-launch') + '" class="button-launch" target="_blank">Launch</a>';
		} else {
			var launchButton = '';
		}

		if($(this).attr('data-demo') != '') {
			var demoButton = '<a href="' + $(this).attr('data-demo') + '" class="button-demo" target="_blank">Demo</a>';
		} else {
			var demoButton = '';
		}

		$('body').prepend('<div id="video-player">' +
							'<div class="video-content">' +
								content +
								'<div class="button-hold">' +
									launchButton +
									demoButton +
								'</div>' +
								'<div class="close">Close</div>' +
							'</div>' +
						'</div>');

		$('#video-player').fadeIn(300);

		e.preventDefault();
	});

	$('.close').live('click', function() {
		$('.video-content').children().first().remove();
		$('#video-player').fadeOut(300, function() {
			$(this).remove();
		});
	});
});

$(window).load(function() {
	$('head').prepend('<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>');
});

$(document).keyup(function(e) {
	if(e.keyCode == 27) {
		$('.video-content').children().first().remove();
		$('#video-player').fadeOut(300, function() {
			$(this).remove();
		});
	}
});