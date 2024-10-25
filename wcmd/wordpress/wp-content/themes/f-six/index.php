<?php
get_header();
?>
<div class="main-content">
    <main>
        <?php if (is_home()) get_template_part('template-parts/slider', 'index', ['cat' => 25, 'posts_per_page' => 4]) ?>

        <ol class="cards">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <li class="card">
                <a class="card-link" href="<?php the_permalink(); ?>" title="Read More About:  <?php the_title_attribute(); ?>">
                    <figure class="card-figure">
                        <?php the_post_thumbnail('card-small'); ?>
                    </figure>
                    <section class="card-section">
                        <h2 class="card-section-title"><?php the_title(); ?></h2>
                        <div class="card-section-meta">
                            <time class="card-section-meta-date" datetime="<?php the_time( 'Y-m-d' ) ?>"><?php the_time( 'l, d F Y' ) ?></time>
                            <span class="card-section-meta-author">By: <?php the_author(); ?></span>
                            <span class="card-section-meta-comments"><?php comments_number( '0 comments', 'only 1 comment', '% comments' ); ?></span>
                        </div>
                        <div class="card-section-excerpt">
                            <?php the_excerpt(); ?>
                        </div>
                        <span class="card-section-button">Read More&hellip;</span>
                    </section>
                </a>
                <?php endwhile; else: ?>
                <section class="card-section">
                    <p class="card-section-excerpt"><?php _e( 'Sorry, no posts matched your criteria!' ); ?></p>
                </section>
                <?php endif; ?>
            </li>
        </ol>
        <?php if( $wp_query->max_num_pages > 1 ) { ?>
        <?php wcmd_paginate(); ?>
        <?php } ?>
    </main>

    <?php get_sidebar(); ?>
</div>

<?php
get_footer();
?>