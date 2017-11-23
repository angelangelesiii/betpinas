// ==================================
//    FRONT PAGE SCRIPT
// ==================================

(function($) {})( jQuery ); // JQuery WordPress workaround

jQuery(document).ready(function($){ // Document Ready
    
    console.log('front');

    $('#headlineSliderContainer').slick({
        autoplay: true,
        autoplaySpeed: 8000,
        arrows: false,
        fade: true,
        speed: 1000,
        draggable: false,
        swipe: false,
        asNavFor: '.headlines .headline-slider-nav .nav-slider-container',
        prevArrow: '<button class="carousel-button prev"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>',
		nextArrow: '<button class="carousel-button next"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>',
    });

    $('.headlines .headline-slider-nav .nav-slider-container').slick({
        arrows: true,
        vertical: true,
        slidesToShow: 3,
        speed: 600,
        centerMode: true,
        centerPadding: '0px',
        asNavFor: '#headlineSliderContainer',
        focusOnSelect: true,
        prevArrow: '<button class="carousel-button prev"><i class="fa fa-chevron-up" aria-hidden="true"></i></button>',
		nextArrow: '<button class="carousel-button next"><i class="fa fa-chevron-down" aria-hidden="true"></i></button>',
    });

});
