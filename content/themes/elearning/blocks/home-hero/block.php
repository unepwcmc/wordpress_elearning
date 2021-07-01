<?php
  /*
    Home Hero Block
    Created by UNEP-WCMC
    With Genesis Custom Blocks for Gutenberg - https://getblocklab.com/
  */

  // Variables
  $title = block_field( 'title', false );
  $text = block_field( 'text', false );
  $dark_text = block_field( 'dark-text', false );

  $image = block_field( 'image', false );
  $image_url = wp_get_attachment_image_src( $image, 'full-size' )[0];

  $background_colour = block_field( 'background-colour', false );
  $opacity = block_field( 'opacity', false ) * 0.1;
?>

  <div
    style="background-color: <?php echo $background_color; ?>"
    class="home-hero<?php if ($dark_text) echo ' home-hero--dark'; ?>"
  >
    <div class="home-hero__inner">
      <div class="home-hero__body">
        <div class="home-hero__content">
          <?php if ($title !== '') : ?>
            <h2 class="home-hero__title">
              <?php echo $title; ?>
            </h2>
          <?php endif; ?>
          <?php if ($title !== '') : ?>
            <h3 class="home-hero__text">
              <?php echo $text; ?>
            </h3>
          <?php endif; ?>
        </div>
      </div>
    </div>
    <?php if ($image_url): ?>
      <img
        src="<?php echo $image_url; ?>"
        alt="<?php echo $title; ?>"
        style="opacity: <?php echo $opacity; ?>"
        class="home-hero__background-image"
      >
    <?php endif; ?>
  </div>
