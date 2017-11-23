<?php if(have_rows('options_headlines','options')) : ?>
    <section class="headlines">
        
        <div class="wrapper-big relative-wrapper no-pad">

            <!-- Start Slider -->
            <div class="headline-slider" id="headlineSliderContainer">
    
            <?php 
            while(have_rows('options_headlines', 'options')): the_row(); 
            $headlinePostID = get_sub_field('headline_post');
            ?>
            
                <div class="headline <?php echo "post-".$headlinePostID; ?>"
                <?php if(get_sub_field('headline_image')): ?>
                style="background-image: url('<?php echo wp_get_attachment_image_url( get_sub_field('headline_image'), 'extra-large', false ) ?>');"
                <?php elseif(has_post_thumbnail( $headlinePostID )): ?>
                style="background-image: url('<?php echo get_the_post_thumbnail_url( $headlinePostID, 'extra-large' ) ?>');"
                <?php endif; ?>
                >
                    
                    <div class="container">
                        <div class="text">
                            <h2 class="headline-title">
                                <?php 
                                if(get_sub_field('headline_title')): 
                                    the_sub_field('headline_title');
                                else:
                                    echo get_the_title( $headlinePostID );
                                endif;
                                ?>
                            </h2>
                            
                            <?php if(get_sub_field('headline_subtext')): ?>
                            <p class="headline-subtext">
                                <?php the_sub_field('headline_subtext'); ?>
                            </p>
                            <?php endif; ?>
                        </div>
                    </div>
                            
                </div>
    
            <?php endwhile; ?>
    
            </div>
            <!-- End Slider -->

            <?php if (sizeof(get_field('options_headlines','options')) > 1): ?>
            
            <!-- Start Slider Nav -->

            <nav class="headline-slider-nav">
                <div class="nav-slider-container">
                    <?php 
                    while(have_rows('options_headlines', 'options')): the_row(); 
                    $headlinePostID = get_sub_field('headline_post');
                    ?>
    
                    
                    <div class="slider-nav-item">
                        <a href="javascript:void(0)" class="slider-link">
                            <span class="inner"
                            <?php if(get_sub_field('headline_image')): ?>
                            style="background-image: url('<?php echo wp_get_attachment_image_url( get_sub_field('headline_image'), 'medium', false ) ?>');"
                            <?php elseif(has_post_thumbnail( $headlinePostID )): ?>
                            style="background-image: url('<?php echo get_the_post_thumbnail_url( $headlinePostID, 'medium' ) ?>');"
                            <?php endif; ?>>
                                <h3 class="headline-title">
                                    <?php 
                                    if(get_sub_field('headline_title')): 
                                        the_sub_field('headline_title');
                                    else:
                                        echo get_the_title( $headlinePostID );
                                    endif;
                                    ?>
                                </h3>
                            </span>
                        </a>
                    </div>
                    
    
                    <?php endwhile; ?>
                </div>
            </nav>

            <!-- End Slider Nav -->

            <?php endif; ?>
        </div>
        
    </section>
<?php endif; ?>