<?php /* Template Name: Projects Page */ ?>

<?php get_header(); ?>	

	<?php // The loop starts here
	    if ( have_posts() ) : while ( have_posts() ) : the_post();
	?>

		<div class="default-hero" style="background-image: url('<?php echo $bannerurl[0] ?>'); background-size: cover;">
		    <hgroup>
		        <h1><?php echo $heading; ?></h1>
		        <h2><?php echo $subheading; ?></h2>
		    </hgroup>
		</div>
	
	<?php endwhile; else : ?>
	    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
	<?php endif; ?>


<?php get_footer(); ?>