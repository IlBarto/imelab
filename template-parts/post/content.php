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
    $gallery_images = get_post_gallery_images();
    if (!empty($gallery_images)) : ?>
        <div id="postCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <?php
                $first = true;
                foreach( $gallery_images as $image_url ) { ?>
                    <div class="carousel-item <?php $first ? 'active' : '' ?>">
                        <img class="d-block w-100" src="<?php echo esc_url($image_url) ?>" />
                    </div>
                <?php
                }
                ?>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    <?php
    endif;
    
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