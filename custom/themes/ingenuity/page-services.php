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
  	
  	?>

	<div class="default-hero" style="background-image: url('<?php echo $bannerurl[0] ?>'); background-size: cover;">
		<hgroup>
			<h1 class="team__hero-heading"><?php echo $heading; ?></h1>
			<h2 class="team__hero-subheading"><?php echo $subheading; ?></h2>
		</hgroup>
	</div>

	<div class="main-wrapper">
		<div class="main-content"> <!-- contentwrapper begins here -->
				
			<?php the_content(); ?>
		
		</div> <!-- contentWrapper ends here -->
	</div>

	<?php if($test || $lists) { ?> 
		<div class="industry__2-col">
			<div class="industry__2-col__half industry__testimonial">
				<figure class="industry__testimonial__bubble">
					<h3><?php echo $test; ?></h3>
				</figure>
				<figcaption class="industry__testimonial__src">
					<div class="test-src__details">
						<h4><?php echo $testsrc; ?></h4>
						<p><?php echo $testtitle; ?></p>
					</div>
					<?php if( wp_attachment_is_image($testId) == true) { ?>
						<img src="<?php echo $testUrl[0]; ?>" alt="<?php echo $testsrc; ?>">
					<?php } else { ?>
						<div class="empty-test-pic"></div>
					<?php } ?>	
				</figcaption>
			</div>
			<div class="industry__2-col__half customlist">
				<h5>What types of companies do we serve?</h5>
				<ul>
					<?php if($lists) {
					    foreach($lists as $listitem) {

					    // Get custom meta values    
					    $singleindustry  	= $listitem['_industry'];
					?>
							
						<li><?php echo $singleindustry; ?></li>
								
					<?php
					        }
					    }
					// End foreach and if loop for cuztom bundle
					?> 
				</ul>
			</div>
		</div>
	<?php } ?>
	
	<?php if ( $ctatitle ) { ?>
	    <section class="industry-cta">
	    	<div class="content-wrapper">
	    		<h2><?php echo $ctatitle; ?></h2>
	    		<div class="cta-contact">
	    			<div class="cta-email">
	    				<p><i class="fa fa-envelope-o"></i><a href="mailto:<?php echo $ctalink; ?>"><?php echo $ctalink; ?></a></p>
	    			</div>
	    			<p class="cta-or">or</p>
	    			<div class="cta-phone">
	    				<p><i class="fa fa-phone"></i><a href="tel:<?php echo $ctaphonea; ?>"><?php echo $ctaphone;?></a></p>
	    			</div>
	    		</div>
	    	</div>
	    </section>
	<?php } else { } ?>
	
	<?php endwhile; else : ?>
	    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
	<?php endif; ?>


<?php get_footer(); ?>