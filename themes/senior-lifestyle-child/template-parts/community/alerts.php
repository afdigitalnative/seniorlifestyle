<?php
    $today = current_time('Ymd');
    $alerts = get_posts(array(
        'post_type' => 'alert',
        'meta_query' => array(
            array(
                'key' => 'community_locations', // name of custom field
                'value' => '"' . get_the_ID() . '"', // matches exactly "123", not just 123. This prevents a match for "1234"
                'compare' => 'LIKE'
            ),
            array(
                'key' => 'alert_start_date', // name of custom field
                'value'   => $today,
                'compare' => '<='
            ),
            array(
                'key' => 'alert_end_date', // name of custom field
                'value'   => $today,
                'compare' => '>='
            )

        )
    ));

?>

<?php if ($alerts) : ?>

<section class="alerts-section">

    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-10 col-lg-8">
            <?php foreach($alerts as $alert) :
                $alert_type = get_field( 'alert_type', $alert->ID );
            ?>
                <div class="alert-block">
                    <div class="alert-icon">
                        <?php if ($alert_type == 'high') : ?>
                        <span class="fas fa-exclamation-triangle high-alert"></span>
                        <?php elseif ($alert_type == 'medium') : ?>
                        <span class="fas fa-exclamation-circle medium-alert"></span>
                        <?php endif; ?>
                    </div>
                    <div class="alert-title">
                        <?php echo $alert->post_title; ?>
                    </div>
                    <div class="alert-content">
                        <?php echo $alert->post_excerpt;?>

                        <div class="alert-btn-wrapper">
                            <a href="<?php echo get_permalink($alert->ID); ?>" class=btn-primary "<?php echo $alert_type == 'high' ? 'high-alert' : 'medium-alert'; ?>">See More Details</a>
                        </div>

                    </div>
                </div> <!-- // .alert-block -->
            <?php endforeach; ?>
            </div> <!-- // .col -->
        </div> <!-- // .row -->
    </div> <!-- // .container -->

</section>
<?php endif; ?>
