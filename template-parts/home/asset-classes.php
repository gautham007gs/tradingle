<?php
/**
 * Asset class modular rows.
 *
 * @package Tradingle
 */

$sections = array(
	array(
		'label' => __( 'Stocks', 'tradingle' ),
		'slugs' => array( 'stocks', 'equities' ),
	),
	array(
		'label' => __( 'Crypto', 'tradingle' ),
		'slugs' => array( 'crypto' ),
	),
	array(
		'label' => __( 'Economy', 'tradingle' ),
		'slugs' => array( 'economy', 'macro-economy' ),
	),
);
?>
<?php foreach ( $sections as $section ) : ?>
	<?php
	$category = null;
	foreach ( $section['slugs'] as $slug ) {
		$category = get_category_by_slug( $slug );
		if ( $category ) {
			break;
		}
	}

	if ( ! $category ) {
		continue;
	}

	$posts = new WP_Query(
		array(
			'cat'            => $category->term_id,
			'posts_per_page' => 4,
		)
	);
	if ( ! $posts->have_posts() ) {
		continue;
	}
	?>
	<section class="home-section section-asset-class">
		<div class="container">
			<div class="section-head">
				<h2 class="heading-md"><?php echo esc_html( $section['label'] ); ?></h2>
				<a href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>"><?php esc_html_e( 'View all →', 'tradingle' ); ?></a>
			</div>
			<div class="cards-grid cards-grid-4">
				<?php while ( $posts->have_posts() ) : $posts->the_post(); ?>
					<?php get_template_part( 'template-parts/content/card', 'standard' ); ?>
				<?php endwhile; wp_reset_postdata(); ?>
			</div>
		</div>
	</section>
<?php endforeach; ?>
