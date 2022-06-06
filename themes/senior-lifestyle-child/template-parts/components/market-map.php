<?php

/**
 * The template for displaying the locations.
 *
 * Template name: Locations
 *
 * @package locations
 */

require(plugin_dir_path(__FILE__) . '../../includes/states_array.php');

//update cache
function get_communities($wpdb) {

    $communities = get_field('map_communities');

    //location query arguments
    remove_all_filters('posts_orderby');
    $args = array(
        'posts_per_page' => -1,
        'offset' => 0,
        'cat' => '',
        'category_name' => '',
        'orderby' => 'title',
        'order' => 'ASC',
        'include' => '',
        'exclude' => '',
        'meta_key' => '',
        'meta_value' => '',
        'post_type' => 'community',
        'post_mime_type' => '',
        'post_parent' => '',
        'author' => '',
        'author_name' => '',
        'post_status' => 'publish',
        'fields' => '',
        'post__in' => $communities
    );

    $locations = get_posts($args);

    $mms_locations = array();

    //get location meta
    foreach ($locations as $post) {
        $cats = array();
        $meta = get_post_meta($post->ID);
        $obj = array(
            'ID' => $post->ID,
            'post_title' => $post->post_title
        );
        if (!empty($meta['lat']) && !empty($meta['lng'])) {
            $obj['lat'] = $meta['lat'];
            $obj['lng'] = $meta['lng'];
        }
        $obj['general_information_community_address_street_address'] = $meta['general_information_community_address_street_address'];
        $obj['general_information_community_address_city'] = $meta['general_information_community_address_city'];
        $obj['general_information_community_address_state'] = $meta['general_information_community_address_state'];
        $obj['general_information_community_address_zip'] = $meta['general_information_community_address_zip'];
        $obj['general_information_community_phone'] = $meta['general_information_community_phone'];
        $obj['link'] = $post->post_name;
        $post_thumbnail_id = get_post_thumbnail_id($post);
        // $images = get_field('photo_gallery_section_main_photo_gallery', $post->ID);
        $obj['mms_thumb'] = wp_get_attachment_image_url($post_thumbnail_id, 'thumbnail', "");

        $categories = wp_get_post_terms($post->ID, 'community_category');
        for ($i = 0; $i < sizeof($categories); $i++) {
            $cats[] = $categories[$i]->name;
        }
        $obj['cats'] = implode(',', $cats);

        if (isset($obj['lat']) && $obj['lat'] != "" && $obj['post_title'] != 'Austin, TX (headquarters)') {
            array_push($mms_locations, $obj);
        }
    };

    //get settings
    $querystr = "SELECT * FROM wp_options WHERE option_name LIKE 'mms_%'";

    $options = $wpdb->get_results($querystr, OBJECT);
    $mms_options = [];

    for ($i = 0; $i < sizeof($options); $i++) {
        $mms_options[$options[$i]->option_name] = $options[$i]->option_value;
    }

    //get marker icons
    $default = $selected = $highlighted = "";

    if (get_option('mms_marker_default') && get_option('mms_marker_default') != '') {
        $default = wp_get_attachment_url(get_option('mms_marker_default'));
    }

    if (get_option('mms_marker_selected') && get_option('mms_marker_selected') != '') {
        $selected = wp_get_attachment_url(get_option('mms_marker_selected'));
    }

    if (get_option('mms_marker_highlighted') && get_option('mms_marker_highlighted') != '') {
        $highlighted = wp_get_attachment_url(get_option('mms_marker_highlighted'));
    }

    $mms_markers = array(
        'default' => $default,
        'selected' => $selected,
        'highlighted' => $highlighted
    );

    //return json data
    $data = array(
        'options' => $mms_options,
        'locations' => $mms_locations,
        'markers' => $mms_markers
    );

    return $data;
}

function clean($string)
{
    $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

    return preg_replace('/[^A-Za-z0-9]/', '', $string); // Removes special chars.
}

if (!empty($_REQUEST['place'])) {
    $place = urldecode($_REQUEST['place']);
    $pos = strpos($place, ',');

    if ($pos > 0) {
        $city = ucwords(substr($place, 0, $pos));
        $state = strtoupper(substr($place, -2, 2));
        $formatted_place = $city . ", " . $state;
    } else {
        $formatted_place = ucfirst($place);
    }
}

?>

