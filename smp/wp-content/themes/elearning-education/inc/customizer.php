<?php
/**
 * eLearning Education: Customizer
 *
 * @package eLearning Education
 * @subpackage elearning_education
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function elearning_education_customize_register( $wp_customize ) {

	//add home page setting pannel
	$wp_customize->add_panel( 'elearning_education_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Custom Home page', 'elearning-education' ),
	    'description' => __( 'Description of what this panel does.', 'elearning-education' ),
	) );

	//Sidebar Position
	$wp_customize->add_section('elearning_education_tp_general_settings',array(
        'title' => __('TP General Option', 'elearning-education'),
        'panel' => 'elearning_education_panel_id'
    ) );

    $wp_customize->add_setting('elearning_education_tp_body_layout_settings',array(
        'default' => 'Full',
        'sanitize_callback' => 'elearning_education_sanitize_choices'
	));
    $wp_customize->add_control('elearning_education_tp_body_layout_settings',array(
        'type' => 'radio',
        'label'     => __('Body Layout Setting', 'elearning-education'),
        'description'   => __('This option work for complete body, if you want to set the complete website in container.', 'elearning-education'),
        'section' => 'elearning_education_tp_general_settings',
        'choices' => array(
            'Full' => __('Full','elearning-education'),
            'Container' => __('Container','elearning-education'), 
            'Container Fluid' => __('Container Fluid','elearning-education')
        ),
	) );

    // Add Settings and Controls for Post Layout
	$wp_customize->add_setting('elearning_education_sidebar_post_layout',array(
        'default' => 'right',        
        'sanitize_callback' => 'elearning_education_sanitize_choices'	        
	));
	$wp_customize->add_control('elearning_education_sidebar_post_layout',array(
        'type' => 'radio',
        'label'     => __('Theme Sidebar Position', 'elearning-education'),
        'description'   => __('This option work for blog page, blog single page, archive page and search page.', 'elearning-education'),
        'section' => 'elearning_education_tp_general_settings',
        'choices' => array(
            'full' => __('Full','elearning-education'),
            'left' => __('Left','elearning-education'), 
            'right' => __('Right','elearning-education'),
            'three-column' => __('Three Columns','elearning-education'),
            'four-column' => __('Four Columns','elearning-education'),
            'grid' => __('Grid Layout','elearning-education')
        ),
	) );

	// Add Settings and Controls for Page Layout
	$wp_customize->add_setting('elearning_education_sidebar_page_layout',array(
        'default' => 'right',        
        'sanitize_callback' => 'elearning_education_sanitize_choices'	        
	));
	$wp_customize->add_control('elearning_education_sidebar_page_layout',array(
        'type' => 'radio',
        'label'     => __('Page Sidebar Position', 'elearning-education'),
        'description'   => __('This option work for pages.', 'elearning-education'),
        'section' => 'elearning_education_tp_general_settings',
        'choices' => array(
            'full' => __('Full','elearning-education'),
            'left' => __('Left','elearning-education'), 
            'right' => __('Right','elearning-education')
        ),
	) );

	//TP Blog Option
	$wp_customize->add_section('elearning_education_blog_option',array(
        'title' => __('TP Blog Option', 'elearning-education'),
        'panel' => 'elearning_education_panel_id'
    ) );

    $wp_customize->add_setting('elearning_education_remove_date',array(
       'default' => true,
       'sanitize_callback'	=> 'elearning_education_sanitize_checkbox'
    ));
    $wp_customize->add_control('elearning_education_remove_date',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Date Option','elearning-education'),
       'section' => 'elearning_education_blog_option',
    ));

    $wp_customize->add_setting('elearning_education_remove_author',array(
       'default' => true,
       'sanitize_callback'	=> 'elearning_education_sanitize_checkbox'
    ));
    $wp_customize->add_control('elearning_education_remove_author',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Author Option','elearning-education'),
       'section' => 'elearning_education_blog_option',
    ));

    $wp_customize->add_setting('elearning_education_remove_comments',array(
       'default' => true,
       'sanitize_callback'	=> 'elearning_education_sanitize_checkbox'
    ));
    $wp_customize->add_control('elearning_education_remove_comments',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Comment Option','elearning-education'),
       'section' => 'elearning_education_blog_option',
    ));

    $wp_customize->add_setting('elearning_education_remove_tags',array(
       'default' => true,
       'sanitize_callback'	=> 'elearning_education_sanitize_checkbox'
    ));
    $wp_customize->add_control('elearning_education_remove_tags',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Tags Option','elearning-education'),
       'section' => 'elearning_education_blog_option',
    ));

    $wp_customize->add_setting('elearning_education_remove_read_button',array(
       'default' => true,
       'sanitize_callback'	=> 'elearning_education_sanitize_checkbox'
    ));
    $wp_customize->add_control('elearning_education_remove_read_button',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Read More Button','elearning-education'),
       'section' => 'elearning_education_blog_option',
    ));

    $wp_customize->add_setting('elearning_education_read_more_text',array(
		'default'=> __('Read More','elearning-education'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('elearning_education_read_more_text',array(
		'label'	=> __('Edit Button Text','elearning-education'),
		'section'=> 'elearning_education_blog_option',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'elearning_education_excerpt_count', array(
		'default'              => 35,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'elearning_education_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'elearning_education_excerpt_count', array(
		'label'       => esc_html__( 'Edit Excerpt Limit','elearning-education' ),
		'section'     => 'elearning_education_blog_option',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	// Top Bar
	$wp_customize->add_section( 'elearning_education_topbar', array(
    	'title'      => __( 'Contact Details', 'elearning-education' ),
    	'description' => __( 'Add your contact details', 'elearning-education' ),
		'panel' => 'elearning_education_panel_id'
	) );

	$wp_customize->add_setting('elearning_education_phone_number',array(
		'default'=> '',
		'sanitize_callback'	=> 'elearning_education_sanitize_phone_number'
	));	
	$wp_customize->add_control('elearning_education_phone_number',array(
		'label'	=> __('Add Phone Number','elearning-education'),
		'section'=> 'elearning_education_topbar',
		'type'=> 'text'
	));
	$wp_customize->selective_refresh->add_partial( 'elearning_education_phone_number', array(
		'selector' => '.top-header span',
		'render_callback' => 'elearning_education_customize_partial_elearning_education_phone_number',
	) );

	$wp_customize->add_setting('elearning_education_email_address',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_email'
	));	
	$wp_customize->add_control('elearning_education_email_address',array(
		'label'	=> __('Add Mail Address','elearning-education'),
		'section'=> 'elearning_education_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('elearning_education_register_button',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('elearning_education_register_button',array(
		'label'	=> __('Add Button Text','elearning-education'),
		'section'=> 'elearning_education_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('elearning_education_register_button_link',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('elearning_education_register_button_link',array(
		'label'	=> __('Add Button URL','elearning-education'),
		'section'=> 'elearning_education_topbar',
		'type'=> 'url'
	));

	$wp_customize->add_setting('elearning_education_login_button',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('elearning_education_login_button',array(
		'label'	=> __('Add Button Text','elearning-education'),
		'section'=> 'elearning_education_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('elearning_education_login_button_link',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('elearning_education_login_button_link',array(
		'label'	=> __('Add Button URL','elearning-education'),
		'section'=> 'elearning_education_topbar',
		'type'=> 'url'
	));

	$wp_customize->add_setting('elearning_education_header_teacher',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('elearning_education_header_teacher',array(
		'label'	=> __('Add Become Teacher Text','elearning-education'),
		'section'=> 'elearning_education_topbar',
		'type'=> 'text'
	));

	$wp_customize->selective_refresh->add_partial( 'elearning_education_header_teacher', array(
		'selector' => 'a.teacher-btn',
		'render_callback' => 'elearning_education_customize_partial_elearning_education_header_teacher',
	) );

	$wp_customize->add_setting('elearning_education_header_wishlist_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('elearning_education_header_wishlist_url',array(
		'label'	=> __('Add Wishlist Link','elearning-education'),
		'section'=> 'elearning_education_topbar',
		'type'=> 'url'
	));

	// Social Media
	$wp_customize->add_section( 'elearning_education_social_media', array(
    	'title'      => __( 'Social Media Links', 'elearning-education' ),
    	'description' => __( 'Add your Social Links', 'elearning-education' ),
		'panel' => 'elearning_education_panel_id'
	) );

	$wp_customize->add_setting('elearning_education_facebook_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('elearning_education_facebook_url',array(
		'label'	=> __('Facebook Link','elearning-education'),
		'section'=> 'elearning_education_social_media',
		'type'=> 'url'
	));
	$wp_customize->selective_refresh->add_partial( 'elearning_education_facebook_url', array(
		'selector' => '.media-links a',
		'render_callback' => 'elearning_education_customize_partial_elearning_education_facebook_url',
	) );

	$wp_customize->add_setting('elearning_education_twitter_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('elearning_education_twitter_url',array(
		'label'	=> __('Twitter Link','elearning-education'),
		'section'=> 'elearning_education_social_media',
		'type'=> 'url'
	));

	$wp_customize->add_setting('elearning_education_instagram_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('elearning_education_instagram_url',array(
		'label'	=> __('Instagram Link','elearning-education'),
		'section'=> 'elearning_education_social_media',
		'type'=> 'url'
	));

	$wp_customize->add_setting('elearning_education_youtube_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('elearning_education_youtube_url',array(
		'label'	=> __('YouTube Link','elearning-education'),
		'section'=> 'elearning_education_social_media',
		'type'=> 'url'
	));

	$wp_customize->add_setting('elearning_education_pint_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('elearning_education_pint_url',array(
		'label'	=> __('Pinterest Link','elearning-education'),
		'section'=> 'elearning_education_social_media',
		'type'=> 'url'
	));

	//home page slider
	$wp_customize->add_section( 'elearning_education_slider_section' , array(
    	'title'      => __( 'Slider Section', 'elearning-education' ),
		'panel' => 'elearning_education_panel_id'
	) );

	$wp_customize->add_setting('elearning_education_slider_arrows',array(
       'default' => false,
       'sanitize_callback'	=> 'elearning_education_sanitize_checkbox'
    ));
    $wp_customize->add_control('elearning_education_slider_arrows',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide slider','elearning-education'),
       'section' => 'elearning_education_slider_section',
    ));
    $wp_customize->selective_refresh->add_partial( 'elearning_education_slider_arrows', array(
		'selector' => '#slider .carousel-caption',
		'render_callback' => 'elearning_education_customize_partial_elearning_education_slider_arrows',
	) );

	for ( $count = 1; $count <= 4; $count++ ) {

		$wp_customize->add_setting( 'elearning_education_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'elearning_education_sanitize_dropdown_pages'
		) );

		$wp_customize->add_control( 'elearning_education_slider_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'elearning-education' ),
			'section'  => 'elearning_education_slider_section',
			'type'     => 'dropdown-pages'
		) );
	}

	//Online Courses Section
	$wp_customize->add_section('elearning_education_online_courses_section',array(
		'title'	=> __('Online Courses Section','elearning-education'),
		'panel' => 'elearning_education_panel_id',
	));	

	$wp_customize->add_setting('elearning_education_online_courses_heading',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('elearning_education_online_courses_heading',array(
		'label'	=> __('Courses Title','elearning-education'),
		'section'	=> 'elearning_education_online_courses_section',
		'type'		=> 'text'
	));
	$wp_customize->selective_refresh->add_partial( 'elearning_education_online_courses_heading', array(
		'selector' => '#online-courses h2',
		'render_callback' => 'construction_hub_customize_partial_elearning_education_online_courses_heading',
	) );

	$wp_customize->add_setting('elearning_education_online_courses_sub_heading',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('elearning_education_online_courses_sub_heading',array(
		'label'	=> __('Courses Sub Title','elearning-education'),
		'section'	=> 'elearning_education_online_courses_section',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('elearning_education_online_courses_per_page',array(
		'default' => '',
		'sanitize_callback'	=> 'elearning_education_sanitize_number_absint'
	));
	$wp_customize->add_control('elearning_education_online_courses_per_page',array(
		'label'	=> __('Number Of Courses','elearning-education'),
		'section'	=> 'elearning_education_online_courses_section',
		'type'		=> 'number'
	));

	$args = array(
		'type'                     => 'lp_course',
		'child_of'                 => 0,
		'parent'                   => '',
		'orderby'                  => 'term_group',
		'order'                    => 'ASC',
		'hide_empty'               => false,
		'hierarchical'             => 1,
		'number'                   => '',
		'taxonomy'                 => 'course_category',
		'pad_counts'               => false
	);
	$categories = get_categories($args);
	$cat_posts = array();
	$m = 0;
	$cat_posts[]='Select';
	foreach($categories as $category){
		if($m==0){
			$default = $category->slug;
			$m++;
		}
		$cat_posts[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('elearning_education_online_courses_category',array(
		'default'	=> 'select',
		'priority' => 8,
		'sanitize_callback' => 'elearning_education_sanitize_select',
	));
	$wp_customize->add_control('elearning_education_online_courses_category',array(
		'type'    => 'select',
		'choices' => $cat_posts,
		'label' => __('Select category to display courses ','elearning-education'),
		'section' => 'elearning_education_online_courses_section',
	));
	
	//footer
	$wp_customize->add_section('elearning_education_footer_section',array(
		'title'	=> __('Footer Text','elearning-education'),
		'description'	=> __('Add copyright text.','elearning-education'),
		'panel' => 'elearning_education_panel_id'
	));
	
	$wp_customize->add_setting('elearning_education_footer_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('elearning_education_footer_text',array(
		'label'	=> __('Copyright Text','elearning-education'),
		'section'	=> 'elearning_education_footer_section',
		'type'		=> 'text'
	));
	$wp_customize->selective_refresh->add_partial( 'elearning_education_footer_text', array(
		'selector' => '#footer p',
		'render_callback' => 'construction_hub_customize_partial_elearning_education_footer_text',
	) );

	$wp_customize->add_setting('elearning_education_return_to_header',array(
		'default' => true,
		'sanitize_callback'	=> 'elearning_education_sanitize_checkbox'
	));
	$wp_customize->add_control('elearning_education_return_to_header',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Return to header','elearning-education'),
		'section' => 'elearning_education_footer_section',
	));

   // Add Settings and Controls for Scroll top 
	$wp_customize->add_setting('elearning_education_scroll_top_position',array(
        'default' => 'Right',
        'sanitize_callback' => 'elearning_education_sanitize_choices'
	));
	$wp_customize->add_control('elearning_education_scroll_top_position',array(
        'type' => 'radio',
        'label'     => __('Scroll to top Position', 'elearning-education'),
        'description'   => __('This option work for scroll to top', 'elearning-education'),
        'section' => 'elearning_education_footer_section',
        'choices' => array(
            'Right' => __('Right','elearning-education'),
            'Left' => __('Left','elearning-education'),
            'Center' => __('Center','elearning-education')
        ),
	) );

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'elearning_education_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'elearning_education_customize_partial_blogdescription',
	) );

	$wp_customize->add_setting('elearning_education_site_title',array(
       'default' => true,
       'sanitize_callback'	=> 'elearning_education_sanitize_checkbox'
    ));
    $wp_customize->add_control('elearning_education_site_title',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Site Title','elearning-education'),
       'section' => 'title_tagline',
    ));

    $wp_customize->add_setting('elearning_education_site_tagline',array(
       'default' => true,
       'sanitize_callback'	=> 'elearning_education_sanitize_checkbox'
    ));
    $wp_customize->add_control('elearning_education_site_tagline',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Tagline','elearning-education'),
       'section' => 'title_tagline',
    ));

    $wp_customize->add_setting('elearning_education_logo_width',array(
		'default' => 100,
		'sanitize_callback'	=> 'elearning_education_sanitize_number_absint'
	));	
	 $wp_customize->add_control('elearning_education_logo_width',array(
		'label'	=> esc_html__('Here You Can Customize Your Logo Size','elearning-education'),
		'section'	=> 'title_tagline',
		'type'		=> 'number'
	));

	$wp_customize->add_setting('elearning_education_logo_settings',array(
        'default' => 'Different Line',
        'sanitize_callback' => 'elearning_education_sanitize_choices'
	));
    $wp_customize->add_control('elearning_education_logo_settings',array(
        'type' => 'radio',
        'label'     => __('Logo Layout Settings', 'elearning-education'),
        'description'   => __('Here you have two options 1. Logo and Site tite in differnt line. 2. Logo and Site title in same line.', 'elearning-education'),
        'section' => 'title_tagline',
        'choices' => array(
            'Different Line' => __('Different Line','elearning-education'),
            'Same Line' => __('Same Line','elearning-education')
        ),
	) );

	$wp_customize->add_setting('elearning_education_per_columns',array(
		'default'=> 3,
		'sanitize_callback'	=> 'elearning_education_sanitize_number_absint'
	));	
	$wp_customize->add_control('elearning_education_per_columns',array(
		'label'	=> __('Product Per Row','elearning-education'),
		'section'=> 'woocommerce_product_catalog',
		'type'=> 'number'
	));

	$wp_customize->add_setting('elearning_education_product_per_page',array(
		'default'=> 9,
		'sanitize_callback'	=> 'elearning_education_sanitize_number_absint'
	));	
	$wp_customize->add_control('elearning_education_product_per_page',array(
		'label'	=> __('Product Per Page','elearning-education'),
		'section'=> 'woocommerce_product_catalog',
		'type'=> 'number'
	));

    $wp_customize->add_setting('elearning_education_product_sidebar',array(
       'default' => true,
       'sanitize_callback'	=> 'elearning_education_sanitize_checkbox'
    ));
    $wp_customize->add_control('elearning_education_product_sidebar',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Shop page sidebar','elearning-education'),
       'section' => 'woocommerce_product_catalog',
    ));

    $wp_customize->add_setting('elearning_education_single_product_sidebar',array(
       'default' => true,
       'sanitize_callback'	=> 'elearning_education_sanitize_checkbox'
    ));
    $wp_customize->add_control('elearning_education_single_product_sidebar',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Product page sidebar','elearning-education'),
       'section' => 'woocommerce_product_catalog',
    ));
}
add_action( 'customize_register', 'elearning_education_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @since eLearning Education 1.0
 * @see elearning_education_customize_register()
 *
 * @return void
 */
