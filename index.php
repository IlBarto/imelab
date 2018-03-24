<?php
get_header(); ?>
<h2>index</h2>
<div id="main-container">
    <section id="content-container" class="container">
        <?php
        if ( have_posts() ) :
            while ( have_posts() ) : the_post();

                get_template_part( 'template-parts/post/content', get_post_format());

                the_posts_pagination();
            endwhile;
        else:
            get_template_part('template-parts/post/content', 'none');
        endif; ?>
    </section>
</div>

<?php
get_footer(); ?>