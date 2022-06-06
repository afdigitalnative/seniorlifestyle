<?php

/**
 *
 * Child Theme for Senior Lifestyle Underscores Template
 *
 * @package senior-lifestyle-child
 */


if (!defined('ABSPATH')) exit; // Exit if accessed directly

/*
 *
 * DEFINITIONS
 *
 */

define('SL_CHILD_THEME_DIR', get_stylesheet_directory());
define('SL_CHILD_THEME_URL', get_stylesheet_directory_uri());

//define( 'SL_GOOGLE_MAP_API_KEY', 'AIzaSyD_0MyQ4hzYn5WAlQboPFewfPqZnUbzx4k' ); // ENTER SL API KEY HERE
define('SL_GOOGLE_MAP_API_KEY', 'AIzaSyB0c6JdyizjijBaxeY3cKXsHORmkEdPZ5A'); // ENTER Widely (for development) API KEY HERE
$MYSTATE = "";
$MYCITY = "";
/*
 *
 * INCLUDES/REQUIRES
 *
 */

// Classes for Child Theme
require_once 'classes/class-sl-child-theme.php';
require_once 'classes/class-sl-custom.php';
require_once 'includes/components/financial-calculator-ajax.php';

/**
 *
 * ENQUEUE SCRIPTS AND DISABLE
 *
 * @IMPORTANT:
 *      See classes/class-sl-child-theme.php for specific
 *      methods and properties
 *
 */

//was getting a validation error regarding api.w.org and this was the solution
remove_action('wp_head', 'rest_output_link_header', 10);
remove_action('template_redirect', 'rest_output_link_header', 11);

// All Scripts and Styles - See: classes/class-sl-child-theme.php
add_action('wp_enqueue_scripts', 'SL_Child_Theme::enqueue_scripts', 1000);

// Any inline scripts/style to be placed in head (i.e., Fancybox styles)
add_action('wp_head', 'SL_Child_Theme::inline_scripts', 1000);

// Remove emojis
add_action('wp_enqueue_scripts', 'SL_Child_Theme::remove_emojis', 1000);

// Unhook parent theme's scripts - skip nav and navigation.js files included in child
add_action('wp_enqueue_scripts', 'SL_Child_Theme::unhook_parent_theme_scripts', 1000);

// Unhook parent theme's scripts - skip nav and navigation.js files included in child
add_action('wp_print_styles', 'SL_Custom::add_body_classes', 1000);

function senior_lifestyle_child_scripts()
{
	wp_enqueue_script('senior-lifestyle-global', SL_CHILD_THEME_URL . '/js/global.js', array('jquery'), '', true);
	wp_enqueue_script('cookie-plugin', SL_CHILD_THEME_URL . '/js/js.cookie.js', array(), 'v3.0.0-rc.0', true);
	wp_enqueue_script('senior-lifestyle-cookie-form', SL_CHILD_THEME_URL . '/js/js.form_cookie.js', array('cookie-plugin'), '1.0.0', true);
	wp_enqueue_script('bootrstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js', array('jquery'), '4.5.3', true);
}
add_action('wp_enqueue_scripts', 'senior_lifestyle_child_scripts');

//
// ACF MAP API Key
//

function sl_acf_init()
{

	acf_update_setting('google_api_key', SL_GOOGLE_MAP_API_KEY);
}

add_action('acf/init', 'sl_acf_init');


if (function_exists('acf_add_options_page')) {

	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Custom Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Default Lifestyle Blurbs',
		'menu_title'	=> 'Lifestyle Blurbs',
		'parent_slug'	=> 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title'    => __('Senior Living General Settings'),
		'menu_title'    => __('SL Site Settings'),
		'parent_slug'	=> 'theme-general-settings',
		'menu_slug' 	=> 'sl-options',
		'post_id' 		=> 'sl_options',
		'capability'    => 'edit_posts',
		'redirect'      => false
	));

	acf_add_options_sub_page(array(
		'page_title'    => __('Social Settings'),
		'menu_title'    => __('Social Settings'),
		'parent_slug'	=> 'theme-general-settings',
		'menu_slug' 	=> 'social-options',
		'post_id' 		=> 'social_options',
		'capability'    => 'edit_posts',
		'redirect'      => false
	));

	acf_add_options_sub_page(array(
		'page_title'    => __('Contact Sidebar'),
		'menu_title'    => __('Contact Sidebar'),
		'parent_slug'	=> 'theme-general-settings',
		'menu_slug' 	=> 'contact-sidebar',
		'post_id' 		=> 'contact_sidebar',
		'capability'    => 'edit_posts',
		'redirect'      => false
	));
}