function elearning_education_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since eLearning Education 1.0
 * @see elearning_education_customize_register()
 *
 * @return void
 */
function elearning_education_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

if ( ! defined( 'ELEARNING_EDUCATION_PRO_THEME_NAME' ) ) {
	define( 'ELEARNING_EDUCATION_PRO_THEME_NAME', esc_html__( 'Education Pro Theme', 'elearning-education' ));
}
if ( ! defined( 'ELEARNING_EDUCATION_PRO_THEME_URL' ) ) {
	define( 'ELEARNING_EDUCATION_PRO_THEME_URL', esc_url('https://www.themespride.com/themes/elearning-education-wordpress-theme/'));
}
if ( ! defined( 'ELEARNING_EDUCATION_DOCS_URL' ) ) {
	define( 'ELEARNING_EDUCATION_DOCS_URL', esc_url('https://www.themespride.com/demo/docs/elearning-education-lite/'));
}

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class eLearning_Education_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'eLearning_Education_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new eLearning_Education_Customize_Section_Pro(
				$manager,
				'elearning_education_section_pro',
				array(
					'priority'   => 9,
					'title'    => ELEARNING_EDUCATION_PRO_THEME_NAME,
					'pro_text' => esc_html__( 'Upgrade Pro', 'elearning-education' ),
					'pro_url'  => esc_url( ELEARNING_EDUCATION_PRO_THEME_URL, 'elearning-education' ),
				)
			)
		);

		// Register sections.
		$manager->add_section(
			new eLearning_Education_Customize_Section_Pro(
				$manager,
				'elearning_education_documentation',
				array(
					'priority'   => 500,
					'title'    => esc_html__( 'Theme Documentation', 'elearning-education' ),
					'pro_text' => esc_html__( 'Click Here', 'elearning-education' ),
					'pro_url'  => esc_url( ELEARNING_EDUCATION_DOCS_URL, 'elearning-education'),
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'elearning-education-customize-controls', trailingslashit( esc_url( get_template_directory_uri() ) ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'elearning-education-customize-controls', trailingslashit( esc_url( get_template_directory_uri() ) ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
eLearning_Education_Customize::get_instance();