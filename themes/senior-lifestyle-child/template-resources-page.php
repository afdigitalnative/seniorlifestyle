<?php
/**
 * Template Name: Resources Page
 *
 * This is a template for the resources page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Senior_Lifestyle_Child
 */

global $post;
$featured_img = get_the_post_thumbnail_url();
$call_out_overlay = get_field('call_out_overlay');

get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="" role="main" style="padding-bottom: 0 !important;">
    <?php
    global $post;
    $featured_img = get_the_post_thumbnail_url();
    $hero_content = get_the_content();
    $hero_title = get_the_title();

    $senior_guides = get_field("senior_lifestyle_guides");

    $loc_quiz = get_field("loc_quiz");

    $fp_block = get_field("financial_planning_header"); //fp_block is short for the information related to the financial planning block

    $senior_articles = get_field("senior_lifestyle_articles");
    ?>
        <section class="hero">
            <div class="container">
                <div class="row py-6">
                    <div class="col-md-9">
                        <h1><?php echo $hero_title; ?></h1>
                        <?php echo $hero_content; ?>
                    </div>
                    <div class="col-md-3"></div>	
                </div>
            </div>
        </section>
        <section class="lifestyle-section">
            <div class="container">
                <h2 class="my-5"><?php echo get_field_object("senior_lifestyle_guides")["label"]; ?></h2>
                <div class="row">
                    <?php foreach($senior_guides as $guide){ ?>
                    <div class="col-md-4 guide-card">
                        <h3 class="guide-title"><?php echo $guide["guide_title"] ?></h3>
                        <img class="guide-image" src="<?php echo $guide["guide_image"]; ?>" alt=""/>
                        <p class="guide-content"><?php echo $guide["guide_content"]; ?></p>
                        <a href="<?php echo $guide["guide_link"] ?>" class="guide-link">Download the Guide</a>
                    </div>
                    <?php }; ?>
                </div>
                <a class="btn-primary-white btn-outline my-5" href="/resources/guides/">View All of Our Guides</a>
            </div>
        </section>
        <section class="loc-quiz py-5">
            <div class="container">
                <div class="loc-card" style="max-width: 100%;">
                    <div class="row no-gutters">
                        <div class="col-md-8">
                            <div class="card-body">
                                <h2 class="card-title"><?php echo $loc_quiz["card_title"]; ?></h2>
                                <?php echo $loc_quiz["card_content"]; ?>
                                <a href="<?php echo $loc_quiz['card_link'] ?>" class="btn-primary-lightblue">Take the Quiz</a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <img class="card-img" src="<?php echo esc_url( $loc_quiz['card_image']['url'] ); ?>" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="fp-block py-5">
            <div class="container">
                <div class="row my-5">
                    <div class="col-md-5 fp-img-box">
                        <img class="fp-decorative-img" src="/wp-content/themes/senior-lifestyle-child/assets/img/pattern/patt_3_blue.svg" alt="" />
                        <img class="fp-img" src="<?php echo esc_url( $fp_block['block_image']['url'] ) ;?>" alt="" />
                    </div>
                    <div class="col-md-7 fp-content-box">
                        <h2 class="fp-title"><?php echo $fp_block["block_title"]; ?></h2>
                        <p class="fp-content"><?php echo $fp_block["block_content"]; ?></p>
                        <a class="btn-primary-white btn-outline mt-4" href="/resources/financial-planning/">View Our Financial Resources</a>
                    </div>
                </div>
            </div>
        </section>
        <section class="lifestyle-section">
            <div class="container">
                <h2 class="my-5"><?php echo get_field_object("senior_lifestyle_articles")["label"]; ?></h2>
                <div class="row">
                    <?php foreach($senior_articles as $article){ ?>
                    <div class="col-md-4 guide-card">
                        <div class="article-title-wrap">
                            <h3 class="article-title py-3"><?php echo $article["article_title"] ?></h3>
                            <img class="article-image" src="<?php echo $article["article_image"]; ?>" alt=""/>
                        </div>
                        <p class="guide-content"><?php echo $article["article_content"]; ?></p>
                        <a href="<?php echo $article["article_link"] ?>" class="guide-link">Read the article</a>
                    </div>
                    <?php }; ?>
                </div>
                <a class="btn-primary-lightblue my-5" href="/resources/blog/">View All Articles</a>
            </div>
        </section>
            
        </div><!-- container -->
        <!-- Full width CTA -->
        <?php
        get_template_part( 'template-parts/components/find-community-alt' );
        ?>
    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
