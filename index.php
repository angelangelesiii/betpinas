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

		<div class="wrapper-big no-pad pad-on-contact clearfix">
			<div class="row collapse large-collapse medium-collapse small-collapse">
				<div class="column large-8 small-12">
					<section class="article-archive-container archive-container">
						<?php
						while ( have_posts() ) : the_post();
				
							// get_template_part( 'template-parts/content', get_post_format() );
				
							// If comments are open or we have at least one comment, load up the comment template.
							// if ( comments_open() || get_comments_number() ) :
							// 	comments_template();
							// endif;
						?>
						
						<article class="post">
							<span class="thumbnail" style="background-image: url('<?php echo get_the_post_thumbnail_url( $post->ID, 'extra-large') ?>')"></span>
							<div class="content">
								<h1 class="post-title"><?php the_title(); ?></h1>
							</div>
						</article>
	
						<?php
						endwhile; // End of the loop.
	
						the_posts_navigation();
						?>
					</section>
				</div>
				<div class="column large-4 small-12">
					<div class="sidebar-container article-sidebar">
						<?php get_sidebar('1'); ?>
					</div>
				</div>
			</div>
		</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
// get_sidebar();
get_footer();
