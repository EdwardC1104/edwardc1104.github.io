document.body.style.overflow = 'hidden';
$(document).ready(function() {
	$(window).on("load", function() {
		preloaderFadeOutTime = 500;
		function hidePreloader() {
			document.body.style.overflow = 'visible';
 			var preloader = $('.spinner-wrapper');
			preloader.fadeOut(preloaderFadeOutTime);
		}
		hidePreloader();
      });
});