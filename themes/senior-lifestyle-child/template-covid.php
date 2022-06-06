<?php
/**
 * Template Name: COVID Template
 *
 * This is a template for the about/senior-lifestyle-values.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Senior_Lifestyle_Child
 */

global $post;
$featured_img = get_the_post_thumbnail_url();
$call_out_overlay = get_field('call_out_overlay');
$call_out_class = $call_out_overlay ? ' call-out-container' : '';
get_header();
?>

<div id="primary" class="content-area about-activities">
    <main id="main" class="site-main" role="main" style="padding-bottom: 0 !important;">
        <?php
            get_template_part( 'template-parts/about/hero' );
        ?>
            <?php
                echo get_field("page_content");
                get_template_part( 'template-parts/about/horizontal-card' );
            ?>

        
    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>