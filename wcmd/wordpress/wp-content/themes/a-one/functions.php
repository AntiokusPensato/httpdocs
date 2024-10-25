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