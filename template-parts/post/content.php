<article id="post-<?php the_ID(); ?>" <?php post_class('row is-not-single'); ?>>
    <?php
    if ( '' !== get_the_post_thumbnail() ) : ?>
        <div class="post-thumbnail col-md-4">
            <?php the_post_thumbnail(); ?>
        </div><!-- .post-thumbnail -->
	<?php endif; ?>

    <div class="content-wrapper col-md-8">
        <header class="entry-header">
            <?php
                the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
            ?>
        </header>

        <?php
        the_excerpt(); ?>
        <a class="btn btn-outline-secondary btn-lg" href="<?php echo get_permalink(); ?>"><?php esc_html_e( 'Information', 'imelab' ); ?></a>
    </div>
</article>