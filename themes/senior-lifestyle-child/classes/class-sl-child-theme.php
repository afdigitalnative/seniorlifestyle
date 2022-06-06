<?php

/**
 * Helper class for child theme functions.
 *
 * @class SL_Child_Theme
 */

//use Map_My_Stores_Public;

final class SL_Child_Theme
{

    function __construct()
    {
    }

    static public function enqueue_scripts()
    {
        /*
        *
        * SCRIPT ENQUEUES
        *
        */

        // COMMUNITY SCRIPTS
        wp_register_script(
            'sl-community-scripts',
            get_stylesheet_directory_uri() . '/assets/dist/js/main-community.js',
            array('jquery'),
            null,
            true
        );
        // END COMMUNITY SCRIPTS

        // LOC SCRIPTS
        wp_register_script(
            'sl-lifestyle-scripts',
            get_stylesheet_directory_uri() . '/assets/dist/js/main-lifestyle.js',
            array('jquery'),
            null,
            true
        );
        // END LOC SCRIPTS

        // START MAIN SCRIPTS
        wp_register_script(
            'sl-main-scripts',
            get_stylesheet_directory_uri() . '/assets/dist/js/main.js',
            array('jquery'),
            null,
            true
        );
        // END MAIN SCRIPTS

        wp_register_script(
            'sl-financial-calculator-scripts1',
            get_stylesheet_directory_uri() . '/assets/src/js/financial-calculator.js',
            array('jquery'),
            null,
            true
        );

        //MORE CONTENT
        wp_register_script(
            'sl-more-content-script',
            get_stylesheet_directory_uri() . '/assets/src/js/more-content.js',
            array('jquery'),
            null,
            true
        );

        wp_register_style(
            'sl-community-styles',
            get_stylesheet_directory_uri() . '/assets/dist/css/single-community.css',
            array(),
            wp_get_theme()->get('Version'),
            'all'
        );

        wp_register_style(
            'sl-homepage-styles',
            get_stylesheet_directory_uri() . '/assets/dist/css/homepage.css',
            array(),
            wp_get_theme()->get('Version'),
            'all'
        );

        wp_register_style(
            'sl-lifestyle-options-styles',
            get_stylesheet_directory_uri() . '/assets/dist/css/template-lifestyle-options.css',
            array(),
            wp_get_theme()->get('Version'),
            'all'
        );

        wp_register_style(
            'sl-blog-archive-styles',
            get_stylesheet_directory_uri() . '/assets/dist/css/blog-archive.css',
            array(),
            wp_get_theme()->get('Version'),
            'all'
        );


        wp_register_style(
            'sl-blog-single-styles',
            get_stylesheet_directory_uri() . '/assets/dist/css/blog-single.css',
            array(),
            wp_get_theme()->get('Version'),
            'all'
        );
        wp_register_style(
            'sl-financial-calculator-styles',
            get_stylesheet_directory_uri() . '/assets/dist/css/financial-calculator.css',
            array(),
            wp_get_theme()->get('Version'),
            'all'
        );
        // ABOUT US STYLES
        wp_register_style(
            'sl-about-page-styles',
            get_stylesheet_directory_uri() . '/assets/dist/css/template-about-page.css',
            array(),
            wp_get_theme()->get('Version'),
            'all'
        );
        // ABOUT ACTIVITIES STYLES
        wp_register_style(
            'sl-about-activities-styles',
            get_stylesheet_directory_uri() . '/assets/dist/css/template-about-activities.css',
            array(),
            wp_get_theme()->get('Version'),
            'all'
        );
        // ABOUT VALUES STYLES
        wp_register_style(
            'sl-about-values-styles',
            get_stylesheet_directory_uri() . '/assets/dist/css/template-about-values.css',
            array(),
            wp_get_theme()->get('Version'),
            'all'
        );

        // ABOUT COVID STYLES
        wp_register_style(
            'sl-about-covid-styles',
            get_stylesheet_directory_uri() . '/assets/dist/css/template-covid.css',
            array(),
            wp_get_theme()->get('Version'),
            'all'
        );

        // RESOURCES STYLES
        wp_register_style(
            'sl-resources-styles',
            get_stylesheet_directory_uri() . '/assets/dist/css/template-resources.css',
            array(),
            wp_get_theme()->get('Version'),
            'all'
        );

        //FINANCIAL PLANNING STYLES
        wp_register_style(
            'sl-financial-planning-styles',
            get_stylesheet_directory_uri() . '/assets/dist/css/template-financial-planning.css',
            array(),
            wp_get_theme()->get('Version'),
            'all'
        );

        //CAREERS STYLES
        wp_register_style(
            'sl-careers-styles',
            get_stylesheet_directory_uri() . '/assets/dist/css/template-careers.css',
            array(),
            wp_get_theme()->get('Version'),
            'all'
        );

        //FAQ STYLES
        wp_register_style(
            'sl-faq-styles',
            get_stylesheet_directory_uri() . '/assets/dist/css/faq.css',
            array(),
            wp_get_theme()->get('Version'),
            'all'
        );

        // jQuery
        if (!is_admin()) {
            // Remove default jquery
            wp_deregister_script('jquery');
            // Register jquery
            wp_register_script(
                "jquery",
                "//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js",
                array(),
                false,
                true
            );
        }

        if (is_front_page()) {
            wp_enqueue_script('sl-main-scripts');
            wp_enqueue_style('sl-homepage-styles');
        } else if (is_home()) {
            wp_enqueue_script('sl-main-scripts');
            wp_enqueue_style('sl-blog-archive-styles');
        } else if (is_singular('community')) {
            wp_enqueue_script('sl-community-scripts');
            wp_enqueue_style('sl-community-styles');
        } else if (is_page_template('financial-calculator.php')) {
            wp_enqueue_style('sl-financial-calculator-styles');
            wp_enqueue_script('sl-main-scripts');
        } else if (is_singular('post')) {
            wp_enqueue_style('sl-blog-single-styles');
            wp_enqueue_script('sl-main-scripts');
        } else if (is_singular('alert')) {
            wp_enqueue_style('sl-blog-single-styles');
            wp_enqueue_script('sl-main-scripts');
        } else if (is_singular('market')) {
            wp_register_style(
                'map-my-stores',
                get_stylesheet_directory_uri() . '/assets/dist/css/map-my-stores.css',
                array(),
                wp_get_theme()->get('Version'),
                'all'
            );
            wp_enqueue_style('map-my-stores');

            wp_register_script(
                'map-my-stores',
                '/wp-content/plugins/map-my-stores/public/js/map-my-stores-public-dist.js',
                array(),
                '2020.10.30a',
                false
            );
            wp_enqueue_script('map-my-stores');
        } else if (is_page_template('template-lifestyle-options.php')) {
            wp_enqueue_style('sl-lifestyle-options-styles');
			wp_enqueue_script('sl-lifestyle-scripts');
            wp_enqueue_script('sl-main-scripts');
        } else if (is_page_template('template-about-page.php')) {
            wp_enqueue_style('sl-about-page-styles');
            wp_enqueue_script('sl-main-scripts');
        } else if (is_page_template('template-about-activities.php')) {
            wp_enqueue_style('sl-about-activities-styles');
            wp_enqueue_script('sl-main-scripts');
        } else if (is_page_template('template-about-values.php')) {
            wp_enqueue_style('sl-about-values-styles');
            wp_enqueue_script('sl-main-scripts');
            wp_enqueue_script('sl-more-content-script');
        } else if (is_page_template('template-covid.php')) {
            wp_enqueue_style('sl-about-covid-styles');
            wp_enqueue_script('sl-main-scripts');
        } else if (is_page_template('template-resources-page.php')) {
            wp_enqueue_style('sl-resources-styles');
            wp_enqueue_script('sl-main-scripts');
        } else if (is_page_template('template-financial-planning.php')) {
            wp_enqueue_style('sl-financial-planning-styles');
            wp_enqueue_script('sl-main-scripts');
        } else if (is_page_template('template-careers.php')) {
            wp_enqueue_style('sl-careers-styles');
            wp_enqueue_script('sl-main-scripts');
        } else if (is_page_template('template-faq.php')) {
            wp_enqueue_style('sl-faq-styles');
            wp_enqueue_script('sl-main-scripts');
        } else {
            wp_enqueue_script('sl-main-scripts');
        }
            wp_enqueue_script('jquery');
    }

