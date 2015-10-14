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

  
  <div class="main-wrapper">
    
    <div class="main-content">
      
      <section class="project__hero-blurb">
        
      </section>

      <section class="project_stats">
        
      </section>
      
      <section class="project__video">
        
      </section>
      
      <section class="project__dimension">
        
      </section>
      
      <section class="project__testimonial">
        
      </section>
      
      <section class="project__gallery">
        
      </section>
    
    </div>

  </div>

  <?php endwhile; else : ?>
    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
  <?php endif; ?>

<?php get_footer(); ?>
