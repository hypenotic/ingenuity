<?php get_header(); ?>	

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <?php // Get custom meta values 

      // Hero Banner
      $banner     = get_post_meta( $post->ID, '_banner_image', true );
      $bannerurl  = wp_get_attachment_image_src( $banner,'banner', true );
      $heading    = get_post_meta( $post->ID, '_banner_heading', true );
      $subheading = get_post_meta( $post->ID, '_banner_subheading', true );

      // Badge
      $badgetext    = get_post_meta( $post->ID, '_badge_text', true );
      $badgelink 	= get_post_meta( $post->ID, '_badge_link', true );
  ?>

	<div class="home-hero" id="header-check">
		<div class="fullscreen-bg" id="vid-check">
		     <?php dynamic_sidebar( 'homepage-vid' ); ?>
		</div>
 		<hgroup class="rw-wrapper">
			<h2 class="rw-sentence">
				A <a href="<?php home_url(); ?>services/design-build/" class="sentence-link">Design Build</a> & <a href="<?php home_url(); ?>services/general-contracting/" class="sentence-link">General Contracting</a> team that <a href="<?php home_url(); ?>about-us/" class="sentence-link">believes</a> in
				<div class="rw-words rw-words-1">
					<a href="<?php home_url(); ?>projects/" class="rotator-link"><span class="rotator">happiness <span class="sq-ft">/sq ft.</span></span></a>
					<a href="<?php home_url(); ?>projects/" class="rotator-link"><span class="rotator">craft <span class="sq-ft">/sq ft.</span></span></a>
					<a href="<?php home_url(); ?>projects/" class="rotator-link"><span class="rotator">productivity <span class="sq-ft">/sq ft.</span></span></a>
					<a href="<?php home_url(); ?>projects/" class="rotator-link"><span class="rotator">detail <span class="sq-ft">/sq ft.</span></span></a>
					<a href="<?php home_url(); ?>projects/" class="rotator-link"><span class="rotator">creativity <span class="sq-ft">/sq ft.</span></span></a>
				</div>
				<span id="move-over">/sq ft.</span>
			</h2>
		</hgroup>
	</div>

	<?php endwhile; else : ?>
	  <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
	<?php endif; ?>
<?php get_footer(); ?>