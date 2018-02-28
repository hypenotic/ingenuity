<?php
add_filter( 'rwmb_meta_boxes', 'default_register_meta_boxes' );
function default_register_meta_boxes( $meta_boxes ) {

    $prefix = '_page_';

    $meta_boxes[] = array(
        'title'      => __( 'Banner/Header Area', 'textdomain' ),
        'post_types' => array( 'page'),
        'context'    => 'normal',
        'priority'   => '',
        'fields' => array(
            array(
                'name'  => __( 'Image', 'textdomain' ),
                'id'    => $prefix . '_hero_image',
                'type'  => 'file_input',
            ),
            array(
                'name'  => __( 'Heading', 'textdomain' ),
                'id'    => $prefix . '_hero_heading',
                'type'  => 'text',
            ),
            array(
                'name'  => __( 'Sub Heading', 'textdomain' ),
                'id'    => $prefix . '_hero_subheading',
                'type'  => 'wysiwyg',
            ),
        )
    );

    $meta_boxes[] = array(
        'title'      => __( 'Hero Badge', 'textdomain' ),
        'post_types' => array( 'page'),
        'context'    => 'normal',
        'priority'   => '',
        'fields' => array(
            array(
                'name'  => __( 'Text', 'textdomain' ),
                'id'    => $prefix . '_badge_text',
                'type'  => 'text',
            ),
            array(
                'name'  => __( 'Link', 'textdomain' ),
                'id'    => $prefix . '_badge_link',
                'type'  => 'text',
            ),
        )
    );

    $meta_boxes[] = array(
        'title'      => __( 'Testimonial', 'textdomain' ),
        'post_types' => array( 'page'),
        'context'    => 'normal',
        'priority'   => '',
        'fields' => array(
            array(
                'name'  => __( 'Quote', 'textdomain' ),
                'id'    => $prefix . '_quote_text',
                'type'  => 'wysiwyg',
            ),
            array(
                'name'  => __( 'Source', 'textdomain' ),
                'id'    => '_quote_source',
                'type'  => 'text',
            ),
        )
    );

    $meta_boxes[] = array(
        'title'      => __( 'Call to Action', 'textdomain' ),
        'post_types' => array( 'page'),
        'context'    => 'normal',
        'priority'   => '',
        'fields' => array(
            array(
                'name'  => __( 'Copy', 'textdomain' ),
                'id'    => $prefix . '_cta_text',
                'type'  => 'wysiwyg',
            ),
            array(
                'name'  => __( 'Button Text', 'textdomain' ),
                'id'    => $prefix . '_cta_text',
                'type'  => 'text',
            ),
            array(
                'name'  => __( 'Button Link', 'textdomain' ),
                'id'    => $prefix . '_cta_link',
                'type'  => 'text',
            ),
        )
    );

    return $meta_boxes;
}
?>