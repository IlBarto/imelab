<footer class="footer panel-footer ">


<div class="social-wrap ">
<ul class="social">
					<li><a class="link facebook" href="https://www.facebook.com/imelab/"><i class="fa fa-facebook"></i></a></li>
				<!--	<li><a class="link twitter" href="#"><i class="fa fa-twitter"></i></a></li> -->
				<!--	<li><a class="link google-plus" href="#"><i class="fa fa-google-plus"></i></a></li> -->
					<li><a class="link instagram" href="https://www.instagram.com/ime.lab/"><i class="fa fa-instagram"></i></a></li>
				<!--	<li><a class="link youtube" href="#"><i class="fa fa-youtube"></i></a></li> -->
				</ul>
</div>	
<div class="copyright">
<h6>P.IVA 01549170932<br>
IMElab is a trademark of Andrea Fantin<br>
IMElab brand is used under concession by Safelab SRL
</h6>
</div>
</footer>
</div>

<?php
//////////////////////vecchia versione
 /*



<footer id="footer-container">
<div class="footer-div-container <?php
if (is_home()|| is_front_page()){
?>nascondi">
<?php
}else{
?>
">
<?php
}
?>

<?php 

 // menu di navigazione inferiore

//wp_nav_menu (array ('theme_location' => 'bottom-navigation')); ?>


<div class="social-wrap">
<ul class="social">
					<li><a class="link facebook" href="https://www.facebook.com/imelab/"><i class="fa fa-facebook"></i></a></li>
				<!--	<li><a class="link twitter" href="#"><i class="fa fa-twitter"></i></a></li> -->
				<!--	<li><a class="link google-plus" href="#"><i class="fa fa-google-plus"></i></a></li> -->
					<li><a class="link instagram" href="https://www.instagram.com/ime.lab/"><i class="fa fa-instagram"></i></a></li>
				<!--	<li><a class="link youtube" href="#"><i class="fa fa-youtube"></i></a></li> -->
				</ul>	
</div>
<div class="copyright">
<p class="copyright">
<?php
//inserire qui, al di fuori del php, i dati della partita iva ecc..
?>



&copy; <?php bloginfo('name'); ?> 
<?php echo date('Y'); ?>
 di Andrea Fantin 
<!-- P.Iva inserire qui numero partita iva -->
<!--
<?php echo date('Y'); ?> <a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>">
-->

</a>	
	
</p>
</div>


<?php //bloginfo('name'); ?>

</div><!-- chiusura footer-div-container -->
</footer> <!-- footer container end -->

</div> <!-- # inner-wrap- end -->

</div> <!-- # outer-wrap end -->


<?php 

//aggiunta del customizer footer
//if (get_theme_mod('simpleblog_footer_enable')==1)
//echo get_theme_mod('simpleblog_footer_copyright');

//endif;
//wrap up di wordpress appena prima del tag di chiusura body



*/


wp_footer();
?>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
</body>

</html>