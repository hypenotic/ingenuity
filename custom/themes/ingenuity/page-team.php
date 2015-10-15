<?php /* Template Name: Team Page */ ?>

<?php get_header(); ?>	

<?php // The loop starts here
	if ( have_posts() ) : while ( have_posts() ) : the_post();
?>
			
	
<?php endwhile; endif; ?>

<?php get_footer(); ?>









