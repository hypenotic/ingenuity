<?php
include('includes/wp-cuztom-helper/cuztom.php');
//Include post custom posts type. Dependent on /wp-cuztom-helper classes.
include('includes/wp-cuztom-posts/custom-generic.php');
include('includes/wp-cuztom-posts/custom-post-projects.php');
include('includes/wp-cuztom-posts/custom-post-videos.php');
include('includes/wp-cuztom-posts/custom-post-testimonials.php');
include('includes/wp-cuztom-posts/custom-post-slider.php');


//Load custom functions
require_once('includes/functions/enqueue-style.php');
require_once('includes/functions/enqueue-script.php');

//Load shortcodes
require_once('includes/shortcodes/full-width-image.php');
require_once('includes/shortcodes/full-width-quote.php');
require_once('includes/shortcodes/template-bullets.php');

add_theme_support( 'post-thumbnails' ); 

// Increase File Upload Size
@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );

// ========== START API JS HERE - move to separate file!!!!!

// ======= PROJECT CUSTOM POST
//  https://bay-a.co.uk/wordpress-tips/wp-api-v2-tips/
//  https://github.com/WP-API/WP-API/blob/develop/lib/endpoints/class-wp-rest-posts-controller.php (serach for 'rest_prepare')

add_filter( 'rest_prepare_project', 'add_meta_to_json', 10, 3 );
function add_meta_to_json($data, $post, $request){

$response_data = $data->get_data();

if ( $request['context'] !== 'view' || is_wp_error( $data ) ) {
    return $data;
}

$blurb 		= get_post_meta( $post->ID, '_blurb_heroblurb', true );
$banner 	= get_post_meta( $post->ID, '_banner_image', true );
$bannerurl 	= wp_get_attachment_image_src( $banner,'banner', true );

if(empty($blurb)){
    $blurb 		= '';
}
if(empty($banner)){
    $bannerurl 	= '';
}

if($post->post_type == 'project'){
    $response_data['cuztom_post_meta'] = array(
        'blurb' 	=> $blurb,
        'bannerimg' => $bannerurl[0],
    );  
}

$data->set_data( $response_data );

return $data;
}

?>