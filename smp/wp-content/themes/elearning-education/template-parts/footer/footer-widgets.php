<?php
/**
 * Displays footer widgets if assigned
 *
 * @package eLearning Education
 * @subpackage elearning_education
 */

?>
<div class="container">
	<aside class="widget-area row" role="complementary" aria-label="<?php esc_attr_e( 'Footer', 'elearning-education' ); ?>">
		<div class="col-lg-3 col-md-3">
			<?php dynamic_sidebar( 'footer-1' ); ?>
		</div>
		<div class="col-lg-3 col-md-3">
			<?php dynamic_sidebar( 'footer-2' ); ?>
		</div>
		<div class="col-lg-3 col-md-3">
			<?php dynamic_sidebar( 'footer-3' ); ?>
		</div>
		<div class="col-lg-3 col-md-3">
			<?php dynamic_sidebar( 'footer-4' ); ?>
		</div>
	</aside>
</div>