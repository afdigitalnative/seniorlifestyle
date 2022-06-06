<?php
/**
 * Template Name: Lifestyle Staff List Page
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

                    <?php get_template_part( 'template-parts/components/hero' ); ?>

                    <div class="fancy-hr full-width py-2" id="executive_leadership"><img class="fancy-hr-img" src="/wp-content/themes/senior-lifestyle-child/assets/img/pattern/patt_1_blue.svg" /></div>

                    <?php get_template_part( 'template-parts/staff/executive-leadership' ); ?>
                    
                    <div class="fancy-hr full-width py-2" id="senior_leadership"><img class="fancy-hr-img" src="/wp-content/themes/senior-lifestyle-child/assets/img/pattern/patt_1_blue.svg" /></div>

                    <?php get_template_part( 'template-parts/staff/senior-leadership' ); ?>

                    <div class="fancy-hr full-width py-2"><img class="fancy-hr-img" src="/wp-content/themes/senior-lifestyle-child/assets/img/pattern/patt_1_blue.svg" /></div>

                    <?php  get_template_part( 'template-parts/components/call-to-action' ); ?>

                </article>

            <?php endwhile; ?>

        </div><!-- container -->
    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
