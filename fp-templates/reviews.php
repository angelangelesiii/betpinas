<!-- Reviews -->

<section class="reviews generic-section">
    <header class="section-header">
        <h2 class="section-title">
            Philippine Bookmaker Reviews
        </h2>
    </header>

    <div class="content no-padding">
    
        <div class="tabbed">
            <div class="tabs review-tabs">
                <button class="tab active" data-tab-section="top5">Top 5 PH Bookies</button>
                <button class="tab" data-tab-section="bonuses">Best Bonuses</button>
            </div>

            <section class="tab-content active" id="top5">
            <!-- TOP 5 -->
            <?php if(have_rows('pbr_top5','options')) :
                while(have_rows('pbr_top5','options')) : the_row();
            ?>
                <article class="pbr-entry" style="background-color: <?php the_sub_field('panel_color') ?>; ">
                    <header>
                        <h3 class="entry-title"><?php the_sub_field('title'); ?></h3>
                        <img class="entry-logo" src="<?php echo wp_get_attachment_image_url( get_sub_field('logo'), 'medium', false ) ?>" alt="">
                    </header>
                    <div class="entry-content clearfix">
                        <div class="text-container">
                            <?php the_sub_field('text'); ?>
                            <div class="subtext"><?php the_sub_field('subtext'); ?></div>
                        </div>
                        <div class="btn-container">
                            &nbsp;
                            <a href="<?php the_sub_field('url') ?>" class="big-btn" target="_blank">
                                <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                <span class="btn-text">GO!</span>
                            </a>
                        </div>
                    </div>
                </article>
            
            <?php endwhile;
            endif; ?>
            <!-- END TOP 5 -->
            </section>

            <section class="tab-content" id="bonuses">
            <!-- BEST BONUSES -->
            <?php if(have_rows('pbr_bb','options')) :
                while(have_rows('pbr_bb','options')) : the_row();
            ?>
                <article class="pbr-entry" style="background-color: <?php the_sub_field('panel_color') ?>; ">
                    <header>
                        <h3 class="entry-title"><?php the_sub_field('title'); ?></h3>
                        <img class="entry-logo" src="<?php echo wp_get_attachment_image_url( get_sub_field('logo'), 'medium', false ) ?>" alt="">
                    </header>
                    <div class="entry-content clearfix">
                        <div class="text-container">
                            <?php the_sub_field('text'); ?>
                            <div class="subtext"><?php the_sub_field('subtext'); ?></div>
                        </div>
                        <div class="btn-container">
                            &nbsp;
                            <a href="<?php the_sub_field('url') ?>" class="big-btn" target="_blank">
                                <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                <span class="btn-text">GO!</span>
                            </a>
                        </div>
                    </div>
                </article>
            
            <?php endwhile;
            endif; ?>
            <!-- END BEST BONUSES -->
            </section>
        </div>
    
    </div>
</section>