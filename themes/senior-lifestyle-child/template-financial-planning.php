<?php
/**
 * Template Name: Financial Planning
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

get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="" role="main" style="padding-bottom: 0 !important;">
    <?php
    global $post;
    $featured_img = get_the_post_thumbnail_url();
    $hero_content = get_the_content();
    $hero_title = get_the_title();

    $cost = get_field("cost");
    $pay = get_field("pay");
    $guide = get_field("guide");

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
            <nav id="navbar" class="in-page-nav-bar">
                <div class="in-page-nav-toggle px-3 mobile-only">
                    <div>View on this page:</div>
                    <div class="active-page-link"></div>
                    <i class="fas fa-sort"></i>
                </div>
                <ul class="in-page-links collapse">
                    <li>
                        <a href="#average_cost">
                            <span>Average Cost</span>
                        </a>
                    </li>
                    <li>
                        <a href="#payment_options">
                            <span>Payment Options</span>
                        </a>
                    </li>			
                    <li>
                        <a href="#payment_guide">
                            <span>Payment Guide</span>
                        </a>
                    </li>
                    <li>
                        <a href="#take_the_next_step">
                            <span>Take the Next Step</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </section>
        <section class="average-cost py-6" id="average_cost">
            <div class="container">
                <div class="col-md-9">
                    <h2><?php echo $cost["title"]; ?></h2>
                    <p class="pt-4"><?php echo $cost["subtitle"]; ?></p>
                </div>
                <div class="row factors-row py-5">
                    <?php foreach($cost["factors"] as $item){ ?>
                        <div class="col-md-4 py-3 factor-card">
                            <p class="factor-title"><?php echo $item["factor_title"]; ?></p>
                            <p class="factor-content"><?php echo $item["factor_content"]; ?></p>
                        </div>
                    <?php }; ?>
                </div>
                <hr class="cost-divider" />
                <div class="row planners-row">
                    <?php foreach($cost["planners"] as $item){ ?>
                        <div class="col-md-4 py-3 planner-card">
                            <img src="<?php echo esc_url($item["planner_image"]["url"]); ?>" alt="" />
                            <p class="planner-content py-4"><?php echo $item["planner_content"]; ?></p>
                            <a class="btn-primary-lightblue" href="<?php echo esc_url($item["planner_link"]["url"]);?>"><?php echo $item["planner_link"]["title"];?></a>
                        </div>
                    <?php }; ?>
                </div>

            </div> <!-- container-end -->
        </section> <!-- average-cost end -->
        <section class="payment-options py-6" id="payment_options">
            <div class="container">
                <div class="col-md-9 pb-5">
                    <h2 class="title"><?php echo $pay["title"]; ?></h2>
                    <p class="pt-4"><?php echo $pay["content"]; ?></p>
                    <!-- <a class="btn-primary-purple" href="<?php echo esc_url( $pay["link"]["url"]);?>"><?php echo $pay["link"]["title"];?></a> -->
                </div>
                <?php
                $count = 0;
                foreach($pay["options"] as $item) { ?>
                    <?php if($count%2==0){?>
                    <div class="row py-5 option-restack">
                        <div class="col-md-4 left-img">
                            <img class="img-backdrop" src="<?php echo esc_url($item["image"]["url"]); ?>" alt="" />
                        </div>
                        <div class="col-md-8 right-text">
                            <h3 class="option-title"><?php echo $item["title"]; ?></h3>
                            <p><?php echo $item["content"]; ?></p>
                            <a class="btn-primary-navy" href="<?php echo esc_url( $item["link"]["url"]);?>"><?php echo $item["link"]["title"]; ?></a>
                        </div>
                    <?php } else if($count%2==1){?>
                    <div class="row py-5">
                        <div class="col-md-8 left-text">
                            <h3 class="option-title"><?php echo $item["title"]; ?></h3>
                            <p><?php echo $item["content"]; ?></p>
                            <a class="btn-primary-navy" href="<?php echo esc_url( $item["link"]["url"]);?>"><?php echo $item["link"]["title"]; ?></a>
                        </div>
                        <div class="col-md-4 right-img">
                            <img class="img-backdrop" src="<?php echo esc_url($item["image"]["url"]); ?>" alt="" />
                        </div>
                    <?php } ?>
                    </div>
            <?php $count++; }; ?>
            </div>
        </section>
        <section class="cost-guide py-6" id="payment_guide">
            <div class="container">
                <img class="decoration" src="/wp-content/themes/senior-lifestyle-child/assets/img/pattern/patt_1_lightblue.svg" alt=""/>
                <h2 class="guide-title"><?php echo $guide["title"]; ?></h2>
                <div class="row">
                    <div class="col-md-7 content">
                        <p><?php echo $guide["content"]; ?></p>
                        <a class="btn-primary-white" href="<?php echo esc_url($guide["link"]["url"]);?>"><?php echo $guide["link"]["title"]; ?></a>
                    </div>
                    <div class="col-md-5 image">
                        <img src="<?php echo esc_url($guide["image"]["url"]); ?>" alt="" />
                    </div>
                </div>
            </div>
        </section>
        <section class="next-steps py-6" id="take_the_next_step">
            <div class="container">
                <h2>Take The Next Steps</h2>
                <div class="row py-5">
                    <div class="col-3">
                        <div class="number line-start">1</div>
                    </div>
                    <div class="col-9">
                        <p class="step-content">Find the right level of care by taking our quiz</p>
                        <a class="btn-primary-lightblue" href="<?php echo get_site_url();?>/senior-living-and-care-options/lifestyle-option-quiz/">Take the Quiz</a>
                    </div>
                </div>
                <div class="row py-5">
                    <div class="col-3">
                        <div class="number">2</div>
                    </div>
                    <div class="col-9">
                        <p class="step-content">Find a community near you, or in your desired location</p>
                        <a class="btn-primary-lightblue" href="<?php echo get_site_url();?>/find-community/">Find a Community</a>
                    </div>
                </div>
                <div class="row py-5">
                    <div class="col-3">
                        <div class="number">3</div>
                    </div>
                    <div class="col-9">
                        <p class="step-content">Speak to a community about what’s included in your cost and financial options for you and your family</p>
                    </div>
                </div>
            </div>
        </section>
        <?php
        get_template_part( 'template-parts/components/find-community' );
        ?>
    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
