<?php
get_header(); ?>
<div id="main-container">
    <section id="content-container" class="container" style="padding-right: 0; padding-left: 0;">
        <?php
        if ( have_posts() ) :
            while ( have_posts() ) : the_post();

                $hidden = get_post_meta(get_the_ID(), 'hidden', true);

                if(!$hidden) :
	                get_template_part( 'template-parts/post/content', get_post_format());
                endif;
                
            endwhile;
	
	        the_posts_pagination();
        else:
            get_template_part('template-parts/post/content', 'none');
        endif; ?>
    </section>
</div>

<?php
get_footer(); ?>
