<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 */

get_header(); ?>

<?php
	set_query_var('hero-title', __( "Oops! That page can't be found.", "wcmc" ));
	get_template_part('template-parts/components/heroes/hero', 'page');
?>

<div class="layout-container">
	<div class="layout-container__inner">
		<div class="layout-container__body">
			<section class="layout-primary layout-primary--restrained error-404 not-found">
				<div class="layout-primary__body">
					<div class="entry">
						<header class="entry__header">
							<h3 class="entry__title"><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'wcmc' ); ?></h3>
						</header>
						<div class="entry__body">
							<div class="entry__content">
								<form class="layout-search__form" role="search" method="get" id="searchpageform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
									<label class="utility__screen-reader-only" for="s"><?php _e( 'Search for:', 'wcmc' ); ?></label>

									<input type="text" value="" name="s" id="s" class="layout-search__input" placeholder="<?php _e( 'Search here', 'wcmc'); ?>" />

									<input class="layout-search__button" type="submit"></input>
								</form>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</div>

<?php
get_footer();
