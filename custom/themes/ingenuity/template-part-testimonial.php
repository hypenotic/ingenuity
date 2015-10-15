<?php 
/**
* Template for Testimonials
* @author Emily Dela Cruz (Hypenotic)
* @example <?php get_template_part( 'template-part-testimonial'); ?>
* Dependency: custom-post-testimonial.php, testimonials.scss
*/
$test_id = get_post_meta($post->ID,'_video_select',true); ?>

<?php 
    $args = array(
        'post_type' => 'video',
        'post__in'  => array($video_id)
    );
    $video = new WP_Query( $args ); ?>

<?php if ( $video->have_posts() ) : while ( $video->have_posts() ) : $video->the_post(); 
    
    $quote      = wpautop(get_post_meta($post->ID,'_video_description',true));
    $src        = get_post_meta($post->ID,'_video_youtube',true);
    $srctitle   = get_post_meta($post->ID,'_video_vimeo',true); ?>    
   
    

<?php endwhile; endif; wp_reset_postdata();?>