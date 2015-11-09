<?php get_header(); ?>

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    
    <?php // Grabbing meta variables
    $banner      = wpautop(get_post_meta($post->ID,'_blogadd_banner',true));
    $bannerurl  = wp_get_attachment_image_src( $banner,'blogadd', true );
    $heading      = wpautop(get_post_meta($post->ID,'_blogadd_heroheading',true));
    $subheading      = wpautop(get_post_meta($post->ID,'_blogadd_subheading',true));
    $pullquote      = wpautop(get_post_meta($post->ID,'_blogadd_pullquote',true));

    $url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
    ?>


    <?php if ( has_post_thumbnail( $post->ID ) ) { ?>
    <div class="default-hero">
        <figure style="background-image: url('<?php echo $url[0] ?>'); background-size: cover;"></figure>
        <hgroup class="animated fadeInDown">
            <h1><?php echo $heading; ?></h1>
            <h2><?php echo $subheading; ?></h2>
        </hgroup>
    </div>
    <?php } else { ?>
    <div class="default-hero">
        <figure style="background-image: url('<?php echo $bannerurl[0] ?>'); background-size: cover;"></figure>
        <hgroup class="animated fadeInDown">
            <h1><?php echo $heading; ?></h1>
            <h2><?php echo $subheading; ?></h2>
        </hgroup>
    </div>
    <?php } ?>

  
    <?php if ($pullquote) { ?>
    <section class="blog-single-intro">

    </section>
    <?php } ?>
  
    
    
    <div class="main-wrapper blog-wrapper">
    <?php get_sidebar(); ?>
    <section class="blog-entry">
        <?php the_content(); ?>
        <div class="prev-next-link">
          <p><?php previous_post_link('%link', '&larr; Previous Post | '); ?>
          <?php previous_post_link('%link', 'Next Post &rarr;'); ?></p>
        </div>
    </section>
    </div>

  <?php endwhile; else : ?>
    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
  <?php endif; ?>

<?php get_footer(); ?>
