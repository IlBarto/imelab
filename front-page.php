<?php
get_header(); ?>

<div id="main-container" class="front-page">
	<section id="content-container">
    <?php
        while(have_posts()): the_post();
            get_template_part('/template-parts/page/content', 'front-page');
        endwhile; ?>
	</section> <!-- main--container--end-->
</div>

<?php
get_footer(); ?>