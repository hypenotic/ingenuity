<?php /* Template Name: Team Page */ ?>

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
			<h1><?php echo $heading; ?></h1>
			<h2><?php echo $subheading; ?></h2>
		</hgroup>
	</div>

	<div class="main-wrapper">
		<div class="main-content"> <!-- contentwrapper begins here -->
				
			<?php the_content(); ?>
		
		</div> <!-- contentWrapper ends here -->
	</div>

		<div class="team__container">
		<?php // bring in the team members!

			$query = new WP_Query( array( 'post_type' => 'team' ) );

			if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>

				<?php // Get custom meta values 
					$industries = get_post_meta($post->ID,'_teammember',true);
				?>
				
					<?php // For loop -  cycle through array

						if($industries) {
					    foreach($industries as $industry) {

					    // Get custom meta values    
					    $photoid  	= $industry['_photo'];
					    $photourl	= wp_get_attachment_image_src($photoid,'services', true);
					    $name 		= $industry['_name'];
					    $creds 		= $industry['_creds'];
					    $title 		= $industry['_jobtitle'];
					    $profile 	= $industry['_profile'];
					?>
						
					<figure class="team__single">
						<img src="<?php echo $photourl[0] ?>" alt="<?php echo $name; ?>">
						<h3><?php echo $name; ?>
							<?php if ($creds) { ?>
								<span class="team__creds">
									<?php echo $creds; ?>
								</span>
							<?php } ?>
						</h3>
						<h4><?php echo $title; ?></h4>
						<figcaption><?php echo $profile; ?></figcaption>
					</figure>
					
					<?php
					        }
					    }
					?>

		<?php endwhile; endif; ?>	
		</div>

<?php endwhile; endif; ?>

<?php get_footer(); ?>









