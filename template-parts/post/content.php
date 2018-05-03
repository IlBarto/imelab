<article id="post-<?php the_ID(); ?>" <?php post_class('row is-not-single'); ?>>
    <?php
    if ( '' !== get_the_post_thumbnail() ) : ?>
        <div class="post-thumbnail image-center col-md-4">
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

        <div class="row">
            <div class="col-lg-4 col-xl-3">
                <a class="btn btn-outline-secondary btn-lg" href="<?php echo get_permalink(); ?>"><?php esc_html_e( 'Information', 'imelab' ); ?></a>
            </div>
            <div class="col-lg-4 col-xl-3">
                <?php if('true' == get_post_meta(get_the_ID(), 'reservable', true)) : ?>
                    <form id="reservation-form" class="hide" method="post" action="<?php echo get_page_link(get_page_by_title('Reserve')) ?>">
                        <input type="hidden" name="reservation_product" value="<?php the_title() ?>">
                    </form>
                    <button form="reservation-form" type="submit" class="btn btn-outline-secondary btn-lg"><?php esc_html_e( 'Reserve', 'imelab' ); ?></button>

                <?php elseif('false' == get_post_meta(get_the_ID(), 'reservable', true)) :
                    $format = 'd-m-Y';
                    $date = get_post_meta(get_the_ID(), 'reservation-date', true);
                    $d = DateTime::createFromFormat($format, $date);
                    if($d && $d->format($format) == $date) :
                ?>
                        <button type="button" class="btn btn-outline-secondary btn-lg" disabled><?php printf(esc_html(translate('Available from %s', 'imelab' )), $date); ?></button>
                <?php
                    endif;
                endif; ?>
            </div>
        </div>
    </div>
</article>