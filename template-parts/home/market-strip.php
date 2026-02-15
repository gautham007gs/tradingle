<?php
/**
 * Market strip.
 *
 * @package Tradingle
 */

$market_posts = new WP_Query(
	array(
		'posts_per_page' => 6,
		'category_name'  => 'markets',
	)
);

if ( ! is_active_sidebar( 'market-strip' ) && ! $market_posts->have_posts() ) {
	return;
}
?>
<section class="home-section section-market-overview" aria-label="<?php esc_attr_e( 'Market Overview', 'tradingle' ); ?>">
	<div class="container">
		<?php if ( is_active_sidebar( 'market-strip' ) ) : ?>
			<div class="metric-grid metric-grid--widget"><?php dynamic_sidebar( 'market-strip' ); ?></div>
		<?php else : ?>
			<div class="metric-grid">
				<?php while ( $market_posts->have_posts() ) : $market_posts->the_post(); ?>
					<article class="card card--metric">
						<span class="label"><?php echo esc_html( get_the_category()[0]->name ?? __( 'Markets', 'tradingle' ) ); ?></span>
						<strong><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></strong>
						<span class="up"><?php echo esc_html( get_the_date( 'M j' ) ); ?></span>
					</article>
				<?php endwhile; wp_reset_postdata(); ?>
			</div>
		<?php endif; ?>
	</div>
</section>
