<?php

get_header();

//wp_nav_menu(array('theme_location'=> 'test-menu'));
?>

<div id="main-container">

	<section id="content-container">
		<?php
		//loop dei post 
			while(have_posts()): the_post();

			//prendi il contenuto dei single
			get_template_part('content', 'single');

			//prendi i commenti
			the_post_thumbnail();
			//comments_template('',true);

			// fine loop
			endwhile;
			?>

	</section> <!-- main--container--end-->
	<?php //get_sidebar(); ?>


</div>

<?php  get_footer(); ?>
