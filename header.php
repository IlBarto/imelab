<!doctype html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
    <meta charset="<?php bloginfo( 'charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

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

    <?php
    wp_head();
    ?>

</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'imelab' ); ?></a>

    <header id="imelab-header" class="site-header" role="banner">
	
	    <?php get_template_part( 'template-parts/header/header', 'image' ); ?>
     
	    <?php if ( has_nav_menu( 'top-menu' ) ) : ?>
            <div class="navigation-top">
                <div class="wrap">
				    <?php get_template_part( 'template-parts/navigation/navigation', 'top' ); ?>
                </div><!-- .wrap -->
            </div><!-- .navigation-top -->
	    <?php endif; ?>
    </header>
    
    <div id="content" class="site-content">