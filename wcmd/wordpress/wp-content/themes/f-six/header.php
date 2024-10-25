<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div class="wrapper">
        <header>
            <nav>
                <input id="nav-toggle-icon" type="checkbox">
                <label for="nav-toggle-icon"><span></span></label>
                <div class="nav-main-drawer">
                    <!-- Main Menu -->
                    <?php
					$nav_main_header_top = array(
						'theme_location' => 'nav-main-header-top',
						'container_class' => 'nav-main',
						'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
						'depth' => 1
					);
                    wp_nav_menu( $nav_main_header_top );
					?>

                    <?php get_search_form() ?>
                </div>
            </nav>


            <div class="header-content">
                <h1>
                    <a href="<?php echo home_url() ?>">
                        <?php bloginfo( 'name' ); ?>
                        <span><?php bloginfo( 'description' ); ?></span>
                    </a>
                </h1>
                <div class="header-content-ad">
                    <?php get_sidebar( 'header' ); ?>
                </div>

            </div>
            <?php
            $nav_sub_header_bottom = array(
                'theme_location' => 'nav-sub-header-bottom',
                'container_class' => 'nav-sub',
                'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                'depth' => 1
            );
            wp_nav_menu( $nav_sub_header_bottom );
            ?>
        </header>