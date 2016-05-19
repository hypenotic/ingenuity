<?php
include('includes/wp-cuztom-helper/cuztom.php');
//Include post custom posts type. Dependent on /wp-cuztom-helper classes.
include('includes/wp-cuztom-posts/custom-generic.php');
include('includes/wp-cuztom-posts/custom-generic-post.php');
include('includes/wp-cuztom-posts/custom-post-projects.php');
include('includes/wp-cuztom-posts/custom-post-videos.php');
include('includes/wp-cuztom-posts/custom-post-testimonials.php');
include('includes/wp-cuztom-posts/custom-post-slider.php');
include('includes/wp-cuztom-posts/custom-post-team.php');
include('includes/wp-cuztom-posts/custom-post-contacts.php');


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

?>