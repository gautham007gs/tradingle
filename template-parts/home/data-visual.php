<?php
/**
 * Data visual module.
 *
 * @package Tradingle
 */
?>
<section class="module-wrap">
	<div class="module-head">
		<h2 class="module-title"><?php esc_html_e( 'Data Visuals', 'tradingle' ); ?></h2>
	</div>
	<?php if ( is_active_sidebar( 'home-data-visual' ) ) : ?>
		<?php dynamic_sidebar( 'home-data-visual' ); ?>
	<?php else : ?>
		<div class="cards-grid cards-grid-4 placeholder-grid">
			<article class="placeholder-card"><h3><?php esc_html_e( 'Chart Placeholder', 'tradingle' ); ?></h3></article>
			<article class="placeholder-card"><h3><?php esc_html_e( 'Infographic Placeholder', 'tradingle' ); ?></h3></article>
			<article class="placeholder-card"><h3><?php esc_html_e( 'Report Placeholder', 'tradingle' ); ?></h3></article>
			<article class="placeholder-card"><h3><?php esc_html_e( 'Snapshot Placeholder', 'tradingle' ); ?></h3></article>
		</div>
	<?php endif; ?>
	<?php if ( is_active_sidebar( 'home-sponsored' ) ) : ?>
		<div class="ad-wrap"><?php dynamic_sidebar( 'home-sponsored' ); ?></div>
	<?php endif; ?>
</section>
