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
require_once('includes/functions/cuztom-posts.php');


//Load shortcodes
require_once('includes/shortcodes/full-width-image.php');
require_once('includes/shortcodes/full-width-quote.php');
require_once('includes/shortcodes/template-bullets.php');

add_theme_support( 'post-thumbnails' ); 

// Increase File Upload Size
@ini_set( 'upload_max_size' , '300M' );
@ini_set( 'post_max_size', '200M');

?>