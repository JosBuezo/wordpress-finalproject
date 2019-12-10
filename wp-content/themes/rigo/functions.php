<?php

/**
* Autoload for PHP Composer and definition of the ABSPATH
*/

//defining the absolute path for the wordpress instalation.
if ( !defined('ABSPATH') ) define('ABSPATH', dirname(__FILE__) . '/');

//including composer autoload
require ABSPATH."vendor/autoload.php";

//including the custom post types
require('setup_types.php');

//including the api endpoints
require('setup_api.php');

//including any monolitic tempaltes
require('setup_templates.php');
add_action( 'pre_get_posts', 'add_my_post_types_to_query' );
 
function add_my_post_types_to_query( $query ) {
    if ( is_home() && $query->is_main_query() )
        $query->set( 'post_type', array( 'post', 'cars' ) );
    return $query;
}
