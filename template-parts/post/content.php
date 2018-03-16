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
    
    
    
    
    
    
<!--    <header>-->
<!--        <h2 class="entry-title">-->
<!--            <a href="--><?php //the_permalink(); ?><!--" title="--><?php //the_title_attribute(); ?><!--" rel="bookmark">-->
<!--            --><?php //the_title(); ?>
<!--            </a>-->
<!--        </h2>-->
<!--				 <p class="entry-meta">-->
<!--				 Inserito il <time datetime="--><?php //echo get_the_date(); ?><!-- "> --><?php //the_time(); ?><!-- </time>-->
<!--				 inserito da --><?php //the_author_link(); ?>
<!---->
<!--				 --><?php
//				 if (comments_open() ) :?><!-- &bull; --><?php //comments_popup_link( 'No comments', '1 comment', '% comments' );
//				 endif;
//
//			 ?>
<!--                 </p>-->
<!--    </header>-->
<?php
the_content(); ?>
</article>