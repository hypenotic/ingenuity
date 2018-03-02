<?php
add_filter( 'rwmb_meta_boxes', 'project_register_meta_boxes' );
function project_register_meta_boxes( $meta_boxes ) {

    $prefix = '_project_';

    $meta_boxes[] = array(
        'title'      => __( 'Banner/Header Area', 'textdomain' ),
        'post_types' => array( 'project'),
        'context'    => 'normal',
        'priority'   => '',
        'fields' => array(
            array(
                'name'  => __( 'Image', 'textdomain' ),
                'id'    => '_banner_image',
                'type'  => 'image',
            ),
            array(
                'name'  => __( 'Heading', 'textdomain' ),
                'id'    => '_banner_heading',
                'type'  => 'text',
            ),
            array(
                'name'  => __( 'Sub Heading', 'textdomain' ),
                'id'    => '_banner_subheading',
                'type'  => 'text',
            ),
            array(
                'name'  => __( 'Badge?', 'textdomain' ),
                'id'    => '_project_badge_check',
                'type'  => 'checkbox',
            ),
            array(
                'name'  => __( 'Badge Text', 'textdomain' ),
                'id'    => '_badge_text',
                'type'  => 'text',
                'hidden' => array( '_project_badge_check', '=', '' )
            ),
            array(
                'name'  => __( 'Badge Link', 'textdomain' ),
                'id'    => '_badge_link',
                'type'  => 'text',
                'hidden' => array( '_project_badge_check', '=', '' )
            ),
        )
    );

    $meta_boxes[] = array(
        'title'      => __( 'Project Stats', 'textdomain' ),
        'post_types' => array( 'project'),
        'context'    => 'normal',
        'priority'   => '',
        'fields' => array(
            array(
                'name'  => __( 'Client', 'textdomain' ),
                'id'    => '_stats_client',
                'type'  => 'text',
            ),
            array(
                'name'  => __( 'Square Footage', 'textdomain' ),
                'id'    => '_stats_sf',
                'type'  => 'text',
            ),
            array(
                'name'  => __( 'Budget', 'textdomain' ),
                'id'    => '_stats_budget',
                'type'  => 'text',
            ),
            array(
                'name'  => __( 'Duration', 'textdomain' ),
                'id'    => '_stats_duration',
                'type'  => 'text',
            ),
            array(
                'name'  => __( 'Location', 'textdomain' ),
                'id'    => '_stats_location',
                'type'  => 'text',
            ),
        )
    );

    $meta_boxes[] = array(
        'title'      => __( 'Project Testimonial', 'textdomain' ),
        'post_types' => array( 'project'),
        'context'    => 'normal',
        'priority'   => '',
        'fields' => array(
            array(
                'name'  => __( 'Quotation', 'textdomain' ),
                'id'    => $prefix . '_quote',
                'type'  => 'textarea',
            ),
            array(
                'name'  => __( 'Source', 'textdomain' ),
                'id'    => $prefix . '_quote_name',
                'type'  => 'text',
            ),
            array(
                'name'  => __( 'Source Title', 'textdomain' ),
                'id'    => $prefix . '_quote_title',
                'type'  => 'text',
            )
        )
    );

    $meta_boxes[] = array(
        'title'      => __( 'Project Gallery', 'textdomain' ),
        'post_types' => array( 'project'),
        'context'    => 'normal',
        'priority'   => '',
        'fields' => array(
            array(
                'name'   => 'Group', // Optional
                'id'     => $prefix . 'gallery',
                'type'   => 'group',
                'collapsible' => true,
                'group_title' => 'Image {#}',
                // List of sub-fields
                'fields' => array(
                    array(
                        'name' => 'Image',
                        'id'   => $prefix . 'gallery_s_image',
                        'type' => 'file_input',
                    ),
                    array(
                        'name' => 'Caption',
                        'id'   => $prefix . 'gallery_s_caption',
                        'type' => 'textarea',
                    ),
                    // Other sub-fields here
                ),
            ),
        )
    );

    $meta_boxes[] = array(
        'title'      => __( 'Accent Assets', 'textdomain' ),
        'post_types' => array( 'project'),
        'context'    => 'normal',
        'priority'   => '',
        'fields' => array(
            array(
                'name'        => 'Select a Video',
                'id'          => '_video_select',
                'type'        => 'post',
            
                // Post type.
                'post_type'   => 'video',
            
                // Field type.
                'field_type'  => 'select_advanced',
            
                // Placeholder, inherited from `select_advanced` field.
                'placeholder' => 'Select a video',
            ),
            array(
                'name'        => 'Select a Testimonial',
                'id'          => '_test_select',
                'type'        => 'post',
            
                // Post type.
                'post_type'   => 'testimonial',
            
                // Field type.
                'field_type'  => 'select_advanced',
            
                // Placeholder, inherited from `select_advanced` field.
                'placeholder' => 'Select a testimonial',
            ),
            array(
                'name'        => 'Select a Gallery',
                'id'          => '_slide_select',
                'type'        => 'post',
            
                // Post type.
                'post_type'   => 'gallery',
            
                // Field type.
                'field_type'  => 'select_advanced',
            
                // Placeholder, inherited from `select_advanced` field.
                'placeholder' => 'Select a gallery',
            ),
        )
    );

    return $meta_boxes;
}
?>