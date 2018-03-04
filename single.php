<?php
/**
 * The template for displaying all single posts (by angel)
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package BetPinas_Theme
 */

get_header(); ?>



	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<div class="wrapper-big no-pad pad-on-contact clearfix">
			<div class="row collapse large-collapse medium-collapse small-collapse">
				<div class="column large-8 small-12">
					<?php
					while ( have_posts() ) : the_post();
			
						get_template_part( 'template-parts/content', get_post_type() );
			
						// the_post_navigation();
			
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
			
					endwhile; // End of the loop.
					wpb_set_post_views(get_the_ID());
					?>
				</div>
				<div class="column large-4 small-12">
					<div class="sidebar-container article-sidebar">
						<?php get_sidebar('2'); ?>
						<?php get_template_part( 'fp-templates/reviews' ); ?>
					</div>
				</div>
			</div>
		</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
// get_sidebar();
get_footer();
