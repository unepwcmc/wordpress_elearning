<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 */

get_header(); ?>

<?php
	set_query_var('hero-title', __( 'Search results', 'wcmc' ));
	get_template_part('template-parts/components/heroes/hero', 'page');
?>

<div class="layout-container">
	<div class="layout-container__inner">
		<div class="layout-container__body">
			<section class="layout-primary layout-primary--restrained">
				<header class="layout-primary__header">
					<?php if ( have_posts() ) : ?>
						<h2 class="layout-primary__title">
							<?php printf(
								__( 'Showing %d of %d results for "%s"', 'wcmc' ),
								$wp_query->post_count,
								$wp_query->found_posts,
								'<span>' . get_search_query() . '</span>'
							); ?>
						</h2>
						<?php else : ?>
							<h2 class="layout-primary__title">
								<?php printf(
									__( 'No results found for %s', 'wcmc' ),
									'<span>' . get_search_query() . '</span>'
								); ?>
							</h2>
						<?php endif; ?>
					</header>

					<?php
					if ( have_posts() ) :
						/* Start the Loop */
						while ( have_posts() ) :
							the_post();

							/**
							* Run the loop for the search to output the results.
							* If you want to overload this in a child theme then include a file
							* called content-search.php and that will be used instead.
							*/
							get_template_part( 'template-parts/content/content', 'search' );

						endwhile; // End of the loop.

					pagination_bar();

					else :
						?>
						<div class="layout-primary__body">
							<div class="layout-search">
								<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'wcmc' ); ?></p>

								<form class="layout-search__form" role="search" method="get" id="searchpageform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
									<label class="utility__screen-reader-only" for="s"><?php _e( 'Search for:', 'wcmc' ); ?></label>

									<input type="text" value="" name="s" id="s" class="layout-search__input" placeholder="<?php _e( 'Search here', 'wcmc' ); ?>" />

									<input class="layout-search__button" type="submit"></input>
								</form>
							</div>
						</div>

					<?php endif; ?>
			</section>
		</div>
	</div>
</div>


<?php
get_footer();
