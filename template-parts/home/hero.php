<?php
/**
 * Hero module.
 *
 * @package Tradingle
 */

$featured = tradingle_category_query( 'featured', 1 );

if ( ! $featured->have_posts() ) {
	$featured = new WP_Query(
		array(
			'posts_per_page' => 1,
		)
	);
}

$editor_picks = tradingle_category_query( 'editors-picks', 3 );
if ( ! $editor_picks->have_posts() ) {
	$editor_picks = new WP_Query(
		array(
			'posts_per_page' => 3,
			'offset'         => 1,
		)
	);
}

$highlights = new WP_Query(
	array(
		'posts_per_page' => 3,
		'offset'         => 1,
	)
);
?>
<section class="module-wrap hero-module hero-premium">
	<div class="hero-premium__intro">
		<p class="hero-premium__kicker"><?php esc_html_e( 'Featured Headline', 'tradingle' ); ?></p>
		<h2 class="module-title"><?php esc_html_e( 'Top Market Story', 'tradingle' ); ?></h2>
	</div>
	<div class="hero-grid">
		<div class="hero-premium__lead">
			<?php if ( $featured->have_posts() ) : $featured->the_post(); ?>
				<?php get_template_part( 'template-parts/content/card', 'hero' ); ?>
			<?php endif; wp_reset_postdata(); ?>
		</div>
		<aside class="hero-premium__side">
			<section class="hero-premium__editors">
				<div class="module-head">
					<h3 class="heading-sm"><?php esc_html_e( 'Editor\'s Pick', 'tradingle' ); ?></h3>
				</div>
				<div class="stack-list">
					<?php while ( $editor_picks->have_posts() ) : $editor_picks->the_post(); ?>
						<?php get_template_part( 'template-parts/content/card', 'list' ); ?>
					<?php endwhile; wp_reset_postdata(); ?>
				</div>
			</section>
			<section class="hero-premium__highlights">
				<div class="module-head">
					<h3 class="heading-sm"><?php esc_html_e( 'In Focus', 'tradingle' ); ?></h3>
				</div>
				<div class="hero-side-list">
					<?php while ( $highlights->have_posts() ) : $highlights->the_post(); ?>
						<?php get_template_part( 'template-parts/content/card', 'mini' ); ?>
					<?php endwhile; wp_reset_postdata(); ?>
				</div>
			</section>
		</aside>
	</div>
</section>
