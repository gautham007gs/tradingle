<?php
/**
 * Footer template.
 *
 * @package Tradingle
 */

$footer_logo_id = absint( get_theme_mod( 'tradingle_footer_logo', 0 ) );
$footer_about   = get_theme_mod( 'tradingle_footer_about', __( 'Independent business journalism and market intelligence for modern investors.', 'tradingle' ) );

$social_links = array(
	'x'         => get_theme_mod( 'tradingle_footer_x_url', '' ),
	'linkedin'  => get_theme_mod( 'tradingle_footer_linkedin_url', '' ),
	'youtube'   => get_theme_mod( 'tradingle_footer_youtube_url', '' ),
	'instagram' => get_theme_mod( 'tradingle_footer_instagram_url', '' ),
);
?>
</main>
<footer class="site-footer" itemscope itemtype="https://schema.org/WPFooter">
	<div class="wrapper footer-cta" aria-label="<?php esc_attr_e( 'Footer actions', 'tradingle' ); ?>">
		<div class="footer-cta__inner">
			<div class="footer-cta__copy">
				<span class="footer-cta__kicker"><?php esc_html_e( 'Daily Briefing', 'tradingle' ); ?></span>
				<h2 class="footer-cta__title"><?php echo esc_html( get_theme_mod( 'tradingle_newsletter_title', __( 'Get Institutional-Grade Market Insights', 'tradingle' ) ) ); ?></h2>
				<p class="footer-cta__text"><?php echo esc_html( get_theme_mod( 'tradingle_newsletter_subtitle', __( 'Join investors and analysts receiving our daily market briefing.', 'tradingle' ) ) ); ?></p>
			</div>
			<div class="footer-cta__actions">
				<a class="button button-primary" href="<?php echo esc_url( home_url( '/#newsletter-signup' ) ); ?>"><?php echo esc_html( get_theme_mod( 'tradingle_newsletter_button', __( 'Subscribe', 'tradingle' ) ) ); ?></a>
				<a class="button" href="<?php echo esc_url( home_url( '/feed/' ) ); ?>"><?php esc_html_e( 'RSS', 'tradingle' ); ?></a>
			</div>
		</div>
	</div>
	<div class="wrapper footer-top">
		<div class="footer-brand-row">
			<div class="footer-brand">
				<span class="footer-brand__logo" aria-hidden="true">
					<?php if ( $footer_logo_id ) : ?>
						<?php echo wp_get_attachment_image( $footer_logo_id, 'medium', false, array( 'class' => 'footer-brand__logo-img', 'loading' => 'lazy' ) ); ?>
					<?php elseif ( has_custom_logo() ) : ?>
						<?php the_custom_logo(); ?>
					<?php else : ?>
						<span class="footer-brand__logo-fallback">T</span>
					<?php endif; ?>
				</span>
				<div>
					<a class="footer-brand__name" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
					<p class="footer-brand__about"><?php echo esc_html( $footer_about ); ?></p>
				</div>
			</div>
			<div class="footer-social" aria-label="<?php esc_attr_e( 'Footer social links', 'tradingle' ); ?>">
				<?php foreach ( $social_links as $label => $url ) : ?>
					<?php if ( ! empty( $url ) ) : ?>
						<a href="<?php echo esc_url( $url ); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html( ucfirst( $label ) ); ?></a>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>
		</div>

		<div class="footer-grid" aria-label="<?php esc_attr_e( 'Footer navigation', 'tradingle' ); ?>">
			<div>
				<h3><?php esc_html_e( 'Company', 'tradingle' ); ?></h3>
				<?php dynamic_sidebar( 'footer-col-1' ); ?>
			</div>
			<div>
				<h3><?php esc_html_e( 'Editorial', 'tradingle' ); ?></h3>
				<?php dynamic_sidebar( 'footer-col-2' ); ?>
			</div>
			<div>
				<h3><?php esc_html_e( 'Markets', 'tradingle' ); ?></h3>
				<?php dynamic_sidebar( 'footer-col-3' ); ?>
			</div>
			<div>
				<h3><?php esc_html_e( 'Resources', 'tradingle' ); ?></h3>
				<?php dynamic_sidebar( 'footer-col-4' ); ?>
			</div>
			<div class="footer-topics">
				<h3><?php esc_html_e( 'Topics', 'tradingle' ); ?></h3>
				<ul class="footer-links">
					<?php
					$top_categories = get_categories(
						array(
							'orderby'    => 'count',
							'order'      => 'DESC',
							'hide_empty' => true,
							'number'     => 8,
						)
					);
					foreach ( $top_categories as $cat ) :
						?>
						<li><a href="<?php echo esc_url( get_category_link( $cat->term_id ) ); ?>"><?php echo esc_html( $cat->name ); ?></a></li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
	</div>

	<div class="wrapper footer-bottom">
		<p>© <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php echo esc_html( get_theme_mod( 'tradingle_footer_copyright', __( 'Tradingle. All rights reserved.', 'tradingle' ) ) ); ?></p>
		<nav class="footer-legal" aria-label="<?php esc_attr_e( 'Legal links', 'tradingle' ); ?>">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'footer',
					'container'      => false,
					'fallback_cb'    => 'tradingle_footer_menu_fallback',
				)
			);
			?>
		</nav>
	</div>
</footer>
<button class="back-to-top" type="button" aria-label="<?php esc_attr_e( 'Back to top', 'tradingle' ); ?>">↑</button>
<?php wp_footer(); ?>
</body>
</html>
