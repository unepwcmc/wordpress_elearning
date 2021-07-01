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

<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry richtext' ); ?>>
	<header class="entry__header">
		<?php
			the_title( sprintf( '<h2 class="entry__title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
		?>
		<div class="entry__details">
			<?php
			echo get_the_date( get_option('date_format') ); echo get_the_tag_list(' - ',', ','');
			?>
		</div>
	</header><!-- .entry-header -->
	<div class="entry__body">
		<div class="entry__content">
			<?php
				the_excerpt();
			?>
			<a class="entry__link" href="<?php the_permalink(); ?>" title="<?php _e( 'Read more', 'wcmc' ); ?>">
				<?php _e( 'Read more', 'wcmc' ); ?>
			</a>
		</div><!-- .entry-content -->
	</div>
</article><!-- #post-## -->
