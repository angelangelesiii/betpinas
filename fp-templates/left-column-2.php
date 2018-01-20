
<!-- Popular -->

<?php 
// This arguments will be the filter that we'll use for the custom WordPress loop query.
$postCount = get_field('fp_popular_post_count','options');
$args = array(
    'post_type'				=> 'post',
    'posts_per_page'		=> $postCount,
    'date_query' => array(
        array(
        'after' => '-90 days',
        'column' => 'post_date',
        ),
    ),
    'meta_key' => 'wpb_post_views_count', 
    'orderby' => 'meta_value_num', 
    'order' => 'DESC'
);

// We'll create a new instance of WP_Query using $args.
$popularPostsQuery = new WP_Query($args);

// Loop through the query (looks like the regular WordPress loop from here on).
if(($popularPostsQuery->have_posts()) && (get_field('show_popular_posts','options') == true)): 

?>

<section class="latest-articles generic-section">
    <header class="section-header">
        <h2 class="section-title">
            Popular Posts
        </h2>
    </header>

    <div class="content">
    
    <?php 
        while($popularPostsQuery->have_posts()): $popularPostsQuery->the_post();
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
    
    </div>
</section>

<?php
    endif;
    wp_reset_query();
?>