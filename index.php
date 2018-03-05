<?php
get_header(); ?>

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

        else: ?>
        <article id="post-0" class="post no-results not-found">
            <header>
                <h2 class="entry-title"> Non è stato trovato nulla </h2>
            </header>

            <p> mi spiace, non c'è nulla. Riprova. </p>

            <?php get_search_form(); ?>
        </article>
    </section>




    <?php // se si tratta di un risultato di ricerca
    if (is_search()) : ?>

        <header class="page-header">
            <h1 class="page-title">avete cercato <br/>
                <span> <?php the_search_query(); ?> </span>
            </h1>
        </header>
    <?php
    endif; ?>


    <?php
    endif; ?>

    <?php //get_sidebar();?>


</div>

<?php
//get_footer();
?>