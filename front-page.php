
<?php
get_header(); ?>
<div id="main-container">
	<section id="content-container">
		<?php
		//loop dei post 
			while(have_posts()): the_post();

			//prendi il contenuto dei single
			get_template_part('/template-parts/page/content', 'front-page');

			endwhile;
			?>

	</section> <!-- main--container--end-->
</div>

<?php
get_footer(); ?>