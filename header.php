<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package BetPinas_Theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<meta name="theme-color" content="#124f78">


	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'betpinas' ); ?></a>
	
	<header class="site-header regular top-position" id="mainheader">
		<div class="wrapper-big">
			<nav class="site-nav clearfix">
				<div class="logo-container">
					<a href="<?php echo home_url(); ?>">
						<img src="<?php echo get_template_directory_uri().'/assets/logo/wordmark_w.png' ?>" alt="<?php echo bloginfo( 'name' ); ?>" class="logo white">
						<img src="<?php echo get_template_directory_uri().'/assets/logo/wordmark.png' ?>" alt="<?php echo bloginfo( 'name' ); ?>" class="logo colored">
					</a>
				</div>
				<div class="menu-container">
					<?php
						wp_nav_menu( array(
							'theme_location' => 'header-menu-1',
							'menu_id'        => 'primary-menu',
						) );
					?>
				</div>
				<div class="menu-button hide-for-large">
					<span class="bar"></span>
					<span class="bar"></span>
					<span class="bar"></span>
				</div>
			</nav>
		</div>
	</header>

	<div class="mobile-menu-panel hide-for-large-only" id="mobilemenupanel">
		
	</div>
	<div class="mobile-menu-overlay"></div>
			
	<div id="top" class="spacer"></div>
	
	<div id="content" class="site-content">
