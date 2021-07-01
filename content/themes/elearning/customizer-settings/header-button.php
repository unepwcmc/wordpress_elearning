<?php
function header_button_customizer_settings($wp_customize) {
  // Add Header Button Section
  $wp_customize->add_section( 'header_button', array (
  'title' => 'Header Button',
  'description' => 'Settings for the CTA button in the header',
  'priority' => 100
  ) );

  // add a setting to enable the button
  $wp_customize->add_setting('enable_header_button');
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'enable_header_button',
  array(
  'label'     => 'Enable Header Button',
  'section'   => 'header_button',
  'settings'  => 'enable_header_button',
  'type'      => 'checkbox'
  ) ) );

  // add a setting for the button URL
  $wp_customize->add_setting('header_button_url');
  // Add a control to input the Button URL
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'header_button_url',
  array(
  'label' => 'Button URL',
  'section' => 'header_button',
  'settings' => 'header_button_url'
  ) ) );

  // add a setting for the button text
  $wp_customize->add_setting('header_button_text');
  // Add a control to input the button text
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'header_button_text',
  array(
  'label' => 'Button Text',
  'section' => 'header_button',
  'settings' => 'header_button_text'
  ) ) );

  // add a setting to make the button link open in a new tab
  $wp_customize->add_setting('header_button_external_link');
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'header_button_external_link',
  array(
  'label'     => 'External Link',
  'section'   => 'header_button',
  'settings'  => 'header_button_external_link',
  'type'      => 'checkbox'
  ) ) );

}
add_action('customize_register', 'header_button_customizer_settings');
