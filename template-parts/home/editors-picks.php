<?php
/**
 * Editors picks row.
 *
 * @package Tradingle
 */

$picks = tradingle_category_query( 'editors-picks', 5 );
if ( ! $picks->have_posts() ) {
	$picks = tradingle_category_query( 'opinion', 5 );
}
if ( ! $picks->have_posts() ) {
	return;
}
?>
<section class="home-section section-editors-row">
	<div class="container">
		<div class="section-head">
			<h2 class="heading-md"><?php esc_html_e( 'Editor’s Picks', 'tradingle' ); ?></h2>
		</div>
		<div class="editors-scroll">
			<?php while ( $picks->have_posts() ) : $picks->the_post(); ?>
				<article class="card card--compact editors-card">
					<span class="category-pill category-pill--default"><?php echo esc_html( get_the_category()[0]->name ?? '' ); ?></span>
					<h3 class="heading-sm"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<p class="meta"><?php echo esc_html( get_the_date() ); ?></p>
				</article>
			<?php endwhile; wp_reset_postdata(); ?>
		</div>
	</div>
</section>
