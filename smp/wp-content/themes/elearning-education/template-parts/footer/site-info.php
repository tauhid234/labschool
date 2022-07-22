<?php
/**
 * Displays footer site info
 *
 * @package eLearning Education
 * @subpackage elearning_education
 */

?>
<div class="site-info">
	<div class="container">
		<p><?php echo esc_html(get_theme_mod('elearning_education_footer_text',__('eLearning Education WordPress Theme By ','elearning-education'))); ?><?php elearning_education_credit(); ?></p>
	</div>
</div>