<?php /* Template Name: Services Page */ ?>

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

      // CTA
  	  $ctatext 	  = get_post_meta( $post->ID, '_cta_heading', true );
  	  $ctalink 	  = get_post_meta( $post->ID, '_cta_blink', true );
  	  $ctabtn 	  = get_post_meta( $post->ID, '_cta_btext', true );

  	  // Testimonial
  	  $test 	  = get_post_meta( $post->ID, '_test_testimonial', true );
  	  $source 	  = get_post_meta( $post->ID, '_test_source', true );
  	  $title 	  = get_post_meta( $post->ID, '_test_title', true );

  	?>

  	<?php if ($banner) { ?>
		
		<div class="default-hero">
		    <figure style="background-image: url('<?php echo $bannerurl[0] ?>'); background-size: cover;"></figure>
		    <hgroup class="animated fadeInDown">
		        <h1><?php echo $heading; ?></h1>
	            <?php if ($subheading) { ?>
	    			<h2><?php echo $subheading; ?></h2>
	            <?php } ?>
		    </hgroup>
		</div>

  	<?php } else { ?>
		
		<div class="default-hero no-banner">
		    <hgroup class="animated fadeInDown">
		        <h1><?php echo $heading; ?></h1>
	            <?php if ($subheading) { ?>
	    			<h2><?php echo $subheading; ?></h2>
	            <?php } ?>
		    </hgroup>
		</div>

  	<?php } ?>

	<div class="main-wrapper">
		<div class="main-content standard-center"> <!-- contentwrapper begins here -->
				
			<?php the_content(); ?>

			<div class="two-column">
				<div class="two-column__half services-testimonial wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="1s">
					<blockquote><?php echo $test; ?></blockquote>
					<h4><?php echo $source; ?></h4>
					<h5><?php echo $title; ?></h5>
				</div>
				<div class="two-column__half services-cta wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="1.5s">
					<p><?php echo $ctatext; ?></p>
					<a href="<?php echo $ctalink; ?>">
						<button class="services-cta__btn"><?php echo $ctabtn; ?></button>
					</a>
				</div>
			</div>
		
		</div> <!-- contentWrapper ends here -->
	</div>

	
	
	<?php endwhile; else : ?>
	    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
	<?php endif; ?>


<?php get_footer(); ?>