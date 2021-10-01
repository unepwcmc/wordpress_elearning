<div class="header-tools">
  <div class="header-tools__items">

    <div class="header-tools__item header-tools__item--account">
      <a
        href="/my-profile"
        class="header-tools__account"
      >
        <?php get_template_part( 'template-parts/icons/icon', 'account' ); ?>
      </a>
    </div>

    <?php
      if (get_theme_mod( 'enable_header_button' )):
        $external_header_link = get_theme_mod( 'header_button_external_link' );
    ?>
      <div class="header-tools__item header-tools__item--cta">
        <a href="<?php echo get_theme_mod( 'header_button_url' ); ?>" class="header-tools__button<?php if ($external_header_link) echo ' header-tools__button--external'; ?>" <?php if ($external_header_link) echo 'target="_blank"' ?> title="<?php echo get_theme_mod( 'header_button_text' ); ?>">
          <?php echo get_theme_mod( 'header_button_text' ); ?><?php if ($external_header_link) get_template_part( 'template-parts/icons/icon', 'external' ); ?>
        </a>
      </div>
    <?php endif; ?>

    <div class="header-tools__item header-tools__item--menu-toggle">
      <drawer-trigger
        class="header-tools__nav-toggle"
        controls="navigation"
        drawer="menu"
        label="<?php _e( 'Menu Toggle', 'wcmc' ); ?>"
      >
        <?php get_template_part( 'template-parts/icons/icon', 'menu' ); ?>
      </drawer-trigger>
    </div>
  </div>
</div>
