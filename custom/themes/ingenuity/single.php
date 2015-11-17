<?php get_header(); ?>

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    
    <?php // Grabbing meta variables
    $banner       = get_post_meta( $post->ID, '_blogadd_hero', true );
    $bannerurl    = wp_get_attachment_image_src( $banner,'blogadd', true );
    $heading      = wpautop(get_post_meta($post->ID,'_blogadd_heroheading',true));
    $subheading   = wpautop(get_post_meta($post->ID,'_blogadd_subheading',true));
    $pullquote    = wpautop(get_post_meta($post->ID,'_blogadd_pullquote',true));

    $url          = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
    ?>

    <?php if ($banner) { ?>
    
    <div class="default-hero">
        <figure style="background-image: url('<?php echo $bannerurl[0] ?>'); background-size: cover;"></figure>
        <hgroup class="animated fadeInDown">
            <?php if ($heading) { ?>
            <h1><?php echo $heading; ?></h1>
            <?php } else { ?>
            <h1><?php the_title(); ?></h1>
            <?php } ?>
            <?php if ($subheading) { ?>
            <h2><?php echo $subheading; ?></h2>
            <?php } ?>
        </hgroup>
    </div>

    <?php } else { ?>
    
    <div class="default-hero">
        <figure style="background-size: cover; background-color: black;"></figure>
        <hgroup class="animated fadeInDown">
            <?php if ($heading) { ?>
            <h1><?php echo $heading; ?></h1>
            <?php } else { ?>
            <h1><?php the_title(); ?></h1>
            <?php } ?>
            <?php if ($subheading) { ?>
            <h2><?php echo $subheading; ?></h2>
            <?php } ?>
        </hgroup>
    </div>

    <?php } ?>
  
    <?php if ($pullquote) { ?>
    <section class="blog-single-intro">

    </section>
    <?php } ?>

    <div class="main-wrapper blog-wrapper">
        <!-- <div class="diagonal-line"></div> -->
        <?php get_sidebar(); ?>
        <section class="blog-entry blog-page">
            <?php the_content(); ?>
        </section>
        <div class="prev-next-links">
          <?php
          $prev_post = get_previous_post();
          if (!empty( $prev_post )): ?>
              <a href="<?php echo get_permalink( $prev_post->ID ); ?>">
              <div class="blog-nav__arrow blog-nav__arrow--prev">
                  <p>Previous Post</p>
              </div>
              </a>
          <?php endif; ?>
          <?php
          $next_post = get_next_post();
          if (!empty( $next_post )): ?>
              <a href="<?php echo get_permalink( $next_post->ID ); ?>">
              <div class="blog-nav__arrow blog-nav__arrow--next">
                  <p>next post</p>
              </div>
              </a>
          <?php endif; ?>
        </div>
    </div>

  <?php endwhile; else : ?>
    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
  <?php endif; ?>

<?php get_footer(); ?>
