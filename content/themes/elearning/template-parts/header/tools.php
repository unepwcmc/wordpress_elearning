<div class="header-tools">
  <div class="header-tools__items">

    <!-- Links to users account page -->
    <?php get_template_part( 'template-parts/components/buttons/button', 'account-login' ); ?>

    <!-- Configured in customiser -->
    <?php get_template_part( 'template-parts/components/buttons/button', 'header-cta' ); ?>

    <!-- Only used on Learndash topics -->
    <?php get_template_part( 'template-parts/components/buttons/button', 'exit-course' ); ?>

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
