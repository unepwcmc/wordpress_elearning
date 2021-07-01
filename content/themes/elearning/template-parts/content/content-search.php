<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

	$thumbnail_url = get_the_post_thumbnail_url() != '' ? get_the_post_thumbnail_url() : get_stylesheet_directory_uri() . '/dist/img/square-placeholder.jpg';

	$post_type_slug = get_post_type();
	$isTypePost = $post_type_slug === 'post';
	$isTypeResource = $post_type_slug === 'resource';

	$post_type = get_post_type_object( $post_type_slug );

	$post_type_singular_name = $post_type->labels->singular_name;

	if ($isTypeResource) {
		$resource_type = get_the_terms($post->ID, 'resource_type')[0];
	}

	$post_type_label = $isTypePost ?
		__( 'News', 'wcmc' ) :
		$post_type_singular_name;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry-excerpt entry-excerpt--search' ); ?>>
	<div class="entry-excerpt__body">
		<div class="entry-excerpt__columns">
			<div class="entry-excerpt__column">
				<div class="entry-excerpt__thumbnail">
					<img src="<?php echo $thumbnail_url; ?>" alt="<?php the_title(); ?>" />
				</div>
			</div>
			<div class="entry-excerpt__column">
				<?php
				the_title( sprintf( '<h2 class="entry-excerpt__title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
				?>
				<p class="entry-excerpt__details">
					<?php echo $post_type_label; ?>
					<?php if ($isTypePost) echo the_date(' • j F Y'); ?>
					<?php if ($isTypeResource) echo ' • ' . $resource_type->name; ?>
				</p>
				<?php if (get_the_excerpt() != ''): ?>
					<p class="entry-excerpt__content"><?php
						the_excerpt();
					?></p>
				<?php endif; ?>
				<a class="entry-excerpt__link" href="<?php the_permalink(); ?>" title="<?php _e( 'Read more', 'wcmc' ); ?>">
					<?php _e( 'Read more', 'wcmc' ); ?>
				</a>
			</div>
		</div><!-- .entry-content -->
	</div>
</article><!-- #post-## -->
