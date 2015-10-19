<?php get_header(); ?>	

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <?php // Get custom meta values 

      // Hero Banner
      $banner     = get_post_meta( $post->ID, '_banner_image', true );
      $bannerurl  = wp_get_attachment_image_src( $banner,'banner', true );
      $heading    = get_post_meta( $post->ID, '_banner_heading', true );
      $subheading = get_post_meta( $post->ID, '_banner_subheading', true );
  ?>

	<div class="home-hero">
		<div class="fullscreen-bg">
		    <video loop muted autoplay poster="<?php echo $bannerurl[0] ?>" class="fullscreen-bg__video">
		        <source src="<?php echo get_template_directory_uri(); ?>/dist/images/herovid.mp4" type="video/mp4">
		    </video>
		</div>
		<hgroup>
			<img src="<?php echo get_template_directory_uri(); ?>/dist/images/nofillyellowlogo.png" alt="">
			<h1><?php echo $heading; ?></h1>
			<h2><?php echo $subheading; ?></h2>
		</hgroup>
	</div>
	
	<div class="main-wrapper"> 

		<section class="main-content"> 
			
			

		</section> 

	</div> 

	<?php endwhile; else : ?>
	  <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
	<?php endif; ?>
<?php get_footer(); ?>