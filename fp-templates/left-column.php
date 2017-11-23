
<!-- Latest -->

<section class="latest-articles generic-section">
    <header class="section-header">
        <h2 class="section-title">
            <?php if(get_field('fp_latest_post_header','options')): ?>
            <?php the_field('fp_latest_post_header','options'); ?>
            <?php else: ?>
            Latest
            <?php endif; ?>
        </h2>
    </header>

    <div class="content">
    
    <?php 
        // This arguments will be the filter that we'll use for the custom WordPress loop query.
        $postCount = get_field('fp_latest_post_count','options');
		$args = array(
			'post_type'				=> 'post',
			'posts_per_page'		=> $postCount
        );
        
        // We'll create a new instance of WP_Query using $args.
		$latestPostsQuery = new WP_Query($args);
        
        // Loop through the query (looks like the regular WordPress loop from here on).
        if($latestPostsQuery->have_posts()): 
            while($latestPostsQuery->have_posts()): $latestPostsQuery->the_post();
            $category = get_the_category();
            // output:
    ?>
        <article class="post post-<?php echo get_the_ID(); ?>  clearfix">
            <div class="image-container clearfix">
                <img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'bp-thumbnail' ); ?>" alt="<?php the_title(); ?>" class="article-thumbnail">
            </div>
            <div class="text-container clearfix">
                <header class="article-header">
                    <p class="category">
                        <?php if($category[0]->cat_ID): ?>
                        <a href="<?php echo get_category_link( $category[0]->cat_ID ); ?>">
                        <?php endif; ?>
                            <span class="category-style">
                                <?php
                                echo $category[0]->cat_name;
                                ?>
                            </span>
                        <?php if($category[0]->cat_ID): ?>
                        </a>
                        <?php endif; ?>
                    </p>
                    <h3 class="article-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                </header>
                <div class="article-excerpt">
                    <?php echo wp_trim_words( get_the_excerpt(), 45, ' <span class=\'ellipsis\'>...</span>' ); ?>
                </div>
                <div class="article-read-button"><a href="<?php the_permalink() ?>" class="btn-small">Read</a></div>
            </div>
        </article>
    <?php
            endwhile;
    ?>  
        <?php if(get_option('page_for_posts')): ?>
        <p class="load-more-articles-link">
            <a href="<?php echo get_permalink( get_option('page_for_posts') ); ?>">More articles <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
        </p>
        <?php endif; ?>
    <?php
        endif;
    ?>
    
    </div>
</section>