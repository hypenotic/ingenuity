<?php
/**
* Image with caption inserted within content
* @example [picture imgsrc="insert url here" caption="insert caption here"]
*/
function content_incontentpic_shortcode( $atts ) {
	$output = '';
	 
    $pull_quote_atts = shortcode_atts( array(
        'imgsrc' => 'url',
        'caption' => 'Insert caption here.',
    ), $atts );
 
    $output .= '<div class="pullquote">';
        $output .=  wpautop( wp_kses_post( $pull_quote_atts[ 'quote' ] ) );
        $output .= '<p class="attribution">' . wp_kses_post( $pull_quote_atts[ 'attribution' ] ) . '</p>';
    $output .= '</div>';
 
    return $output;
	}
add_shortcode( 'picture', 'content_incontentpic_shortcode' );
?>