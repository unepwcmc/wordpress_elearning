<?php
function social_media_customizer_settings($wp_customize) {
  // Add Social Icons Section
  $wp_customize->add_section( 'social_icons', array (
  'title' => 'Social URLs',
  'description' => 'Enter the URL to your account on each social media site',
  'priority' => 120
  ) );

  /*--------------------
  	Facebook
  --------------------*/
  // add a setting for the site Facebook URL
  $wp_customize->add_setting('facebook_url',
    array(
      'sanitize_callback' => 'esc_url_raw' //cleans URL from all invalid characters
    ) );
  // Add a control to input the Facebook URL
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'facebook_url',
  array(
  'label' => 'Facebook',
  'section' => 'social_icons',
  'settings' => 'facebook_url'
  ) ) );

  /*--------------------
  	LinkedIn
  --------------------*/
  // add a setting for the site LinkedIn URL
  $wp_customize->add_setting('linkedin_url',
    array(
      'sanitize_callback' => 'esc_url_raw' //cleans URL from all invalid characters
    ) );
  // Add a control to input the LinkedIn URL
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'linkedin_url',
  array(
  'label' => 'LinkedIn',
  'section' => 'social_icons',
  'settings' => 'linkedin_url'
  ) ) );

  /*--------------------
  	Twitter
  --------------------*/
  // add a setting for the site Twitter URL
  $wp_customize->add_setting('twitter_url',
    array(
      'sanitize_callback' => 'esc_url_raw' //cleans URL from all invalid characters
    ) );
  // Add a control to input the Twitter URL
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'twitter_url',
  array(
  'label' => 'Twitter',
  'section' => 'social_icons',
  'settings' => 'twitter_url'
  ) ) );

  /*--------------------
  	YouTube
  --------------------*/
  // add a setting for the site YouTube URL
  $wp_customize->add_setting('youtube_url',
    array(
      'sanitize_callback' => 'esc_url_raw' //cleans URL from all invalid characters
    ) );
  // Add a control to input the YouTube URL
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'youtube_url',
  array(
  'label' => 'YouTube',
  'section' => 'social_icons',
  'settings' => 'youtube_url'
  ) ) );
}
add_action('customize_register', 'social_media_customizer_settings');
