<?php
/**
* Image with caption inserted within content
* @example [picture imgsrc="insert url here" caption="insert caption here"]
*/
function content_incontentpic_shortcode( $atts ) {
	$output = '';
	 
    $pic_atts = shortcode_atts( array(
        'imgsrc' => 'url',
        'caption' => 'Insert caption here.',
    ), $atts );
 
    $output .= '<div class="gallery__single">';
        $output .= '<div class="gallery__single-half gallery-image wow fadeInLeft">';
            $output .= '<img src="' . wp_kses_post( $pull_quote_atts[ 'imgsrc' ] ) . '" alt="' . the_title() . '- Gallery Photo">' ;
        $output .= '</div>';
        $output .= '<div class="gallery__single-half gallery-caption wow fadeInRight">
            <p>' . wp_kses_post( $pull_quote_atts[ 'caption' ] ) . '</p>'  ;
        $output .= '</div>';
    $output .= '</div>';
 
    return $output;
	}
add_shortcode( 'picture', 'content_incontentpic_shortcode' );
?>