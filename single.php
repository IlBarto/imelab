<?php


?>

<div id="main-container">

	<section id="content-container">
	<?php 
	

//the_post($id);

	?>
		<?php
		//loop dei post 
			while(have_posts()): the_post();
//the_post_thumbnail();
			//prendi il contenuto dei single
			get_template_part('content', 'single');

			//prendi i commenti

	//		comments_template('',true);

			// fine loop
			endwhile;
		
			?>

	</section> <!-- main--container--end-->
	<?php get_sidebar(); ?>


</div>

<?php get_footer(); ?>

