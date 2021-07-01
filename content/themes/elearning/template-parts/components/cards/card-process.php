<?php
  $image_url = get_the_post_thumbnail_url() != '' ? get_the_post_thumbnail_url() : get_stylesheet_directory_uri() . '/inc/img/card-placeholder.jpg';
?>

<article id="post-<?php the_ID(); ?>" class="card-listing__card">
	<header class="card-listing__header">
    <div class="card-listing__image-wrap">
      <img
        src="<?php echo $image_url; ?>"
        alt="<?php the_title(); ?>"
        class="card-listing__image"
      />
    </div>
	</header>
	<div class="card-listing__body">
		<div class="card-listing__content">
      <h3 class="card-listing__title"><?php the_title(); ?></h3>
		</div>
	</div>
  <a class="card-listing__fauxlink" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"></a>
</article><!-- #post-## -->
