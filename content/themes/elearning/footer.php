<?php
/**
 * The template for displaying the footer
 */
?>
					<?php if ( is_active_sidebar( 'after-content' ) ) { ?>
						<div class="widgets">
							<div class="widgets__body">
								<div class="widgets__items">
									<?php dynamic_sidebar( 'after-content' ); ?>
								</div>
							</div>
						</div>
					<?php }?>
				</main>

				<!-- Footer  -->
				<footer class="layout__footer">
					<div class="footer">
						<div class="footer__inner">
							<div class="footer__header">
								<?php if ( is_active_sidebar( 'footer' ) ) { ?>
									<div class="footer-widgets">
										<div class="footer-widgets__items">
											<?php dynamic_sidebar( 'footer' ); ?>
										</div>
									</div>
								<?php }?>
							</div>
							<div class="footer__body">
								<ul class="footer__items">
									<li class="footer__item">
										<?php get_template_part( 'template-parts/global/logo' ); ?>
										<?php get_template_part( 'template-parts/social/icon-links' ); ?>
									</li>
									<li class="footer__item">
										<!-- Footer Navigation -->
										<?php if ( has_nav_menu( 'footer' ) ) : ?>
											<?php get_template_part( 'template-parts/navigation/navigation', 'footer' ); ?>
										<?php endif; ?>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</footer>
			</div>

		<?php wp_footer(); ?>
	</body>
</html>
