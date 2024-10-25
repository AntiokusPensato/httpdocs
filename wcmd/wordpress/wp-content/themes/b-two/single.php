<?php
get_header();
?>
<div class="main-content">
    <main>
        <div class="cards">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <section class="card">
                <h2><a href="<?php the_permalink(); ?>" title="For More Info on <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                <?php the_content(); ?>
            </section>
            <?php endwhile; else: ?>
            <p><?php _e( 'Sorry, no posts matched your criteria!' ); ?></p>
            <?php endif; ?>
        </div>
    </main>

    <aside>
        <h2>Sidebar</h2>
        <section>
            <h2>Widget</h2>
            <p>Widget Content - Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt fugit quaerat quas possimus illum laborum voluptatibus pariatur excepturi a, mollitia numquam esse voluptatem. Necessitatibus ratione temporibus id hic molestias maxime!</p>
        </section>
        <section>
            <h2>Widget</h2>
            <p>Widget Content - Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt fugit quaerat quas possimus illum laborum voluptatibus pariatur excepturi a, mollitia numquam esse voluptatem. Necessitatibus ratione temporibus id hic molestias maxime!</p>
        </section>
        <section>
            <h2>Widget</h2>
            <p>Widget Content - Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt fugit quaerat quas possimus illum laborum voluptatibus pariatur excepturi a, mollitia numquam esse voluptatem. Necessitatibus ratione temporibus id hic molestias maxime!</p>
        </section>
    </aside>
</div>

<?php
get_footer();
?>