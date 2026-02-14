<?php
/**
 * Newsletter section.
 *
 * @package Tradingle
 */
?>
<section id="newsletter-signup" class="module-wrap newsletter-wrap">
	<h2 class="module-title"><?php esc_html_e( 'Get Institutional-Grade Market Insights', 'tradingle' ); ?></h2>
	<form class="newsletter-form" action="#" method="post">
		<label for="tradingle-email" class="screen-reader-text"><?php esc_html_e( 'Email address', 'tradingle' ); ?></label>
		<input id="tradingle-email" name="email" type="email" required placeholder="<?php esc_attr_e( 'Enter your email', 'tradingle' ); ?>">
		<button type="submit"><?php esc_html_e( 'Subscribe', 'tradingle' ); ?></button>
	</form>
</section>
