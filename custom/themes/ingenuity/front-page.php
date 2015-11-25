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
		</hgroup>

		<?php if ($badgetext) { ?>
			<a href="<?php echo $badgelink; ?>">
				<div id="home-badge">
				
				  <div class="bk l">
				    <div class="arrow top"></div> 
				    <div class="arrow bottom"></div>
				  </div>
				
				  <div class="skew l"></div>
				
				  <div id="main-badge">
				    <div>
				    	<?php echo $badgetext; ?>
				    </div>   
				  </div>
				
				  <div class="skew r"></div>
				  
				  <div class="bk r">
				    <div class="arrow top"></div> 
				    <div class="arrow bottom"></div>
				  </div>
				
				</div>
			</a>
		<?php } ?>

	</div>

	<?php endwhile; else : ?>
	  <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
	<?php endif; ?>
<?php get_footer(); ?>