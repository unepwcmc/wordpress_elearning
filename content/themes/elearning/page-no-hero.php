<?php
/**
 * The template for displaying full width page
 *
 Template Name: No Hero
 *
 */

get_header(); ?>

<div class="layout-container layout-container--no-hero">
	<div class="layout-container__inner">
		<div class="layout-container__body">
			<section class="layout-primary layout-primary--restrained">
				<div class="layout-primary__body">
					<?php
						if ( have_posts() ) :
							while ( have_posts() ) :
								the_post();

								get_template_part( 'template-parts/content/content', 'page-no-hero' );

							endwhile; // End of the loop.
						else :
								get_template_part( 'template-parts/content/content', 'none' );
						endif;
					?>
				</div>
			</section>
		</div>
	</div>
</div>

<?php get_footer();
