<?php
/**
 * Newsletter section.
 *
 * @package Tradingle
 */
?>
<section id="newsletter-signup" class="module-wrap newsletter-wrap">
	<h2 class="module-title"><?php echo esc_html( get_theme_mod( 'tradingle_newsletter_title', __( 'Get Institutional-Grade Market Insights', 'tradingle' ) ) ); ?></h2>
	<p class="text-small"><?php echo esc_html( get_theme_mod( 'tradingle_newsletter_subtitle', __( 'Stay ahead with daily financial intelligence.', 'tradingle' ) ) ); ?></p>
	<form class="newsletter-form" action="#" method="post">
		<label for="tradingle-email" class="screen-reader-text"><?php esc_html_e( 'Email address', 'tradingle' ); ?></label>
		<input id="tradingle-email" name="email" type="email" required placeholder="<?php esc_attr_e( 'Enter your email', 'tradingle' ); ?>">
		<button type="submit"><?php echo esc_html( get_theme_mod( 'tradingle_newsletter_button', __( 'Subscribe', 'tradingle' ) ) ); ?></button>
	</form>
</section>
