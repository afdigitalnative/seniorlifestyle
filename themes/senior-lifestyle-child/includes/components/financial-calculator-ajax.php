<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    //ajax
    function property_by_state_func() {        
        $state = $_POST['state'];
        $posts = get_posts(array(
            'numberposts'	=> -1,
            'post_type'		=> 'community',
            'meta_key'		=> 'general_information_community_address_state',
            'meta_value'	=> $state
        ));
        for($i=0;$i<sizeof($posts);$i++){
            $posts[$i]->general_information_community_rate = get_field('general_information_community_rate',$posts[$i]->ID);
        }
        echo json_encode($posts);
        die();
    }

    function property_by_city_func() {        
        $city = $_POST['city'];
        $posts = get_posts(array(
            'numberposts'	=> -1,
            'post_type'		=> 'community',
            'meta_key'		=> 'general_information_community_address_city',
            'meta_value'	=> $city
        ));
        for($i=0;$i<sizeof($posts);$i++){
            $posts[$i]->general_information_community_rate = get_field('general_information_community_rate',$posts[$i]->ID);
        }
        echo json_encode($posts);
        die();
    }

    function get_cities_by_state() {
        // TODO: join posts with status set to 'published'. Currently grabs cities with locations that are not published.
        global $wpdb;
        $state = $_POST['state'];
        $query = "SELECT DISTINCT cities.meta_value AS city
                    FROM wp_postmeta states
                    LEFT JOIN wp_postmeta cities ON
                        cities.post_id = states.post_id AND
                        cities.meta_key = 'general_information_community_address_city'
                    LEFT JOIN wp_posts communities ON
    	                communities.ID = states.post_id AND
                        communities.post_status = 'publish'
                    WHERE states.meta_key = 'general_information_community_address_state' AND
                        states.meta_value = '" . $state . "' AND
                        communities.ID IS NOT NULL
                    ORDER BY cities.meta_value";
        $community_cities = $wpdb->get_results($query);
        echo json_encode($community_cities);
        die();
    }
    
    add_action('wp_ajax_property_by_state', 'property_by_state_func');
    add_action('wp_ajax_nopriv_property_by_state', 'property_by_state_func');
    add_action('wp_ajax_property_by_city', 'property_by_city_func');
    add_action('wp_ajax_nopriv_property_by_city', 'property_by_city_func');
    add_action('wp_ajax_get_cities_by_state', 'get_cities_by_state');
    add_action('wp_ajax_nopriv_get_cities_by_state', 'get_cities_by_state');