include("includes/sl-settings.php");
include("includes/sl-shortcodes.php");
include("includes/social-share.php");


// ADD FAVICON TO HEADER
function add_favicon()
{
	echo '<link rel="shortcut icon" type="image/png" href="' . SL_CHILD_THEME_URL . '/assets/favicons/favicon.ico" />';
}
add_action('wp_head', 'add_favicon');

// ADD BODY CLASSES TO SPECIAL PAGES
add_filter('body_class', function ($classes) {
	if (is_page('about')) {

		$classes[] = 'about-page';
	} else {

		if (is_page('senior-living-and-care-options')) {

			$classes[] = 'loc-page';
		}
	}

	return array_merge($classes, array('custom'));
});

// LOAD GEO-LOCATE ON 'FIND-COMMUNITY'
function load_geo_locate($post_id)
{

	global $post;
	if ($post) {
		$post_id = $post->ID;
		include("includes/geo-locate/geo-locate.php");
	}
}
add_action('wp', 'load_geo_locate');


function wpb_custom_footer_menu()
{
	register_nav_menu('footer-menu', __('Footer Menu'));
}
add_action('init', 'wpb_custom_footer_menu');

// flush_rewrite_rules(); // use only to flush permalinks, never leave active: resource hog
// add taxonomy to permalinks
add_action('init', 'my_locale_init');
function my_locale_init()
{
	if (!taxonomy_exists('locale')) {
		register_taxonomy(
			'locale',
			'post',
			array(
				'hierarchical' => FALSE, 'label' => __('Locale'),
				'public' => TRUE, 'show_ui' => TRUE,
				'query_var' => 'locale',
				'rewrite' => true
			)
		);
	}
}

// REWRITE PERMALINK
add_filter('post_link', 'locale_permalink', 10, 3);
add_filter('post_type_link', 'locale_permalink', 10, 3);

function locale_permalink($permalink, $post_id, $leavename)
{

	if (strpos($permalink, '%locale%') === FALSE) return $permalink;
	$market_state_array = get_field('market_state', $post_id->ID);
	$market_state = $market_state_array['value'];
	if (!empty($market_state)) {
		return str_replace('%locale%', $market_state, $permalink);
	}
	$post = get_post($post_id);

	include get_stylesheet_directory() . '/includes/states_array.php';

	global $wpdb;

	$stateID = $post->ID;
	$current_state = $wpdb->get_var(
		"SELECT meta_value
						FROM wp_postmeta
						WHERE meta_key = 'general_information_community_address_state'
						and post_id = '" . $stateID . "'"
	);

	$state_output = $states[$current_state];
	$community_state = strtolower($state_output);
	$community_state = str_replace(" ", "-", $community_state);
	if (!$post) return $permalink;
	if ($post->post_type != 'community') {
		return $permalink;
	} else {
		$terms = wp_get_object_terms($post->ID, 'community');
		if (!empty($community_state)) {
			$taxonomy_slug = $community_state;
		} else {
			$taxonomy_slug = 'no-locale';
		}
		return str_replace('%locale%', $taxonomy_slug, $permalink);
	}
}


// FILTER EXCEPT LENGTH TO 35 WORDS.
function sl_blog_excerpt_length($length)
{
	return 35;
}
add_filter('excerpt_length', 'sl_blog_excerpt_length', 999);

// add more link to excerpt
function sl_excerpt_more($more)
{
	return __('...');
}
add_filter('excerpt_more', 'sl_excerpt_more');


