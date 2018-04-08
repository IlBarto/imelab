<?php
get_header(); ?>

<div id="main-container" class="page">
	<section id="content-container">
		<?php
		if ( have_posts() ) :
            while(have_posts()): the_post();
			    get_template_part('template-parts/post/content', 'single');
			endwhile;
        endif;?>
	</section> <!-- main--container--end-->
</div>

<?php  get_footer(); ?>

