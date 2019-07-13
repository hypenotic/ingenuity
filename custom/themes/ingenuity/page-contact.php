<?php /* Template Name: Contact Page */ ?>

<?php get_header(); ?>	

	<?php // The loop starts here
	    if ( have_posts() ) : while ( have_posts() ) : the_post();
	?>

	<section id="contact-map">
		
	</section>

		<div class="contact-container">
			<?php // bring in the contacts!
				$query = new WP_Query(
					array( 
						'post_type' => 'contact',
						'order' => 'ASC' 
					)
				);
				if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>

					<?php // Get custom meta values 
						$phone 		= get_post_meta($post->ID,'_contact_phone',true);
						$email 		= get_post_meta($post->ID,'_contact_email',true);
						$phone_btn 	= get_post_meta($post->ID,'_contact_phone_btn',true);
						$email_btn 	= get_post_meta($post->ID,'_contact_email_btn',true);
					?>

					<div class="contact__single wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.5s">
						<div class="contact__single__copy">
							<h4>
								<?php the_title(); ?>
							</h4>
							<div>
								<?php the_content(); ?>
							</div>
						</div>
						<div class="contact__single__buttons">
							<?php if ($phone) { ?>
								<a href="tel:<?php echo $phone; ?>"><button>
										<?php echo $phone_btn; ?>
									</button></a>
							<?php } ?>
							<?php if ($email) { ?>
								<a href="mailto:<?php echo $email; ?>">
									<h3><span class="contact-border"><?php echo $email_btn; ?></span></h3>
								</a>
							<?php } ?>
						</div>
					</div>
		
			<?php endwhile; wp_reset_postdata(); endif; ?>	
		</div>

	<?php endwhile; else : ?>
	    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
	<?php endif; ?>


<?php get_footer(); ?>