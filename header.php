<!DOCTYPE HTML>

<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset'); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">

<title>

<?php 

//il titolo

//wp_title ('|', true, 'right');
//aggiunge il nome del blog

bloginfo('name');
echo " - ";
bloginfo('description');
echo " By Andrea Fantin";
?>


</title>
<link rel="profile" href="http://gmpg.org/xfn/11" />

<!--
Importa css delle icone
da usare poi dentro l'html con tag <i class="fa fa-facebook">
-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url'); ?>" />

<!-- Fix for Internet Explorer prior to version 9
by Remy Sharp http://remysharp.com/2009/01/07/html5-enabling-script/ -->

<!-- [if lt IE9 ]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<!-- Script per menu mobile -->
<script type="text/javascript">
document.getElementById("nav_mobile").onclick = function() {myFunction()};

function myFunction() {
var x = document.getElementsByClassName("smoothscroll");
var i;
for (i = 0; i < x.length; i++) {
    if(x[i].style.display=="block"){
   		 x[i].style.display = "none";
    }else{
        x[i].style.display="block";
    }
}

}
</script>





<?php
 wp_head();
 ?>

 </head>




 <body <?php body_class(); ?>>


<? 
///////////////////////////////////////////
/*


	 <div id="outer-wrap">
 		<div id="inner-wrap">
 			<header id="header-container">
 				<hgroup>
 				<?php if (is_home()|| is_front_page()) { 
 			
?>
<!--
 					<h1 id="site_title">
 						<a href="<?php echo home_url(); ?>" title=" <?php bloginfo( 'name');?> ">
 						</a>
 					</h1>



 					<h2 id="site-description">
-->
 						<?php //bloginfo ('description'); ?>
 					</h2>
 				<?php }else{ ?>

<!--
 					<div id="site-title">

 						<a href="<?php echo home_url(); ?>" title="<?php bloginfo('name '); ?>"> <?php bloginfo('name'); ?>
 						</a>


 					</div>


 					<div id="site-description">

 					 <?php bloginfo( 'description'); ?>
 	

 					 </div>
 	
 	-->
 					<?php } ?>
 					</hgroup>


 				
<div class="menu <?php if (is_home()|| is_front_page()){
    ?>
nascondi <?php
}else{

//controlla se viene caricata la home, se si aggiunge la classe nascondi per la visualizzazione animata 
//<li class="nav"><a href="http://www.imelab.it/" class="smoothscroll">Home</a></li>    

    
}

//nav_pagina_attuale("About");
?>">
 					<nav id="menu">
<ul class="nav">
<li class="nav <?php nav_pagina_attuale("About"); ?>"><a href="http://www.imelab.it/about/" class="smoothscroll">About</a></li>
<!--<li class="nav"><a href="http://www.imelab.it/news/" class="smoothscroll">News</a></li>-->
<li class="nav <?php if((get_the_title()=="BeerLab")||(get_the_title()=="Lap Timer")||(get_the_title()=="Proxxon")||(get_the_title()=="Projects")){echo "menu_page_active";} ?>"><a href="http://www.imelab.it/projects/" class="smoothscroll">Projects</a></li>
<li class="nav <?php nav_pagina_attuale("Contacts"); ?>"><a href="http://www.imelab.it/contacts/" class="smoothscroll">Contacts</a></li>
<li class="nav"><a href="#vario" class="smoothscroll coming">LogIn</a></li>
<li class="nav" id="nav_mobile"><a class="smoothscroll2" onclick="myFunction()">☰ Menu</a></li>
</ul>




<!-- sarà da renderla dinamica ma per ora mettiamola statica
 					<?php 
					//meno di navigazione superiore
// 					wp_nav_menu (array ('theme_location' => 'top-navigation')); ?>
-->

 					</nav>
 					</div>
 						<div id="logo<?php
 						if (is_home()|| is_front_page()){
 						    echo "_home";
 						 }else{
 						    echo "non";
 						}
 						
 						
 						
 						?>" class="menu">
 					<a href="http://www.imelab.it/About/"><img id="logo" src="http://www.imelab.it/wp-content/uploads/2017/08/IMELAB_LOGOS-2.png"/></a>
 					</div>
 					</header>
 					<!-- #header-container-ends -->
////////////////////////////////
*/
?>
  <nav class="navbar navbar-default">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>

      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse " id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav ">
 <li class="<?php nav_pagina_attuale("Home"); ?>"><a href="http://www.imelab.it/">Home</a></li>
  <!--<li class="<?php nav_pagina_attuale("News"); ?>"><a href="http://www.imelab.it/News">News</a></li>-->
 <li class="<?php if((get_the_title()=="BeerLab")||(get_the_title()=="Lap Timer")||(get_the_title()=="Proxxon")||(get_the_title()=="Projects")){echo "active";} ?>"><a href="http://www.imelab.it/projects/">Projects</a></li>
          <!--<li class="<?php nav_pagina_attuale("About"); ?>"><a href="http://www.imelab.it/about/">About <span class="sr-only">(current)</span></a></li>-->
          <li class="<?php nav_pagina_attuale("Contacts"); ?>"><a href="http://www.imelab.it/contacts/">Contacts</a></li>
          <li><a href="http://www.imelab.it/login" data-toggle="tooltip" data-placement="bottom" title="Coming soon!"style="text-decoration-line: line-through">Login</a></li>
        </ul>
        <form class="navbar-form navbar-right">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
          </div>
          <button type="submit" class="btn btn-default">Submit</button>
        </form>

      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>


