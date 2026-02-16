<?php
/**
 * Homepage hero section with featured slider.
 *
 * @package Tradingle
 */

$featured = tradingle_category_query( 'featured', 5 );
if ( ! $featured->have_posts() ) {
	$featured = new WP_Query(
		array(
			'posts_per_page' => 5,
		)
	);
}

$featured_ids = wp_list_pluck( $featured->posts, 'ID' );

$side_posts = tradingle_category_query( 'editors-picks', 4 );
if ( ! $side_posts->have_posts() ) {
	$side_posts = new WP_Query(
		array(
			'posts_per_page' => 4,
			'post__not_in'   => $featured_ids,
		)
	);
}

$side_ids = wp_list_pluck( $side_posts->posts, 'ID' );
tradingle_seen_posts_add( array_merge( $featured_ids, $side_ids ) );
?>
<section class="home-section section-hero">
	<div class="container hero-layout">
		<div class="hero-layout__featured">
			<div class="hero-slider" data-autoplay="2500" aria-live="polite">
				<?php
				$slide_index = 0;
				while ( $featured->have_posts() ) :
					$featured->the_post();
					$hero_category = get_the_category();
					$hero_slug     = ! empty( $hero_category[0] ) ? sanitize_html_class( $hero_category[0]->slug ) : 'default';
					$hero_name     = ! empty( $hero_category[0] ) ? $hero_category[0]->name : '';
					?>
					<article <?php post_class( 'hero-slide hero-card card card--featured' . ( 0 === $slide_index ? ' is-active' : '' ) ); ?> data-slide-index="<?php echo esc_attr( $slide_index ); ?>" aria-hidden="<?php echo 0 === $slide_index ? 'false' : 'true'; ?>">
						<a href="<?php the_permalink(); ?>" class="media-link" aria-label="<?php the_title_attribute(); ?>">
							<?php the_post_thumbnail( 'tradingle-hero', array( 'loading' => 0 === $slide_index ? 'eager' : 'lazy' ) ); ?>
						</a>
						<div class="card-overlay">
							<span class="category-pill category-pill--<?php echo esc_attr( $hero_slug ); ?>"><?php echo esc_html( $hero_name ); ?></span>
							<h2 class="hero-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 24 ) ); ?></p>
							<p class="meta"><?php the_author(); ?> · <?php echo esc_html( get_the_date( 'M j, Y' ) ); ?></p>
						</div>
					</article>
					<?php
					$slide_index++;
				endwhile;
				wp_reset_postdata();
				?>
				<div class="hero-slider__dots" role="tablist" aria-label="<?php esc_attr_e( 'Featured stories', 'tradingle' ); ?>">
					<?php for ( $i = 0; $i < $slide_index; $i++ ) : ?>
						<button type="button" class="hero-slider__dot<?php echo 0 === $i ? ' is-active' : ''; ?>" data-slide-dot="<?php echo esc_attr( $i ); ?>" aria-label="<?php printf( esc_attr__( 'Go to slide %d', 'tradingle' ), $i + 1 ); ?>" aria-selected="<?php echo 0 === $i ? 'true' : 'false'; ?>"></button>
					<?php endfor; ?>
				</div>
			</div>
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
