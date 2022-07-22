<?php
/**
 * The front page template file
 *
 * @package Online Courses Hub
 * @subpackage online_courses_hub
 */

get_header(); ?>

<main id="tp_content" role="main">
	<?php do_action( 'elearning_education_before_slider' ); ?>

	<?php get_template_part( 'template-parts/home/slider' ); ?>
	<?php do_action( 'elearning_education_after_slider' ); ?>

	<?php get_template_part( 'template-parts/home/course-topics' ); ?>
	<?php do_action( 'online_courses_hub_after_course_topics' ); ?>

	<?php get_template_part( 'template-parts/home/popular-topics' ); ?>
	<?php do_action( 'online_courses_hub_after_popular_topics' ); ?>

	<?php get_template_part( 'template-parts/home/courses' ); ?>
	<?php do_action( 'elearning_education_after_courses' ); ?>

	<?php get_template_part( 'template-parts/home/home-content' ); ?>
	<?php do_action( 'elearning_education_after_home_content' ); ?>
</main>

<?php get_footer();