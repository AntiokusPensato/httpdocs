
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php bloginfo(); ?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_url' ); ?>" >
</head>

<body>
    
    <header>
        <h1><?php bloginfo( 'name' ); ?> | <?php bloginfo( 'description' ); ?></h1>
        <nav>
            <?php wp_nav_menu( array('menu' => 'Main Nav' ) ); ?>
        </nav>
    </header>
    
    <main>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <section>
            <h2><a href="<?php the_permalink(); ?>" title="For More Info on <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2> 
            <?php the_content(); ?>
        </section>
        <?php endwhile; else: ?>
            <p><?php _e( 'Sorry, no posts matched your criteria!' ); ?></p>
        <?php endif; ?>    
    </main>
    
    <footer>
        <a href="/">&copy; 2024 - Trevor</a>
        <a href="javascript:void(location='https://jigsaw.w3.org/css-validator/validator?uri='+escape(location))">CSS</a>
        <a href="javascript:void(location='https://validator.w3.org/nu/?doc='+escape(location))">HTML</a>
    </footer>

</body>
</html>