<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package BetPinas_Theme
 */

?>

	</div><!-- #content -->

	<footer id="mainfooter" class="site-footer">
		<div class="logo-container">
			<img src="<?php echo get_template_directory_uri().'/assets/logo/wordmark_g.png' ?>" alt="" class="logo">
		</div>

		<div class="footer-content">
			<div class="wrapper-big no-pad pad-on-contact">
				<p>&copy; <?php echo date('Y'); ?> BetPinas - website design by Angel Angeles III</p>
			</div>
		</div>

		<nav class="footer-menu">
			<div class="wrapper-big no-pad pad-on-contact">
			<?php
				wp_nav_menu( array(
					'theme_location' => 'footer-menu-1',
					'menu_id'        => 'footer-main-menu',
				) );
			?>
			</div>
		</nav>
		
	</footer>
</div>

<?php wp_footer(); ?>

</body>
</html>
