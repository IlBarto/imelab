
<?php
get_header();




if(isset($_GET)){
$seriale=0;
$code=0;
$version=0;
$system=0;

if(isset($_GET['serial'])){

	//$_GET['serial']&&$_GET['code']&&$_GET['version']&&$_GET['system']
	$seriale=$_GET['serial'];
	$code=$_GET['code'];
	$version=$_GET['version'];
	$system=$_GET['system'];
}
//echo "Seriale:".$seriale.", code:".$code." version:".$version.", system:".$system;


//print_r($_GET);
//print_r(add_query_vars_filter($_GET));



}




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



<?php
get_footer();
?>