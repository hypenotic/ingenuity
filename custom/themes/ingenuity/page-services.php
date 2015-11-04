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

			<div class="two-column">
				<div class="two-column__half services-testimonial wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.3s">
				<blockquote>"We believe in doing things right. And we want to do things right in everything that we do, so our building is a reflection of that. We want our customers to come here and feel the freshness, the openness, feel the honesty and integrity of our business."</blockquote>
				<p>- Source</p>
					
				</div>
				<div class="two-column__half services-cta wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0.8s">
					<p>Great buildings begin with a conversation. Whether this is your first time creating space or you're an experienced developer interested in a build with your fingerprint on it...</p>
					<button class="services-cta__btn">let's talk over an espresso</button>
				</div>
			</div>
		
		</div> <!-- contentWrapper ends here -->
	</div>

	
	
	<?php endwhile; else : ?>
	    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
	<?php endif; ?>


<?php get_footer(); ?>