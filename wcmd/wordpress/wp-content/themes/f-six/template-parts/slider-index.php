<?php
$wcmd_slider_args = [
	'cat' => $args['cat'], // ID for slider category
	'posts_per_page' => $args['posts_per_page'],
];
$wcmd_slider_query = new WP_Query( $wcmd_slider_args );
if ($wcmd_slider_query->found_posts) :
?>
<section class="splide">
    <div class="splide__slider">
        <div class="splide__track">
            <ul class="splide__list">
                <?php		
if ( $wcmd_slider_query->have_posts() ) : while ( $wcmd_slider_query->have_posts() ) : $wcmd_slider_query->the_post(); 
/**
 * IF - Admin user created wcmd_slider_url Custom Field
 * Use the custom URI value
 * Else use the post permalink value
 * null coalescing operator ( ?? ) if first value is null use the second value
 */
$wcmd_slider_url = get_post_custom_values('wcmd_slider_url')[0] ?? get_the_permalink();
?>
                <li class="splide__slide">
                    <a href="<?php  echo $wcmd_slider_url; ?>" title="Go to the <?php the_title(); ?> post page.">
                        <h2 class="splide__slide-title"><?php the_title(); ?></h2>
                        <?php the_post_thumbnail( 'card' ); ?>
                    </a>
                </li>
                <?php endwhile; endif; 
wp_reset_postdata(); 
?>
            </ul>
        </div>
    </div>

    <button class="splide__toggle" type="button">
        <span class="splide__toggle__play">Play</span>
        <span class="splide__toggle__pause">Pause</span>
    </button>
</section>
<?php
// $wcmd_slider_query->found_posts
endif;
?>