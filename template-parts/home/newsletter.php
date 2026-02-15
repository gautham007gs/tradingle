<?php
/**
 * Newsletter section.
 *
 * @package Tradingle
 */
?>
<section id="newsletter-signup" class="home-section section-cta-newsletter">
	<div class="container">
		<div class="newsletter-wrap">
			<h2 class="heading-lg"><?php echo esc_html( get_theme_mod( 'tradingle_newsletter_title', __( 'Get Institutional-Grade Market Insights', 'tradingle' ) ) ); ?></h2>
			<p><?php echo esc_html( get_theme_mod( 'tradingle_newsletter_subtitle', __( 'Join investors and analysts receiving our daily market briefing.', 'tradingle' ) ) ); ?></p>
			<form class="newsletter-form" action="#" method="post">
				<label for="tradingle-email" class="screen-reader-text"><?php esc_html_e( 'Email address', 'tradingle' ); ?></label>
				<input id="tradingle-email" name="email" type="email" required placeholder="<?php esc_attr_e( 'Enter your email', 'tradingle' ); ?>">
				<button type="submit" class="button button-primary"><?php echo esc_html( get_theme_mod( 'tradingle_newsletter_button', __( 'Subscribe', 'tradingle' ) ) ); ?></button>
			</form>
			<span class="meta"><?php esc_html_e( 'No spam. Unsubscribe anytime.', 'tradingle' ); ?></span>
		</div>
	</div>
</section>
