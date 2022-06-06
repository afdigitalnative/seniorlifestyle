<?php
/**
 * Template Name: About Us Page
 *
 * This is a template for the about us page.
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


<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main" style="padding-bottom: 0 !important;">
        <?php
        get_template_part( 'template-parts/about/hero-no-nav' );
        ?>
        <div class="container">
                <section class="">
                    <div class="row py-6">
                        <div class="col-md-6 pr-4 yl-container">
                            <div class="yellow-lines py-5 my-4">
                            <?php echo the_content(); ?>
                            </div>
                        </div>
                        <div class="col-md-6 pl-4">
                            <div class="card discover-card">
                                <!-- Change this card to a custom field -->
                                <img class="card-img-top" src="<?php get_site_url();?>/wp-content/uploads/2021/11/discover-cropped.png" alt="" />
                                <div class="card-body" id="test">
                                    <h4 class="card-title">Discover Your Community</h4>
                                    <p class="card-text">For more information on retirement and senior housing options, reach out to a Senior Lifestyle community near you.</p>
                                    <a href="./find-community" class="btn-primary-lightblue">Find Your Community</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Primary Page content -->
                <section class="">
                    <?= the_field( "page_content" );?>
                </section>
                <!-- Repeated blurbs (ACF Repeater field) -->
                <section class="">
                    <?php

                        $rows = get_field('page_blurb_repeater');
                        // colors are used to set classes to get the correct color for the right blurb
                        if( $rows ){
                            //Count used to set distinct colors and get the correct, might need to be rewritten to a while loop and style with CSS
                            $count = 0;
                            foreach( $rows as $row){
                                //The first three rows should be large and have a different style than the rest, only the first three blurbs will be style as large
                                //Increase the count to have more blurbs be large, but also add more colors in the array or change the logic for how the class is added.
                                if($count == 0 || $count == 2){ ?>
                                    <div class="row py-4 flex-center left-img">
                                        <div class="col-md-4 blurb-content <?php echo $row['background_color_scheme']; ?>">
                                            <h4><?php echo $row["blurb_title"]; ?></h4>
                                            <p><?php echo $row["blurb_content"]; ?></p>
                                            <a class="btn-primary-white btn-outline" href="<?php echo esc_url($row["button_url"]); ?>">Learn About <?php echo $row["blurb_title"]; ?></a>
                                        </div>
                                        <div class="col-md-8 blurb-image-box">
                                            <img src="<?php echo esc_url($row["blurb_image"]["url"]); ?>" alt="<?php echo $row["title"]; ?>"/>
                                        </div>
                                    </div>
                                <?php 
                                }else if($count == 1){
                                ?>
                                    <div class="row py-4 flex-center right-img">
                                        <div class="col-md-8 blurb-image-box">
                                            <img src="<?php echo esc_url($row["blurb_image"]["url"]); ?>" alt="<?php echo $row["title"]; ?>"/>
                                        </div>
                                        <div class="col-md-4 blurb-content <?php echo $row['background_color_scheme']; ?>">
                                            <h4><?php echo $row["blurb_title"]; ?></h4>
                                            <p><?php echo $row["blurb_content"]; ?></p>
                                            <a class="btn-primary-white btn-outline" href="<?php echo esc_url($row["button_url"]); ?>">Learn About <?php echo $row["blurb_title"]; ?></a>
                                        </div>
                                    </div>
                                <?php
                                } else {
                                    if($count==3){
                                    ?>
                                    <div class="row py-5">
                                    <?php } ?>
                                        <div class="col-md-4 p-3" style="display: flex; flex-direction: column; justify-content: space-between;">
                                            <img src="<?php echo esc_url($row["blurb_image"]["url"]); ?>" alt="<?php echo $row["title"]; ?>"/>
                                            <h4 class="smaller-heading"><?php echo $row["blurb_title"] ?></h4>
                                            <p><?php echo $row["blurb_content"] ?></p>
                                            <a class="btn-primary-white btn-outline smaller-button" href="<?php echo esc_url($row["button_url"]); ?>">Learn About <?php echo $row["blurb_title"]; ?></a>
                                        </div>
                                    <?php 
                                    if($count==5){
                                    ?>
                                        </div>
                                    <?php
                                    }
                                }
                                $count ++;
                            }
                        };
                    ?>

                <?php
                    wp_reset_postdata();
                ?>
                </section>
        </div><!-- container -->
        <!-- Full width CTA -->
        <?php
        get_template_part( 'template-parts/components/find-community' );
        ?>
    </main><!-- #main -->
</div><!-- #primary -->

<script>

    document.getElementById("decorative-images").src = "<?php echo get_site_url() ?>/wp-content/themes/senior-lifestyle-child/assets/img/pattern/patt_1_lightpink.svg";

</script>

<?php get_footer(); ?>
