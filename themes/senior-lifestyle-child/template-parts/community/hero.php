<?php

//
// HERO SECTION
//
global $post;

$general_information = get_field('general_information') ? get_field('general_information') : array();

$community_type = $general_information['community_type'];
$community_phone = $general_information['community_phone'];
$community_address = $general_information['community_address'];
$community_rate = $general_information['community_rate'];

// Header - Community Title is part of title
$hero_panel_sub = get_field('hero_panel_sub') ? get_field('hero_panel_sub') : '';

//wp_get_attachment_image() for hero image
$banner_img_id = get_post_thumbnail_id(get_the_ID(), 'full');
$bg_img_src = wp_get_original_image_path( get_post_thumbnail_id( get_the_ID() ) );
$new_img = update_banner_image($bg_img_src);
$announcement = get_field('banner_text');
$theme_bg = get_field('bg_theme_color');
?>

<section class="hero-section">
    <div class="header-wrap mobile-only">
        <p></p>
    </div>
    
    <div class="hero-panel-container mobile-only">
        <div class="container">
            <div class="hero-panel">
                <div class="title">
                    <h1><?php the_title(); ?> <span><?php echo $hero_panel_sub; ?></span></h1>
                </div>
                <div class="address">
                    <div><?php echo $community_address['street_address']; ?></div>
                    <div><?=$community_address['city']; ?>, <?= $community_address['state']; ?> <?= $community_address['zip']; ?></div>
                </div>
                <div class="phone">Call Today: 
                    <a class='block dniphonehref' href='tel:<?php echo $community_phone; ?>'><span class='dniphone'><?php echo $community_phone; ?></span></a>   
                </div>
                <div class="btn-row">
                    <a href="#schedule_tour" class="btn btn-purple"><span><svg xmlns="http://www.w3.org/2000/svg" width="11" height="14" viewBox="0 0 384 512"><path fill="#fff" d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z"/></svg></span>Map It</a>
                </div>
            </div>
        </div>
    </div>
	<style>
	body section.hero-section .featured-img-container:before {
		background-image: url('<?php echo $new_img ?>');
	}
	</style>
    <div class="featured-img-container mobile-hide row pt-0 m-0">
		<?php if($announcement) : ?>
		<div class="mobile-hide">
			<div class="announcement-banner m-0 d-flex justify-content-end">
				<div class="col-md-6 d-flex justify-content-center align-self-center">
					<div class="announcement text-center">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/announcement_pattern_up.svg" width="30" height="30" />                  
						<span><?php echo $announcement ?></span>
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/announcement_pattern_down.svg" width="30" height="30" />                  
					</div>
				</div>
			</div>
		</div>
		<?php endif; ?>	
		<div class="hero-panel-container d-flex <?php echo $community_type; ?>">
			<div class="container">
				<div class="hero-panel d-flex align-items-center">
					<div>
						<div class="title">
							<h1><?php the_title(); ?> <br> <span><?php echo $hero_panel_sub; ?></span></h1>
						</div>
						<div class="address">
							<div><?php echo $community_address['street_address']; ?></div>
							<div><?=$community_address['city']; ?>, <?= $community_address['state']; ?> <?= $community_address['zip']; ?></div>
						</div>
						<div class="phone">Call Today:
							<a class='block dniphonehref' href='tel:<?php echo $community_phone; ?>' title='Leasing'><span class='dniphone'><?php echo $community_phone; ?></span></a>
						</div>
						<div class="btn-row">
							<a href="#schedule_tour" class="btn-purple"><span><svg xmlns="http://www.w3.org/2000/svg" width="11" height="14" viewBox="0 0 384 512"><path fill="#fff" d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z"/></svg></span>View Map</a>
						</div>
					</div>
				</div>
			</div>
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
                <a href="#lifestyle_options">
                    <span>Living Options</span>
                </a>
            </li>
            <li>
                <a href="#blog_events_section">
                    <span>Events & Resources</span>
                </a>
            </li>			
            <li>
                <a href="#floor_plans_section">
                    <span>Floor Plans</span>
                </a>
            </li>
            <li>
                <a href="#experience_section">
                    <span>What’s Included</span>
                </a>
            </li>
            <li>
                <a href="#schedule_tour">
                    <span>Request Info</span>
                </a>
            </li>
        </ul>
    </nav>
</section>