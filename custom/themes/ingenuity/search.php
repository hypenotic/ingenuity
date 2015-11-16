<?php get_header(); ?>
    <div class="default-hero">
        <figure style="background-image: url('<?php echo get_template_directory_uri(); ?>/dist/images/site.jpg'); background-size: cover;"></figure>
        <hgroup class="animated fadeInDown">
            <h2>You searched for:</h2>
            <h1><?php echo get_search_query(); ?></h1>
        </hgroup>
    </div>

    <div class="main-wrapper">
        <div class="main-content"> 
                
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
                        <h4>Sorry, we couldn't find anything to match your criteria. Try again?</h4>
                        <div class="search-error-page">
                            <form role="search" method="get" class="search-form-error" action="<?php echo home_url( '/' ); ?>">
                                <label>
                                    <input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
                                </label>
                                <input type="submit" class="error-submit" value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>" />
                            </form>
                        </div>
                    <?php endif;?>
                <p><?php echo paginate_links( $args ); ?></p>
        </div>
    </div>

<?php get_footer(); ?>
