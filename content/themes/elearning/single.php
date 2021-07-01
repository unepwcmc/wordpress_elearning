<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 */

get_header(); ?>

<div class="layout-container layout-container--no-hero">
	<div class="layout-container__inner">
		<div class="layout-container__body">
			<section class="layout-primary layout-primary--restrained">
				<div class="layout-primary__body">
					<?php
						/* Start the Loop */
						if ( have_posts() ) :
							while ( have_posts() ) :
								the_post();

								get_template_part( 'template-parts/content/content', 'single' );
							endwhile;
						endif; wp_reset_query(); // End of the loop.
					?>
				</div>
			</section>
		</div>
	</div>
</div>

<?php get_footer();
