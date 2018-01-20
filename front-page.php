<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package BetPinas_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php get_template_part( 'fp-templates/headline-slider' ); ?>

		<div class="wrapper-big no-pad pad-on-contact main-section clearfix">
			<div class="row collapse large-collapse medium-collapse small-collapse">
				<div class="column large-8 small-12">
					<?php get_template_part( 'fp-templates/left-column' ); ?>
					<?php get_template_part( 'fp-templates/left-column-2' ); ?>
				</div>
				<div class="column large-4 small-12 right-section">
				<?php get_template_part( 'fp-templates/reviews' ); ?>
				<?php get_template_part( 'fp-templates/potd' ); ?>
					<?php //get_sidebar(); ?>
				</div>
			</div>
		</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
// get_sidebar();
get_footer();
