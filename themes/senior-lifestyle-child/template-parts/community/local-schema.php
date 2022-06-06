<?php
function local_business_schema ($schema) {
    global $post;

        $general_information = get_field('general_information') ? get_field('general_information') : array();
        $community_address = $general_information['community_address'];

        $streetaddress =  $community_address['street_address'];
        $addressLocality = $community_address['city'];
        $addressRegion = $community_address['state'];
        $postalCode =  $community_address['zip'];
        $telephone = $general_information['community_phone'];
        $priceRange = $general_information['community_rate'];
        $priceRange = floatval($priceRange);

        echo '<!-- Generated Schema-->
        <script type="application/ld+json">
        {
        "@context": "http://schema.org",
        "@type": "LocalBusiness",
        "name": "'.get_the_title().'",
        "image": "'. wp_get_attachment_url( get_post_thumbnail_id() ).'",
        "address": {
        "@type": "PostalAddress",
        "streetAddress": "'. $streetaddress.'",
        "addressLocality": "'.$addressLocality.'",
        "addressRegion": "'.$addressRegion.'",
        "postalCode": "'.$postalCode.'"
        },
        "telephone": "'.$telephone.'",
        "priceRange": "From $'.number_format($priceRange, 0, '.', ',').'"
        }
        </script>';
    }
    // add_action( 'wp_head', 'local_business_schema', 100 );
?>