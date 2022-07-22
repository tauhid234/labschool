<?php
/**
 * The sidebar containing the main widget area
 *
 * @package eLearning Education
 * @subpackage elearning_education
 */
?>

<aside id="theme-sidebar" class="widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Blog Sidebar', 'elearning-education' ); ?>">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside>