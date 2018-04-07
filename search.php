<?php
get_header(); ?>

<h2>search</h2>
<div id="main-container">
    <section id="content-container" class="container">
        <?php
        if ( have_posts() ) : ?>
            <h1 class="page-title"><?php printf( __('Search results for: %s', 'imelab'), '<span>'. get_search_query() .'</span>'); ?></h1>
            <?php
            while ( have_posts() ) : the_post();
                get_template_part('template-parts/post/content', 'excerpt');
            endwhile;
            the_posts_pagination();
        else : ?>
            <h1 class="page-title"><?php _e( 'Nothing Found', 'imelab' ); ?></h1>
        <?php endif; ?>
    </section>
</div>

<?php
get_footer(); ?>