// FORCE EXTERAL LINKS TO OPEN IN A NEW WINDOW
function autoblank($text)
{
	$return = str_replace('href=', 'target="_blank" href=', $text);
	$return = str_replace('target="_blank" href="' . site_url() . '', 'href="' . site_url() . '', $return);
	$return = str_replace('target="_blank" href="#', 'href="#', $return);
	$return = str_replace('target = "_blank">', '>', $return);
	return $return;
}
add_filter('the_content', 'autoblank');
add_filter('comment_text', 'autoblank');

// BLOG PAGINATION, SHOULD BE REUSABLE
if (!function_exists('sl_pagination')) {

	function sl_pagination()
	{
		$prev_arrow = is_rtl() ? '<i class="far fa-chevron-right"></i>' : '<i class="far fa-chevron-left"></i>';
		$next_arrow = is_rtl() ? '<i class="far fa-chevron-left"></i>' : '<i class="far fa-chevron-right"></i>';

		global $wp_query;
		$total = $wp_query->max_num_pages;
		$big = 999999999; // need an unlikely integer
		if ($total > 1) {
			if (!$current_page = get_query_var('paged'))
				$current_page = 1;
			if (get_option('permalink_structure')) {
				$format = 'page/%#%/';
			} else {
				$format = '&paged=%#%';
			}
			echo paginate_links(array(
				'base'			=> str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
				'format'		=> $format,
				'current'		=> max(1, get_query_var('paged')),
				'total' 		=> $total,
				'mid_size'		=> 2,
				'type' 			=> 'list',
				'prev_text'		=> $prev_arrow,
				'next_text'		=> $next_arrow,
			));
		}
	}
}

add_filter('paginate_links', function ($link) {
	$pos = strpos($link, 'page/1/');
	if ($pos !== false) {
		$link = substr($link, 0, $pos);
	}
	return $link;
});

// ADD TRACKING CODE
function add_tracking_code()
{
	$tracking_code = get_field('tracking_code', 'sl_options');
	if ($tracking_code) :
		echo $tracking_code;
	endif;
}
add_action('wp_after_admin_bar_render', 'add_tracking_code');

// FIX YOUTUBE & VIMEO VIDEO EMBEDS
// see also _layout.scss
add_filter('the_content', function ($content) {
	return str_replace(array("<iframe", "</iframe>"), array('<div class="iframe-container"><iframe', "</iframe></div>"), $content);
});


// ADD PAGES AND LOCATIONS TO SEARCH
// search for posts and pages, not just posts
$state;
function searchfilter($query)
{

	if ($query->is_search) {

		include_once(get_stylesheet_directory() . '/includes/states_array.php');
		$hasState = false;
		foreach ($states as $key => $value) {
			if (strtolower($value) == strtolower($query->query['s']) || strtolower($key) == strtolower($query->query['s'])) {
				// $state = $query->query['s'];
				// $query->query['s'] = $key;
				// set_query_var('s',$key);
				// $query->set('post_type','community');
				// $query->set('meta_key','general_information_community_address_state');
				// $query->set('meta_value','AZ');
				// $query->is_state = true;
				// $hasState=true;
				break;
			}
		}
		if ($hasState == false) {
			$query->set('post_type', array('post', 'page', 'community'));
		}
	}
	return $query;
}
add_filter('pre_get_posts', 'searchfilter');

// EXCLUDE ANY CONTENT FROM SEARCH RESULTS THAT USE THE TEMPLATE-THANKYOU-PAGE TEMPLATE
function exclude_thankyou_template_from_search($query)
{
	global $wp_the_query;
	if (($wp_the_query === $query) && (is_search()) && (!is_admin())) {
		$meta_query =
			array(
				'relation' => 'OR',
				// remove pages with template-thankyou-page.php from results
				array(
					'key' => '_wp_page_template',
					'value' => 'template-thankyou-page.php',
					'compare' => '!='
				),
				// show all entries that do not have a key '_wp_page_template'
				array(
					'key' => '_wp_page_template',
					'value' => '',
					'compare' => 'NOT EXISTS'
				)
			);
		$query->set('meta_query', $meta_query);
	}
}
add_filter('pre_get_posts', 'exclude_thankyou_template_from_search');


