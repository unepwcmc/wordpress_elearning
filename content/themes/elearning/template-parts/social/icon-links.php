<?php
$socials = array(
  'twitter' => array(
    'name' => 'twitter',
    'label' => 'Twitter',
    'url' => get_theme_mod( 'twitter_url' )
  ),
  'linkedin' => array(
    'name' => 'linkedin',
    'label' => 'LinkedIn',
    'url' => get_theme_mod( 'linkedin_url' )
  ),
  'facebook' => array(
    'name' => 'facebook',
    'label' => 'Facebook',
    'url' => get_theme_mod( 'facebook_url' )
  ),
  'youtube' => array(
    'name' => 'youtube',
    'label' => 'YouTube',
    'url' => get_theme_mod( 'youtube_url' )
  )
);

?>

<div class="social-links">
  <ul class="social-links__items">
    <?php foreach ($socials as $social) :
      if ($social['url'] != '') : ?>
        <li class="social-links__item">
          <a
            href="<?php echo $social['url']; ?>"
            target="_blank"
            title="<?php printf( __( 'Follow us on %s', 'wcmc' ), $social['label'] ); ?>"
            class="social-links__link"
          >
            <span class="utility__screen-reader-only"><?php echo $social['label']; ?></span>
            <?php get_template_part( 'template-parts/icons/icon', $social['name'] ); ?>
          </a>
        </li>
      <?php endif; ?>
    <?php endforeach; ?>
  </ul>
</div>
