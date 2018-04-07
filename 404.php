<?php
    get_header(); ?>

<div id="main-container" >
    <section id="content-container" class="container">
        <article id="post-0" class="post no-result not-found">
            <header>
                <h1 class="entry-title"><?php esc_html_e( '404 - Page Not Found', 'imelab' ); ?></h1>
            </header>
            <p><?php esc_html_e( 'Resource not found', 'imelab' ); ?></p>
            <p><?php esc_html_e( 'Why don&rsquo;t you try something else?', 'imelab' ); ?></p>
            <?php get_search_form(); ?>
        </article>
    </section>
</div>
<?php
    get_footer(); ?>
