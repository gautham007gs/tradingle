<?php
/**
 * Newsletter section.
 *
 * @package Tradingle
 */

$status = isset( $_GET['newsletter'] ) ? sanitize_key( wp_unslash( $_GET['newsletter'] ) ) : '';
?>
<section id="newsletter-signup" class="home-section section-cta-newsletter">
	<div class="container">
		<div class="newsletter-wrap">
			<h2 class="heading-lg"><?php echo esc_html( get_theme_mod( 'tradingle_newsletter_title', __( 'Get Institutional-Grade Market Insights', 'tradingle' ) ) ); ?></h2>
			<p><?php echo esc_html( get_theme_mod( 'tradingle_newsletter_subtitle', __( 'Join investors and analysts receiving our daily market briefing.', 'tradingle' ) ) ); ?></p>
			<?php if ( 'success' === $status ) : ?>
				<p class="newsletter-status newsletter-status--success"><?php esc_html_e( 'Thanks for subscribing. We received your request.', 'tradingle' ); ?></p>
			<?php elseif ( 'error' === $status ) : ?>
				<p class="newsletter-status newsletter-status--error"><?php esc_html_e( 'Please enter a valid email and try again.', 'tradingle' ); ?></p>
			<?php endif; ?>
			<form class="newsletter-form" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post">
				<label for="tradingle-email" class="screen-reader-text"><?php esc_html_e( 'Email address', 'tradingle' ); ?></label>
				<input id="tradingle-email" name="email" type="email" required placeholder="<?php esc_attr_e( 'Enter your email', 'tradingle' ); ?>">
				<input type="hidden" name="action" value="tradingle_newsletter_subscribe">
				<?php wp_nonce_field( 'tradingle_newsletter_subscribe', 'tradingle_newsletter_nonce' ); ?>
				<button type="submit" class="button button-primary"><?php echo esc_html( get_theme_mod( 'tradingle_newsletter_button', __( 'Subscribe', 'tradingle' ) ) ); ?></button>
			</form>
			<span class="meta"><?php esc_html_e( 'No spam. Unsubscribe anytime.', 'tradingle' ); ?></span>
		</div>
	</div>
</section>
