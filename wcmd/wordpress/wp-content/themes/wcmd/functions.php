<?php

/**
 * Make Function Pluggable
 *
 * Child Theme can have a function with the same name
 * That function can override this function
 * If the function does not exist use this function
 * Otherwise do nothing the function already exists
 */
if ( ! function_exists( 'wcmd_after_setup_theme' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function wcmd_after_setup_theme() {

        // Let WordPress manage the document title
        add_theme_support( 'title-tag' );

        // Allow Admin users to add Featured Images
        add_theme_support( 'post-thumbnails' );

        // Add RSS feed links to HTML <head>
        add_theme_support('automatic-feed-links');

        // Define sizes for Featured Images
        add_image_size( 'card-small', 480, 270, true );
        add_image_size( 'card', 847, 270, true );
        add_image_size( 'card-large', 1280, 270, true );

        // Define sizes for Custom Header Image
        // Allow Admin users to set Custom Header Image.
        // Path to image is via get_template_directory_uri() active theme or parent theme
        $custom_header_args = array(
            'width'         => 570,
            'height'        => 200,
            'default-image' => get_template_directory_uri() . '/images/custom-header.png',
            'uploads'       => true,
        );
        add_theme_support( 'custom-header', $custom_header_args );

        // Allow Admin users to set Custom Background Color/Image.
        add_theme_support( 'custom-background' );

        // Output HTML5 style HTML
        add_theme_support( 'html5', array(
          'caption',
          'comment-form',
          'comment-list',
          'gallery',
          'search-form',
        ) );

        // Allow Admin users to add Excerpt content to pages.
        add_post_type_support( 'page', 'excerpt' );

        // Register Navigation Menus.
        register_nav_menus(
            array(
                'nav-main-header-top' => 'Main Nav, Top of Header',
                'nav-sub-header-bottom' => 'Sub Nav, Bottom of Header',
                'nav-footer' => 'Footer Nav, Lower Footer'
            )
        );

        // Register and Enqueue JavaScript Files
        // Path to files is via get_template_directory_uri() active theme or parent theme
        function wcmd_enqueue_scripts() {

            if(is_home()) {
             // wp_enqueue_script( Handle              , Path to File                                      , Dependencies ['handle'], Version Number      , Add script Tag Before Closing body Tag )
                wp_enqueue_script( 'wcmd-splide-script', get_template_directory_uri() . '/js/splide.min.js', []                     , '4.1.4'            , true );
            }

            wp_enqueue_script( 'wcmd-script', get_template_directory_uri() . '/js/theme.js', ['jquery'], wp_get_theme()->get('Version'), true );
        }
        add_action( 'wp_enqueue_scripts', 'wcmd_enqueue_scripts' );

        // Register Enqueue CSS Files
        function wcmd_enqueue_styles() {

            // Find Theme Version Number from style.css
            // If parent() theme is true use wp_get_theme()?->parent()->get('Version')
            // Else use wp_get_theme()->get('Version')
            $theme_version_number = wp_get_theme()?->parent() ? wp_get_theme()?->parent()->get('Version') : wp_get_theme()->get('Version');

         // wp_enqueue_style( Handle     , Path to File                               , Dependencies ['handle'] , Version Number       , CSS Media Type )
            wp_enqueue_style('wcmd-style', get_template_directory_uri() . '/style.css', []                      , $theme_version_number, 'all');

            if(is_home()) {
                wp_enqueue_style( 'wcmd-splide-style', get_template_directory_uri() . '/css/splide.min.css', [], '4.1.4', 'screen' );   
            }

        }
        add_action('wp_enqueue_scripts', 'wcmd_enqueue_styles');

        // Pagination function.
        function wcmd_paginate() {
            global $paged, $wp_query;
            $abignum = 999999999; //we need an unlikely integer
            $args = array(
                'base' => str_replace( $abignum, '%#%', esc_url( get_pagenum_link( $abignum ) ) ),
                'format' => '?paged=%#%',
                'current' => max( 1, get_query_var( 'paged' ) ),
                'total' => $wp_query->max_num_pages,
                'show_all' => False,
                'end_size' => 2,
                'mid_size' => 2,
                'prev_next' => True,
                'prev_text' => __( '<', 'wcmd' ),
                'next_text' => __( '>', 'wcmd' ),
                'type' => 'list'
            );
            echo paginate_links( $args );
        }

    }
endif;
add_action( 'after_setup_theme', 'wcmd_after_setup_theme' );

/**
 * Register widget areas and custom widgets.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function wcmd_widgets_init() {

    /**
    * Registering "sidebars"
    */

    /**
    * Registering the Header "Sidebar"
    */
    $wcmd_header_sidebar = array(
        'name' => 'Header',
        'id' => 'header',
        'description' => 'Widgets placed here will display in the header to the right of the logo',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    );
    register_sidebar( $wcmd_header_sidebar );

    /**
    * Registering the Aside "Sidebar"
    */
    $wcmd_aside_sidebar = array(
        'name' => 'Aside',
        'id' => 'aside',
        'description' => 'Widgets placed here will go in the Right hand sidebar',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    );
    register_sidebar( $wcmd_aside_sidebar );

    /**
    * Registering the Upper Footer "Sidebar"
    */
    $wcmd_upperfooter_sidebar = array(
        'name' => 'Footer Upper',
        'id' => 'footer-upper',
        'description' => 'Widgets placed here will go in the upper footer area ',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    );
    register_sidebar( $wcmd_upperfooter_sidebar );

    /**
    * Registering the errror404 "Sidebar"
    */
    $wcmd_error_404_sidebar = array(
        'name' => 'Error 404',
        'id' => 'error-404',
        'description' => 'Widgets placed here will go in the 404 Error page',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    );
    register_sidebar( $wcmd_error_404_sidebar );

}
add_action( 'widgets_init', 'wcmd_widgets_init' );

// Redirect Search Request to /search/search-words vs /?s=search-words
function wcmd_mod_rewrite_search_url() {
    if ( is_search() && !empty($_GET['s']) ) {
        wp_redirect( home_url( "/search/" ) . urlencode( get_query_var( 's' ) ) );
        exit();
    }
}
add_action('template_redirect', 'wcmd_mod_rewrite_search_url');
