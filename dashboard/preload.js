function preload(arrayOfImages) {
	$(arrayOfImages).each(function() {
		$('<img/>')[0].src = this;
	});
}

preload([
	'http://unheap.com/wp-content/themes/unheap/imgs/key-featured.png',
	'http://unheap.com/wp-content/themes/unheap/imgs/key-video.png',
	'http://unheap.com/wp-content/themes/unheap/imgs/key-paid.png',
	'http://unheap.com/wp-content/themes/unheap/imgs/author-twitter-handle.png',
	'http://unheap.com/wp-content/themes/unheap/imgs/welcome-logo.png',
	'http://unheap.com/wp-content/themes/unheap/imgs/welcome-box-social.png',
	'http://unheap.com/wp-content/themes/unheap/imgs/in-categories.png',
	'http://unheap.com/wp-content/themes/unheap/imgs/box-button-show.png',
	'http://unheap.com/wp-content/themes/unheap/imgs/overlay-button-launch.png',
	'http://unheap.com/wp-content/themes/unheap/imgs/overlay-button-demo.png',
	'http://unheap.com/wp-content/themes/unheap/imgs/overlay-button-video.png',
	'http://unheap.com/wp-content/themes/unheap/imgs/overlay-thumb-up.png',
	'http://unheap.com/wp-content/themes/unheap/imgs/overlay-views.png',
	'http://unheap.com/wp-content/themes/unheap/imgs/overlay-related.png',
	'http://unheap.com/wp-content/themes/unheap/imgs/overlay-share.png',
	'http://unheap.com/wp-content/themes/unheap/imgs/overlay-report-bug.png',
	'http://unheap.com/wp-content/themes/unheap/imgs/box-button-hide.png',
	'http://unheap.com/wp-content/themes/unheap/imgs/categories/inputs/all-inputs.png',
	'http://unheap.com/wp-content/themes/unheap/imgs/categories/inputs/autocomplete.png',
	'http://unheap.com/wp-content/themes/unheap/imgs/categories/inputs/color-pickers.png',
	'http://unheap.com/wp-content/themes/unheap/imgs/categories/inputs/custom-styled.png',
	'http://unheap.com/wp-content/themes/unheap/imgs/categories/inputs/date-time.png',
	'http://unheap.com/wp-content/themes/unheap/imgs/categories/inputs/drag-drop.png',
	'http://unheap.com/wp-content/themes/unheap/imgs/categories/inputs/general-inputs.png',
	'http://unheap.com/wp-content/themes/unheap/imgs/categories/inputs/input-sliders.png',
	'http://unheap.com/wp-content/themes/unheap/imgs/categories/inputs/password.png',
	'http://unheap.com/wp-content/themes/unheap/imgs/categories/inputs/rate-vote.png',
	'http://unheap.com/wp-content/themes/unheap/imgs/categories/inputs/rich-input.png',
	'http://unheap.com/wp-content/themes/unheap/imgs/categories/inputs/search.png',
	'http://unheap.com/wp-content/themes/unheap/imgs/categories/inputs/selectboxes.png',
	'http://unheap.com/wp-content/themes/unheap/imgs/categories/inputs/shortcuts.png',
	'http://unheap.com/wp-content/themes/unheap/imgs/categories/inputs/sliders.png',
	'http://unheap.com/wp-content/themes/unheap/imgs/categories/inputs/touch.png',
	'http://unheap.com/wp-content/themes/unheap/imgs/categories/inputs/upload.png',
	'http://unheap.com/wp-content/themes/unheap/imgs/categories/inputs/validation.png',
	'http://unheap.com/wp-content/themes/unheap/imgs/categories/interface/all-ui.png',
	'http://unheap.com/wp-content/themes/unheap/imgs/categories/interface/background.png',
	'http://unheap.com/wp-content/themes/unheap/imgs/categories/interface/dialog.png',
	'http://unheap.com/wp-content/themes/unheap/imgs/categories/interface/feedback.png',
	'http://unheap.com/wp-content/themes/unheap/imgs/categories/interface/filter.png',
	'http://unheap.com/wp-content/themes/unheap/imgs/categories/interface/hover.png',
	'http://unheap.com/wp-content/themes/unheap/imgs/categories/interface/layout.png',
	'http://unheap.com/wp-content/themes/unheap/imgs/categories/interface/list.png',
	'http://unheap.com/wp-content/themes/unheap/imgs/categories/interface/loading.png',
	'http://unheap.com/wp-content/themes/unheap/imgs/categories/interface/rounded-edges.png',
	'http://unheap.com/wp-content/themes/unheap/imgs/categories/interface/scrolling.png',
	'http://unheap.com/wp-content/themes/unheap/imgs/categories/interface/tags.png',
	'http://unheap.com/wp-content/themes/unheap/imgs/categories/interface/text-links.png',
	'http://unheap.com/wp-content/themes/unheap/imgs/categories/interface/tooltips.png',
	'http://unheap.com/wp-content/themes/unheap/imgs/categories/interface/web-type.png',
	'http://unheap.com/wp-content/themes/unheap/imgs/categories/media/all-media.png',
	'http://unheap.com/wp-content/themes/unheap/imgs/categories/media/audio-video.png',
	'http://unheap.com/wp-content/themes/unheap/imgs/categories/media/dialogs-lightboxes.png',
	'http://unheap.com/wp-content/themes/unheap/imgs/categories/media/galleries.png',
	'http://unheap.com/wp-content/themes/unheap/imgs/categories/media/images.png',
	'http://unheap.com/wp-content/themes/unheap/imgs/categories/media/maps.png',
	'http://unheap.com/wp-content/themes/unheap/imgs/categories/media/sliders-carousels.png',
	'http://unheap.com/wp-content/themes/unheap/imgs/categories/media/tables-graphs.png',
	'http://unheap.com/wp-content/themes/unheap/imgs/categories/navigation/accordion.png',
	'http://unheap.com/wp-content/themes/unheap/imgs/categories/navigation/all-nav.png',
	'http://unheap.com/wp-content/themes/unheap/imgs/categories/navigation/horizontal-tabbed.png',
	'http://unheap.com/wp-content/themes/unheap/imgs/categories/navigation/other-nav.png',
	'http://unheap.com/wp-content/themes/unheap/imgs/categories/navigation/pagination.png',
	'http://unheap.com/wp-content/themes/unheap/imgs/categories/navigation/vertical.png',
	'http://unheap.com/wp-content/themes/unheap/imgs/categories/other/animation-effects.png',
	'http://unheap.com/wp-content/themes/unheap/imgs/categories/other/browser-tweaks.png',
	'http://unheap.com/wp-content/themes/unheap/imgs/categories/other/misc.png',
	'http://unheap.com/wp-content/themes/unheap/imgs/categories/other/mobile.png',
	'http://unheap.com/wp-content/themes/unheap/imgs/categories/other/social-rss.png',
	'http://unheap.com/wp-content/themes/unheap/imgs/categories/other/standalone.png',
	'http://unheap.com/wp-content/themes/unheap/imgs/video-player-close.png'
]);