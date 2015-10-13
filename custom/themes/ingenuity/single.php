<?php get_header(); ?>

  <!-- The loop starts here -->
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <!-- Grabbing meta variables -->
  <?php 
    $pullquote  = wpautop(get_post_meta($post->ID,'_blogadd_pullquote',true));
    $url        =  wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
  ?>

  <div class="default-hero">
    <hgroup>
      <h1></h1>
      <h2></h2>
    </hgroup>
  </div>

  
  <?php if ($pullquote) { ?>
    <section class="blog-single-intro">
      <main>
        <?php echo $pullquote; ?>
      </main>
    </section>
  <?php } ?>
  
  <div class="main-wrapper">
    <div class="blog-entry" data-postid="<?php the_ID(); ?>">
        <!-- BLOG POSTS PRINTS HERE -->
      <div class="prev-next-link">
        <p><?php previous_post_link('%link', '&larr; Previous Post | '); ?>
        <?php previous_post_link('%link', 'Next Post &rarr;'); ?></p>
      </div>
    
    </div> <!-- contentWrapper ends here -->
  </div>

  <?php endwhile; else : ?>
    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
  <?php endif; ?>

<?php get_footer(); ?>

<!-- ================================================= -->

