<?php /* Template Name: Projects Page */ ?>

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
		        <?php if($heading) { ?>
		        	<h1><span class="yellow-highlight"><?php echo $heading; ?></span></h1>
		        <?php } ?>
		        <?php if($subheading) { ?>
		        	<h2><span class="black-highlight"><?php echo $subheading; ?></span></h2>
		        <?php } ?>
		    </hgroup>
		</div>

		<div class="main-content">

			<?php the_content(); ?>
			
			<div class="projects__panel-container"><?php
				
					$query = new WP_Query( array( 'post_type' => 'project' ) );
				
					if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
				
						<?php // Get custom meta values 
							$industries = get_post_meta($post->ID,'_industries',true);
				
							$banner     = get_post_meta( $post->ID, '_banner_image', true );
							$bannerurl  = wp_get_attachment_image_src( $banner,'banner', true );
						?>
				
					<a href="<?php the_permalink(); ?>">
						<figure class="projects__panel" style="background-image: url('<?php echo $bannerurl[0] ?>');">
							<div class="color-overlay"></div>
							<h2><?php the_title(); ?></h2>
						</figure>
					</a>
				
				<?php endwhile; endif; ?></div>

		</div>
	
	<?php endwhile; else : ?>
	    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
	<?php endif; ?>


<?php get_footer(); ?>