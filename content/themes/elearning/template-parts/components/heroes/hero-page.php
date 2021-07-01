<?php
  /* Variables */
  $title = get_query_var( 'hero-title' );

  $background_image = get_query_var( 'hero-background-image' );
  $background_image_url = $background_image != '' ? wp_get_attachment_image_src( $background_image, 'full-size' )[0] : get_theme_mod( 'default_hero_image' );

  $overlay_opacity = (get_query_var( 'hero-opacity' ) * 0.1);
?>

<div class="hero-basic">
  <div class="hero-basic__inner">
    <div class="hero-basic__body">
      <?php if ($title != ''): ?>
        <h2 class="hero-basic__title"><?php echo $title; ?></h2>
      <?php endif; ?>
    </div>
    <img
      src="<?php echo $background_image_url; ?>"
      alt="<?php echo $title; ?>"
      class="hero-basic__background-image"
    >
    <div
      <?php if ($overlay_opacity != 1) echo 'style="opacity: ' . $overlay_opacity . ';"'; ?>
      class="hero-basic__overlay"
    ></div>
  </div>
</div>
