<?php
/**
* Image with caption inserted within content
* @example [vidpic vid="vimeo ID here" pic="insert URL here"]
*/
function vidpic_shortcode( $atts ) {
	$output = '';
	 
    $pic_atts = shortcode_atts( array(
        'vid' => 'url',
        'pic' => 'Insert caption here.',
    ), $atts );
 
    $output .= '<div id="vidpic-content" class="gallery__single">';
        $output .= '<div class="gallery__single-half gallery-image vidpic-vid wow fadeInLeft">';
            $output .= '<iframe src="https://player.vimeo.com/video/' . wp_kses_post( $pic_atts[ 'vid' ] ) . '" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
        $output .= '</div>';
        $output .= '<div class="gallery__single-half gallery-caption vidpic-pic wow fadeInRight">';
            $output .= '<img src="' . wp_kses_post( $pic_atts[ 'pic' ] ) . '">' ;
        $output .= '</div>';
    $output .= '</div>';
 
    return $output;
	}
add_shortcode( 'vidpic', 'vidpic_shortcode' );
?>