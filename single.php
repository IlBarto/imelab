<?php
get_header() ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <?php
        while(have_posts()) : the_post();
            get_template_part('template-parts/post/content', 'single' );

            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;

            the_post_navigation( array(
                'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'imelab' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'twentyseventeen' ) . '</span> <span class="nav-title"><span class="nav-title-icon-wrapper">. '<' .</span>%title</span>',
                'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'imelab' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'twentyseventeen' ) . '</span> <span class="nav-title">%title<span class="nav-title-icon-wrapper">' . '>' . '</span></span>',
            ) );

        endwhile; // End of the loop.
        ?>
    </main>
</div>

<?php
get_footer(); ?>

