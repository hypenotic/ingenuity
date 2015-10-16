<?php //Connect CPT
$args = array(
    'has_archive' => true,
    'menu_icon' => 'dashicons-admin-multisite', //http://melchoyce.github.io/dashicons/
    'supports'  => array( 'title', 'editor', 'page-attributes' ),
    'taxonomies' => array('category'),
    'show_in_rest' => true
    );
$projects = register_cuztom_post_type('Project', $args);
$projects->add_meta_box(
    'banner',
    'Hero Banner', 
    array(
        array(
            'name'          => 'image',
            'label'         => 'Banner Image',
            'description'   => 'Dimensions 1200px x 800px',
            'type'          => 'image',
        ),
        array(
            'name'          => 'heading',
            'label'         => 'Banner Text',
            'description'   => 'Enter text',
            'type'          => 'text',
            
        ),
        array(
            'name'          => 'subheading',
            'label'         => 'Banner Subheading',
            'description'   => 'Enter text',
            'type'          => 'text'
            
        )
    )
);

$projects->add_meta_box(
    'blurb',
    'Hero Blurb', 
    array(
        array(
            'name'          => 'heroblurb',
            'label'         => 'Hero Blurb',
            'description'   => '',
            'type'          => 'textarea',
        )
    )
);

$projects->add_meta_box(
    'stats',
    'Project Stats', 
    array(
        array(
            'name'          => 'client',
            'label'         => 'Client',
            'description'   => '',
            'type'          => 'text',
        ),
        array(
            'name'          => 'sf',
            'label'         => 'Square Footage',
            'description'   => '',
            'type'          => 'text',
            
        ),
        array(
            'name'          => 'budget',
            'label'         => 'Budget',
            'description'   => '',
            'type'          => 'text',
            
        ),
        array(
            'name'          => 'duration',
            'label'         => 'Duration',
            'description'   => '',
            'type'          => 'text',
            
        ),
        array(
            'name'          => 'location',
            'label'         => 'Location',
            'description'   => '',
            'type'          => 'text',
            
        )
    )
);

$projects->add_meta_box(
    'video',
    'Video <i>(Optional)</i>',
    array(
        array(
        'name'          => 'select',
        'label'         => 'Select a related video',
        'description'   => '',
        'type'          => 'post_select',
        'args'          => array(
            'post_type' => 'video',
            'show_option_none' => "Select a video",
            )
        )
    )
);

$projects->add_meta_box(
    'testimonial',
    'Testimonial <i>(Optional)</i>',
    array(
        array(
        'name'          => 'select',
        'label'         => 'Select a testimonial',
        'description'   => '',
        'type'          => 'post_select',
        'args'          => array(
            'post_type' => 'testimonial',
            'show_option_none' => "Select a testimonial",
            )
        )
    )
);

$projects->add_meta_box(
    'gallery',
    'Gallery <i>(Optional)</i>',
    array(
        array(
        'name'          => 'select',
        'label'         => 'Select a testimonial',
        'description'   => '',
        'type'          => 'post_select',
        'args'          => array(
            'post_type' => 'gallery',
            'show_option_none' => "Select a gallery",
            )
        )
    )
);


?>