// ADD CUSTOM CSS TO HEAD FOR BACKGROUND IMAGE ON HOMEPAGE
add_action('wp_head', 'sl_custom_header', 100);
function sl_custom_header()
{
	if (is_front_page() || is_singular('community')) {
		global $post;
		$post_id = $post->ID;
		$backgroundImg = wp_get_attachment_url(get_post_thumbnail_id($post_id));
		$backgroundImgSmall = wp_get_attachment_image_src(get_post_thumbnail_id($post_id), 'medium');

		echo "<style>
		.header-wrap {background: url('" . $backgroundImg . "')  no-repeat center bottom;}
		@media only screen and (max-width:767px) {.header-wrap.mobile-only {background: url('" . $backgroundImgSmall[0] . "')  no-repeat center center;}}</style>";
	}
}

//ADD CUSTOM IMAGE SIZE
add_image_size('medium_large', 640, 480);
add_theme_support('post-thumbnails');
add_image_size('blogpost_feature', 1280, 840);
add_image_size('col-6-img', 500, 332);
add_image_size('col-4-img', 323, 215);


// REMOVE GOOGLE RECAPTCHA CODE/BADGE EVERYWHERE APART FROM SELECT PAGES
add_action('wp_print_scripts', function () {
	//Add pages you want to allow to array
	if (!is_page(array('contact-senior-lifestyle'))) {
		wp_dequeue_script('google-recaptcha');
		//wp_dequeue_script( 'google-invisible-recaptcha' );
	}
});


// Add Organization schema to footer
function sl_organization_schema()
{
	echo '<script type="application/ld+json">
	{
	"@context" : "http://schema.org",
	"@type" : "Organization",
	"name" : "Senior Lifestyle",
	"url" : "' . home_url() . '/",
	"logo" : "' . home_url() . '/wp-content/themes/senior-lifestyle-child/assets/img/sl-logo.png"
	}
	</script>';
}
add_action('wp_footer', 'sl_organization_schema');


/**
 * Add new rewrite rule
 */
function create_new_url_querystring()
{
	add_rewrite_rule(
		'resources/blog/([^/]*)$',
		'index.php?name=$matches[1]',
		'top'
	);
	add_rewrite_tag('%resources/blog%', '([^/]*)');
}
add_action('init', 'create_new_url_querystring', 999);

/**
 * Modify post link
 * This will print /resources/blog/post-name instead of /post-name
 */
function append_query_string($url, $post, $leavename)
{
	if ($post->post_type != 'post')
		return $url;
	if (false !== strpos($url, '%postname%')) {
		$slug = '%postname%';
	} elseif ($post->post_name) {
		$slug = $post->post_name;
	} else {
		$slug = sanitize_title($post->post_title);
	}
	$url = home_url(user_trailingslashit('resources/blog/' . $slug));
	return $url;
}
add_filter('post_link', 'append_query_string', 10, 3);


/**
 * Disable Posts' meta from being preloaded
 * This fixes memory problems in the WordPress Admin
 */
function jb_pre_get_posts(WP_Query $wp_query)
{
	if (in_array($wp_query->get('post_type'), array('community'))) {
		$wp_query->set('update_post_meta_cache', false);
	}
}

// Only do this for admin
if (is_admin()) {
	add_action('pre_get_posts', 'jb_pre_get_posts');
}

