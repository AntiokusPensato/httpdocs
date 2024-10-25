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
                    <section class="card-section">
                        <h2 class="card-section-title"><?php the_title(); ?></h2>
                        <div class="card-section-meta">
                            <time class="card-section-meta-date" datetime="<?php the_time( 'Y-m-d' ) ?>"><?php the_time( 'l, d F Y' ) ?></time>
                            <span class="card-section-meta-author">By: <?php the_author(); ?></span>
                            <span class="card-section-meta-comments">
                                <a href="<?php the_permalink(); ?>#comments" title="<?php the_title_attribute() ?> Comments">
                                <?php comments_number( '0 comments', 'only 1 comment', '% comments' ); ?>
                                </a>
                            </span>
                        </div>
                        <div class="card-section-excerpt">
                            <?php the_content(); ?>
                        </div>
                    </section>
                    <div>
                        <div>
                            <p>Filed Under: <?php the_category( ', ' ); ?></p>
                        </div>
                        <?php if( get_the_tags() ) { ?>
                        <div>
                            <p><?php the_tags(); ?></p>
                        </div>
                        <?php } ?>
				    </div>
                    
                    <div>
                        <?php previous_post_link( '%link', '&lt; Previous Post' ); ?>
				        <?php next_post_link( '%link', 'Next Post &gt;' ); ?>
                    </div>
                    
                    <div>
                        <h3>Written by: <?php the_author_posts_link(); ?></h3>
                        <?php echo get_avatar( get_the_author_meta( 'email' ), '150', 'mm', 'Avatar of '.get_the_author_meta( 'first_name' ).' '.get_the_author_meta( 'last_name' ) ); ?>
                        
                        <?php if( get_the_author_meta( 'description' ) ) { ?>
                        <p><?php the_author_meta( 'description' ); ?></p>
                        <?php } ?>
                        
                        <?php if( get_the_author_meta( 'user_url' ) ) { ?>
                            <a href="<?php the_author_meta( 'user_url' ); ?>" title="<?php the_author_meta( 'first_name' ); ?>'s Website" target="_blank">
                        <?php the_author_meta( 'user_url' ); ?></a> 
                        <?php } ?>
				    </div>
                    
                    <div class="comments">
			        <?php comments_template( '', true ); ?>
				    </div>
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