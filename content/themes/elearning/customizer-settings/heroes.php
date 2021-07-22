<?php

function hero_customizer_settings($wp_customize) {

  /*-------------------------------------------------------------------------------
  	Default
  -------------------------------------------------------------------------------*/
  // Add Default Hero Section
  $wp_customize->add_section( 'default_hero', array (
  'title' => 'Default Hero Settings',
  'panel' => 'hero_settings',
  'description' => 'For all heroes on the site with no custom configuration',
  'priority' => 100
  ) );

    // Default background image
    $wp_customize->add_setting('default_hero_image');
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'default_hero_image', array(
      'label' => 'Default Background Image',
      'section' => 'default_hero',
      'settings' => 'default_hero_image'
    ) ) );

    // Default Hero overlay opacity
    $wp_customize->add_setting('default_hero_overlay_opacity');
    // Add a control to input the default overlay opacity
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'default_hero_overlay_opacity',
    array(
      'label' => 'Default Overlay Opacity',
      'section' => 'default_hero',
      'description' => 'From 0 to 1 in 0.1 increments (e.g., 0.4)',
      'settings' => 'default_hero_overlay_opacity'
    ) ) );

    // Default text
    $wp_customize->add_setting('default_hero_text');
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'default_hero_text',
    array(
    'label' => 'Default Text',
    'type' => 'textarea',
    'section' => 'default_hero',
    'settings' => 'default_hero_text'
    ) ) );

    // Default button text
    $wp_customize->add_setting('default_hero_button_link');
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'default_hero_button_link',
    array(
    'label' => 'Button Link',
    'type' => 'dropdown-pages',
    'section' => 'default_hero',
    'settings' => 'default_hero_button_link'
    ) ) );

    // Default button url
    $wp_customize->add_setting('default_hero_button_text');
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'default_hero_button_text',
    array(
    'label' => 'Button Text',
    'section' => 'default_hero',
    'settings' => 'default_hero_button_text'
    ) ) );

  /*-------------------------------------------------------------------------------
  	Courses
  -------------------------------------------------------------------------------*/
  // Add Courses Hero Section
  $wp_customize->add_section( 'courses_hero', array (
    'title' => 'Courses Page',
    'panel' => 'hero_settings',
    'description' => 'Settings for the hero on the Courses listing page',
    'priority' => 100
  ) );

    // Courses Hero title
    $wp_customize->add_setting('courses_hero_title');
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'courses_hero_title',
    array(
    'label' => 'Title',
    'section' => 'courses_hero',
    'settings' => 'courses_hero_title'
    ) ) );

    // Courses Hero background image
    $wp_customize->add_setting('courses_hero_image');
    $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'courses_hero_image', array(
      'label' => 'Background Image',
      'section' => 'courses_hero',
      'settings' => 'courses_hero_image'
    ) ) );

    // Courses Hero Hero overlay opacity
    $wp_customize->add_setting('courses_hero_overlay_opacity');
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'courses_hero_overlay_opacity',
    array(
      'label' => 'Overlay Opacity',
      'section' => 'courses_hero',
      'description' => 'From 0 to 1 in 0.1 increments (e.g., 0.4)',
      'settings' => 'courses_hero_overlay_opacity'
    ) ) );

    // Courses Hero text
    $wp_customize->add_setting('courses_hero_text');
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'courses_hero_text',
    array(
    'label' => 'Text',
    'type' => 'textarea',
    'section' => 'courses_hero',
    'settings' => 'courses_hero_text'
    ) ) );

    // Courses Hero button url
    $wp_customize->add_setting('courses_hero_button_link');
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'courses_hero_button_link',
    array(
    'label' => 'Button Link',
    'type' => 'dropdown-pages',
    'section' => 'courses_hero',
    'settings' => 'courses_hero_button_link'
    ) ) );

    // Courses Hero button text
    $wp_customize->add_setting('courses_hero_button_text');
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'courses_hero_button_text',
    array(
    'label' => 'Button Text',
    'section' => 'courses_hero',
    'settings' => 'courses_hero_button_text'
    ) ) );
}

add_action('customize_register', 'hero_customizer_settings');
