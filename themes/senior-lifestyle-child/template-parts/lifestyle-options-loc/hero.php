<?php

global $post;

$featured_img = get_post_thumbnail_id(get_the_ID(), 'full');

$hero_title = get_field('hero_title') ? get_field('hero_title') : '';
?>

<section class="hero-banner">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="page-title-wrapper">
                    <h1><?php the_title(); ?></h1>
                </div>
                <div class="banner-area">
                    <div class="banner-img-wrapper">
                        <?php echo wp_get_attachment_image( $featured_img, 'full', '', ["class" => "cover"] ); ?>
                    </div>
                    <?php if ( !empty($the_content) ) : ?>
                        <div class="banner-content-wrapper">
                            <h2><?php echo $hero_title; ?></h2>
                            <?php the_content(); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>