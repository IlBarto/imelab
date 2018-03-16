
<?php
get_header(); ?>

<h2>front-page</h2>

<div id="main-container">
	<section id="content-container">
		<?php
		//loop dei post 
			while(have_posts()): the_post();

			//prendi il contenuto dei single
			get_template_part('/template-parts/page/content', 'front-page');

			//prendi i commenti
			the_post_thumbnail();
			//comments_template('',true);

			// fine loop
			endwhile;
			?>

	</section> <!-- main--container--end-->
</div>

<?php
get_footer(); ?>