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
  ?>

	<div class="home-hero" style="background-image: url('<?php echo $bannerurl[0] ?>'); background-size: cover;">
		<hgroup>
			<h1><?php echo $heading; ?></h1>
			<h2><?php echo $subheading; ?></h2>
		</hgroup>
	</div>
	
	<div class="main-wrapper">
		<div class="main-content"> <!-- contentwrapper begins here -->
				
			<?php the_content(); ?>
		
		</div> <!-- contentWrapper ends here -->
	</div>

	<?php endwhile; else : ?>
		<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
	<?php endif; ?>
<?php get_footer(); ?>

