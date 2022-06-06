<?php

// edit me
$geo_api = get_field('geoip_db_api_key', 'sl_options');;

global $MYSTATE;
global $MYCITY;
global $post;

//---------------------------------
// get the browser IP address
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    // is ip from share internet
    $ip_address = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    //is ip from proxy
    $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    //is ip from remote address
    $ip_address = $_SERVER['REMOTE_ADDR'];
    $ip_address = '98.186.252.183';
}

// Check for cookie
if (!isset($_COOKIE["sl-state"]) && $post->post_type != "community") {
    // Cookie is not set
    // Get API code at, http://geoip-db.com/signup "a must have"
    $url = 'https://geoip-db.com/json/' . $geo_api . '/' . $ip_address;
    $json = file_get_contents($url);
    $data = json_decode($json);
    $country_code = $data->country_code;
    $country_name = $data->country_name;

    if ($country_code == "US") {
        //we're in the US so set the cookie
        include get_stylesheet_directory() . '/includes/states_array.php';
        $my_state = array_search($data->state, $states);

        if ($my_state) {
            $MYSTATE = $my_state;
            $MYCITY = $data->city;

            setcookie("sl-state", $MYSTATE, time() + (365 * 24 * 60 * 60), "/"); // 1 year
            setcookie("sl-city", $MYCITY, time() + (365 * 24 * 60 * 60), "/"); // 1 year
        }
        
    }
} else {
    //cookie is already set
    $MYCITY = $_COOKIE["sl-city"];
    $MYSTATE = $_COOKIE["sl-state"];
}

// If page is a location page, update the cookie
if ($post->post_type == "community") {
    $general_information = get_field('general_information') ? get_field('general_information') : array();
    $community_address = $general_information['community_address'];
    $MYSTATE = $community_address['state'];
    $MYCITY = $community_address['city'];
    setcookie("sl-state", $MYSTATE, time() + (365 * 24 * 60 * 60), "/"); // 1 year
    setcookie("sl-city", $MYCITY, time() + (365 * 24 * 60 * 60), "/"); // 1 year
}
//echo $MYCITY.":".$MYSTATE;
