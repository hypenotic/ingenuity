<?php

/**
* Template for Full-Width Testimonial Panel
* @author Emily Dela Cruz (Hypenotic)
* @example <?php get_template_part( 'template-part-testimonial'); ?>
* Original Project: BeneFACT (151005)
* Dependency: custom-post-home.php, template-testimonial.scss
* This template part is part of a custom homepage layout (custom-post-home.php)
* Though it can be used in any custom-post.php file if the chunk of code is copied from custom-post-home.php (lines 78-113) and injected properly. 
*/
$quote_id = get_post_meta( $post->ID, '_testimonial_select', true ); ?>

<?php 
    $args = array(
        'post_type' => 'testimonial',
        'post__in'  => array($quote_id)
    );
    $quote = new WP_Query( $args ); ?>

  <?php if ( $quote->have_posts() ) : while ( $quote->have_posts() ) : $quote->the_post(); ?>

          
        <?php  //Get custom meta values 
          	$quotation 	= get_post_meta( $post->ID, '_single_quotation', true );
          	$src 		= get_post_meta( $post->ID, '_single_source', true );
          	$srctitle	= get_post_meta( $post->ID, '_single_title', true );
        ?>

		<h3><?php echo $quotation; ?></h3>
		<p><?php echo $src; ?></p>
		<p><?php echo $srctitle; ?></p>

  <?php endwhile; endif ?>