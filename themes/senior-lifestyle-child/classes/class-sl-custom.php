<?php

/**
 * Helper class for custom theme functions, specific to SL needs.
 *
 * @class SL_Custom
 */
final class SL_Custom {

    function __construct() {
    }
    static public function add_body_classes() {
        if ( is_singular('community') ) {
            add_filter( 'body_class', function( $classes ) {
                global $post;
                return array_merge( $classes, array(get_field('general_information_community_type', $post->ID)) );
            } );
        }
    }
    
    static public function add_shortcodes() {
        
    }
}