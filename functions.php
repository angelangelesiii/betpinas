<?php
/**
 * BetPinas Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package BetPinas_Theme
 */

// ACF PRO SETUP

// include_once('advanced-custom-fields/acf.php');
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

// 1. customize ACF path
add_filter('acf/settings/path', 'my_acf_settings_path');
function my_acf_settings_path( $path ) {
     // update path
    $path = get_stylesheet_directory() . '/acfp/';
    // return
    return $path;
}
 
// 2. customize ACF dir
add_filter('acf/settings/dir', 'my_acf_settings_dir');
function my_acf_settings_dir( $dir ) {
    // update path
    $dir = get_stylesheet_directory_uri() . '/acfp/';
    // return
    return $dir;
}

// 3. Hide ACF field group menu item
// add_filter('acf/settings/show_admin', '__return_false');

// 4. Include ACF
include_once( get_stylesheet_directory() . '/acfp/acf.php' );

// Google Maps API key
function my_acf_init() {
	acf_update_setting('google_api_key', 'AIzaSyBPL_70m6Amg9Tej-BHQVE0fZons4Jl1PY');
}

add_action('acf/init', 'my_acf_init');

// END ACF SETUP

if ( ! function_exists( 'betpinas_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function betpinas_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on BetPinas Theme, use a find and replace
		 * to change 'betpinas' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'betpinas', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'medium-600', 600, 600);
		add_image_size( 'medium-600-sq', 600, 600, true);
		add_image_size( 'extra-large', 1400, 900);
		add_image_size( 'bp-thumbnail', 250, 250, true);

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'header-menu-1' => esc_html__( 'Main Header Menu', 'betpinas' ),
			'footer-menu-1' => esc_html__( 'Main Footer Menu', 'betpinas' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'betpinas_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'betpinas_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function betpinas_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'betpinas_content_width', 640 );
}
add_action( 'after_setup_theme', 'betpinas_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function betpinas_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Front Page Sidebar', 'betpinas' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Sidebar that will appear at the front page.', 'betpinas' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div></section>',
		'before_title'  => '<header class="widget-header"><h2 class="widget-title">',
		'after_title'   => '</h2></header><div class="widget-content">',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Single Post Sidebar', 'betpinas' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Side bar for posts like articles, picks, reviews, pages.', 'betpinas' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div></section>',
		'before_title'  => '<header class="widget-header"><h2 class="widget-title">',
		'after_title'   => '</h2></header><div class="widget-content">',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Mobile Menu Panel', 'betpinas' ),
		'id'            => 'sidebar-mobile',
		'description'   => esc_html__( 'Sidebar for widgets to be placed in the mobile menu panel (if set in site options).', 'betpinas' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div></section>',
		'before_title'  => '<header class="widget-header"><h2 class="widget-title">',
		'after_title'   => '</h2></header><div class="widget-content">',
	) );
}
add_action( 'widgets_init', 'betpinas_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function betpinas_scripts() {

	// STYLES

	wp_enqueue_style( 'betpinas-style', get_stylesheet_uri() );

	// Fontawesome
	wp_enqueue_style( 'fontawesome', get_template_directory_uri().'/dist/css/fa/css/font-awesome.min.css' );

	// Google Fonts
	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Roboto+Slab:300,400,700|Open+Sans:300,300i,400,400i,700,800' );

	// Foundation Grid
	wp_enqueue_style( 'foundation', get_template_directory_uri().'/dist/css/foundation.css' );

	// Main and Front Page CSS
	wp_enqueue_style( 'main', get_template_directory_uri().'/dist/css/main.css' );
	if (is_front_page()) wp_enqueue_style( 'front', get_template_directory_uri().'/dist/css/front.css' );

	// Slick Slider CSS
	wp_enqueue_style( 'slick', get_template_directory_uri().'/dist/css/slick.css' );

	// SCRIPTS

	wp_enqueue_script( 'betpinas-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'betpinas-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// JQuery (FOOTER)
	wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', includes_url( '/js/jquery/jquery.js' ), false, NULL, true );
    wp_enqueue_script( 'jquery' );

    // GSAP
	wp_enqueue_script( 'GSAP', 'http://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.0/TweenMax.min.js', false, false, true);

	// ScrollMagic
	wp_enqueue_script( 'scrollmagic-main', 'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/ScrollMagic.min.js', false, false, true);
	wp_enqueue_script( 'scrollmagic-gsap', 'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/animation.gsap.js', false, false, true);
	wp_enqueue_script( 'scrollmagic-indicators', 'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/debug.addIndicators.min.js', false, false, true);

	// Slick Slider
	wp_enqueue_script( 'slick', get_template_directory_uri().'/dist/js/slick.min.js', false, false, true );

	// ImagesLoaded
	wp_enqueue_script( 'imagesloaded', get_template_directory_uri().'/dist/js/imagesloaded.pkgd.min.js', false, false, true );

	// Main and Front JS
	wp_enqueue_script( 'main-js', get_template_directory_uri().'/dist/js/main.js', false, false, true );
	if (is_front_page()) wp_enqueue_script( 'front-js', get_template_directory_uri().'/dist/js/front.js', false, false, true );
	
}
add_action( 'wp_enqueue_scripts', 'betpinas_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

// ===== Custom views counter =====
function wpb_set_post_views($postID) {
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
//To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);



/**
 * Custom Post Types
 */
// require get_template_directory() . '/cpt/cpt.php';


// ===========================================
// ACF Pro Options Page Instantiate
// ===========================================

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Site Options',
		'menu_title'	=> 'Site Options',
		'menu_slug' 	=> 'site-options',
		'capability'	=> 'publish_posts',
		'redirect'		=> false,
		'icon_url'		=> 'dashicons-admin-generic',
		'position'		=> '60'
	));

	acf_add_options_page(array(
		'page_title' 	=> 'Headlines',
		'menu_title'	=> 'Headlines',
		'menu_slug' 	=> 'headlines',
		'capability'	=> 'publish_posts',
		'redirect'		=> false,
		'icon_url'		=> 'dashicons-star-filled',
		'position'		=> '15'
	));

	acf_add_options_page(array(
		'page_title' 	=> 'Philippine Bookmaker Reviews',
		'menu_title'	=> 'PBR',
		'menu_slug' 	=> 'pbr',
		'capability'	=> 'publish_posts',
		'redirect'		=> false,
		'icon_url'		=> 'dashicons-tickets-alt',
		'position'		=> '20'
	));
	
}

