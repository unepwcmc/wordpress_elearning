<?php
  /*
    Home Hero Block
    Created by UNEP-WCMC
    With Genesis Custom Blocks for Gutenberg - https://getblocklab.com/
  */

  // Variables
  $title = block_field( 'title', false );
  $text = block_field( 'text', false );

  $link_url = block_field( 'link-url', false );
  $link_text = block_field( 'link-text', false );
  $link_url_external = block_field( 'external-link', false );

  $image = block_field( 'image', false );
  $image_url = wp_get_attachment_image_src( $image, 'full-size' )[0];

  $dark_text = block_field( 'dark-text', false );
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
          <?php if ($link_url !== '') : ?>
            <a
              href="<?php echo $link_url; ?>"
              title="<?php echo $link_text; ?>"
              <?php if ($link_url_external) echo ' target="_blank"'; ?>
              class="home-hero__link<?php if ($link_url_external) echo ' home-hero__link--external'; ?>"
            >
              <?php echo $link_text; ?>
              <?php if ($link_url_external) get_template_part( 'template-parts/icons/icon', 'external' ); ?>
            </a>
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
