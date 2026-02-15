<?php
/**
 * Data visual module.
 *
 * @package Tradingle
 */
?>
<section class="module-wrap data-visual-wrap">
	<div class="module-head">
		<h2 class="module-title"><?php esc_html_e( 'Data Visuals', 'tradingle' ); ?></h2>
		<p class="text-meta"><?php esc_html_e( 'Interactive market snapshots and research-ready visuals.', 'tradingle' ); ?></p>
	</div>
	<?php if ( is_active_sidebar( 'home-data-visual' ) ) : ?>
		<?php dynamic_sidebar( 'home-data-visual' ); ?>
	<?php else : ?>
		<div class="cards-grid cards-grid-4 data-visual-grid">
			<article class="data-visual-card">
				<span class="data-visual-card__eyebrow"><?php esc_html_e( 'Macro', 'tradingle' ); ?></span>
				<h3><?php esc_html_e( 'Inflation Heatmap', 'tradingle' ); ?></h3>
				<p><?php esc_html_e( 'Track monthly CPI movement across major economies.', 'tradingle' ); ?></p>
			</article>
			<article class="data-visual-card">
				<span class="data-visual-card__eyebrow"><?php esc_html_e( 'Equities', 'tradingle' ); ?></span>
				<h3><?php esc_html_e( 'Sector Rotation', 'tradingle' ); ?></h3>
				<p><?php esc_html_e( 'Compare leadership shifts by sector and market cap.', 'tradingle' ); ?></p>
			</article>
			<article class="data-visual-card">
				<span class="data-visual-card__eyebrow"><?php esc_html_e( 'Rates', 'tradingle' ); ?></span>
				<h3><?php esc_html_e( 'Yield Curve Tracker', 'tradingle' ); ?></h3>
				<p><?php esc_html_e( 'Monitor spread compression and inversion risk in real time.', 'tradingle' ); ?></p>
			</article>
			<article class="data-visual-card">
				<span class="data-visual-card__eyebrow"><?php esc_html_e( 'Commodities', 'tradingle' ); ?></span>
				<h3><?php esc_html_e( 'Energy Pulse', 'tradingle' ); ?></h3>
				<p><?php esc_html_e( 'Weekly momentum view for oil, gas, and industrial metals.', 'tradingle' ); ?></p>
			</article>
		</div>
	<?php endif; ?>
	<?php if ( is_active_sidebar( 'home-sponsored' ) ) : ?>
		<div class="ad-wrap"><?php dynamic_sidebar( 'home-sponsored' ); ?></div>
	<?php endif; ?>
</section>
