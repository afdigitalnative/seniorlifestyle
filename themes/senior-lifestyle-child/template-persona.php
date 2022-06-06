<?php

/**
 * Template Name: Persona Page Template
 *
 * @package Senior_Lifestyle_Child
 *
 */

global $post;

get_header(); ?>

<div id="primary" class="content-area persona-page">
    <main id="main" class="site-main py-0" role="main">

        <?php while (have_posts()) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php 
					get_template_part('template-parts/persona/hero');
					get_template_part('template-parts/persona/experience');
					get_template_part('template-parts/persona/lifestyle-options');
					get_template_part('template-parts/components/callout-box-alt');
					get_template_part('template-parts/persona/process');
					get_template_part('template-parts/persona/resources');
					get_template_part('template-parts/components/find-community-alt');
				?>
			</article>

        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>