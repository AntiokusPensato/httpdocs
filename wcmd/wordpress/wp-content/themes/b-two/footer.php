<div class="footer-main">
    <div class="footer-upper">
        <div class="widget">
            <h2>Widget</h2>
            <p>Widget Content - Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt fugit quaerat quas possimus illum laborum voluptatibus pariatur excepturi a, mollitia numquam esse voluptatem. Necessitatibus ratione temporibus id hic molestias maxime!</p>
        </div>
        <div class="widget">
            <h2>Widget</h2>
            <p>Widget Content - Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt fugit quaerat quas possimus illum laborum voluptatibus pariatur excepturi a, mollitia numquam esse voluptatem. Necessitatibus ratione temporibus id hic molestias maxime!</p>
        </div>
        <div class="widget">
            <h2>Widget</h2>
            <p>Widget Content - Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt fugit quaerat quas possimus illum laborum voluptatibus pariatur excepturi a, mollitia numquam esse voluptatem. Necessitatibus ratione temporibus id hic molestias maxime!</p>
        </div>
    </div>
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