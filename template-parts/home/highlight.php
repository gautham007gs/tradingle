<?php
/**
 * Highlight gradient block.
 *
 * @package Tradingle
 */

$highlight = tradingle_category_query( 'analysis', 1 );
if ( ! $highlight->have_posts() ) {
	$highlight = new WP_Query(
		array(
			'posts_per_page' => 1,
			'offset'         => 2,
		)
	);
}

if ( ! $highlight->have_posts() ) {
	return;
}
?>
<section class="home-section section-highlight">
	<div class="container">
		<?php while ( $highlight->have_posts() ) : $highlight->the_post(); ?>
			<article class="card card--featured-highlight">
				<div class="card__content">
					<span class="badge badge--accent"><?php echo esc_html( get_the_category()[0]->name ?? __( 'Analysis', 'tradingle' ) ); ?></span>
					<h2 class="heading-lg"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 24 ) ); ?></p>
					<a class="button button-primary" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read Full Analysis', 'tradingle' ); ?></a>
				</div>
				<div class="card__media">
					<a href="<?php the_permalink(); ?>" aria-label="<?php the_title_attribute(); ?>">
						<?php the_post_thumbnail( 'tradingle-featured-module', array( 'loading' => 'lazy' ) ); ?>
					</a>
				</div>
			</article>
		<?php endwhile; wp_reset_postdata(); ?>
	</div>
</section>
