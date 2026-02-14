<?php
/**
 * Latest grid.
 *
 * @package Tradingle
 */

$latest = new WP_Query(
	array(
		'posts_per_page' => 6,
	)
);
?>
<section class="module-wrap">
	<div class="module-head">
		<h2 class="module-title"><?php esc_html_e( 'Latest News', 'tradingle' ); ?></h2>
	</div>
	<div class="cards-grid cards-grid-3">
		<?php while ( $latest->have_posts() ) : $latest->the_post(); ?>
			<?php get_template_part( 'template-parts/content/card', 'standard' ); ?>
		<?php endwhile; wp_reset_postdata(); ?>
	</div>
</section>
