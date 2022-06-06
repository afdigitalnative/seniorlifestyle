<?php
/**
 * Template Name: Lifestyle Landing Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Senior_Lifestyle_Child
 */

get_header();
global $post;


?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <div class="container">
            <?php while ( have_posts() ) : the_post(); ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <?php
                    if ( is_page('careers')) {
                        get_template_part( 'template-parts/components/alert' );
                    }

                    get_template_part( 'template-parts/components/hero' );

                    if ( is_page( array( 'about', 'how-veterans-benefits-apply-to-retirement-communities', 'additional-ways-to-pay-for-assisted-living', 'lifestyle-option-quiz', 'covid-19') ) ) {
                        get_template_part( 'template-parts/components/content-area' );
                    }

                    if ( is_page( array( 'about', 'resources', 'financial-planning', 'senior-living-and-care-options', 'lifestyle-option-quiz', 'covid-19', 'market' ) ) ) {
                        get_template_part( 'template-parts/components/page-blurbs' );
                    }

                    if ( is_page('senior-lifestyle-activities')) {
                        get_template_part( 'template-parts/components/lifestyle-activities' );
                    }
                    
                    // if ( is_page('senior-lifestyle-values')) {
                    //     get_template_part( 'template-parts/components/values' );
                    // }

                    if ( is_page('guides')) {
                        get_template_part( 'template-parts/components/downloadable-resources' );
                    }

                    if ( is_page('careers')) {
                        get_template_part( 'template-parts/components/lifestyle-careers' );
                    }

                    get_template_part( 'template-parts/components/call-to-action' );
                ?>

                </article>

            <?php endwhile; ?>
        </div><!-- container -->
    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
