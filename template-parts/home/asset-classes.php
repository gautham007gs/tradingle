<?php
/**
 * Asset class modular rows.
 *
 * @package Tradingle
 */

$sections = array( 'stocks', 'crypto', 'economy' );
?>
<?php foreach ( $sections as $slug ) : ?>
	<?php
	$category = get_category_by_slug( $slug );
	if ( ! $category ) {
		continue;
	}
	$posts = tradingle_category_query( $slug, 4 );
	if ( ! $posts->have_posts() ) {
		continue;
	}
	?>
	<section class="home-section section-asset-class">
		<div class="container">
			<div class="section-head">
				<h2 class="heading-md"><?php echo esc_html( $category->name ); ?></h2>
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
