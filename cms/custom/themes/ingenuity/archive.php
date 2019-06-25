<?php get_header(); ?>
    <div class="default-hero">
        <figure style="background-image: url('dist/images/site.jpg'); background-size: cover;"></figure>
        <div class="hgroup animated fadeInDown">
            <h2>Results for:</h2>
            <h1><?php single_month_title(' '); ?></h1>
        </div>
    </div>

    <div class="archive-default">
        <main>
            <div class="content-wrapper">

                <?php if ( have_posts() ) : ?>

                        <?php
                        // Start the loop.
                        while ( have_posts() ) : the_post(); ?>

                            <section class="archive-panel">
                                <?php $url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
                                <h3>
                                    <a href="<?php the_permalink(); ?> ">
                                    <?php the_title( ); ?>
                                    </a>
                                </h3>
                                <div>
                                    <?php the_excerpt(); ?>
                                </div>
                            </section>
                            
                            <?php
                    
                        endwhile;
                    
                    // If no content, include the "No posts found" template.
                    else : ?>
                        <?php _e( 'Sorry, no posts matched your criteria.' );
                    
                endif;?>
                <p><?php echo paginate_links( $args ); ?></p>
            </div>
        </main><!-- .site-main -->
    </div>

<?php get_footer(); ?>
