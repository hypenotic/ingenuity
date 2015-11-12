<?php

/**
* Enqueue scripts
*/

// add_filter('script_loader_tag', 'add_defer_attribute', 10, 2);
// function add_defer_attribute($tag, $handle) {
//     if ( 'my-js-handle' !== $handle )
//         return $tag;
//     return str_replace( ' src', ' defer="defer" src', $tag );
// }

function my_scripts() {
	wp_enqueue_script('jquery');
	wp_register_script('flickity', get_template_directory_uri() . '/dist/js/flickity.js', array('jquery'), '', true);
	wp_enqueue_script( 'flickity' );
	wp_register_script('app', get_template_directory_uri() . '/dist/js/app.min.js', array('jquery'), '', true);
	wp_enqueue_script( 'app' );
	
}

add_action( 'wp_enqueue_scripts', 'my_scripts' );
?>