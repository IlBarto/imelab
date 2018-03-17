<?php
get_header(); ?>
<h2>index</h2>
<div id="main-container">
    <section id="content-container">
        <?php
        if ( have_posts() ) :
            while ( have_posts() ) : the_post();

                //mostra la data
                the_date('','<h3 class="the_date">','</h3>' );
                
                get_template_part( 'template-parts/post/content', get_post_format());

                if (is_singular()) {
                    comments_template ('', true);
                }
            endwhile;
        else:
            get_template_part('template-parts/post/content', 'none');
        endif; ?>
    </section>
</div>

<?php
get_footer(); ?>