function sl_my_cpts_market()
{

	/**
	 * Post Type: Markets.
	 */

	$labels = [
		"name" => __("Markets", "senior-lifestyle-child"),
		"singular_name" => __("Market", "senior-lifestyle-child"),
		"menu_name" => __("Market Pages", "senior-lifestyle-child"),
		"all_items" => __("All Markets", "senior-lifestyle-child"),
		"add_new" => __("Add New", "senior-lifestyle-child"),
		"add_new_item" => __("Add New Market", "senior-lifestyle-child"),
		"edit_item" => __("Edit Market", "senior-lifestyle-child"),
		"new_item" => __("New Market", "senior-lifestyle-child"),
		"view_item" => __("View Market", "senior-lifestyle-child"),
		"view_items" => __("View Markets", "senior-lifestyle-child"),
		"search_items" => __("Search Markets", "senior-lifestyle-child"),
		"not_found" => __("No Markets found", "senior-lifestyle-child"),
		"not_found_in_trash" => __("No Markets found in trash", "senior-lifestyle-child"),
		"parent" => __("Parent Market:", "senior-lifestyle-child"),
		"featured_image" => __("Featured image for this Market", "senior-lifestyle-child"),
		"set_featured_image" => __("Set featured image for this Market", "senior-lifestyle-child"),
		"remove_featured_image" => __("Remove featured image for this Market", "senior-lifestyle-child"),
		"use_featured_image" => __("Use as featured image for this Market", "senior-lifestyle-child"),
		"archives" => __("Market archives", "senior-lifestyle-child"),
		"insert_into_item" => __("Insert into Market", "senior-lifestyle-child"),
		"uploaded_to_this_item" => __("Upload to this Market", "senior-lifestyle-child"),
		"filter_items_list" => __("Filter Markets list", "senior-lifestyle-child"),
		"items_list_navigation" => __("Markets list navigation", "senior-lifestyle-child"),
		"items_list" => __("Markets list", "senior-lifestyle-child"),
		"attributes" => __("Markets attributes", "senior-lifestyle-child"),
		"name_admin_bar" => __("Market", "senior-lifestyle-child"),
		"item_published" => __("Market published", "senior-lifestyle-child"),
		"item_published_privately" => __("Market published privately.", "senior-lifestyle-child"),
		"item_reverted_to_draft" => __("Market reverted to draft.", "senior-lifestyle-child"),
		"item_scheduled" => __("Market scheduled", "senior-lifestyle-child"),
		"item_updated" => __("Market updated.", "senior-lifestyle-child"),
		"parent_item_colon" => __("Parent Market:", "senior-lifestyle-child"),
	];

	$args = [
		"label" => __("Markets", "senior-lifestyle-child"),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => ["slug" => "market", "with_front" => true],
		"query_var" => true,
		"menu_icon" => "dashicons-admin-multisite",
		"supports" => ["title", "editor", "thumbnail", "custom-fields", "revisions", "page-attributes"],
	];

	register_post_type("market", $args);
}

add_action('init', 'sl_my_cpts_market');

function cpt_testimonials()
{

	/**
	 * Post Type: Testimonials.
	 */

	$labels = [
		"name" => __("Testimonials", "senior-lifestyle-child"),
		"singular_name" => __("Testimonial", "senior-lifestyle-child"),
	];

	$args = [
		"label" => __("Testimonials", "senior-lifestyle-child"),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => ["slug" => "testimonials", "with_front" => true],
		"query_var" => true,
		"supports" => ["title", "editor", "thumbnail"],
	];

	register_post_type("testimonials", $args);
}

add_action('init', 'cpt_testimonials');
function cpt_taxonomy_section()
{

	/**
	 * Taxonomy: Sections.
	 */

	$labels = [
		"name" => __("Sections", "senior-lifestyle-child"),
		"singular_name" => __("Section", "senior-lifestyle-child"),
		"menu_name" => __("Sections", "senior-lifestyle-child"),
		"all_items" => __("All Sections", "senior-lifestyle-child"),
		"edit_item" => __("Edit Section", "senior-lifestyle-child"),
		"view_item" => __("View Section", "senior-lifestyle-child"),
		"update_item" => __("Update Section name", "senior-lifestyle-child"),
		"add_new_item" => __("Add new Section", "senior-lifestyle-child"),
		"new_item_name" => __("New Section name", "senior-lifestyle-child"),
		"parent_item" => __("Parent Section", "senior-lifestyle-child"),
		"parent_item_colon" => __("Parent Section:", "senior-lifestyle-child"),
		"search_items" => __("Search Sections", "senior-lifestyle-child"),
		"popular_items" => __("Popular Sections", "senior-lifestyle-child"),
		"separate_items_with_commas" => __("Separate Sections with commas", "senior-lifestyle-child"),
		"add_or_remove_items" => __("Add or remove Sections", "senior-lifestyle-child"),
		"choose_from_most_used" => __("Choose from the most used Sections", "senior-lifestyle-child"),
		"not_found" => __("No Sections found", "senior-lifestyle-child"),
		"no_terms" => __("No Sections", "senior-lifestyle-child"),
		"items_list_navigation" => __("Sections list navigation", "senior-lifestyle-child"),
		"items_list" => __("Sections list", "senior-lifestyle-child"),
	];

	$args = [
		"label" => __("Sections", "senior-lifestyle-child"),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => false,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => ['slug' => 'section', 'with_front' => true,],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"rest_base" => "section",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => true,
	];
	register_taxonomy("section", ["testimonials"], $args);
}
add_action('init', 'cpt_taxonomy_section');

