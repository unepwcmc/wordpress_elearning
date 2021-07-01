<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 */
 	global $template;
	$post_classes_array = ['entry'];
	if (basename( $template ) !== 'front-page.php') {
		array_push($post_classes_array, 'richtext');
	}
	$post_classes = implode(' ', $post_classes_array);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $post_classes ); ?>>
	<div class="entry__body">
		<div class="entry__content">

			<?php
				the_content();

				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . __( 'Pages:' ),
						'after'  => '</div>',
					)
				);
			?>

		</div><!-- .entry__content -->
	</div>
</article><!-- #post-## -->
