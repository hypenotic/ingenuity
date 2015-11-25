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

		<div class="default-hero project-index">
		    <figure style="background-image: url('<?php echo $bannerurl[0] ?>'); background-size: cover;"></figure>
		    <hgroup class="animated fadeInDown">
		        <h1><?php echo $heading; ?></h1>
		        <?php if ($subheading) { ?>
					<h2><?php echo $subheading; ?></h2>
	        	<?php } ?>
		    </hgroup>
		</div>

		<div class="main-wrapper"> 
			<section class="main-content standard-center"> 
			<?php the_content(); ?>
			</section>
		</div>
		
		<div class="projects__panel-container"><?php
			
				$query = new WP_Query( array( 'post_type' => 'project' ) );
			
				if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
			
					<?php // Get custom meta values 
						$industries = get_post_meta($post->ID,'_industries',true);
			
						$banner     = get_post_meta( $post->ID, '_banner_image', true );
						$bannerurl  = wp_get_attachment_image_src( $banner,'banner', true );
					?>
			
				<a class="projects__panel-link" href="<?php the_permalink(); ?>">
					<div class="projects__panel-wrap">
						<h2><?php the_title(); ?></h2>
						<div class="color-overlay">
						</div>
						<figure class="projects__panel-img" style="background-color: rgba(252, 216, 56, 0.6); background-image: url('<?php echo $bannerurl[0] ?>');">
						</figure>
					</div>
				</a>
			
			<?php endwhile; endif; ?>
		</div>
	
	<?php endwhile; else : ?>
	    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
	<?php endif; ?>


<?php get_footer(); ?>