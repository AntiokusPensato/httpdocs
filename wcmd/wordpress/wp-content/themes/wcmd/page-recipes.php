<?php
get_header();
?>
<div class="main-content">
    <main>
        <ol class="cards">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <li class="card">
                <div>
                    <figure class="card-figure">
                        <?php the_post_thumbnail(); ?>
                    </figure>
                    
                    <?php if( function_exists( 'bcn_display' ) ){ ?>
                    <div>
                        <p><?php bcn_display(); ?></p>
                    </div>
                    <?php } ?>
                    
                    <section class="card-section">
                        <h2 class="card-section-title"><?php the_title(); ?></h2>
                        
                        <!-- Custom Fields for Recipes pagea -->
                        <p><strong>Cooking Time:</strong> <?php echo get_post_meta(get_the_ID(), 'Cooking Time:', true); ?></p>
                        <p><strong>Serving Size:</strong> <?php echo get_post_meta(get_the_ID(), 'Serving Size:', true); ?></p>
                        <p><strong>Ingredients:</strong> <?php echo nl2br(get_post_meta(get_the_ID(), 'Ingredients:', true)); ?></p>

                        <?php if( $post->post_excerpt ) { ?>
                        <div class="tagline"><?php the_excerpt(); ?></div>
                        <?php } ?>
                        
                        <div class="card-section-meta">
                            <time class="card-section-meta-date" datetime="<?php the_time( 'Y-m-d' ) ?>"><?php the_time( 'l, d F Y' ) ?></time>
                            <span class="card-section-meta-author">By: <?php the_author(); ?></span>
                        </div>
                        <div class="card-section-excerpt">
                            <?php the_content(); ?>
                        </div>

                    </section>
                </div>
                <?php endwhile; else: ?>
                <section class="card-section">
                    <p class="card-section-excerpt"><?php _e( 'Sorry, no posts matched your criteria!' ); ?></p>
                </section>
                <?php endif; ?>
            </li>
        </ol>
    </main>

    <?php get_sidebar(); ?>
</div>

<?php
get_footer();
?>
