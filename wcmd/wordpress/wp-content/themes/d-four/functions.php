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

        // Let WordPress manage the document title.
        add_theme_support( 'title-tag' );
        
        // Allow admin users add Featured Images
        add_theme_support( 'post-thumbnails' );

        // Output HTML5 style HTML
        add_theme_support('html5', [
            'caption',
            'comment-form',
            'comment-list',
            'gallery',
            'search-form',
            'search',
            'meta',
            'style',
            'script',
        ]);

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
}
add_action( 'widgets_init', 'wcmd_widgets_init' );