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
   
<div class="gallery">
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

            <div class="cell">
                <?php if($s_image_url) : ?>
                    <img src="<?php echo $s_image_url[0]; ?>">
                <?php endif ?>
                <header>
                    <hgroup>
                        <?php if($s_headline) : ?>
                            <h1 class="headline"><?php echo $s_headline; ?></h1>
                        <?php endif ?>
                        <?php if($s_text) : ?>
                            <p class="subhead"><?php echo $s_text; ?></p>
                        <?php endif ?>
                        <?php if($s_url) : ?>
                            <a href="<?php echo $s_url ?>" class="ghost ghost__text">Find out more</a>
                        <?php endif ?>
                    </hgroup>
                </header>
            </div>
        <?php } 
    endwhile; endif; ?>     
</div>
<?php endif; wp_reset_postdata();?>