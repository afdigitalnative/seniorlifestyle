<?php
$args = array(
    'post_type' => 'market',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'orderby' => 'menu_order',
    'order' => 'ASC',
    'post__not_in' => [$post->ID]
);

$markets = new WP_Query($args);
?>
<section class="bg-light py-5 py-md-6">
    <div class="container">
        <h2 class="text-center mb-5">Other Popular Senior Lifestyle Cities</h2>
        <div class="row justify-content-between">
            <?php
            if ($markets->have_posts()) :
                // echo"<pre>";
                // print_r($markets);die;
                $i = 0;
                while ($markets->have_posts()) : $markets->the_post();
                    $market_name = get_field('market_name');
                    $new_array[$market_name]['permalink'] = get_permalink();
                    $new_array[$market_name]['market_name'] = $market_name;
                    ksort($new_array);
                    $i++;
                endwhile;
                foreach ($new_array as $market_info) {
            ?>
                    <div class="col-md-4 pb-3 text-center">
                        <a href="<?php echo $market_info['permalink']; ?>"><?php echo $market_info['market_name'] ?></a>
                    </div>
            <?php
                };

            endif;

            wp_reset_postdata(); ?>
        </div>
        <div class="text-center">
            <a class="btn btn-primary-lightblue" href="/market">View All Popular Cities</a>
        </div>
    </div>
    </div>