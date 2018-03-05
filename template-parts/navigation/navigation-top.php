<?php
/**
 * Displays top navigation
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?>
<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'imelab' ); ?>">
	<button class="menu-toggle" aria-controls="top-menu" aria-expanded="false">
		<div class="icon-bar"></div>
		<div class="icon-bar"></div>
		<div class="icon-bar"></div>
	</button>
	
	<?php wp_nav_menu( array(
		'theme_location' => 'top-menu',
		'menu_id'        => 'top-menu',
	) ); ?>
	
</nav><!-- #site-navigation -->
