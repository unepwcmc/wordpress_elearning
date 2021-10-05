<div class="header-tools__item header-tools__item--account">
  <?php if (is_user_logged_in()): ?>
    <a
    href="/my-profile"
    class="header-tools__account"
    >
      <?php get_template_part( 'template-parts/icons/icon', 'account' ); ?>
    </a>
  <?php else : ?>
    <a
      href="<?php echo wp_login_url(); ?>"
      title="<?php _e( 'Login', 'wcmc' ); ?>"
      class="header-tools__button header-tools__button--ghost"
    >
      <?php _e( 'Login', 'wcmc' ); ?>
    </a>
  <?php endif; ?>
</div>
