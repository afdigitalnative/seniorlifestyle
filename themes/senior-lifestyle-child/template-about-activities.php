<?php
/**
 * Template Name: About Activities
 *
 * This is a template for the about/senior-lifestyle-activities.
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
        <section class="link-header">
            <div class="container">
                <section class="section-wrapper">
                    <h1 class="page-title"><?php echo the_title() ?></h1>
                    <?php echo the_content(); ?>
                </section>
            </div>
        </section>
        <div class="container">
            <?php while ( have_posts() ) : the_post(); ?>
            <section class="section-wrapper">
                <?php
                if (have_rows('activity_sections')) :
                    while (have_rows('activity_sections')) : the_row();
                        $section_number = get_sub_field('section_number');
                        $section_title = get_sub_field('section_title');
                        $section_subtitle = get_sub_field('section_subtitle');
                        $section_image = get_sub_field('section_image');
                        $section_text = get_sub_field('text_block');
                        $bullet_point_title = get_sub_field('bullet_point_title');
                        $bullet_points = get_sub_field('bullet_points');
                        
                ?>       

                    <div class="activities-block" id="<?php echo strtolower($section_title);?>">
                        <div class="row image-text py-5">
                            <?php if($section_number%2 == 1){ ?>
                                <div class="col-md-6 text-box-left">
                                    <div class="box-header">
                                        <p class="number"><?php echo $section_number; ?></p>
                                        <h3 class="block-heading"><?php echo $section_title; ?><br> 
                                        <span class="block-heading-small"><?php echo $section_subtitle;?></span></h3>
                                    </div>
                                    <p class="section-text"><?php echo $section_text ?></p>
                                </div>
                                <div class="col-md-6 image-box-right">
                                    <img src="<?= $section_image['url']; ?>" alt="<?= $section_image['alt'] ?>"/>
                                </div>
                            <?php } else if($section_number%2 == 0){ ?>
                                <div class="col-md-6 image-box-left">
                                    <img class="layout-placeholder" src="<?= $section_image['url']; ?>" alt=""/>                                    
                                    <img class="displayed-image" src="<?= $section_image['url']; ?>" alt="<?= $section_image['alt'] ?>"/>
                                </div>
                                <div class="col-md-6 text-box-right">
                                    <div class="box-header">
                                        <p class="number"><?php echo $section_number; ?></p>
                                        <h3 class="block-heading"><?php echo $section_title; ?><br> 
                                        <span class="block-heading-small"><?php echo $section_subtitle;?></span></h3>
                                    </div>
                                    <p class="section-text"><?php echo $section_text ?></p>
                                </div>

                            <?php };?>
                        </div>
                        <div class="row py-3">
                            <div class="col-md-12">
                                <h4 class="bullet-point-title py-3"> <?php echo $bullet_point_title; ?> </h4>
                            </div>
                            <?php echo $bullet_points; ?>
                        </div>
                    </div>
                    <?php endwhile;
                    endif;
                    wp_reset_postdata() ?>
            </section>
            <section class="section-wrapper bottom-text py-4">
                <div class="fancy-hr">
                    <img src="/wp-content/themes/senior-lifestyle-child/assets/img/pattern/patt_1_blue.svg" alt=""/>
                </div>
                <?php if ('bottom_text'){
                    echo get_field('bottom_text');
                }?>
            </section>
            <?php endwhile; ?><!--end Wordpress loop -->
        </div><!--container-->
        <!-- Full width CTA -->
        <?php
        get_template_part( 'template-parts/components/find-community' );
        ?>
    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>