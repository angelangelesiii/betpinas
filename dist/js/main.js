// ==================================
//    MAIN SCRIPT
// ==================================

(function($) {})( jQuery ); // JQuery WordPress workaround

jQuery(document).ready(function($){ // Document Ready

	$('#top').outerHeight($('#mainheader').outerHeight());

	var mainController = new ScrollMagic.Controller();

	var navScene = new ScrollMagic.Scene({
		triggerElement: '#top',
		triggerHook: 0,
		offset: 150,
	})
	.on('enter', function() { // if viewport moved by 50px, remove 'top-position' class
		if($('#mainheader').hasClass('top-position')) {
			$('#mainheader').removeClass('top-position');
		}
	})
	.on('leave', function() {// if viewport is < 50px from top, add 'top-position' class
		$('#mainheader').addClass('top-position');
	})
	// .addIndicators()
	.addTo(mainController);

});
