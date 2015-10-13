<?php get_header(); ?>	

	<?php // The loop starts here
		if ( have_posts() ) : while ( have_posts() ) : the_post();
	?>

<!-- 	<div class="hero" >
	</div> -->
	<div class="default-hero">
		<hgroup>
			<h1>Insert Main Heading Here</h1>
			<h2>Insert sub heading/intro here.</h2>
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

