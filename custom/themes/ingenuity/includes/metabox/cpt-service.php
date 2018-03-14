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
                'name'  => __( 'Quote', 'textdomain' ),
                'id'    => $prefix . 'quote_text',
                'type'  => 'textarea',
            ),
            array(
                'name'  => __( 'Source', 'textdomain' ),
                'id'    => $prefix . 'quote_source',
                'type'  => 'text',
            ),
            array(
                'name'  => __( 'Source Title', 'textdomain' ),
                'id'    => $prefix . 'quote_source_title',
                'type'  => 'text',
            ),
            array(
                'name'  => __( 'Caption', 'textdomain' ),
                'id'    => $prefix . 'quote_caption',
                'type'  => 'text',
            ),
        )
    );

    $meta_boxes[] = array(
        'title'      => __( 'Service – Call to Action', 'textdomain' ),
        'post_types' => array( 'service'),
        'context'    => 'normal',
        'priority'   => '',
        'fields' => array(
            array(
                'name'  => __( 'Copy', 'textdomain' ),
                'id'    => $prefix . 'cta_copy',
                'type'  => 'wysiwyg',
            ),
            array(
                'name'  => __( 'Button Text', 'textdomain' ),
                'id'    => $prefix . 'cta_text',
                'type'  => 'text',
            ),
            array(
                'name'  => __( 'Button Link', 'textdomain' ),
                'id'    => $prefix . 'cta_link',
                'type'  => 'text',
            ),
        )
    );

    return $meta_boxes;
}
?>