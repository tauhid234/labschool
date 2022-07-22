<?php
/*
 * This is the child theme for Signify theme.
 */

/**
 * Enqueue default CSS styles
 */
function signify_education_enqueue_styles() {
	// Include parent theme CSS.
    wp_enqueue_style( 'signify-style', get_template_directory_uri() . '/style.css', null, date( 'Ymd-Gis', filemtime( get_template_directory() . '/style.css' ) ) );

    // Include child theme CSS.
    wp_enqueue_style( 'signify-education-style', get_stylesheet_directory_uri() . '/style.css', array( 'signify-style' ), date( 'Ymd-Gis', filemtime( get_stylesheet_directory() . '/style.css' ) ) );
	
	// Load rtl css.
	if ( is_rtl() ) {
		wp_enqueue_style( 'signify-rtl', get_template_directory_uri() . '/rtl.css', array( 'signify-style' ), filemtime( get_stylesheet_directory() . '/rtl.css' ) );
	}

	// Enqueue child block styles after parent block style.
	wp_enqueue_style( 'signify-education-block-style', get_stylesheet_directory_uri() . '/assets/css/child-blocks.css', array( 'signify-block-style' ), date( 'Ymd-Gis', filemtime( get_stylesheet_directory() . '/assets/css/child-blocks.css' ) ) );
}
add_action( 'wp_enqueue_scripts', 'signify_education_enqueue_styles' );

/**
 * Add child theme editor styles
 */
function signify_education_editor_style() {
	add_editor_style( array(
			'assets/css/child-editor-style.css',
			signify_fonts_url(),
			get_theme_file_uri( 'assets/css/font-awesome/css/font-awesome.css' ),
		)
	);
}
add_action( 'after_setup_theme', 'signify_education_editor_style', 11 );

/**
 * Enqueue editor styles for Gutenberg
 */
function signify_education_block_editor_styles() {
	// Enqueue child block editor style after parent editor block css.
	wp_enqueue_style( 'signify-education-block-editor-style', get_stylesheet_directory_uri() . '/assets/css/child-editor-blocks.css', array( 'signify-block-editor-style' ), date( 'Ymd-Gis', filemtime( get_stylesheet_directory() . '/assets/css/child-editor-blocks.css' ) ) );
}
add_action( 'enqueue_block_editor_assets', 'signify_education_block_editor_styles', 11 );

/**
 * Theme Setup
 */
function signify_education_setup() {
	/**
	 * Register New menus for header top
	 */
	register_nav_menus( array(
		'menu-top'   => esc_html__( 'Header Top Menu', 'signify-education' ),
		'social-top' => esc_html__( 'Social Menu at Top', 'signify-education' ),
	) );

	/**
	 * Load the child theme textdomain
	 */
    load_child_theme_textdomain( 'signify-education', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'signify_education_setup', 11 );

/**
 * Change default header image
 */
function signify_education_header_default_image( $args ) {
	$args['default-image'] =  get_theme_file_uri( 'assets/images/header-image-education.jpg' );

	return $args;
}
add_filter( 'signify_custom_header_args', 'signify_education_header_default_image' );

/**
 * Add Header Layout Class to body class
 *
 * @since 1.0.0
 *
 * @param array $classes Classes for the body element.
 * @return array (Maybe) filtered body classes.
 */
function signify_education_body_classes( $classes ) {
	// Added color scheme to body class.
	$classes['header-layout'] = 'header-style-two';

	return $classes;
}
add_filter( 'body_class', 'signify_education_body_classes', 100 );

/**
 * Add theme options
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function signify_header_top_options( $wp_customize ) {
	// Header Top Options
	$wp_customize->add_section( 'signify_header_top', array(
		'panel' => 'signify_theme_options',
		'title' => esc_html__( 'Header Top Options', 'signify-education' ),
	) );

	signify_register_option( $wp_customize, array(
			'name'              => 'signify_display_header_top',
			'sanitize_callback' => 'signify_sanitize_checkbox',
			'label'             => esc_html__( 'Enable Header Top', 'signify-education' ),
			'section'           => 'signify_header_top',
			'type'    			=> 'checkbox',
		)
	);
}
add_action( 'customize_register', 'signify_header_top_options' );
