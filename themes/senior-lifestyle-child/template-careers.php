<?php
/**
 * Template Name: Lifestyle Careers
 *
 * This is a template for the financial planning page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Senior_Lifestyle_Child
 */

global $post;
$featured_img = get_the_post_thumbnail_url();
$call_out_overlay = get_field('call_out_overlay');

$benefits = get_field("benefits");

$heart = get_field("heart");

$careers = get_field("career_types");

$eeo = get_field("eeo");

get_header();
?>


<style>

/* Needs to change on mobile view */
.full-hero-gradient-left{
    background: 
        linear-gradient(95deg, #063f51 calc(50%),rgba(0,57,57,0.1) calc(50% + 140px)),
        url(<?php echo $featured_img; ?>) center center;
    background-size: cover;
}

</style>

<div id="primary" class="content-area">
    <main id="main" class="" role="main" style="padding-bottom: 0 !important;">
    <?php
    global $post;
    $featured_img = get_the_post_thumbnail_url();
    $hero_content = get_the_content();
    $hero_title = get_the_title();


    get_template_part( 'template-parts/about/hero-no-nav' );
    ?>
    <section class="open-positions">
        <div class="container">
            <?php echo the_content(); ?>
        </div>
    </section>
    <section class="benefits py-6">
        <div class="container">
            <div class="row">
                <div class="col-md-6 video-box">
                    <iframe src="<?php echo esc_url( $benefits["video_url"] ) ; ?>" class="benefits-video" title="Meet Noelle Video"></iframe>
                </div>
                <div class="col-md-6 benefits-text">
                    <h2><?php echo $benefits["title"] ;?></h2>
                    <?php echo $benefits["content"]; ?>
                </div>
            </div>
        </div>
    </section>
    <section class="heart py-6">
        <div class="container">
            <div class="row">
                <div class="col-md-7 heart-content py-4">
                    <h2><?php echo $heart["title"]; ?></h2>
                    <?php echo $heart["content"]; ?>
                </div>
                <div class="col-md-5 heart-img">
                    <img src="<?php echo esc_url($heart['image']['url']); ?>" alt="" />
                </div>
            </div>
        </div>
    </section>
    <section class="career-testimonials">
        <div class="container">
            <h2 class="section-title">Testimonials</h2>
            <?php echo do_shortcode("[testimonials-slider section='front-page' icon=false ratings=false]"); ?>
        </div>
    </section>
    <section class="careers">
        <div class="container">
        <?php $count = 0; foreach($careers as $item){ ?>
        <div class="row py-6">
            <?php if($count%2 == 0) { ?>
                <div class="col-md-4 img-box">
                    <img src="<?php echo esc_url($item['image']['url']); ?>" alt="" />
                </div>
                <div class="col-md-8 text-box">
                    <h2><?php echo $item['title']; ?></h2>
                    <?php echo $item["content"]; ?>
                    <a class="my-3 btn-primary-white btn-outline" href="<?php echo esc_url($item['button_link']['url']);?>"><?php echo $item['button_link']['title']; ?></a>
                </div>
                <hr/>
            <?php } else if($count%2 == 1) { ?>
                <div class="col-md-8 text-box">
                    <h2><?php echo $item['title']; ?></h2>
                    <?php echo $item["content"]; ?>
                    <a class="my-3 btn-primary-white btn-outline" href="<?php echo esc_url($item['button_link']['url']);?>"><?php echo $item['button_link']['title']; ?></a>
                </div>
                <div class="col-md-4 img-box">
                    <img src="<?php echo esc_url($item['image']['url']); ?>" alt="" />
                </div>
            <?php } ?>
        </div>
        <?php $count++; }; ?>
        </div>
    </section>
    <section class="eeo py-6">
        <div class="container">
            <?php echo $eeo; ?>
        </div>
    </section>

    </main><!-- #main -->
</div><!-- #primary -->
<script>

    document.getElementById("decoration").src = "<?php echo get_site_url() ?>/wp-content/themes/senior-lifestyle-child/assets/img/pattern/patt_6_red.svg";

</script>
<?php get_footer(); ?>