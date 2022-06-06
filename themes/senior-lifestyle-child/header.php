<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 */

	$ids = get_the_ID();
	// Community specific variables
	$community_logo_image = get_field('header_logo_image', get_the_ID());
	$general_information = get_field('general_information', get_the_ID());

    if(isset($general_information['button_text']) && isset($general_information['button_text_2']) && $general_information['button_text']!="" && $general_information['button_text_2']!=""){
    	$rent_cafe_link = "#rentcafe_section";
	} else {
    	$rent_cafe_link = isset($general_information['community_rent_cafe']) ? $general_information['community_rent_cafe'] : '';
	}

	require('classes/class-sl-walker-menu.php');
?>
<!doctype html>
<html lang="en-US">
<head>
	<!-- Begin Convert Experiments code-->
	<script type="text/javascript" src="//cdn-3.convertexperiments.com/js/10022108-10023981.js" async></script>
	<!-- End Convert Experiments code -->

	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-PFRJ24L');</script>
	<!-- End Google Tag Manager -->
	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	
	<!-- Import Google Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Noto+Serif:wght@400;700&family=Nunito+Sans:wght@300;400;700&display=swap" rel="stylesheet">
	
	<link rel="preload" href="<?php echo SL_CHILD_THEME_URL ?>/assets/fonts/custom/GothamBook.woff2" as="font" type="font/woff2" crossorigin>
	<link rel="preload" href="<?php echo SL_CHILD_THEME_URL ?>/assets/fonts/custom/GothamMedium.woff2" as="font" type="font/woff2" crossorigin>
	<link rel="preload" href="<?php echo SL_CHILD_THEME_URL ?>/assets/fonts/custom/GothamBold.woff2" as="font" type="font/woff2" crossorigin>
	<link rel="preload" href="<?php echo SL_CHILD_THEME_URL ?>/assets/fonts/fontawesome/fa-brands-400.woff2" as="font" type="font/woff2" crossorigin>
	<link rel="preload" href="<?php echo SL_CHILD_THEME_URL ?>/assets/fonts/fontawesome/fa-solid-900.woff2" as="font" type="font/woff2" crossorigin>
	<link rel="preload" href="<?php echo SL_CHILD_THEME_URL ?>/assets/fonts/fontawesome/fa-regular-400.woff2" as="font" type="font/woff2" crossorigin>
	<?php if (
		get_field( 'dni_enable', 'sl_options' ) &&
		get_post_type() == 'community' && !empty($general_information['community_rentcafe_api_key'])) : ?>
		<meta name="referrer" content="origin" />
		<script src="https://t.rentcafe.com/ytpclicktrack.min.js" type="text/javascript"></script>
		<script src="https://www.rentcafe.com/JS/ThirdPartySupport/LeadAttributionAndDNI.min.js" type="text/javascript"></script>
	<?php endif; ?>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>	

	<link rel="apple-touch-icon" sizes="57x57" href="<?= SL_CHILD_THEME_URL . "/assets/favicons/" ?>apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="<?= SL_CHILD_THEME_URL . "/assets/favicons/" ?>apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?= SL_CHILD_THEME_URL . "/assets/favicons/" ?>apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?= SL_CHILD_THEME_URL . "/assets/favicons/" ?>apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?= SL_CHILD_THEME_URL . "/assets/favicons/" ?>apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?= SL_CHILD_THEME_URL . "/assets/favicons/" ?>apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?= SL_CHILD_THEME_URL . "/assets/favicons/" ?>apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?= SL_CHILD_THEME_URL . "/assets/favicons/" ?>apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="<?= SL_CHILD_THEME_URL . "/assets/favicons/" ?>apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="<?= SL_CHILD_THEME_URL . "/assets/favicons/" ?>android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?= SL_CHILD_THEME_URL . "/assets/favicons/" ?>favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?= SL_CHILD_THEME_URL . "/assets/favicons/" ?>favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?= SL_CHILD_THEME_URL . "/assets/favicons/" ?>favicon-16x16.png">
	<link rel="manifest" href="<?= SL_CHILD_THEME_URL . "/assets/favicons/" ?>manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">

</head>
<body <?php body_class(''); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PFRJ24L"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<div id="page" class="site">
	<header id="masthead" class="site-header">
		<div class="header-wrapper container">
			<div class="header-img-container">
				<?php /* @IMPORTANT: Community Logos will be dynamic and added through ACF - If there isn't one, then take default Header Logo */ ?>
				<?php if ( !$community_logo_image ) : ?>
				<a href="<?php echo esc_url( home_url('/') ); ?>" rel="home">
					<?php if ( get_header_image() ) : /* if a header image in customizer is assigned */ ?>
					<?php echo get_header_image_tag(array('width' => '201', 'height' => '82', 'alt' => 'Senior Lifestyle Logo')); ?>
					<?php else : /* if not use a default from file directory */ ?>
						<picture>
							<source srcset="<?php echo SL_CHILD_THEME_URL . '/assets/img/logos/logo-senior-living.webp'; ?> 1x, <?php echo SL_CHILD_THEME_URL . '/assets/img/logos/logo-senior-living@2x.webp'; ?> 2x" type="image/webp">
							<source srcset="<?php echo SL_CHILD_THEME_URL . '/assets/img/logos/logo-senior-living.png'; ?> 1x, <?php echo SL_CHILD_THEME_URL . '/assets/img/logos/logo-senior-living@2x.png'; ?> 2x" type="image/png"> 
							<img src="<?php echo SL_CHILD_THEME_URL . '/assets/img/logos/logo-senior-living.png'; ?>" srcset="<?php echo SL_CHILD_THEME_URL . '/assets/img/logos/logo-senior-living.png'; ?> 1x, <?php echo SL_CHILD_THEME_URL . '/assets/img/logos/logo-senior-living@2x.png'; ?> 2x" alt="Senior Lifestyle. Your life, your style." width="196" height="81" id="site-logo">
                    	</picture>
					<?php endif; ?>
				</a>

				<?php else : ?>
				<a href="<?php echo esc_url( home_url('/') ); ?>" rel="home">
					<?php echo wp_get_attachment_image( $community_logo_image['ID'], 'medium' ); ?>
				</a>
				<?php endif; ?>
			</div>
			<div class="header-right-column">
				<nav class="main-navigation" id="site-navigation">
					<div class="search-bar-container">
						<form method="get" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
							<label for="search_site">Search</label>
							<input type="text" id="search_site" class="field" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" />
							<button type="submit">
								<span class="sr-only">Submit</span>
								<i class="far fa-search"></i>
							</button>
						</form>
					</div><!-- .search-bar-container -->
					<?php wp_nav_menu( array('theme_location' => 'primary-navigation', 'walker'  => new SL_Walker_Menu()) ); ?>
				</nav><!-- #site-navigation -->
				<div class="mobile-nav-btn" id="btn-mobile-menu">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 27 18">
						<g id="Group_9" data-name="Group 9" transform="translate(-319 -51)">
							<rect id="Rectangle_47" data-name="Rectangle 47" width="27" height="4" rx="2" transform="translate(319 51)" fill="#1a4267"/>
							<rect id="Rectangle_48" data-name="Rectangle 48" width="27" height="4" rx="2" transform="translate(319 58)" fill="#1a4267"/>
							<rect id="Rectangle_49" data-name="Rectangle 49" width="20" height="4" rx="2" transform="translate(319 65)" fill="#1a4267"/>
						</g>
					</svg>
				</div>
			</div>
		</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
