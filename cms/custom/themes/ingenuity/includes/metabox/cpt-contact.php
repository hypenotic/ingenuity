<?php
add_filter( 'rwmb_meta_boxes', 'contact_register_meta_boxes' );
function contact_register_meta_boxes( $meta_boxes ) {

    $prefix = '_contact_';

    $meta_boxes[] = array(
        'title'      => __( 'Details', 'textdomain' ),
        'post_types' => array( 'contact'),
        'context'    => 'normal',
        'priority'   => '',
        'fields' => array(
            array(
                'name'  => __( 'Image', 'textdomain' ),
                'id'    => $prefix . 'image',
                'type'  => 'file_input',
            ),
            array(
                'name'  => __( 'Email', 'textdomain' ),
                'id'    => $prefix . 'email',
                'type'  => 'text',
            ),
            array(
                'name'  => __( 'Email Button', 'textdomain' ),
                'desc'  => 'Please enter the text for the email button/link',
                'id'    => $prefix . 'email_btn',
                'type'  => 'text',
            ),
            array(
                'name'  => __( 'Phone', 'textdomain' ),
                'id'    => $prefix . 'phone',
                'type'  => 'text',
            ),
            array(
                'name'  => __( 'Phone Button', 'textdomain' ),
                'desc'  => 'Please enter the text for the phone button/link',
                'id'    => $prefix . 'phone_btn',
                'type'  => 'text',
            )
        )
    );

    return $meta_boxes;
}
?>