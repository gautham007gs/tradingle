<?php
/**
 * Footer template.
 *
 * @package Tradingle
 */
?>
</main>
<footer class="site-footer" itemscope itemtype="https://schema.org/WPFooter">
	<div class="wrapper footer-grid">
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
	</div>
	<div class="wrapper footer-bottom">
		<p>© <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php echo esc_html( get_theme_mod( 'tradingle_footer_copyright', __( 'Tradingle. All rights reserved.', 'tradingle' ) ) ); ?></p>
		<?php
		wp_nav_menu(
			array(
				'theme_location' => 'footer',
				'container'      => false,
			)
		);
		?>
	</div>
</footer>
<button class="back-to-top" type="button" aria-label="<?php esc_attr_e( 'Back to top', 'tradingle' ); ?>">↑</button>
<?php wp_footer(); ?>
</body>
</html>
