<?php
add_filter( 'rwmb_meta_boxes', 'defaultpost_register_meta_boxes' );
function defaultpost_register_meta_boxes( $meta_boxes ) {

    $prefix = '_post_';

    $meta_boxes[] = array(
        'title'      => __( 'Blog Details', 'textdomain' ),
        'post_types' => array( 'post'),
        'context'    => 'normal',
        'priority'   => '',
        'fields' => array(
            array(
                'name'  => __( 'Banner Image', 'textdomain' ),
                'id'    => $prefix . 'hero_image',
                'type'  => 'file_input',
            ),
            array(
                'name'  => __( 'Banner Heading', 'textdomain' ),
                'id'    => $prefix . 'hero_heading',
                'type'  => 'text',
            ),
            array(
                'name'  => __( 'Banner Subhead', 'textdomain' ),
                'id'    => $prefix . 'hero_subheading',
                'type'  => 'wysiwyg',
            ),
            array(
                'name'  => __( 'Authors', 'textdomain' ),
                'id'    => $prefix . 'authors',
                'type'  => 'text',
            ),
            array(
                'name'  => __( 'Pullquote', 'textdomain' ),
                'id'    => $prefix . 'hero_pullquote',
                'type'  => 'wysiwyg',
            ),
        )
    );

    return $meta_boxes;
}
?>