<?php
/**
 * Podcast style media cards.
 *
 * @package Tradingle
 */

$podcast = tradingle_category_query( 'podcast', 3 );
if ( ! $podcast->have_posts() ) {
	$podcast = new WP_Query(
		array(
			'posts_per_page' => 3,
			'category_name'  => 'opinion',
		)
	);
}

if ( ! $podcast->have_posts() ) {
	return;
}
?>
<section class="home-section section-podcast">
	<div class="container">
		<div class="section-head">
			<h2 class="heading-md"><?php esc_html_e( 'Podcast & Media', 'tradingle' ); ?></h2>
		</div>
		<div class="podcast-grid">
			<?php while ( $podcast->have_posts() ) : $podcast->the_post(); ?>
				<article class="card card--podcast">
					<a class="card__media" href="<?php the_permalink(); ?>" aria-label="<?php the_title_attribute(); ?>">
						<?php the_post_thumbnail( 'tradingle-card', array( 'loading' => 'lazy' ) ); ?>
						<span class="play-pill" aria-hidden="true">▶</span>
					</a>
					<div class="card__content">
						<h3 class="heading-sm"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					</div>
				</article>
			<?php endwhile; wp_reset_postdata(); ?>
		</div>
	</div>
</section>
