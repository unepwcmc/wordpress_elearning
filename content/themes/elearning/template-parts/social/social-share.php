<?php
  $page_url = get_site_url() . $_SERVER['REQUEST_URI'];

  $socials = array(
    'facebook' => array(
      'name' => 'facebook',
      'label' => 'Facebook',
      'url' => 'https://www.facebook.com/sharer/sharer.php?u=' . $page_url
    ),
    'twitter' => array(
      'name' => 'twitter',
      'label' => 'Twitter',
      'url' => 'https://twitter.com/intent/tweet?url=' . $page_url
    ),
    'email' => array(
      'name' => 'email',
      'label' => __( 'Email', 'wcmc' ),
      'url' => 'mailto:?body=' . $page_url
    )
  );

?>

<div class="social">
  <ul class="social__icons">
    <?php foreach ($socials as $social) :
      if ($social['url'] != '') : ?>
        <li class="social__icon">
          <a
            href="<?php echo $social['url']; ?>"
            target="_blank"
            rel="noreferrer noopener"
            title="<?php printf( __( 'Share via %s', 'wcmc' ), $social['label'] ); ?>"
            class="social__link"
          >
            <span class="utility__screen-reader-only"><?php echo $social['label']; ?></span>
            <?php get_template_part( 'template-parts/icons/icon', $social['name'] ); ?>
          </a>
        </li>
      <?php endif; ?>
    <?php endforeach; ?>
  </ul>
</div>
