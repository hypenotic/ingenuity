<?php /* Template Name: Contact Page */ ?>

<?php get_header(); ?>	

	<?php // The loop starts here
	    if ( have_posts() ) : while ( have_posts() ) : the_post();
	?>

	<section id="contact-map">
		
	</section>

				
	<div class="contact-container">
		<div class="contact__single wow fadeIn" data-wow-duration="0.3s" data-wow-delay="1s"></div>
		<div class="contact__single wow fadeIn" data-wow-duration="0.3s" data-wow-delay="1s"></div>
		<div class="contact__single wow fadeIn" data-wow-duration="0.3s" data-wow-delay="1s"></div>
		<div class="contact__single wow fadeIn" data-wow-duration="0.3s" data-wow-delay="1s"></div>
	</div>




	
	
	<?php endwhile; else : ?>
	    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
	<?php endif; ?>


<?php get_footer(); ?>