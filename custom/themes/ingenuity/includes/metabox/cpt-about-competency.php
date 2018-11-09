<?php
add_filter( 'rwmb_meta_boxes', 'team_register_meta_boxes' );
function team_register_meta_boxes( $meta_boxes ) {

    //$prefix = '_culture_';

    $meta_boxes[] = array(
        'title'      => 'Methodology',
        'post_types' => array( 'page'),
        'context'    => 'normal',
        'priority'   => '',
        'visible' => array( 'parent_id', '!=', '' ),
        'fields' => array(
            array(
                'name'  => 'Heading',
                'id'    => 'methodology_heading',
                'type'  => 'text',
            ),
            array(
                'name'  => 'Sub Heading',
                'id'    => 'methodology_blurb',
                'type'  => 'text',
            ),
            array(
                'id'     => 'methodology_icons',
                'type'   => 'group',
                'clone'  => true,
                'sort_clone' => true,
                'fields' => array(
                    array(
                        'name'  => 'Icon',
                        'id'    => 'icon_image',
                        'type'  => 'image',
                    ),
                ),
            ),
        )
    );

    $meta_boxes[] = array(
        'title'      => 'Mission/Approach',
        'post_types' => array( 'page'),
        'context'    => 'normal',
        'priority'   => '',
        'visible' => array( 'parent_id', '!=', '' ),
        'fields' => array(
            array(
                'name'  => 'Heading',
                'id'    => 'mission_heading',
                'type'  => 'text',
            ),
            array(
                'name'  => 'Sub Heading',
                'id'    => 'mission_blurb',
                'type'  => 'text',
            ),
            array(
                'name'  => 'CTA Link',
                'id'    => 'mission_link',
                'type'  => 'text',
            ),
        )
    );

    $meta_boxes[] = array(
        'title'      => 'Skills/People',
        'post_types' => array( 'page'),
        'context'    => 'normal',
        'priority'   => '',
        'visible' => array( 'parent_id', '!=', '' ),
        'fields' => array(
            array(
                'name'  => 'Heading',
                'id'    => 'skills_heading',
                'type'  => 'text',
            ),
            array(
                'name'  => 'Image',
                'id'    => 'skills_image',
                'type'  => 'image',
            ),
            array(
                'name'  => 'Sub Heading',
                'id'    => 'skills_blurb',
                'type'  => 'text',
            ),
            array(
                'name'  => 'CTA Link',
                'id'    => 'skills_link',
                'type'  => 'text',
            ),
        )
    );

    $meta_boxes[] = array(
        'title'      => 'Experience',
        'post_types' => array( 'page'),
        'context'    => 'normal',
        'priority'   => '',
        'visible' => array( 'parent_id', '!=', '' ),
        'fields' => array(
            array(
                'name'  => 'Heading',
                'id'    => 'experience_heading',
                'type'  => 'text',
            ),
            array(
                'name'  => 'Image',
                'id'    => 'experience_image',
                'type'  => 'image',
            ),
            array(
                'name'  => 'Sub Heading',
                'id'    => 'experience_blurb',
                'type'  => 'text',
            ),
            array(
                'name'  => 'CTA Link',
                'id'    => 'experience_link',
                'type'  => 'text',
            ),
        )
    );

    return $meta_boxes;
}
?>