<?php get_header(); ?>
    <div class="default-hero">
        <figure style="background-image: url('dist/images/site.jpg'); background-size: cover;"></figure>
        <hgroup class="animated fadeInDown">
            <h2>You searched for:</h2>
            <h1><?php echo get_search_query(); ?></h1>
        </hgroup>
    </div>

    <div class="archive-default">
        <main>
            <div class="content-wrapper">

                <?php if ( have_posts() ) : ?>
                        
                        <!-- <p><span class="text--bold">Results for</span>:  <?php //single_tag_title(); ?>  </p> -->

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
                        <div class="no-search-results">
                            <?php _e( 'Sorry, no posts matched your criteria. Try another search!' );
                            get_search_form();
                            endif;?>
                        </div>
                <p><?php echo paginate_links( $args ); ?></p>
            </div>
        </main><!-- .site-main -->
    </div>

<?php get_footer(); ?>
