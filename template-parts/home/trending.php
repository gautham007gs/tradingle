<?php
/**
 * Trending stories block.
 *
 * @package Tradingle
 */

$trending = new WP_Query(
	array(
		'posts_per_page'      => 4,
		'orderby'             => 'comment_count',
		'ignore_sticky_posts' => true,
	)
);

if ( ! $trending->have_posts() ) {
	return;
}
?>
<section class="home-section section-trending-stories">
	<div class="container">
		<div class="section-head">
			<h2 class="heading-md"><?php esc_html_e( 'Trending Now', 'tradingle' ); ?></h2>
		</div>
		<div class="cards-grid cards-grid-4">
			<?php while ( $trending->have_posts() ) : $trending->the_post(); ?>
				<?php get_template_part( 'template-parts/content/card', 'standard' ); ?>
			<?php endwhile; wp_reset_postdata(); ?>
		</div>
	</div>
</section>
