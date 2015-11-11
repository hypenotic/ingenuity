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

            // Hero Blurb
            $blurb      = get_post_meta( $post->ID, '_blurb_heroblurb', true );

            // Stats
            $client     = get_post_meta( $post->ID, '_stats_client', true );
            $sqft       = get_post_meta( $post->ID, '_stats_sf', true );
            $budget     = get_post_meta( $post->ID, '_stats_budget', true );
            $duration   = get_post_meta( $post->ID, '_stats_duration', true );
            $location   = get_post_meta( $post->ID, '_stats_location', true );

            // Video
            // $video      = get_post_meta( $post->ID, '_video_select', true );

            // Testimonial
            // $test       = get_post_meta( $post->ID, '_testimonial_select', true );

            // Gallery
            // $gallery    = get_post_meta( $post->ID, '_slide_select', true );

        ?>

        <div class="default-hero">
            <figure style="background-image: url('<?php echo $bannerurl[0] ?>'); background-size: cover;"></figure>
            <hgroup class="animated fadeInDown">
                <h1><?php echo $heading; ?></h1>
                <h2><?php echo $subheading; ?></h2>
            </hgroup>
        </div>

        <div class="diagonal-wrapper">
            <div class="diagonal-line"></div>

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

                <section class="project__dimension">
                    <?php the_content(); ?>
                </section>

            </section>


            <!-- <section class="project__video">
                <?php // get_template_part( 'template-part-video' ); ?> 
            </section> -->

            <section class="project__gallery clearfix">
                <?php get_template_part( 'template-part-gallery' ); ?> 
            </section>
            
            <!-- THIS IS BREAKING!!!!!! -->
            <!-- <section class="project__testimonial">
                <?php // get_template_part( 'template-part-testimonial' ); ?> 
            </section> -->

            <?php if( is_singular('project') ) { ?>
            <div class="post-nav">
                <div class="alignleft prev-next-post-nav"><?php previous_post_link( '%link', 'Previous' ) ?></div>
                <div class="alignright prev-next-post-nav"><?php next_post_link( '%link', 'Next' ) ?></div>
            </div><?php } ?>
        </div>

    </div>

    <?php endwhile; else : ?>
        <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
    <?php endif; ?>

<?php get_footer(); ?>
