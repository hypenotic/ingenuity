<?php get_header(); ?> 

    <?php // The loop starts here
        if ( have_posts() ) : while ( have_posts() ) : the_post();
    ?>
        
        <?php // Get custom meta values 

            // Hero Banner
            $banner     = get_post_meta( $post->ID, '_banner_image', true );
            $bannerurl  = wp_get_attachment_image_src( $banner,'banner', true );
            $heading    = get_post_meta( $post->ID, '_banner_heading', true );
            $subheading = get_post_meta( $post->ID, '_banner_subheading', true );

            // Badge
            $badgetext    = get_post_meta( $post->ID, '_badge_text', true );
            $badgelink  = get_post_meta( $post->ID, '_badge_link', true );

            // Hero Blurb
            $blurb      = get_post_meta( $post->ID, '_blurb_heroblurb', true );

            // Stats
            $client     = get_post_meta( $post->ID, '_stats_client', true );
            $sqft       = get_post_meta( $post->ID, '_stats_sf', true );
            $budget     = get_post_meta( $post->ID, '_stats_budget', true );
            $duration   = get_post_meta( $post->ID, '_stats_duration', true );
            $location   = get_post_meta( $post->ID, '_stats_location', true );

            // Video
            $video      = get_post_meta( $post->ID, '_video_select', true );

            // Testimonial
            $test       = get_post_meta( $post->ID, '_test_select', true );

            // Gallery
            $gallery    = get_post_meta( $post->ID, '_slide_select', true );

        ?>

        <div class="default-hero">
            <figure style="background-image: url('<?php echo $bannerurl[0] ?>'); background-size: cover;"></figure>
            <hgroup class="animated fadeInDown">
                <h1><?php echo $heading; ?></h1>
                <?php if ($subheading) { ?>
                    <h2><?php echo $subheading; ?></h2>
                <?php } ?>
            </hgroup>
        </div>

        <?php if ($badgetext) { ?>
            <a href="<?php echo $badgelink; ?>"><div id="banner-badge">
                
                  <div class="bk l">
                    <div class="arrow top"></div> 
                    <div class="arrow bottom"></div>
                  </div>
                
                  <div class="skew l"></div>
                
                  <div class="main-badge">
                    <div>
                        <?php echo $badgetext; ?>
                    </div>   
                  </div>
                
                  <div class="skew r"></div>
                  
                  <div class="bk r">
                    <div class="arrow top"></div> 
                    <div class="arrow bottom"></div>
                  </div>
                
                </div></a>
        <?php } ?>

    <div class="diagonal-wrapper diagonal-svg__wrapper">
        <!-- <div class="diagonal-line"></div> -->
        <svg class="diagonal-svg">
            <line id="the-line" x1="100%" y1="110%" x2="30%" y2="-10%"/>
        </svg>
        <div class="main-wrapper blog-wrapper">
            <aside id="left"> 
                <?php if ($client) { ?>
                    <p><span class="stats_label">Client</span>: <?php echo $client; ?></p>
                <?php } ?>
                <?php if ($sqft) { ?>
                    <p><span class="stats_label">SF</span>: <?php echo $sqft; ?></p>
                <?php } ?>
                <?php if ($duration) { ?>
                    <p><span class="stats_label">Duration</span>: <?php echo $duration; ?></p>
                <?php } ?>
                <?php if ($location) { ?>
                    <p><span class="stats_label">Location</span>: <?php echo $location; ?></p>
                <?php } ?>
            </aside>
            <section class="blog-entry">
                <!-- <section class="project__hero-blurb">
                    <p><?php //echo $blurb; ?></p>
                </section> -->

                <?php the_content(); ?>

            </section>
        </div>
        
        <?php if ($video) { ?>
            <section class="project__video">
                <?php get_template_part( 'template-part-video' ); ?> 
            </section>
        <?php } ?> 

        <?php if ($test) { ?>
        <section class="project__testimonial">
            <?php get_template_part( 'template-part-testimonial' ); ?> 
        </section>
        <?php } ?>         
        
        <div class="main-wrapper">
            
            <?php if ($gallery) { ?>
            <section class="project__gallery">
                <?php get_template_part( 'template-part-gallery' ); ?> 
            </section>
            <?php } ?>  
            
            <?php if( is_singular('project') ) { ?>
            
            <div class="project-nav">
            
                <?php
                $prev_post = get_previous_post();
                if (!empty( $prev_post )): ?>
                    <a href="<?php echo get_permalink( $prev_post->ID ); ?>">
                    <div class="project-nav__arrow project-nav__arrow--prev">
                        <p><?php echo $prev_post->post_title; ?></p>
                    </div>
                    </a>
                <?php endif; ?>
                <?php
                $next_post = get_next_post();
                if (!empty( $next_post )): ?>
                    <a href="<?php echo get_permalink( $next_post->ID ); ?>">
                    <div class="project-nav__arrow project-nav__arrow--next">
                        <p><?php echo $next_post->post_title; ?></p>
                    </div>
                    </a>
                <?php endif; ?>
                
            </div>
            
            <?php } ?>
        </div>

    </div>

    <?php endwhile; else : ?>
        <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
    <?php endif; ?>

<?php get_footer(); ?>
