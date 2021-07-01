<?php
function contact_details_customizer_settings($wp_customize) {
  // Add Contact Details Section
  $wp_customize->add_section( 'contact_details', array (
  'title' => 'Contact Details',
  'description' => 'Address and Contact Details',
  'priority' => 170
  ) );

    // Add Title Setting & Control
    $wp_customize->add_setting('contact_details_title',
      array(
        'sanitize_callback' => 'wp_kses_post' //keeps only HTML tags that are allowed in post content
      ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'contact_details_title',
    array(
    'label' => 'Section Title',
    'type' => 'text',
    'section' => 'contact_details',
    'settings' => 'contact_details_title'
    ) ) );

    // Add Heading Setting & Control
    $wp_customize->add_setting('contact_details_heading_1',
      array(
        'sanitize_callback' => 'wp_kses_post' //keeps only HTML tags that are allowed in post content
      ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'contact_details_heading_1',
    array(
    'label' => 'Heading 1',
    'type' => 'text',
    'section' => 'contact_details',
    'settings' => 'contact_details_heading_1'
    ) ) );

    // Add Address Setting & Control
    $wp_customize->add_setting('contact_details_address_1',
      array(
        'sanitize_callback' => 'wp_kses_post' //keeps only HTML tags that are allowed in post content
      ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'contact_details_address_1',
    array(
    'label' => 'Address 1',
    'type' => 'textarea',
    'section' => 'contact_details',
    'settings' => 'contact_details_address_1'
    ) ) );

    // Add Phone Number Setting & Control
    $wp_customize->add_setting('contact_details_phone_1',
      array(
        'sanitize_callback' => 'wp_kses_post' //keeps only HTML tags that are allowed in post content
      ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'contact_details_phone_1',
    array(
    'label' => 'Phone Number 1',
    'type' => 'text',
    'section' => 'contact_details',
    'settings' => 'contact_details_phone_1'
    ) ) );

    // Add Heading Setting & Control
    $wp_customize->add_setting('contact_details_heading_2',
      array(
        'sanitize_callback' => 'wp_kses_post' //keeps only HTML tags that are allowed in post content
      ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'contact_details_heading_2',
    array(
    'label' => 'Heading 2',
    'type' => 'text',
    'section' => 'contact_details',
    'settings' => 'contact_details_heading_2'
    ) ) );

    // Add Address Setting & Control
    $wp_customize->add_setting('contact_details_address_2',
      array(
        'sanitize_callback' => 'wp_kses_post' //keeps only HTML tags that are allowed in post content
      ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'contact_details_address_2',
    array(
    'label' => 'Address 2',
    'type' => 'textarea',
    'section' => 'contact_details',
    'settings' => 'contact_details_address_2'
    ) ) );

    // Add Phone Number Setting & Control
    $wp_customize->add_setting('contact_details_phone_2',
      array(
        'sanitize_callback' => 'wp_kses_post' //keeps only HTML tags that are allowed in post content
      ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'contact_details_phone_2',
    array(
    'label' => 'Phone Number 2',
    'type' => 'text',
    'section' => 'contact_details',
    'settings' => 'contact_details_phone_2'
    ) ) );

    // Add Heading Setting & Control
    $wp_customize->add_setting('contact_details_heading_3',
      array(
        'sanitize_callback' => 'wp_kses_post' //keeps only HTML tags that are allowed in post content
      ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'contact_details_heading_3',
    array(
    'label' => 'Heading 3',
    'type' => 'text',
    'section' => 'contact_details',
    'settings' => 'contact_details_heading_3'
    ) ) );

    // Add Address Setting & Control
    $wp_customize->add_setting('contact_details_address_3',
      array(
        'sanitize_callback' => 'wp_kses_post' //keeps only HTML tags that are allowed in post content
      ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'contact_details_address_3',
    array(
    'label' => 'Address 3',
    'type' => 'textarea',
    'section' => 'contact_details',
    'settings' => 'contact_details_address_3'
    ) ) );

    // Add Phone Number Setting & Control
    $wp_customize->add_setting('contact_details_phone_3',
      array(
        'sanitize_callback' => 'wp_kses_post' //keeps only HTML tags that are allowed in post content
      ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'contact_details_phone_3',
    array(
    'label' => 'Phone Number 3',
    'type' => 'text',
    'section' => 'contact_details',
    'settings' => 'contact_details_phone_3'
    ) ) );

}
add_action('customize_register', 'contact_details_customizer_settings');
