<?php
function blog_posts_customizer_settings($wp_customize) {
  // Add Blog Posts Section
  $wp_customize->add_section( 'blog_posts', array (
  'title' => 'Blog Posts',
  'description' => 'Settings affecting blog posts',
  'priority' => 110
  ) );

    // Add Boilerplate Setting & Control
    $wp_customize->add_setting('blog_posts_boilerplate',
    array(
      'sanitize_callback' => 'wp_kses_post' //keeps only HTML tags that are allowed in post content
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'blog_posts_boilerplate',
    array(
    'label' => 'Blog Post Boilerplate',
    'type' => 'textarea',
    'section' => 'blog_posts',
    'settings' => 'blog_posts_boilerplate'
    ) ) );
}
add_action('customize_register', 'blog_posts_customizer_settings');
