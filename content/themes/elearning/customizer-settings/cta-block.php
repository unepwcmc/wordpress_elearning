<?php
function cta_block_customizer_settings($wp_customize) {
  // Add CTA Section
  $wp_customize->add_section( 'cta_block', array (
  'title' => 'CTA Block Settings',
  'description' => 'Settings for the CTA block',
  'priority' => 100
  ) );

    // Background image
    $wp_customize->add_setting('cta_block_background_image');
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'cta_block_background_image', array(
      'label' => 'Background Image',
      'section' => 'cta_block',
      'settings' => 'cta_block_background_image'
    ) ) );

    // Background image opacity
    $wp_customize->add_setting('cta_block_background_image_opacity');
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'cta_block_background_image_opacity',
    array(
    'label' => 'Background Image Opacity',
    'description' => 'From 0-1 in 0.1 increments',
    'section' => 'cta_block',
    'settings' => 'cta_block_background_image_opacity'
    ) ) );

    // Background color
    $wp_customize->add_setting('cta_block_background_colour');
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'cta_block_background_colour',
    array(
    'label' => 'Background Colour',
    'type' => 'color',
    'section' => 'cta_block',
    'settings' => 'cta_block_background_colour'
    ) ) );

    // Title
    $wp_customize->add_setting('cta_block_title');
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'cta_block_title',
    array(
    'label' => 'Title',
    'section' => 'cta_block',
    'settings' => 'cta_block_title'
    ) ) );

    // Text
    $wp_customize->add_setting('cta_block_text');
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'cta_block_text',
    array(
    'label' => 'Text',
    'type' => 'textarea',
    'section' => 'cta_block',
    'settings' => 'cta_block_text'
    ) ) );

    // Button link
    $wp_customize->add_setting('cta_block_button_link');
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'cta_block_button_link',
    array(
    'label' => 'Button Link',
    'section' => 'cta_block',
    'settings' => 'cta_block_button_link'
    ) ) );

    // Button external link?
    $wp_customize->add_setting('cta_block_button_link_external');
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'cta_block_button_link_external',
    array(
    'label'     => 'External link',
    'section'   => 'cta_block',
    'settings'  => 'cta_block_button_link_external',
    'type'      => 'checkbox'
    ) ) );

    // Button text
    $wp_customize->add_setting('cta_block_button_text');
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'cta_block_button_text',
    array(
    'label' => 'Button Text',
    'section' => 'cta_block',
    'settings' => 'cta_block_button_text'
    ) ) );

}
add_action('customize_register', 'cta_block_customizer_settings');
