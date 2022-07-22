<?php
/**
 * Displays header top bar
 *
 * @package Signify
 */

if ( ! get_theme_mod( 'signify_display_header_top' ) ) {
		// Bail if Header top is disabled.
	return;
}
?>

<div id="header-top" class="header-top-bar">
	<div class="wrapper">
		<div id="top-menu-wrapper" class="menu-wrapper">
		<button id="menu-toggle-top" class="menu-top-toggle menu-toggle" aria-controls="top-menu" aria-expanded="false">
			<?php
			if ( $label = get_theme_mod( 'signify_header_top_menu_label', esc_html__( 'Top Bar', 'signify-education' ) ) ) : ?>
				<span class="header-top-label menu-label"><?php echo esc_html( $label ); ?></span>
			<?php endif; ?>
		</button>
		<div class="menu-inside-wrapper">
			<div id="site-header-top-menu" class="site-header-top-main">
				<div class="top-main-wrapper">
					<div class="header-top-left">
						<?php get_template_part( 'template-parts/navigation/navigation-header', 'top' ); ?>
					</div><!-- .header-top-left -->

					<div class="header-top-right">
						<?php get_template_part( 'template-parts/header/social', 'top' ); ?>
					</div><!-- .header-top-right -->
				</div><!-- .top-main-wrapper -->
			</div><!-- .site-header-top-main -->
		</div>
	</div>
	</div><!-- .wrapper -->
</div><!-- #header-top -->
