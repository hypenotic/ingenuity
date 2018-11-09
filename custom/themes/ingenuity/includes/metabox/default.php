<?php
/**
* README: Wordpress Custom Page Templates
* Within this ../cpt folder, place all the necessary CPTs if you want to
* break the templates up into separate pieces.
*/
add_filter( 'rwmb_meta_boxes', 'pc_register_default' );
function pc_register_default( $meta_boxes ) {

    include 'mb-about-competency.php';
    include 'mb-about-culture.php';

    return $meta_boxes;
}
?>