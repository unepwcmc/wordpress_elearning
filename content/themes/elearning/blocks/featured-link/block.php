<?php
  /*
    Featured Link Block
    Created by UNEP-WCMC
    With Genesis Custom Blocks for Gutenberg - https://getblocklab.com/
  */

  // Variables
  $text = block_field('text', false);

  $link_text = block_field('link-text', false);
  $link_url = block_field('link-url', false);

  $image = block_field('image-id', false);
  $image_url = wp_get_attachment_image_src($image, 'full-size')[0];
?>

<div class="featured-link">
  <div class="featured-link__inner">
    <div class="featured-link__columns">
      <div class="featured-link__column">
        <div class="featured-link__image-wrapper">
          <img
            src="<?php echo $image_url; ?>"
            alt="<?php echo $text; ?>"
            class="featured-link__image"
          >
        </div>
      </div>
      <div class="featured-link__column">
        <div class="featured-link__content">
          <h3 class="featured-link__title">
            <?php echo $text; ?>
          </h3>
          <a
            href="<?php echo $link_url; ?>"
            class="featured-link__link"
          >
            <?php echo $link_text; ?>
            <?php get_template_part( 'template-parts/icons/icon', 'arrow' ); ?>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