    static public function hook_fancybox_css()
    {
        $fancybox_css = file_get_contents(SL_CHILD_THEME_DIR . '/assets/src/scss/vendor/fancybox/fancybox.css');
        echo '<style>' . $fancybox_css . '</style>';
    }

    static public function inline_scripts()
    {
        if (is_singular('community')) {
            self::hook_fancybox_css();
        }
    }

    static public function remove_emojis()
    {
        // all actions related to emojis
        remove_action('admin_print_styles', 'print_emoji_styles');
        remove_action('wp_head', 'print_emoji_detection_script', 7);
        remove_action('admin_print_scripts', 'print_emoji_detection_script');
        remove_action('wp_print_styles', 'print_emoji_styles');
        remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
        remove_filter('the_content_feed', 'wp_staticize_emoji');
        remove_filter('comment_text_rss', 'wp_staticize_emoji');

        // filter to remove TinyMCE emojis
        add_filter('tiny_mce_plugins', 'disable_emojicons_tinymce');

        function disable_emojicons_tinymce($plugins)
        {
            if (is_array($plugins)) {
                return array_diff($plugins, array('wpemoji'));
            } else {
                return array();
            }
        }
    }

    static public function unhook_parent_theme_scripts()
    {
        wp_dequeue_script('senior-lifestyle-parent-navigation');
        wp_dequeue_script('senior-lifestyle-parent-skip-link-focus-fix');
    }
}
