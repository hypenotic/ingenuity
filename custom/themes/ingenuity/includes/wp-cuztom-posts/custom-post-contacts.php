<?php //Gallery CPT
$args = array(
    'has_archive'   => true,
    'hierarchical'  => true,
    'show_in_nav_menus' => true,
    'menu_icon'     => 'dashicons-phone', //http://melchoyce.github.io/dashicons/
    'supports'      => array( 'title'),
    );
$contact = register_cuztom_post_type('Contact', $args);
$contact->add_meta_box(
    'contact',
    'Contact',
    array(
        'bundle', 
        array(
            array(
                'name'          => 'photo',
                'label'         => 'Picture',
                'description'   => '1:1 Ratio',
                'type'          => 'image',
            ),
            array(
                'name'          => 'heading',
                'label'         => 'Heading',
                'description'   => '',
                'type'          => 'text',
            ),
            array(
                'name'          => 'text',
                'label'         => 'Content',
                'description'   => '',
                'type'          => 'wysiwyg',        
            ),
            array(
                'name'          => 'email',
                'label'         => 'Email',
                'description'   => '',
                'type'          => 'text',      
            ),
            array(
                'name'          => 'emailtext',
                'label'         => 'Email Button Text',
                'description'   => '',
                'type'          => 'text',      
            ),
            array(
                'name'          => 'phone',
                'label'         => 'Phone',
                'description'   => '',
                'type'          => 'text',      
            ),
            array(
                'name'          => 'displayphone',
                'label'         => 'Phone Display Text',
                'description'   => '',
                'type'          => 'text',      
            )
        )
    )
);
?>