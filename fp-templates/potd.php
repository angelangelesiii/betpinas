
<!-- Latest -->

<section class="potd generic-section">
    <header class="section-header">
        <h2 class="section-title">
            Pick of the Day
        </h2>
    </header>

    <div class="content">
    
    <?php 
        // This arguments will be the filter that we'll use for the custom WordPress loop query.
        $postCount = get_field('fp_latest_post_count','options');
		$args = array(
			'post_type'				=> 'pick',
			'posts_per_page'		=> 5
        );
        
        // We'll create a new instance of WP_Query using $args.
		$latestPostsQuery = new WP_Query($args);
        
        // Loop through the query (looks like the regular WordPress loop from here on).
        if($latestPostsQuery->have_posts()): 
            while($latestPostsQuery->have_posts()): $latestPostsQuery->the_post();

            // output:
    ?>
        <article class="potd potd-<?php echo get_the_ID(); ?>  clearfix">
            <?php if(has_post_thumbnail()): ?>
            <div class="potd-thumbnail-container" style="background-image: url('<?php echo the_post_thumbnail_url( 'medium-600' ) ?>')">
                <a href="<?php the_permalink() ?>"><span class="inner"></span></a>
            </div>
            <?php endif; ?>
            <div class="text-container">
                <h3 class="article-title"><?php the_title(); ?></h3>
                <div class="excerpt">
                <p><?php  echo wp_trim_words( get_the_excerpt(), 45, ' <span class=\'ellipsis\'>...</span>' ); ?></p>
                </div>
                <a href="<?php the_permalink() ?>" class="potd-button btn-large">View Prediction</a>
            </div>
        </article>
    <?php
            endwhile;
            // End loop
    ?>
        <div class="load-more-potd">
            
        </div>
    <?php
        else:
    ?>
        <span class="no-content">No content to show</span>
    <?php endif; ?>

    
    </div>
</section>