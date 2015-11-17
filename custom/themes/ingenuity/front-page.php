<?php get_header(); ?>	

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <?php // Get custom meta values 

      // Hero Banner
      $banner     = get_post_meta( $post->ID, '_banner_image', true );
      $bannerurl  = wp_get_attachment_image_src( $banner,'banner', true );
      $heading    = get_post_meta( $post->ID, '_banner_heading', true );
      $subheading = get_post_meta( $post->ID, '_banner_subheading', true );
  ?>

	<div class="home-hero">
		<div class="fullscreen-bg">
		     <?php dynamic_sidebar( 'homepage-vid' ); ?>
		</div>
<!-- 		<hgroup class="rw-wrapper">
			<h2 class="rw-sentence">
				Design Build & General Contracting that factors in
				<div class="rw-words rw-words-1">
					<span class="rotator">happiness <span class="sq-ft">/sq ft.</span></span>
					<span class="rotator">craft <span class="sq-ft">/sq ft.</span></span>
					<span class="rotator">productivity <span class="sq-ft">/sq ft.</span></span>
					<span class="rotator">detail <span class="sq-ft">/sq ft.</span></span>
					<span class="rotator">creativity <span class="sq-ft">/sq ft.</span></span>
				</div>
				<span id="move-over">/sq ft.</span>
			</h2>
		</hgroup> -->
		<h2 class="sentence">
			Design Build & General Contracting that factors in
			<div class="pushEffect">
				<span>happiness <span class="sq-ft">/sq ft.</span></span>
				<span>craft <span class="sq-ft">/sq ft.</span></span>
				<span>productivity <span class="sq-ft">/sq ft.</span></span>
				<span>detail <span class="sq-ft">/sq ft.</span></span>
				<span>creativity <span class="sq-ft">/sq ft.</span></span>
			</div>
			<span id="move-over">/sq ft.</span>
		</h2>
	</div>

	<?php endwhile; else : ?>
	  <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
	<?php endif; ?>
<?php get_footer(); ?>