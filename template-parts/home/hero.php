<?php
/**
 * Homepage hero section.
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

$side_posts = tradingle_category_query( 'editors-picks', 4 );
if ( ! $side_posts->have_posts() ) {
	$side_posts = new WP_Query(
		array(
			'posts_per_page' => 4,
			'offset'         => 1,
		)
	);
}
?>
<section class="home-section section-hero">
	<div class="container hero-layout">
		<div class="hero-layout__featured">
			<?php if ( $featured->have_posts() ) : $featured->the_post(); ?>
				<?php get_template_part( 'template-parts/content/card', 'hero' ); ?>
			<?php endif; wp_reset_postdata(); ?>
		</div>
		<div class="hero-layout__stack">
			<div class="section-head section-head--compact">
				<h2 class="heading-sm"><?php esc_html_e( 'Editorial Picks', 'tradingle' ); ?></h2>
			</div>
			<?php while ( $side_posts->have_posts() ) : $side_posts->the_post(); ?>
				<?php get_template_part( 'template-parts/content/card', 'mini' ); ?>
			<?php endwhile; wp_reset_postdata(); ?>
		</div>
	</div>
</section>
