<?php /* Template Name: Team Page */ ?>

<?php get_header(); ?>	
<section class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right" id="push-panel">
	
</section>

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

	<div class="default-hero">
	    <figure style="background-image: url('<?php echo $bannerurl[0] ?>'); background-size: cover;"></figure>
	    <div class="hgroup animated fadeInDown">
	        <h1><?php echo $heading; ?></h1>
            <?php if ($subheading) { ?>
    			<h2><?php echo $subheading; ?></h2>
            <?php } ?>
	    </div>
	</div>

	<div class="main-wrapper"> 
		<section class="main-content standard-center"> 
		<?php the_content(); ?>
		</section>
	</div>

		<div class="team__container">
		<?php // bring in the team members!

			$query = new WP_Query(
				array( 
					'post_type' => 'team',
					'order' => 'ASC' 
				)
			);

			if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>

				<?php // Get custom meta values 
					$creds = get_post_meta($post->ID,'_team_creds',true);
					$title = get_post_meta($post->ID,'_team_job_title',true);
				?>
				
				<figure class="team__single wow fadeIn" data-name="<?php the_title(); ?>" data-wow-duration="0.5s" data-wow-delay="0.2s">
					<div class="hgroup">
						<h3 class="team__name"><?php the_title(); ?>
							<?php if ($creds) { ?>
								<span class="team__creds">
									<?php echo $creds; ?>
								</span>
							<?php } ?>
						</h3>
						<h4 class="team__title"><?php echo $title; ?></h4>
					</div>
				</figure>
				<div class="drop-down-panel">
					<div class="push__longbio animated fadeIn">
						<?php the_content(); ?>
					</div>
					<button class="close-push-panel">CLOSE</button>
				</div>

		<?php endwhile; endif; ?>	
		</div>

<?php endwhile; endif; ?>

<?php get_footer(); ?>









