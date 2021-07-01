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
  	Events
  -------------------------------------------------------------------------------*/
  // Add Events Hero Section
  $wp_customize->add_section( 'events_hero', array (
    'title' => 'Events Page',
    'panel' => 'hero_settings',
    'description' => 'Settings for the hero on the Events listing page',
    'priority' => 100
  ) );

    // Events Hero title
    $wp_customize->add_setting('events_hero_title');
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'events_hero_title',
    array(
    'label' => 'Title',
    'section' => 'events_hero',
    'settings' => 'events_hero_title'
    ) ) );

    // Events Hero background image
    $wp_customize->add_setting('events_hero_image');
    $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'events_hero_image', array(
      'label' => 'Background Image',
      'section' => 'events_hero',
      'settings' => 'events_hero_image'
    ) ) );

    // Events Hero Hero overlay opacity
    $wp_customize->add_setting('events_hero_overlay_opacity');
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'events_hero_overlay_opacity',
    array(
      'label' => 'Overlay Opacity',
      'section' => 'events_hero',
      'description' => 'From 0 to 1 in 0.1 increments (e.g., 0.4)',
      'settings' => 'events_hero_overlay_opacity'
    ) ) );

    // Events Hero text
    $wp_customize->add_setting('events_hero_text');
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'events_hero_text',
    array(
    'label' => 'Text',
    'type' => 'textarea',
    'section' => 'events_hero',
    'settings' => 'events_hero_text'
    ) ) );

    // Events Hero button url
    $wp_customize->add_setting('events_hero_button_link');
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'events_hero_button_link',
    array(
    'label' => 'Button Link',
    'type' => 'dropdown-pages',
    'section' => 'events_hero',
    'settings' => 'events_hero_button_link'
    ) ) );

    // Events Hero button text
    $wp_customize->add_setting('events_hero_button_text');
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'events_hero_button_text',
    array(
    'label' => 'Button Text',
    'section' => 'events_hero',
    'settings' => 'events_hero_button_text'
    ) ) );

  /*-------------------------------------------------------------------------------
    News
  -------------------------------------------------------------------------------*/
  // Add News Hero Section
  $wp_customize->add_section( 'news_hero', array (
    'title' => 'News Page',
    'panel' => 'hero_settings',
    'description' => 'Settings for the hero on the News listing page',
    'priority' => 100
  ) );

    // News Hero title
    $wp_customize->add_setting('news_hero_title');
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'news_hero_title',
    array(
    'label' => 'Title',
    'section' => 'news_hero',
    'settings' => 'news_hero_title'
    ) ) );

    // News Hero background image
    $wp_customize->add_setting('news_hero_image');
    $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'news_hero_image', array(
      'label' => 'Background Image',
      'section' => 'news_hero',
      'settings' => 'news_hero_image'
    ) ) );

    // News Hero Hero overlay opacity
    $wp_customize->add_setting('news_hero_overlay_opacity');
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'news_hero_overlay_opacity',
    array(
      'label' => 'Overlay Opacity',
      'section' => 'news_hero',
      'description' => 'From 0 to 1 in 0.1 increments (e.g., 0.4)',
      'settings' => 'news_hero_overlay_opacity'
    ) ) );

    // News Hero text
    $wp_customize->add_setting('news_hero_text');
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'news_hero_text',
    array(
    'label' => 'Text',
    'type' => 'textarea',
    'section' => 'news_hero',
    'settings' => 'news_hero_text'
    ) ) );

    // News Hero button url
    $wp_customize->add_setting('news_hero_button_link');
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'news_hero_button_link',
    array(
    'label' => 'Button Link',
    'type' => 'dropdown-pages',
    'section' => 'news_hero',
    'settings' => 'news_hero_button_link'
    ) ) );

    // News Hero button text
    $wp_customize->add_setting('news_hero_button_text');
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'news_hero_button_text',
    array(
    'label' => 'Button Text',
    'section' => 'news_hero',
    'settings' => 'news_hero_button_text'
    ) ) );

  /*-------------------------------------------------------------------------------
  	Partners
  -------------------------------------------------------------------------------*/
  // Add Partners Hero Section
  $wp_customize->add_section( 'partners_hero', array (
    'title' => 'Partners Page',
    'panel' => 'hero_settings',
    'description' => 'Settings for the hero on the Partners listing page',
    'priority' => 100
  ) );

    // Partners Hero title
    $wp_customize->add_setting('partners_hero_title');
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'partners_hero_title',
    array(
    'label' => 'Title',
    'section' => 'partners_hero',
    'settings' => 'partners_hero_title'
    ) ) );

    // Partners Hero background image
    $wp_customize->add_setting('partners_hero_image');
    $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'partners_hero_image', array(
      'label' => 'Background Image',
      'section' => 'partners_hero',
      'settings' => 'partners_hero_image'
    ) ) );

    // Partners Hero Hero overlay opacity
    $wp_customize->add_setting('partners_hero_overlay_opacity');
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'partners_hero_overlay_opacity',
    array(
      'label' => 'Overlay Opacity',
      'section' => 'partners_hero',
      'description' => 'From 0 to 1 in 0.1 increments (e.g., 0.4)',
      'settings' => 'partners_hero_overlay_opacity'
    ) ) );

    // Partners Hero text
    $wp_customize->add_setting('partners_hero_text');
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'partners_hero_text',
    array(
    'label' => 'Text',
    'type' => 'textarea',
    'section' => 'partners_hero',
    'settings' => 'partners_hero_text'
    ) ) );

    // Partners Hero button url
    $wp_customize->add_setting('partners_hero_button_link');
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'partners_hero_button_link',
    array(
    'label' => 'Button Link',
    'type' => 'dropdown-pages',
    'section' => 'partners_hero',
    'settings' => 'partners_hero_button_link'
    ) ) );

    // Partners Hero button text
    $wp_customize->add_setting('partners_hero_button_text');
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'partners_hero_button_text',
    array(
    'label' => 'Button Text',
    'section' => 'partners_hero',
    'settings' => 'partners_hero_button_text'
    ) ) );

  /*-------------------------------------------------------------------------------
  	Resources
  -------------------------------------------------------------------------------*/
  // Add Resources Hero Section
  $wp_customize->add_section( 'resources_hero', array (
    'title' => 'Resources Page',
    'panel' => 'hero_settings',
    'description' => 'Settings for the hero on the Resources listing page',
    'priority' => 100
  ) );

    // Resources Hero title
    $wp_customize->add_setting('resources_hero_title');
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'resources_hero_title',
    array(
    'label' => 'Title',
    'section' => 'resources_hero',
    'settings' => 'resources_hero_title'
    ) ) );

    // Resources Hero background image
    $wp_customize->add_setting('resources_hero_image');
    $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'resources_hero_image', array(
      'label' => 'Background Image',
      'section' => 'resources_hero',
      'settings' => 'resources_hero_image'
    ) ) );

    // Resources Hero Hero overlay opacity
    $wp_customize->add_setting('resources_hero_overlay_opacity');
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'resources_hero_overlay_opacity',
    array(
      'label' => 'Overlay Opacity',
      'section' => 'resources_hero',
      'description' => 'From 0 to 1 in 0.1 increments (e.g., 0.4)',
      'settings' => 'resources_hero_overlay_opacity'
    ) ) );
}

add_action('customize_register', 'hero_customizer_settings');