<?php if (!empty(get_field('map_communities'))) :?>
    <section id="mms">
        <div id="mms-container">
            <div id="mms-sidebar-locations">
				<h4 class="map-title"><?php the_field('market_map_section_title'); ?></h4>
                <div id="mms-filters">
                    <input class="map-filter" type="hidden" id="filter-places" <?php if (isset($formatted_place)) echo 'value="' . $formatted_place . '"'; ?> placeholder="Search city, state, or zip" name="filter-places">
                    <select id="select-lifestyle">
                        <option value="">All Lifestyles</option>
                        <option value="Affordable Senior Housing">AH - Affordable Housing</option>
                        <option value="Assisted Living">AL - Assisted Living</option>
                        <option value="Independent Living">IL - Independent Living</option>
                        <option value="Memory Care">MC - Memory Care</option>
                        <option value="Short-Term Care">ST - Short-Term Care</option>
                        <option value="Skilled Nursing">SN - Skilled Nursing</option>
                    </select>
                </div>
                <ul id="mms-list">
                    <?php
                        ob_start();
                        $data = get_communities($wpdb);
                        $locations = $data['locations'];

                        if (!isset($_REQUEST['place']) && (!isset($_COOKIE["sl-geo"]) || $_COOKIE["sl-geo"] == 0)) {
                            // Get location meta
                            $num = 0;
                            foreach ($locations as $obj) {
                                if (isset($obj['lat']) && $obj['lat'] != "") {
                    ?>
                                    <li data-id="<?= $num ?>" id="loc<?= $num ?>">
                                        <div class="location-title">
                                            <div class="title-h2">
                                                <a class="btn-location-list" href="/property/<?= str_replace(' ', '-', strtolower($states[$obj['general_information_community_address_state'][0]])) ?>/<?= $obj['link'] ?>/">
                                                    <h5 class="location-title"><?= $obj['post_title'] ?></h5>
                                                </a>
                                            </div>
                                            <div class="title-mi"></div>
                                        </div>
                                        <div class="location-content">
                                            <div class="img-container">
                                                <a class="btn-location-list" href="/property/<?= str_replace(' ', '-', strtolower($states[$obj['general_information_community_address_state'][0]])) ?>/<?= $obj['link'] ?>/">
                                                    <img src="#" class="mms-featured-img" alt="featured image for <?= $obj['post_title'] ?>" data-src="<?= $obj['mms_thumb'] ?>" />
                                                </a>
                                            </div>
                                            <div class="info-container">
                                                <div>
                                                    <?= $obj['general_information_community_address_street_address'][0] ?>
                                                    <br><?= $obj['general_information_community_address_city'][0] ?>, <?= $obj['general_information_community_address_state'][0] ?> <?= $obj['general_information_community_address_zip'][0] ?>
                                                    <div class="mms-phone-text"><?= $obj['general_information_community_phone'][0] ?></div>
                                                </div>
                                                <div class="blue-pills">
													<div>Lifestyle Options</div>
													<ul>
                                                    <?php
													/*
                                                    if (strpos($obj['cats'], "Assisted Living")) echo '<div class="blue-pill" title="Assisted Living">AL</div>';
                                                    if (strpos($obj['cats'], "Independent Living")) echo '<div class="blue-pill" title="Independent Living">IL</div>';
                                                    if (strpos($obj['cats'], "Memory Care")) echo '<div class="blue-pill" title="Memory Care">MC</div>';
                                                    if (strpos($obj['cats'], "Short-Term Care")) echo '<div class="blue-pill" title="Short-Term Care">ST</div>';
                                                    if (strpos($obj['cats'], "Skilled Nursing")) echo '<div class="blue-pill" title="Skilled Nursing">SN</div>';
                                                    if (strpos($obj['cats'], "Affordable Senior Housing")) echo '<div class="blue-pill" title="Affordable Housing">AH</div>';
													*/
														if (strpos($obj['cats'], "Assisted Living")) echo '<li>Assisted Living</li>';
														if (strpos($obj['cats'], "Independent Living")) echo '<li>Independent Living</li>';
														if (strpos($obj['cats'], "Memory Care")) echo '<li>Memory Care</li>';
														if (strpos($obj['cats'], "Short-Term Care")) echo '<li>Short-Term Care</li>';
														if (strpos($obj['cats'], "Skilled Nursing")) echo '<li>Skilled Nursing</li>';
														if (strpos($obj['cats'], "Affordable Senior Housing")) echo '<li>Affordable Senior Housing</li>';															
                                                    ?>
													</ul>
                                                </div>
                                                <div class="info-btns">
                                                    <a class="btn-primary-lightblue btn-small btn-location-list" href="/property/<?= str_replace(' ', '-', strtolower($states[$obj['general_information_community_address_state'][0]])) ?>/<?= $obj['link'] ?>/">View Info</a>
                                                    <a class="btn-primary-lightblue btn-small mms-btn-phone btn-location-list" href="tel:<?= !empty($obj['_phone'])? clean($obj['_phone'][0]) : '' ?>"><span class="fa fa-phone"></span>&nbsp; Call</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                        <?php
                                $num++;
                            }
                        };
                    } else {
                        ?>
                        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Loading locations...
                    <?php
                    }

                    $output_string = ob_get_contents();
                    ob_end_clean();
                    echo $output_string;

                    ?>

                </ul>
            </div>
            <div id="mms-main-locations">
                <div id="map"></div>
            </div>
        </div>
        <script>
            //remove images before they load
            if (window.innerWidth < 768) {

                var elements = document.getElementsByClassName('img-container');
                if (elements.length > 0) {

                    while (elements.length > 0) {
                        elements[0].parentNode.removeChild(elements[0]);
                    }
                }
            } else {
                var elements = document.getElementsByClassName('mms-featured-img');
                if (elements.length > 0) {

                    for (var i = 0; i < elements.length; i++) {
                        elements[i].setAttribute('src', elements[i].getAttribute("data-src"));
                    }
                }
            }

            var MMSCOMMUNITIES = '<?php echo json_encode($data, JSON_HEX_APOS) ?>';
            var MMSPLACE = 'custom';
        </script>
    </section>
<?php endif; ?>