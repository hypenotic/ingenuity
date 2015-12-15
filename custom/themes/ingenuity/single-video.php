<?php get_header(); ?>

  <?php // The loop starts here
    if ( have_posts() ) : while ( have_posts() ) : the_post();
  ?>

  <?php // Grabbing meta variables
    $pullquote  = wpautop(get_post_meta($post->ID,'_blogadd_pullquote',true));
    $url        =  wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
  ?>

  <?php endwhile; else : ?>
    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
  <?php endif; ?>

<?php get_footer(); ?>
