<?php

function online_courses_hub_remove_customize_register() {
    global $wp_customize;
    $wp_customize->remove_section( 'elearning_education_color_option' );
    $wp_customize->remove_section( 'elearning_education_documentation' );
}
add_action( 'customize_register', 'online_courses_hub_remove_customize_register', 11 );

function online_courses_hub_customize_register( $wp_customize ) {

    // Course Fields
    $wp_customize->add_section('online_courses_hub_course_fields_section',array(
        'title' => __('Course Fields','online-courses-hub'),
        'description'   => __('Course Fields Sections','online-courses-hub'),
        'panel' => 'elearning_education_panel_id',
        'priority' => 10,
    ));

    $wp_customize->add_setting('online_courses_hub_course_fields_number',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('online_courses_hub_course_fields_number',array(
        'label' => __('Number of Courses','online-courses-hub'),
        'section' => 'online_courses_hub_course_fields_section',
        'type'=>'number'
    ));
    $wp_customize->selective_refresh->add_partial( 'online_courses_hub_course_fields_number', array(
        'selector' => '.course-fields-box h4',
        'render_callback' => 'online_courses_hub_customize_partial_online_courses_hub_course_fields_number',
    ) );

    $count =  get_theme_mod('online_courses_hub_course_fields_number');
    for($i=1; $i<=$count; $i++ ) {
        
        $wp_customize->add_setting('online_courses_hub_course_fields_icon_'.$i,array(
            'default' => '',
            'sanitize_callback'   => 'sanitize_text_field',
        ));
        $wp_customize->add_control('online_courses_hub_course_fields_icon_'.$i,array(
            'label' => __('Course Icon','online-courses-hub'),
            'section' => 'online_courses_hub_course_fields_section',
            'type'  => 'text'
        ));

        $wp_customize->add_setting('online_courses_hub_course_fields_heading_'.$i,array(
            'default' => '',
            'sanitize_callback'   => 'sanitize_text_field',
        ));
        $wp_customize->add_control('online_courses_hub_course_fields_heading_'.$i,array(
            'label' => __('Course Name','online-courses-hub'),
            'section' => 'online_courses_hub_course_fields_section',
            'type'  => 'text'
        ));

        $wp_customize->add_setting('online_courses_hub_course_fields_text_'.$i,array(
            'default'  => '',
            'sanitize_callback'    => 'sanitize_text_field',
        ));
        $wp_customize->add_control('online_courses_hub_course_fields_text_'.$i,array(
            'label' => __('Course Description','online-courses-hub'),
            'section' => 'online_courses_hub_course_fields_section',
            'type' => 'text'
        ));
    }

    // Popular Course
    $wp_customize->add_section('online_courses_hub_popular_course_section',array(
        'title' => __('Popular Course','online-courses-hub'),
        'description' => __('Popular Course Sections','online-courses-hub'),
        'panel' => 'elearning_education_panel_id',
        'priority' => 10,
    ));

    $wp_customize->add_setting('online_courses_hub_popular_courses_text',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('online_courses_hub_popular_courses_text',array(
        'label' => __('Section Title','online-courses-hub'),
        'section' => 'online_courses_hub_popular_course_section',
        'type' => 'text'
    ));
    $wp_customize->selective_refresh->add_partial( 'online_courses_hub_popular_courses_text', array(
        'selector' => '#popular_topic h2',
        'render_callback' => 'online_courses_hub_customize_partial_online_courses_hub_popular_courses_text',
    ) );


    $categories = get_categories();
    $cats = array();
    $i = 0;
    $offer_cat[]= 'select';
    foreach($categories as $category){
        if($i==0){
            $default = $category->slug;
            $i++;
        }
        $offer_cat[$category->slug] = $category->name;
    }

    $wp_customize->add_setting('online_courses_hub_popular_courses_category',array(
        'default'   => 'select',
        'sanitize_callback' => 'elearning_education_sanitize_choices',
    ));
    $wp_customize->add_control('online_courses_hub_popular_courses_category',array(
        'type'    => 'select',
        'choices' => $offer_cat,
        'label' => __('Select Category','online-courses-hub'),
        'section' => 'online_courses_hub_popular_course_section',
    ));

}
add_action( 'customize_register', 'online_courses_hub_customize_register' );