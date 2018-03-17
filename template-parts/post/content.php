<h2>content</h2>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php
        if ( is_single() ) {
	        the_title( '<h1 class="entry-title">', '</h1>' );
        } elseif ( is_front_page() && is_home() ) {
	        the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
        } else {
	        the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
        }
        ?>
    </header>
	
    <?php
    if ( '' !== get_the_post_thumbnail() ) : ?>
        <div class="post-thumbnail">
            <?php if (!is_single()) : ?>
            <a href="<?php the_permalink(); ?>">
            <?php endif;
                the_post_thumbnail();
            if (!is_single()) : ?>
            </a>
            <?php endif; ?>
        </div><!-- .post-thumbnail -->
	<?php endif; ?>
<?php
the_content(); ?>
</article>