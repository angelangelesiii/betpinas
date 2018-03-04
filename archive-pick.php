<?php
/**
 * The template for displaying archive pages
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
				<?php if (have_posts()): ?>
					<h1 class="main-archive-header">Daily Picks</h1>
					<section class="article-archive-container archive-container row collapse medium-up-2 small-up-1">
						<?php
						while ( have_posts() ) : the_post();
				
							// get_template_part( 'template-parts/content', get_post_format() );
				
							// If comments are open or we have at least one comment, load up the comment template.
							// if ( comments_open() || get_comments_number() ) :
							// 	comments_template();
							// endif;
						?>
						
						<div class="post-column column-block column">
							<article class="post">
								<?php if(has_post_thumbnail()): ?>
								<span class="thumbnail" style="background-image: url('<?php echo get_the_post_thumbnail_url( $post->ID, 'extra-large') ?>')"></span>
								<?php endif; ?>
								<div class="content">
									<h1 class="post-title"><?php the_title(); ?></h1>
									<p class="meta">Posted on <?php the_date(); ?></p>
									<p class="excerpt">
										<?php echo wp_trim_words( get_the_excerpt(), 45, ' <span class=\'ellipsis\'>...</span>' ); ?>
									</p>
									<p class="button-container">
										<a href="<?php the_permalink() ?>" class="btn-large">View Prediction</a>
									</p>
								</div>
							</article>
						</div>
	
						<?php
						endwhile; // End of the loop.
						?>
					</section>
					<?php the_posts_pagination( array( 
						'mid_size' => 3,
						'prev_text' => __( 'Newer', 'textdomain' ),
    					'next_text' => __( 'Older', 'textdomain' ),
						) ); ?>
				<?php else: // If there are no posts ?>
				<!-- NO POSTS -->
				<?php endif; ?>
				</div>
				<div class="column large-4 small-12">
					<div class="sidebar-container article-sidebar">
						<?php get_sidebar('1'); ?>
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
