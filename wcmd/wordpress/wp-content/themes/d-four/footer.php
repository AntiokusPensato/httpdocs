<div class="footer-main">
    <?php get_sidebar('footer-upper'); ?>
    <footer class="footer-lower">
        <?php
                    $footer_nav = array(
                        'theme_location' => 'nav-footer',
                        'container' => 'nav',
                        'container_class' => 'nav-footer',
                        'depth' => 1
                    );
                    wp_nav_menu( $footer_nav );
                ?>
    </footer>
</div>
</div>

<?php
wp_footer();
?>

</body>

</html>