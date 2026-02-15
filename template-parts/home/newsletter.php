<?php
/**
 * Newsletter section.
 *
 * @package Tradingle
 */
?>
<section id="newsletter-signup" class="module-wrap newsletter-wrap newsletter-wrap--premium">
	<div class="newsletter-wrap__content">
		<p class="newsletter-eyebrow"><?php esc_html_e( 'Daily Intelligence Brief', 'tradingle' ); ?></p>
		<h2 class="module-title"><?php echo esc_html( get_theme_mod( 'tradingle_newsletter_title', __( 'Get Institutional-Grade Market Insights', 'tradingle' ) ) ); ?></h2>
		<p class="text-small"><?php echo esc_html( get_theme_mod( 'tradingle_newsletter_subtitle', __( 'Stay ahead with daily financial intelligence.', 'tradingle' ) ) ); ?></p>
	</div>
	<form class="newsletter-form" action="#" method="post">
		<label for="tradingle-email" class="screen-reader-text"><?php esc_html_e( 'Email address', 'tradingle' ); ?></label>
		<input id="tradingle-email" name="email" type="email" required placeholder="<?php esc_attr_e( 'Enter your work email', 'tradingle' ); ?>">
		<button type="submit" class="button-primary"><?php echo esc_html( get_theme_mod( 'tradingle_newsletter_button', __( 'Subscribe', 'tradingle' ) ) ); ?></button>
	</form>
	<p class="newsletter-trust text-meta"><?php esc_html_e( 'No spam. Unsubscribe anytime. Trusted by traders and analysts.', 'tradingle' ); ?></p>
</section>
