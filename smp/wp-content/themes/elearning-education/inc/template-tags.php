<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package eLearning Education
 * @subpackage elearning_education
 */

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function elearning_education_categorized_blog() {
	$elearning_education_category_count = get_transient( 'elearning_education_categories' );

	if ( false === $elearning_education_category_count ) {
		// Create an array of all the categories that are attached to posts.
		$categories = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$elearning_education_category_count = count( $categories );

		set_transient( 'elearning_education_categories', $elearning_education_category_count );
	}

	// Allow viewing case of 0 or 1 categories in post preview.
	if ( is_preview() ) {
		return true;
	}

	return $elearning_education_category_count > 1;
}

if ( ! function_exists( 'elearning_education_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 * @since eLearning Education
 */
function elearning_education_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;

/**
 * Flush out the transients used in elearning_education_categorized_blog.
 */
function elearning_education_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'elearning_education_categories' );
}
add_action( 'edit_category', 'elearning_education_category_transient_flusher' );
add_action( 'save_post',     'elearning_education_category_transient_flusher' );