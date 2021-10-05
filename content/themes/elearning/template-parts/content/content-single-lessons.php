<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 */

 $parent_course_id = learndash_get_setting( $post, 'course' );
 $parent_course = get_post( $parent_course_id );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry richtext' ); ?>>
	<div class="entry__header">
		<p class="entry__breadcrumb">
			<a href="<?php echo get_permalink( $parent_course ); ?>">All Lessons</a> | <?php echo get_the_title(); ?>
		</p>
		<h2 class="entry__title"><?php the_title(); ?></h2>
	</div><!-- .entry-header -->
	<div class="entry__body">
		<div class="entry__content">
			<?php
			/* translators: %s: Name of current post */
			the_content(
				sprintf(
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'wcmc' ),
					get_the_title()
					)
				);

				wp_link_pages(
					array(
						'before'      => '<div class="page-links">' . __( 'Pages:' ),
						'after'       => '</div>',
						'link_before' => '<span class="page-number">',
						'link_after'  => '</span>',
					)
				);
				?>
			</div><!-- .entry-content -->
	</div>

</article><!-- #post-## -->
