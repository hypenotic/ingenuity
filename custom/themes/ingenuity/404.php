<?php
/**
 * The template for displaying 404 pages (Not Found)
 */

get_header(); ?>

	<div class="default-hero">
	    <figure style="background-image: url('dist/images/site.jpg'); background-size: cover;"></figure>
	    <hgroup class="animated fadeInDown">
	        <h1><?php echo $heading; ?></h1>
	        <h2><?php echo $subheading; ?></h2>
	    </hgroup>
	</div>

	<div class="main-wrapper">
		<hgroup id="fade-in-item" class="animated fadeInDown">
			<h2>
				Not found!
			</h2>
			<p class="search-text"><?php _e( 'Oops! It looks like nothing was found at this location. Maybe try a search?' ); ?></p>
			<?php get_search_form(); ?>
		</hgroup>
	</div>

<?php get_footer(); ?>