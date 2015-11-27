<?php 
/**
* Template for Videos
* @author Lionel Mann (Hypenotic)
* @example <?php get_template_part( 'template-part-video'); ?>
* Dependency: custom-post-video.php, video.scss
* This template part allows a video with description and title on any page or custom post type.
* Content is managed through a custom post type. 
* Videos are added via Wordpress backend by a post select via the cuztom helper.
*/
$video_id = get_post_meta($post->ID,'_video_select',true); ?>

<?php 
    $args = array(
        'post_type' => 'video',
        'post__in'  => array($video_id)
    );
    $video = new WP_Query( $args ); ?>

<?php if ( $video->have_posts() ) : while ( $video->have_posts() ) : $video->the_post(); 
    
    $description = wpautop(get_post_meta($post->ID,'_video_description',true));
    $youtube     = get_post_meta($post->ID,'_video_youtube',true);
    $vimeo       = get_post_meta($post->ID,'_video_vimeo',true); ?>    
   
    <section class="full-width">
        <div class="column2">
            <?php if($vimeo): ?>
            <div class="js-video [vimeo, widescreen]">
                <iframe src="https://player.vimeo.com/video/<?php echo $vimeo ?>?portrait=0&title=0&byline=0" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
            </div>
            <?php endif ?>
            <?php if($youtube): ?>
            <div class="js-video [vimeo, widescreen]">
                <iframe src="https://www.youtube.com/embed/<?php echo $youtube ?>" width="420" height="315" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
            </div>
            <?php endif ?>
        </div>
    </section> 

<?php endwhile; endif; wp_reset_postdata();?>