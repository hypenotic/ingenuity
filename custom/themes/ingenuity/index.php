<?php get_header(); ?>	

	
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

	<?php // The loop starts here 
		if ( have_posts() ) : while ( have_posts() ) : the_post(); 
	?>
	
	<div class="main-wrapper"> 
		<section class="main-content"> 
			
			<div class="container blog__corp-new">
			    <?php  
			        $banner_id      = get_post_meta($post->ID, '_banner_image', true);
			        $banner_url     = wp_get_attachment_image_src($banner_id,'banner', true);
			        ?>
					
					<?php $url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
			        <?php $category_classes = ''; ?>

			        <?php $categories = get_the_terms($post->ID , 'category'); 
			        ?>

			        <?php if($categories){
			            foreach($categories as $category){
			                $category_classes .= ' '.$category->slug;
			            };
			        }; 
			        ?>

			        <?php if ($url) { ?>

					<div class="blog-single-post wow fadeIn">
						<a href="<?php the_permalink(); ?>">
							<h3><span class="grey-hover"><?php the_title(); ?></span></h3>
						</a>
						<p> <?php the_time('F j, Y'); ?> </p>
						<img src="<?php echo $url[0] ?>" alt="<?php the_title(); ?>">
						<p> <?php the_excerpt(); ?> </p>
						<div class="blog-single__cats">
							<p>Listed Under:</p> 
							<?php echo get_the_category_list(); ?>
						</div>
					</div>

			        <?php } else { ?>

			        <div class="blog-single-post wow fadeIn">
			        	<a href="<?php the_permalink(); ?>">
			        		<h3><span class="grey-hover"><?php the_title(); ?></span></h3>
			        	</a>
			        	<p> <?php the_time('F j, Y'); ?> </p>
			        	<img src="<?php echo catch_that_image(); ?>" alt="<?php the_title(); ?>">
			        	<p> <?php the_excerpt(); ?> </p>
			        	<div class="blog-single__cats">
			        		<p>Listed Under:</p> 
			        		<?php echo get_the_category_list(); ?>
			        	</div>
			        </div>
			        
			        <?php } ?>
			
			    <p class="pagination-links"><?php echo paginate_links( $args ); ?></p>
			</div>

			

		</section> <!-- ARTICLE WRAP ends here -->
	</div> <!-- contentWrapper ends here -->

	<?php endwhile; else : ?>
	  <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
	<?php endif; ?>

<?php get_footer(); ?>