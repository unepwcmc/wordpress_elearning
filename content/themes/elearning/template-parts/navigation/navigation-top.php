<?php
/**
* Displays top navigation
**/
?>

<!-- navigation  -->

<nav class="nav-header" aria-hidden="true">
	<?php wp_nav_menu( array(
    'theme_location' => 'primary',
    'walker' => new submenuWrap()
  ) ); ?>
</nav>
