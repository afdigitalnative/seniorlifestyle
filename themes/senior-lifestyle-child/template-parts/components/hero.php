<?php
    global $post;
    $featured_img = get_post_thumbnail_id(get_the_ID(), 'full');
    $call_out_overlay = get_field('call_out_overlay');
    $call_out_class = $call_out_overlay ? ' call-out-container' : '';
?>

<?php if ($featured_img) : ?>
    <?php // display if there is a hero image ?>
    <section class="hero-banner">
        <?php if( !have_rows('alert_section') ): ?>
                <div class="page-title-wrapper">
                    <h1><?php the_title(); ?></h1>
                </div>
        <?php endif; ?>
        <div class="banner-area">
            <div class="banner-img-wrapper<?php echo $call_out_class ?>">
                <?php echo wp_get_attachment_image( $featured_img, 'full', '', ["class" => "cover"] ); ?>
                <?php if ($call_out_overlay) : ?>
                    <div class="call-out-overlay">
                        <?php echo $call_out_overlay; ?>
                    </div>
                <?php endif; ?>
            </div>

            <?php $the_content = apply_filters('the_content', get_the_content()); ?>
            <?php if ( !empty($the_content) ) : ?>
                <div class="banner-content-wrapper">
                    <?php the_content(); ?>
                </div>
            <?php endif; ?>
        </div>
    </section>

<?php else : ?>
<?php // display if there is no hero image ?>
    <section class="text-banner">
        <div class="container">
            <div class="row">
                <div class="col">
                    <?php if( !have_rows('alert_section') ): ?>
                        <div class="page-title-wrapper">
                            <h1><?php the_title(); ?></h1>
                        </div>
                    <?php endif; ?>
                    <?php $the_content = apply_filters('the_content', get_the_content()); ?>
                    <?php if ( !empty($the_content) ) : ?>
                        <div class="text-banner-wrapper">
                            <div class="banner-content-wrapper">
                                <?php the_content(); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif;  ?>
