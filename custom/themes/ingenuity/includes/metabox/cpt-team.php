<?php
add_filter( 'rwmb_meta_boxes', 'team_register_meta_boxes' );
function team_register_meta_boxes( $meta_boxes ) {

    $prefix = '_team_';

    $meta_boxes[] = array(
        'title'      => __( 'Details', 'textdomain' ),
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

        )
    );

    return $meta_boxes;
}
?>