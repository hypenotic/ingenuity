<?php

$meta_boxes[] = array(
    'title'      => 'Competency - Methodology',
    'post_types' => array( 'page'),
    'context'    => 'normal',
    'priority'   => '',
    'visible' => array( 'parent_id', '!=', '' ),
    'fields' => array(
        array(
            'name'  => 'Heading',
            'id'    => 'methodology_heading',
            'type'  => 'textarea',
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
    'title'      => 'Competency - Mission/Approach',
    'post_types' => array( 'page'),
    'context'    => 'normal',
    'priority'   => '',
    'visible' => array( 'parent_id', '!=', '' ),
    'fields' => array(
        array(
            'name'  => 'Heading',
            'id'    => 'mission_heading',
            'type'  => 'textarea',
        ),
        array(
            'name'  => 'Sub Heading',
            'id'    => 'mission_blurb',
            'type'  => 'text',
        ),
        array(
            'name'  => 'CTA Link Text',
            'id'    => 'mission_link_text',
            'type'  => 'text',
        ),
        array(
            'name'  => 'CTA Link URL',
            'id'    => 'mission_link_url',
            'type'  => 'text',
        ),
    )
);

$meta_boxes[] = array(
    'title'      => 'Competency - Skills/People',
    'post_types' => array( 'page'),
    'context'    => 'normal',
    'priority'   => '',
    'visible' => array( 'parent_id', '!=', '' ),
    'fields' => array(
        array(
            'name'  => 'Heading',
            'id'    => 'skills_heading',
            'type'  => 'textarea',
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
            'name'  => 'CTA Link Text',
            'id'    => 'skills_link_text',
            'type'  => 'text',
        ),
        array(
            'name'  => 'CTA Link URL',
            'id'    => 'skills_link_url',
            'type'  => 'text',
        ),
    )
);

$meta_boxes[] = array(
    'title'      => 'Competency - Experience',
    'post_types' => array( 'page'),
    'context'    => 'normal',
    'priority'   => '',
    'visible' => array( 'parent_id', '!=', '' ),
    'fields' => array(
        array(
            'name'  => 'Heading',
            'id'    => 'experience_heading',
            'type'  => 'textarea',
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
            'name'  => 'CTA Link Text',
            'id'    => 'experience_link_text',
            'type'  => 'text',
        ),
        array(
            'name'  => 'CTA Link URL',
            'id'    => 'experience_link_url',
            'type'  => 'text',
        ),
    )
);
?>