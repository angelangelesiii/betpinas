<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package BetPinas_Theme
 */

?>

<article <?php post_class('article-container'); ?>>
	<div class="banner-photo" style="background-image: url('<?php echo get_the_post_thumbnail_url( $post->ID, 'extra-large' ) ?>');">
		<h1 class="title page-title"><?php the_title(); ?></h1>
	</div>
	<div class="article-proper">
		<header class="article-header">
			
			<p class="meta">
				<span class="author-category">
					Posted by <?php if(get_the_author_firstname()) echo "<span class='a_name'>".get_the_author_firstname()."</span>"; if(get_the_author_lastname()) echo " <span class='a_name'>".get_the_author_lastname()."</span>"; ?><?php if(get_the_terms( $post->ID, 'sport') ): ?> in
					<?php 
					$sports = get_the_terms( $post->ID, 'sport');
					echo "<span class='a_name'>".$sports[0]->name."</span>";
					endif;?>
					<br />
				</span>
				<span class="date"><?php the_date(); ?></span>
			</p>
			<?php edit_post_link( 'Edit this page' ); ?> 
		</header>
		<div class="content">
			<?php the_content(); ?>
		</div>
	</div>

</article>
