<?php
/**
 * Template Name: About Values
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
            <!-- <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> -->
                <section class="text-banner mb-5">
                    <div class="container">
                        <h1 class="py-3 page-title"><?php echo the_title(); ?></h1>
                        <div class="row">
                            <div class="col-md-5">
                                <?php echo the_content();?>
                            </div>
                            <div class="col-md-7 nav-desc">
                                <?php if(get_field('desc_text')){
                                    echo get_field('desc_text');
                                };?>
                            </div>                            
                    </div>
                    </div>
                </section>
                <section class="experience-section">

                <?php if (have_rows('value_sections')) :
                $i = 0;
                while (have_rows('value_sections')) : $row = the_row(); ?>
                <?php
                //Section Content
                $section_image = get_sub_field ('section_image');
                $section_title = get_sub_field ('section_title');
                $section_text = get_sub_field ('text_block');
                // Generate excerpt
                $trimmed_content = wp_trim_words($section_text);
                // $section_excerpt = apply_filters('the_excerpt','$trimmed_content');
                $section_excerpt = "Here's a test of the of the excerpt function.";
                //Testimonial
                $section_testimonial = get_sub_field ('testimonial');
                $section_name = get_sub_field ('testimonial_name');
                $section_relationship = get_sub_field ('testimonial_relationship');
                //These correleate to the links in description text box
                $link_array = array('hospitality', 'excellence', 'appreciation', 'respect', 'teamwork');
				
                ?>
                <div class="container">
                <div class="amenity-row row" id="<?php echo $link_array[$i]; ?>">
                    <?php if ($i % 2 !== 0) : ?>
                        <div class="col-md-6 pb-3 pb-md-0 img-wrapper">
                            <img src="<?php echo $section_image['url']; ?>" alt=""/>
                        </div>
                    <?php endif; ?>
                    <div class="content-wrapper col-md-6">
                        <h3 class=<?php echo ($i % 2 === 0) ? "left-line" : "right-line"; ?>><?php echo $section_title ?></h3>
                        <!-- amenity-excerpt-blur -->
						<div class="amenity-excerpt <?php if (get_row_layout() != 'programs') echo ''; ?>">
							<?php echo $section_excerpt; ?>
							 <?php echo $section_text; ?>
						</div>
                        <div class="amenity-content amenity-content-reg">
                            <?php echo $section_text ?>
                        </div>
                        <div class="more-content-btn d-none" data-text-more="Learn More">Learn More</div>
                    </div>
                    <?php if ($i % 2 === 0) : ?>
                        <div class="col-md-6 pb-3 pb-md-0 img-wrapper">
                            <img src="<?php echo $section_image['url']; ?>" alt=""/>
                        </div>
                    <?php endif; ?>
                    </div>
                </div>

                <div id="testimonials" class="mb-6">
                    <div class="container">
                        <div class="testimonials-row-container">
                            <div class="testimonials-body">
                                <?= $section_testimonial ?>
                            </div>
                            <h3><?= $section_name ?></h3>
                            <h4><?= $section_relationship ?></h4>
                        </div>
                    </div>
                </div>   

                <?php $i++; endwhile;
                endif; ?>

                </section>             
            </article>
        <!-- Full width CTA -->
        <?php
        get_template_part( 'template-parts/components/find-community' );
        ?> <!-- Full width CTA -->
    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>