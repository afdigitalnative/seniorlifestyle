<?php
$template_page_title = is_page_template('template-lifestyle-options.php') ? get_the_title() : '';
$short_name = get_field('short_name');
if ($short_name && preg_match('/^[aeiou]/i', $short_name)) {
    $pre = "an";
} else {
    $pre = "a";
}
$community_states = $wpdb->get_results("SELECT DISTINCT meta_value
                FROM wp_postmeta
                WHERE meta_key = 'general_information_community_address_state' && meta_value != ''
                ORDER BY meta_value");
?>

<section class="find-your-location-state-list">
    <div class="container">
        <div class="fyl-link-wrapper">
            <h2><a href="<?php echo home_url() . '/find-community/?select-lifestyle=' . rawurlencode($short_name); ?>">Find <?php echo $short_name ? $pre . " " . $short_name . " Community" : 'a Community'; ?> Near Me</a></h2>
        </div>
        <!-- NOTE: Possibly loop through a list with the available states/districts -->
        <div class="state-list-wrapper">
            <?php
            $community_taxonomy = get_field('community_category');
            if ($community_taxonomy) :
                $location_and_market = market_locations($community_taxonomy, $community_states);
                $state_counter = 0;
                foreach ($location_and_market as $state => $cities) : ?>
                    <?php
                    if ($state_counter == 0) {
                        echo '<ul class="state-list">';
                    }
                    ?>
                    <!-- creates list of States and their markets that have the current pages Care Option -->
                    <li class="state"><a href="/find-community/?place=<?= urlencode(strtolower($state)) . '&select-lifestyle=' . rawurlencode($short_name) ?>"><?= $state ?></a>
                        <ul class="city-list">
                            <?php foreach ($cities as $city => $url_slug) : ?>
                                <li class="city"><a href="/market/<?= urlencode(strtolower($city)) ?>/<?= urlencode(strtolower($url_slug[0])) ?>/"><?= $city ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                    <?php if ($state_counter == 6) {
                        $state_counter = 0;
                        echo '</ul>';
                    } else {
                        $state_counter++;
                    }
                    ?>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>