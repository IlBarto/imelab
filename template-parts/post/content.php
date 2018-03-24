<h2>content</h2>
<article id="post-<?php the_ID(); ?>" <?php post_class('row'); ?>>
    <?php
    if ( '' !== get_the_post_thumbnail() ) : ?>
        <div class="post-thumbnail col-md-4">
            <?php the_post_thumbnail(); ?>
        </div><!-- .post-thumbnail -->
	<?php endif; ?>

    <div class="content-wrapper col-md-8">
        <header class="entry-header">
            <?php
            if ( is_single() ) {
                echo "is_single";
                the_title( '<h1 class="entry-title">', '</h1>' );
            } else {
                echo "else";
                the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
            }
            ?>
        </header>

        <?php
        if(is_single()) :
            the_content();
        else :
            the_excerpt(); ?>
            <a class="btn btn-outline-secondary btn-lg" href="<?php echo get_permalink(); ?>"><?php esc_html_e( 'Informazioni', 'imelab' ); ?></a>
        <?php
        endif; ?>
    </div>
</article>