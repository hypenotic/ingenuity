<?php get_header(); ?>	

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <!-- Grabbing meta variables -->
  <?php 
    $url        =  wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
  ?>

	<div class="default-hero" style="background-image: url('<?php echo $url[0] ?>'); background-size: cover;">
	<div class="home-hero">
		<hgroup>
			<h1>Insert Main Heading Here</h1>
			<h2>Insert sub heading/intro here.</h2>
		</hgroup>
	</div>
	
	<div class="content-wrapper"> <!-- contentwrapper begins here -->
			
		<section class="main-content"> <!-- ARTICLE WRAP begins here -->
			
			

		</section> <!-- ARTICLE WRAP ends here -->
	</div> <!-- contentWrapper ends here -->

	<?php endwhile; else : ?>
	  <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
	<?php endif; ?>
<?php get_footer(); ?>