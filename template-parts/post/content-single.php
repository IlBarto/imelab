<article id="post-<?php the_ID(); ?>" <?php post_class('row'); ?>>
    <div class="content-wrapper col-md-12">
        <?php
        the_content(); ?>
    </div>

    <div class="row">
        <div class="col-md-12">
			<?php
			$price = get_post_meta(get_the_ID(), 'reservable', true);
			$format = 'd-m-Y';
			$date = get_post_meta(get_the_ID(), 'reservation-date', true);
			$d = DateTime::createFromFormat($format, $date);
			if($price && floatval($price) != 0 && is_float(floatval($price))) : ?>
                <form id="reservation-form" class="hide" method="post" action="<?php echo get_page_link(get_page_by_title('Reserve')) ?>">
                    <input type="hidden" name="reservation_product" value="<?php the_title() ?>">
                </form>
                <button form="reservation-form" type="submit" class="btn btn-outline-secondary btn-lg"><?php esc_html_e( 'Reserve', 'imelab' ); ?><br><?php echo $price."€"?></button>
			
			<?php
            elseif($d && $d->format($format) == $date) : ?>
                <button type="button" class="btn btn-outline-secondary btn-lg" disabled><?php esc_html_e('Available from', 'imelab'); ?><br><?php echo $date ?></button>
			<?php
			endif; ?>
        </div>
    </div>
</article>