<?php

/**
 * The main Front (Home) Page template file
 *
 * This is for whatever static page is set for the front page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Senior_Lifestyle_Child
 */

get_header();
?>

<section class="fullwidth-section-wrapper">
    <?php
    $search_text = "";
    global $MYSTATE;
    global $MYCITY;

    if ($MYSTATE != "" && $MYCITY != "") {
        $search_text .= '<h3>Find a Community in ' . stripslashes($MYCITY) . ', ' . $MYSTATE . '</h3>';
        $search_text .= '<p>or another location</p>';
        $search_link = '/find-community/?place=' . urlencode(strtolower($MYCITY) . ',' . strtolower($MYSTATE));
    } else if ($MYSTATE != "") {
        $search_text .= '<h3>Find a Community in ' . $MYSTATE . '</h3>';
        $search_text .= '<p>or another location</p>';
        $search_link = '/find-community/?place=' . urlencode(strtolower($MYSTATE));
    } else {
        $search_text .= '<h3>Find a Community</h3>';
        $search_link = '/find-community/';
    }

    // section 1
    if (have_rows('section_1')) :
        while (have_rows('section_1')) : the_row();
            $section_1_title = get_sub_field('section_1_title');
            $section_1_text = get_sub_field('section_1_text');
        endwhile;
    endif;
    wp_reset_postdata();
    ?>

    <div class="header-wrap mobile-only">
        <p></p>
    </div>
    <div class="header-wrap mobile-display">
        <div class="Grid Grid--1of2 hero-container">
            <div class="Grid-cell mobile-hide"></div>
            <div class="Grid-cell">
                <div class="hero-callout-box">
                    <div class="callout-content-top">
                        <h1><?php echo $section_1_title ?></h1>
                        <h2><?php echo $section_1_text ?></h2>
                    </div>
                    <div class="callout-content-bottom">
                        <?= $search_text ?>
                        <a href="<?= $search_link ?>" class="btn-primary-lightblue">Find a Community</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="fullwidth-section-wrapper white pb-5 pt-5" style="background-color: #f4f4f4;">
    <div class="container">
        <div class="row">
            <div class="col">
                <?php
                    if (have_rows('slc_values')) :
                        while (have_rows('slc_values')) : the_row();
                            $values_title = get_sub_field('values_heading');
                            $values_copy = get_sub_field('values_copy');
                            $values_button = get_sub_field('values_button');
                            $values_link = get_sub_field('values_url');
                        endwhile;
                    endif;
                    wp_reset_postdata();
                    ?>

                <h2><?php echo $values_title ?></h2>
                <?php echo $values_copy ?>
                <p class="mb-0"><a class="btn-primary-lightblue" href="<?php echo $values_link ?>"><?php echo $values_button ?></a></p>
            </div>
        </div>
    </div>
</section>

<section class="fullwidth-section-wrapper white">
    <div class="container">
        <?php get_template_part('template-parts/home-alert'); ?>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <h2><?php the_title() ?></h2>
                <?php the_content(); ?>
        <?php endwhile;
        endif; ?>

        <div class="Grid Grid--gutters Grid--cols-3 centerText">
            <?php
            if (have_rows('section_2')) :

                while (have_rows('section_2')) : the_row();
                    // vars
                    $column_image = get_sub_field('column_image');
                    $column_title = get_sub_field('column_title');
                    $column_text = get_sub_field('column_text');
                    $button_label = get_sub_field('url_text');
                    $button_url = get_sub_field('url_link');
            ?>
                    <div class="Grid-cell choices-box-wrapper">
                        <div class="choices-box">
                            <a href="<?php echo $button_url ?>">
                                <?php echo wp_get_attachment_image($column_image, 'col-4-img'); ?>
                            </a>
                            <h4><?php echo $column_title ?></h4>
                            <?php echo $column_text ?>
                            <a href="<?php echo $button_url ?>"><?php echo $button_label ?></a>
                        </div>
                        <hr class="mobile-only">
                    </div>
            <?php
                endwhile;
            endif;
            wp_reset_postdata();
            ?>
        </div>
        <div class="limited-width-wrapper">
            <?php echo get_field('lifestyle_options_text') ?>
            <p><a href="<?php echo get_field('lifestyle_options_url') ?>" class="btn-primary-navy"><?php echo get_field('lifestyle_options_button') ?></a></p>
        </div>
    </div>
</section>

