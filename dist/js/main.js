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
		offset: 5,
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


	// PBR Tabs

	$('.tabs .tab').click(function(e){
		$('.tab.active').removeClass('active');
		$('.tab-content.active').removeClass('active');
		$(this).addClass('active');
		var tabSection = '.tab-content#'+$(this).data('tab-section');
		$(tabSection).addClass('active');
	});

});
