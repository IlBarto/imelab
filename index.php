<?php
get_header(); ?>
<h2>index</h2>
<div id="main-container">
    <section id="content-container">
        <?php
        //avvia il loop del contenuto
        if ( have_posts() ) :
            while ( have_posts() ) : the_post();

                //mostra la data
                the_date('','<h3 class="the_date">','</h3>' );

                the_post_thumbnail();

                get_template_part( 'content', get_post_format()); ?>

                <?php //cerca commenti

                if (is_singular()) {
                    comments_template ('', true);
                }
                // fine del loop
            endwhile;
        //non ci sono commenti

        else:
            get_template_part('template-parts/post/content', 'none');
        endif; ?>
    </section>
</div>

<?php
get_footer(); ?>