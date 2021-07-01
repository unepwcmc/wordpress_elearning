<?php
  /* Variables */
  $title = get_query_var( 'hero-title' );

  $text = get_query_var( 'hero-text' );

  $link_url = get_query_var( 'hero-link-url' );
  $link_text = get_query_var( 'hero-link-text' );

  $background_image = get_query_var( 'hero-background-image' );
  $background_image_url = $background_image != '' ? wp_get_attachment_image_src( $background_image, 'full-size' )[0] : get_theme_mod( 'default_hero_image' );
?>

<div class="hero hero--simple">
  <div class="hero__body">
    <img class="hero__background-image" src="<?php echo $background_image_url; ?>" alt="<?php echo $title; ?>">
    <div class="hero__overlay"></div>
    <div class="hero__content">
      <?php if ($title != ''): ?>
        <h2 class="hero__title"><?php echo $title; ?></h2>
      <?php endif; ?>
      <?php if ($text != ''): ?>
        <p class="hero__text"><?php echo $text; ?></p>
      <?php endif; ?>
      <?php if ($link_url != ''): ?>
        <a href="<?php echo $link_url; ?>" class="hero__link" title="<?php echo $link_text; ?>"><?php echo $link_text; ?></a>
      <?php endif; ?>
    </div>
  </div>
</div>
