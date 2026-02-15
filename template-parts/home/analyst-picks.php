<?php
/**
 * Analyst picks row.
 *
 * @package Tradingle
 */

$picks = tradingle_category_query( 'research', 4 );
if ( ! $picks->have_posts() ) {
	$picks = new WP_Query(
		array(
			'posts_per_page' => 4,
			'offset'         => 3,
		)
	);
}

if ( ! $picks->have_posts() ) {
	return;
}
?>
<section class="home-section section-analyst-picks">
	<div class="container">
		<div class="section-head">
			<h2 class="heading-md"><?php esc_html_e( 'Analyst Picks', 'tradingle' ); ?></h2>
		</div>
		<div class="analyst-picks-grid">
			<?php while ( $picks->have_posts() ) : $picks->the_post(); ?>
				<article class="card card--compact">
					<span class="badge"><?php echo esc_html( get_the_category()[0]->name ?? '' ); ?></span>
					<h3 class="heading-sm"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<p class="meta"><?php echo esc_html( get_the_date() ); ?></p>
				</article>
			<?php endwhile; wp_reset_postdata(); ?>
		</div>
	</div>
</section>
