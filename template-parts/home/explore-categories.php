<?php
/**
 * Explore categories cards.
 *
 * @package Tradingle
 */

$explore_slugs = array( 'markets', 'stocks', 'crypto', 'macro-economy', 'analysis', 'personal-finance' );
?>
<section class="home-section section-explore-categories">
	<div class="container">
		<div class="section-head">
			<h2 class="heading-md"><?php esc_html_e( 'Explore by Category', 'tradingle' ); ?></h2>
		</div>
		<div class="explore-grid">
			<?php foreach ( $explore_slugs as $slug ) : ?>
				<?php
				$category = get_category_by_slug( $slug );
				if ( ! $category ) {
					continue;
				}
				?>
				<a class="explore-card" href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>">
					<span class="explore-card__icon" aria-hidden="true">•</span>
					<h3><?php echo esc_html( $category->name ); ?></h3>
					<p><?php echo esc_html( wp_trim_words( $category->description ?: __( 'Fresh coverage and market-moving stories.', 'tradingle' ), 12 ) ); ?></p>
				</a>
			<?php endforeach; ?>
		</div>
	</div>
</section>