// Generates resized image
function update_banner_image($banner_img_path)
{
	$banner_dir = ABSPATH . 'wp-content/uploads/banner/';
	$banner_sufix = 'final';
	$banner_ext = 'jpg';
	$banner_filename = basename($banner_img_path, '.' . $banner_ext);
	$existing_path =  str_replace('.' . $banner_ext,  '-' . $banner_sufix . '.' . $banner_ext, $banner_img_path);

	if (!file_exists($banner_img_path)) {
		return;
	}

	// Check if file doesn't exist
	if (file_exists($existing_path)) {
		$banner_img_path = $existing_path;
	} else {
		$editor = wp_get_image_editor($banner_img_path, array());
		if (is_wp_error($editor)) {
			return;
		}

		$new_width = 1920;
		$new_height = 620;
		// Resize the image to fit within a square of the width 
		$result = $editor->resize($new_width, $new_width, false);
		// Crop the height of image
		$result = $editor->resize($new_width, $new_height, true);

		if (!is_wp_error($result)) {
			$banner_img_path = $editor->generate_filename($banner_sufix, $banner_dir, $banner_ext);
			$editor->save($banner_img_path);
		}
	}

	return str_replace(
		wp_get_upload_dir()['basedir'],
		wp_get_upload_dir()['baseurl'],
		$banner_img_path
	);
}

function market_locations($community_taxonomy,$community_states_list)
{
	include_once(get_stylesheet_directory() . '/includes/states_array.php');


	$market_args = array(
		'posts_per_page' => -1,
		'offset' => 0,
		'orderby' => 'title',
		'order' => 'ASC',
		'post_type' => 'market',
		'post_status' => 'publish'
	);

	$community_args = array(
		'posts_per_page' => -1,
		'offset' => 0,
		'orderby' => 'title',
		'order' => 'ASC',
		'post_type' => 'community',
		'post_status' => 'publish',
		'tax_query' => array(
			array(
				'taxonomy' => 'community_category',
				'field' => 'slug',
				'terms' => $community_taxonomy->slug,
			)
		)
	);

	// Get location with page option (senior care option)
	$locations = get_posts($community_args);
	$markets = get_posts($market_args);
	$location_with_option = [];



foreach($community_states_list as $key){
	$location_and_market[$states[$key->meta_value]] = array();
	
}

	// Creates list of locations with the pages Care Option
	foreach ($locations as $post) {
		$meta = get_post_meta($post->ID);
		$community_state = $meta['general_information_community_address_state'][0];
		$state_name = $states[$community_state];

		if (!in_array($state_name, $location_with_option)) {
			$location_with_option[] = $state_name;
		}
	};

	// Links Market pages to locations in $location_with_option
	foreach ($markets as $market) {
		$meta = get_post_meta($market->ID);
		// print_r($meta);
		foreach ($location_with_option as $state) {
			// print_r($state);die;
			if ($state == ucwords($meta['market_state'][0])) {
				$location_and_market[ucwords($meta['market_state'][0])][$meta['market_name'][0]][] = $market->post_name;
			};
		};
	};
	// Sorts array by States
	ksort($location_and_market);
	// echo "<pre>";
	// print_r($bla);
	// print_r($location_and_market);die;
	return $location_and_market;
}