<section class="fullwidth-section-wrapper teal">
    <div class="container">
        <?php
        if (have_rows('section_3')) :
            while (have_rows('section_3')) : the_row();
                // vars
                $section_content_title = get_sub_field('section_content_title');
                $section_content_text = get_sub_field('section_content_text');
                $button_label = get_sub_field('url_text');
                $button_url = get_sub_field('url_link');
            endwhile;
        endif;
        wp_reset_postdata();
        ?>
        <h2><?php echo $section_content_title ?></h2>
        <?php echo $section_content_text ?>

        <div class="Grid Grid--gutters Grid--cols-3 centerText">
            <div class="Grid-cell teal-box-wrapper">
                <h4>Ebooks</h4>
                <div class="teal-box">
                    <ul>
                        <?php
                        if (have_rows('e-books', 17846)) :
                            while (have_rows('e-books', 17846)) : the_row();
                                $ebook_content_title = get_sub_field('ebook_content_title');
                                $ebook_link_url = get_sub_field('ebook_link_url');
                        ?>
                                <li><a href="<?php echo $ebook_link_url ?>"><?php echo $ebook_content_title ?></a></li>

                        <?php endwhile;
                        endif;
                        wp_reset_postdata();
                        ?>
                    </ul>
                    <a class="teal-simple-link" href="/resources/guides/" target="_self" title="See more Ebooks">See More</a>
                </div>
            </div>

            <div class="Grid-cell teal-box-wrapper">
                <h4>Blog posts</h4>
                <div class="teal-box">
                    <ul>
                        <?php $the_query = new WP_Query('posts_per_page=3'); ?>
                        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                            <li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>
                        <?php
                        endwhile;
                        wp_reset_postdata();
                        ?>
                    </ul>
                    <a class="teal-simple-link" href="/resources/blog/" target="_self" title="See more Blog Posts">See More</a>
                </div>
            </div>

            <div class="Grid-cell teal-box-wrapper">
                <h4>Financial Planning</h4>
                <div class="teal-box">
                    <ul>
                        <?php
                        if (have_rows('financial_planning_links')) :
                            while (have_rows('financial_planning_links')) : the_row();
                                $planning_link_text = get_sub_field('planning_link_text');
                                $planning_link_url = get_sub_field('planning_link_url');
                        ?>
                                <li><a href="<?php echo $planning_link_url ?>"><?php echo $planning_link_text ?></a></li>
                        <?php endwhile;
                        endif;
                        wp_reset_postdata(); ?>
                    </ul>
                    <a class="teal-simple-link" href="/resources/financial-planning/" target="_self" title="See more Finnacial Planning">See More</a>
                </div>
            </div>
        </div>

        <div class="limited-width-wrapper">
            <a class="btn-primary-navy" href="<?php echo $button_url ?>"><?php echo $button_label ?></a>
        </div>
    </div>
</section>

<section class="fullwidth-section-wrapper white wellness">
    <div class="container">
        <?php
        if (have_rows('section_4')) :
            while (have_rows('section_4')) : the_row();
                $section_4_title = get_sub_field('section_4_title');
                $section_4_text = get_sub_field('section_4_text');
                $button = get_sub_field('button');
                $section_4_image = get_sub_field('section_4_image');
            endwhile;
        endif;
        wp_reset_postdata();
        ?>

        <div class=" wellness-box-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <div class="row mobile-align">
                        <div class="col-md-6 mobile-order-right pad-right ">
                            <div class="wellness-box">
                                <h2><?php echo $section_4_title ?></h2>
                                <?php echo $section_4_text ?>
                                <div class="limited-width-wrapper">
                                    <a class="btn-primary-navy" href="<?php echo $button['url'] ?>" target="<?php echo $button['target'] ?>"><?php echo $button["title"] ?></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mobile-order-left">
                            <div class="wellness-box">
                                <a href="<?php echo $button['url'] ?>"><?php echo wp_get_attachment_image( $section_4_image, 'col-6-img' ); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <h2><?php echo get_field('lifestyle_reviews_title') ?></h2>
        <?php echo get_field('lifestyle_reviews_text') ?>
    </div>
</section>

<section class="fullwidth-section-wrapper white">
    <div class="container">
        <?php            
            echo do_shortcode('[testimonials-slider section=front-page]'); 
            get_template_part('template-parts/components/call-to-action'); 
        ?>
    </div>
</section>

<?php
get_footer();
