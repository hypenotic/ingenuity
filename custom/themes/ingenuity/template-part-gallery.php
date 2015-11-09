<?php 
/**
* Template for Flickity Gallery
* @author Lionel Mann (Hypenotic)
* @example <?php get_template_part( 'template-part-gallery'); ?>
* @link http://flickity.metafizzy.co/
* Dependency: jQuery, flickity.js, custom-post-slider.php, gallery.scss
* This template part allows a slider on any page or custom post type. Content is 
* managed through a custom post type. Any page can have a Gallery with multiple slides.
* Galleries are added via Wordpress backend by a post select via the cuztom helper.
*/
$slide_id = get_post_meta($post->ID,'_slide_select',true); 
    
if($slide_id) : ?>
   

    <?php
        $args = array(
            'post_type' => 'gallery',
            'post__in'  => array($slide_id)
        );
    $gallery = new WP_Query( $args );
    if ( $gallery->have_posts() ) : while ( $gallery->have_posts() ) : $gallery->the_post(); 
        $slide = get_post_meta($post->ID,'_slide',true);
        foreach($slide as $slides) {
            $s_headline  = $slides['_headline'];
            $s_text      = $slides['_text'];
            $s_url       = $slides['_url'];
            $s_image_id  = $slides['_image'];
            $s_image_url = wp_get_attachment_image_src($s_image_id,'banner', true); ?>    
            
            <div class="gallery__single clearfix">
                <div class="gallery__single-half gallery-image clearfix wow fadeInLeft">
                    <img src="<?php echo $s_image_url[0]; ?>" alt="">
                </div>
                <div class="gallery__single-half gallery-caption clearfix wow fadeInRight">
                    <p><?php echo $s_text; ?></p>
                </div>
            </div>
        <?php } 
    endwhile; endif; ?>     
<?php endif; wp_reset_postdata();?>