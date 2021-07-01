<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 */


	get_header();

	$post_type = get_queried_object()->name;

	// Page Hero
	set_query_var('hero-title', get_the_archive_title());
	get_template_part( 'template-parts/components/heroes/hero', 'page' );
?>

<div class="layout-container">
	<div class="layout-container__inner">
		<div class="layout-container__body">
			<section class="layout-primary">
				<div class="layout-primary__body layout-primary__body--archive">

					<listing-grid post-type="<?php echo $post_type; ?>" />

				</div>
			</section>
		</div>
	</div>
</div>

<?php get_footer();
