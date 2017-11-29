<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package BetPinas_Theme
 */

?>

<article <?php post_class('article-container'); ?>>
	<div class="type-indicator">
	<?php 
	$postObject = get_post_type_object( get_post_type() ); 
	// print_r($postObject);
	if ($postObject): ?>

		<p class="type-of-post">
			<?php echo esc_html($postObject->labels->singular_name); ?>
		</p>

	<?php endif;
	?>
	</div>
	<div class="article-proper">
		<header class="article-header">
			<h1 class="title"><?php the_title(); ?></h1>
			<img src="<?php echo get_the_post_thumbnail_url( $post->ID, 'extra-large' ) ?>" class="featured-photo">
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
		</header>
		<div class="content">
			<?php the_content(); ?>
		</div>
	</div>

</article>
