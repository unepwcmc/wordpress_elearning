<?php
  global $template;
  $parent_lesson_id = learndash_get_setting( $post, 'lesson' );
  $parent_lesson = get_post( $parent_lesson_id );
?>

<?php if ( basename( $template ) === 'single-sfwd-topic.php' ) : ?>
  <div class="header-tools__item header-tools__item--exit-course">
    <a
      href="<?php echo get_permalink( $parent_lesson ); ?>"
      title="<?php echo get_theme_mod( 'header_button_text' ); ?>"
      class="header-tools__button"
    >
      <?php _e( 'Exit course', 'wcmc' ); ?>
    </a>
  </div>
<?php endif; ?>
