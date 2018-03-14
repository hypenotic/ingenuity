<?php
add_filter( 'rwmb_meta_boxes', 'service_register_meta_boxes' );
function service_register_meta_boxes( $meta_boxes ) {

    $prefix = '_service_';

    $meta_boxes[] = array(
        'title'      => __( 'Service – Banner', 'textdomain' ),
        'post_types' => array( 'service'),
        'context'    => 'normal',
        'priority'   => '',
        'fields' => array(
            array(
                'name'  => __( 'Image', 'textdomain' ),
                'id'    => $prefix . '_banner_image',
                'type'  => 'file_input',
            ),
            array(
                'name'  => __( 'Heading', 'textdomain' ),
                'id'    => $prefix . '_banner_heading',
                'type'  => 'text',
            ),
            array(
                'name'  => __( 'Sub Heading', 'textdomain' ),
                'id'    => $prefix . '_banner_subheading',
                'type'  => 'text',
            )
        )
    );

    $meta_boxes[] = array(
        'title'      => __( 'Service – Components', 'textdomain' ),
        'post_types' => array( 'service'),
        'context'    => 'normal',
        'priority'   => '',
        'fields' => array(
            array(
                'id'     => $prefix . 'components',
                // Group field
                'type'   => 'group',
                // Clone whole group?
                'clone'  => true,
                // Drag and drop clones to reorder them?
                'sort_clone' => true,
                // Sub-fields
                'fields' => array(
                    array(
                        'name' => 'Component Name',
                        'id'   => 'text',
                        'type' => 'text',
                    ),
                ),
            ),
        )
    );

    $meta_boxes[] = array(
        'title'      => __( 'Service – Testimonial', 'textdomain' ),
        'post_types' => array( 'service'),
        'context'    => 'normal',
        'priority'   => '',
        'fields' => array(
            array(
                'name'        => 'Testimonial',
                'id'          => $prefix . 'testimonial',
                'type'        => 'post',
            
                // Post type.
                'post_type'   => 'testimonial',
            
                // Field type.
                'field_type'  => 'select_advanced',
            
                // Placeholder, inherited from `select_advanced` field.
                'placeholder' => 'Select a testimonial',
            
                // Query arguments. See https://codex.wordpress.org/Class_Reference/WP_Query
                'query_args'  => array(
                    'post_status'    => 'publish',
                    'posts_per_page' => - 1,
                ),
            ),
        )
    );

    

    return $meta_boxes;
}
?>