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

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post__body">
		<div class="entry__content">
			<?php
			the_content();
			?>
		</div><!-- .entry__content -->

		<?php if ( '' !== get_the_post_thumbnail() && ! is_single() ) : ?>
			<div class="post__thumbnail">
				<a href="<?php the_permalink(); ?>" title="<?php echo get_the_title(); ?>">
					<?php the_post_thumbnail( 'thumbnail' ); ?>
				</a>
			</div><!-- .post-thumbnail -->
		<?php endif; ?>
	</div>

	<hr class="hr--white">
</article><!-- #post-## -->
