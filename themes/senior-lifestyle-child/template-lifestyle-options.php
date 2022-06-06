<?php

/**
 * Template Name: Lifestyle Options
 *
 * @package Senior_Lifestyle_Child
 *
 */

global $post;
$memory_care = is_page('memory-care-for-seniors');

$has_location_section = get_field('find_your_location_section', $post->ID);

$callout_boxes = get_field('callout_boxes');

$general_section_fields = get_field('general');
$loc_page = $general_section_fields['loc_page'];
$loc_color_scheme = $general_section_fields['loc_color_scheme'];

function get_callout_boxes($row)
{
    $memory_care = is_page('memory-care-for-seniors');

    if (have_rows('callout_boxes')) {
        $count = 0;
        while (have_rows('callout_boxes')) {
            the_row();
            $count++;

            $title = get_sub_field('callout_title');
            $content = get_sub_field('callout_content');
            $link = get_sub_field('callout_link');
            $disclaimer = get_sub_field('callout_disclaimer');

            if ($row === $count) {
                if ($memory_care) {
                    include(locate_template('template-parts/lifestyle-options-loc/callout-box.php', false, false));
                } else {
                    include(locate_template('template-parts/lifestyle-options/callout-box.php', false, false));
                }
            }
        }
    }
}

$has_location_section = get_field('find_your_location_section');

get_header(); ?>

<div id="primary" class="content-area lifestyle-options-page <?php echo $loc_color_scheme ; ?>">
    <main id="main" class="site-main" role="main">

        <?php while (have_posts()) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php 
					get_template_part('template-parts/lifestyle-options/hero');
					get_template_part('template-parts/lifestyle-options/section-who-is-right');
					
					if (!$memory_care) {
						get_template_part('template-parts/lifestyle-options/services-section');	
					}
					
					get_template_part('template-parts/lifestyle-options/experience-section');
					get_template_part('template-parts/lifestyle-options/section-callout-box');
					get_template_part('template-parts/lifestyle-options/section-how-to-find');
					get_template_part('template-parts/lifestyle-options/section-callout-box-alt');
					get_template_part('template-parts/lifestyle-options/section-values');
					get_template_part('template-parts/lifestyle-options/section-faq');
				?>
			</article>

            <?php if ($has_location_section) {
                //get_template_part('template-parts/components/find-your-location-state-list');
            } ?>

        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>