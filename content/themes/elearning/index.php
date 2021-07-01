<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 */

get_header(); ?>

<div class="layout-container layout-container--has-sidebar">
	<div class="layout-container__inner">
		<div class="layout-container__body">
			<?php get_sidebar(); ?>
			<!-- primary  -->
			<section class="layout-primary">
					<div class="layout-primary__body">
						<?php if ( have_posts() ) : ?>
							<ul class="layout-entry__items">
								<?php while ( have_posts() ) : the_post();

									/*
									* Include the Post-Format-specific template for the content.
									* If you want to override this in a child theme, then include a file
									* called content-___.php (where ___ is the Post Format name) and that will be used instead.
									*/
									echo '<li class="layout-entry__item">';
										get_template_part( 'template-parts/components/cards/card', 'blog' );
									echo '</li>';
								endwhile;
								?>
							</ul>
							<?php
							pagination_bar();
							else :
								get_template_part( 'template-parts/content/content', 'none' );
					endif; ?>
				</div>
			</section>
		</div>
	</div>
</div>

<?php dynamic_sidebar( 'after-content' ); ?>

<?php get_footer();
