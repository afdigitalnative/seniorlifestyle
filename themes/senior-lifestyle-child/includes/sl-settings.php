<?php

// DISABLE GUTENBERG
    add_filter('use_block_editor_for_post_type', '__return_false', 10);

    // prevent loading Gutenberg-related stylesheets.
    add_action( 'wp_enqueue_scripts', 'remove_block_css', 100 );

    function remove_block_css() {
        wp_dequeue_style( 'wp-block-library' );             // Wordpress core
        wp_dequeue_style( 'wp-block-library-theme' );       // Wordpress core
        // wp_dequeue_style( 'wc-block-style' );               // WooCommerce
        // wp_dequeue_style( 'storefront-gutenberg-blocks' );  // Storefront theme
    }


// DISABLE AUTO EMBED SCRIPT
    function deregister_wp_embed_script(){
        wp_deregister_script( 'wp-embed' );
    }

    add_action( 'wp_footer', 'deregister_wp_embed_script' );

// DISABLE THE EMOJI'S
// see line 277 class-child-theme


// HIDE EXTRA THEMES THAT SHOULD NOT BE AVAIALBLE
    function hide_themes($arr){
        unset($arr["senior-lifestyle"]);
        unset($arr["twentysixteen"]);
        unset($arr["twentyseventeen"]);
        unset($arr["twentyeighteen"]);
        unset($arr["twentynineteen"]);

        return $arr;
    }
    add_filter( 'wp_prepare_themes_for_js', 'hide_themes');


// DISABLE COMMENTS AND TRACKBACKS IN POST TYPES
    add_action('admin_init', function () {
        // Redirect any user trying to access comments page
        global $pagenow;

        if ($pagenow === 'edit-comments.php') {
            wp_redirect(admin_url());
            exit;
        }

        // Remove comments metabox from dashboard
        remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');

        // Disable support for comments and trackbacks in post types
        foreach (get_post_types() as $post_type) {
            if (post_type_supports($post_type, 'comments')) {
                remove_post_type_support($post_type, 'comments');
                remove_post_type_support($post_type, 'trackbacks');
            }
        }
    });

    // Close comments on the front-end
    add_filter('comments_open', '__return_false', 20, 2);
    add_filter('pings_open', '__return_false', 20, 2);

    // Hide existing comments
    add_filter('comments_array', '__return_empty_array', 10, 2);

    // Remove comments page in menu
    add_action('admin_menu', function () {
        remove_menu_page('edit-comments.php');
    });

    // Remove comments links from admin bar
    add_action('init', function () {
        if (is_admin_bar_showing()) {
            remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
        }
    });

    // remove the comments js script
    function deregister_comments_script(){
        wp_deregister_script( 'comment-reply' );
    }
    add_action( 'wp_footer', 'deregister_comments_script' );

    // remove the comments icon in admin bar
    add_action('wp_before_admin_bar_render', function() {
        global $wp_admin_bar;
        $wp_admin_bar->remove_menu('comments');
    });


// SENIOR LIFESTYLE LOGIN SCREEN
// available only on login screen
    function sl_login_stylesheet() {
        wp_enqueue_style( 'custom-login', get_stylesheet_directory_uri() . '/assets/dist/css/login.css' );
    }
    add_action( 'login_enqueue_scripts', 'sl_login_stylesheet' );

    function sl_login_logo_url() {
        return home_url();
    }
    add_filter( 'login_headerurl', 'sl_login_logo_url' );

    function sl_login_title() {
        return 'Lifestyle Choices – Your Life, Your Style';
    }
    add_filter( 'login_headertitle', 'sl_login_title' );