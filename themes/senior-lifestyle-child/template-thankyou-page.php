<?php
/**
 * Template Name: Thank You Page
 *
 * This template would typically display simple pages like the thankyou page
 * CSS is relatively simple so far
 *
 * @package Senior_Lifestyle_Child
 */

get_header();
?>
<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <div class="container thankyou">

            <?php
            while ( have_posts() ) :
                the_post();

                get_template_part( 'template-parts/content', 'page' );

            endwhile; // End of the loop.
            ?>

        </div><!-- container -->
    </main><!-- #main -->
</div><!-- #primary -->

<?php

get_footer();
