<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'imelab' ); ?>">
	<div class="menu-toggle">
        <a data-toggle="collapse" class="collapsed" href="#navigationMenu">
            <div class="icon-bar-1"></div>
            <div class="icon-bar-2"></div>
            <div class="icon-bar-3"></div>
        </a>
    </div>

	<?php wp_nav_menu( array(
		'theme_location'    => 'top-menu',
		'menu_id'           => 'top-menu',
        'container_class'   => 'collapse',
        'container_id'      => 'navigationMenu',
        'items_wrap'        => nav_menu_custom_wrapper(),
	) ); ?>
	
</nav><!-- #site-navigation -->
