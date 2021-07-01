<h1 class="header__title"><?php wp_title( '|', true, 'right' ); ?><?php bloginfo( 'name' ); ?></h1>
<a class="header__logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo get_bloginfo('name'); ?>">
  <span class="utility__screen-reader-only"><?php wp_title( '|', true, 'right' ); ?><?php bloginfo( 'name' ); ?></span>
  <?php get_template_part( 'template-parts/global/logo' ); ?>
</a>
