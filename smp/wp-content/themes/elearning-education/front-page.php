<?php
/**
 * The front page template file
 *
 * @package eLearning Education
 * @subpackage elearning_education
 */

get_header(); ?>

<main id="tp_content" role="main">
	<?php do_action( 'elearning_education_before_slider' ); ?>

	<?php get_template_part( 'template-parts/home/slider' ); ?>
	<?php do_action( 'elearning_education_after_slider' ); ?>

	<?php get_template_part( 'template-parts/home/courses' ); ?>
	<?php do_action( 'elearning_education_after_courses' ); ?>

	<?php get_template_part( 'template-parts/home/home-content' ); ?>
	<?php do_action( 'elearning_education_after_home_content' ); ?>
</main>

<?php get_footer();