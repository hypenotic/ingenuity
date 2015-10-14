<?php //Connect CPT
$args = array(
    'has_archive' => true,
    'menu_icon' => 'dashicons-video-alt2', // http://melchoyce.github.io/dashicons/
    'supports'  => array( 'title', 'editor', 'page-attributes' ),
    'taxonomies' => array('category')  
    );
$videos = register_cuztom_post_type('Video', $args);
$videos->add_meta_box(
    'single',
    'Testimonials', 
    array(
        array(
            'name'          => 'vidfile',
            'label'         => 'Video',
            'description'   => '',
            'type'          => 'file',
        ),
        array(
            'name'          => 'caption',
            'label'         => 'Caption',
            'description'   => '',
            'type'          => 'text',
            
        )
    )
);
?>