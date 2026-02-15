<?php
/**
 * Research module.
 *
 * @package Tradingle
 */

$research = tradingle_category_query( 'research', 2 );
if ( ! $research->have_posts() ) {
	return;
}
?>
<section class="module-wrap research-block">
	<div class="module-head">
		<h2 class="module-title"><?php esc_html_e( 'Institutional Research', 'tradingle' ); ?></h2>
	</div>
	<div class="cards-grid cards-grid-2">
		<?php while ( $research->have_posts() ) : $research->the_post(); ?>
			<?php get_template_part( 'template-parts/content/card', 'standard' ); ?>
		<?php endwhile; wp_reset_postdata(); ?>
	</div>
</section>
