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
	set_query_var( 'hero-title', get_theme_mod( 'courses_hero_title' ) != ''
		? get_theme_mod( 'courses_hero_title' )
		: get_the_archive_title() );
	set_query_var( 'hero-text', get_theme_mod( 'courses_hero_text' ) );
	$hero_link = get_theme_mod( 'courses_hero_button_link' ) != 0
		? get_page_link( get_theme_mod( 'courses_hero_button_link' ) )
		: '';
	set_query_var( 'hero-link-url', $hero_link );
	set_query_var( 'hero-link-text', get_theme_mod( 'courses_hero_button_text' ) );
	set_query_var( 'hero-background-image', get_theme_mod( 'courses_hero_image') );

	get_template_part( 'template-parts/components/heroes/hero', 'page' );

?>

<div class="layout-container">
	<div class="layout-container__inner">
		<div class="layout-container__body">
			<section class="layout-primary">
				<div class="layout-primary__body layout-primary__body--archive">

					<?php if ( have_posts() ) : ?>

					<div class="listing">
				    <div class="listing__inner">
				      <div class="listing__header">
				        <!-- <p
				          v-if="!isFetching"
				          class="listing__text"
				          v-html="$t('listing.count_text', {
				            posts_length: posts.length,
				            max_posts: maxPosts
				          })"
				        /> -->
				      </div>

				      <div class="listing__body">
				        <div class="listing__content">
									<ul class="listing__items">
										<?php while ( have_posts() ) : the_post();
									/*
									* Include the Post-Format-specific template for the content.
									* If you want to override this in a child theme, then include a file
									* called content-___.php (where ___ is the Post Format name) and that will be used instead.
									*/ ?>
									    <li class="listing__item">
						          <!-- <listing-cards
						            :modal="this.modal"
						            :posts="posts"
						            :post-type="postSingular"
						            @onCardClicked="updateActivePost"
						          /> -->
												<?php get_template_part( 'template-parts/components/cards/card', 'course' ); ?>
											</li>
										<?php endwhile; ?>
									</ul>
				        </div>

				        <div
				          v-else
				          class="listing__content listing__content--empty"
				        >
				          <p
				            v-if="!isFetching"
				            class="listing___empty-message"
				          >
				            {{ $t('common.no_results_found') }}
				          </p>
				        </div>
				      </div>
				    </div>
				  </div>

					<?php pagination_bar(); endif; ?>

				</div>
			</section>
		</div>
	</div>
</div>

<?php get_footer();
