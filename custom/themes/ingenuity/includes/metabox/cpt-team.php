<?php
add_filter( 'rwmb_meta_boxes', 'team_register_meta_boxes' );
function team_register_meta_boxes( $meta_boxes ) {

    $prefix = '_team_';

    $meta_boxes[] = array(
        'title'      => __( 'Member Details', 'textdomain' ),
        'post_types' => array( 'team'),
        'context'    => 'normal',
        'priority'   => '',
        'fields' => array(
            // array(
            //     'name'  => __( 'Full Name', 'textdomain' ),
            //     'id'    => $prefix . 'name',
            //     'type'  => 'text',
            // ),
            array(
                'name'  => __( 'Credentials', 'textdomain' ),
                'id'    => $prefix . 'creds',
                'type'  => 'text',
            ),
            array(
                'name'  => __( 'Job Title', 'textdomain' ),
                'id'    => $prefix . 'job_title',
                'type'  => 'text',
            ),
            array(
                'id'   => $prefix . 'section',
                'name' => __( 'Section', 'textdomain' ),
                'type' => 'radio',
                'options' => array(
                    'leadership' => 'Leadership',
                    'foundation' => 'Foundation',
                ),
                // Show choices in the same line?
                'inline' => false,
            ),
            array(
                'name'  => __( 'Movie', 'textdomain' ),
                'id'    => $prefix . 'movie',
                'type'  => 'file_input',
            ),
            array(
                'name'  => __( 'Extra Image', 'textdomain' ),
                'id'    => $prefix . 'extra_image',
                'type'  => 'file_input',
            ),
        )
    );

    return $meta_boxes;
}
?>