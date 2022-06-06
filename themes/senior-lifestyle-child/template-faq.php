<?php
/**
 * Template Name: FAQ Page
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
    
        <?php get_template_part( 'template-parts/about/hero-no-nav' ); ?>
        <div class="container">
            <?php while ( have_posts() ) : the_post(); ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                    <?php
                        // get_template_part( 'template-parts/components/hero');
                        get_template_part( 'template-parts/components/accordion' );
                        get_template_part( 'template-parts/components/page-blurbs' );
                        // get_template_part( 'template-parts/components/call-to-action' );
                    ?>

                </article>

            <?php endwhile; ?>
        </div><!-- container -->
        <!-- Full width CTA -->
        <?php
        get_template_part( 'template-parts/components/find-community' );
        ?> <!-- Full width CTA -->
    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
