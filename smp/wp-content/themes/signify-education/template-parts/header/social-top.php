<?php
/**
 * Displays social top navigation
 *
 * @package Signify
 */

if ( ! has_nav_menu( 'social-top' ) ) {
	// Bail if there is no social top.
	return;
}
?>

<nav id="social-navigation" class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Social Links Menu', 'signify-education' ); ?>">
	<?php
		wp_nav_menu( array(
			'theme_location' => 'social-top',
			'menu_class'     	=> 'social-links-menu',
			'container'			=> 'div',
			'container_class'	=> 'menu-social-container',
			'depth'          	=> 1,
			'link_before'    	=> '<span class="screen-reader-text">',
		) );
	?>
</nav><!-- .social-navigation -->
