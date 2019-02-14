<?php
include('includes/wp-cuztom-helper/cuztom.php');
//Include post custom posts type. Dependent on /wp-cuztom-helper classes.
// include('includes/wp-cuztom-posts/custom-generic.php');
include('includes/wp-cuztom-posts/custom-generic-post.php');
// include('includes/wp-cuztom-posts/custom-post-projects.php');
include('includes/wp-cuztom-posts/custom-post-videos.php');
include('includes/wp-cuztom-posts/custom-post-testimonials.php');
include('includes/wp-cuztom-posts/custom-post-slider.php');
// include('includes/wp-cuztom-posts/custom-post-team.php');
// include('includes/wp-cuztom-posts/custom-post-contacts.php');

// MetaBox
include('includes/metabox/cpt-page.php');
include('includes/metabox/cpt-post.php');
include('includes/metabox/cpt-team.php');
include('includes/metabox/cpt-contact.php');
include('includes/metabox/cpt-project.php');
include('includes/metabox/cpt-service.php');


//Load custom functions
require_once('includes/functions/enqueue-style.php');
require_once('includes/functions/enqueue-script.php');
require_once('includes/functions/cuztom-posts.php');
require_once('includes/functions/register-menu.php');
require_once('includes/functions/register-sidebar.php');
require_once('includes/functions/readmore.php');
require_once('includes/functions/grabfirstimage.php');


//Load shortcodes
require_once('includes/shortcodes/full-width-image.php');
require_once('includes/shortcodes/full-width-quote.php');
require_once('includes/shortcodes/template-bullets.php');
require_once('includes/shortcodes/hanging-punctuation.php');
require_once('includes/shortcodes/incontent-picture.php');
require_once('includes/shortcodes/bigcopy.php');
require_once('includes/shortcodes/bigvid.php');
require_once('includes/shortcodes/tooltip.php');
require_once('includes/shortcodes/vid-picture.php');


add_theme_support( 'post-thumbnails' ); 

add_post_type_support( 'page', 'excerpt' );

// Increase File Upload Size
@ini_set( 'upload_max_size' , '300M' );
@ini_set( 'post_max_size', '200M');

// Async/Defer Scripts
/*function to add async to all scripts*/
// function js_async_attr($tag){

// # Add async to all remaining scripts
// return str_replace( ' src', ' defer src', $tag );
// }
// add_filter( 'script_loader_tag', 'js_async_attr', 10 );

/*** Remove Query String from Static Resources ***/
function remove_cssjs_ver( $src ) {
 if( strpos( $src, '?ver=' ) )
 $src = remove_query_arg( 'ver', $src );
 return $src;
}
add_filter( 'style_loader_src', 'remove_cssjs_ver', 10, 2 );
add_filter( 'script_loader_src', 'remove_cssjs_ver', 10, 2 );

// Edit REST response for Gallery cpt
add_action( 'rest_api_init', 'slug_register_starship' );
function slug_register_starship() {
    register_rest_field( 'gallery',
        '_slide',
        array(
            'get_callback'    => 'slug_get_gallery',
            'update_callback' => null,
            'schema'          => null,
        )
    );
}

/**
 * Get the value of the "_slide" field
 *
 * @param array $object Details of current post.
 * @param string $field_name Name of field.
 * @param WP_REST_Request $request Current request
 *
 * @return mixed
 */
function slug_get_gallery( $object, $field_name, $request ) {
    $slides = get_post_meta( $object[ 'id' ], $field_name, true );

    $new = array();

    foreach ($slides as $slide => $obj) { 
        $img = wp_get_attachment_image_src( $obj['_image'], 'large', false );
        $url = $img[0];
        $theObject = new stdClass();   
        $theObject->image = $url;
        $theObject->heading = $obj['_headline'];
        $theObject->caption = $obj['_text'];
        array_push($new,$theObject); 
    } 

    return $new;
}

?>