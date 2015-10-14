<?php //Connect CPT
$args = array(
    'has_archive' => true,
    'menu_icon' => 'dashicons-admin-comments', // http://melchoyce.github.io/dashicons/
    'supports'  => array( 'title', 'editor', 'page-attributes' ),
    'taxonomies' => array('category'),
    'show_in_rest' => true
    );
$testimonials = register_cuztom_post_type('Testimonial', $args);
$testimonials->add_meta_box(
    'single',
    'Testimonials', 
    array(
        array(
            'name'          => 'quotation',
            'label'         => 'Testimonial',
            'description'   => '',
            'type'          => 'textarea',
        ),
        array(
            'name'          => 'source',
            'label'         => 'Source',
            'description'   => '',
            'type'          => 'text',
            
        ),
        array(
            'name'          => 'title',
            'label'         => 'Source Title',
            'description'   => '',
            'type'          => 'text',
            
        )
    )
);
?>