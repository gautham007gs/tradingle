<?php
/**
 * Modular editorial categories.
 *
 * @package Tradingle
 */

$modules = array( 'markets', 'equities', 'macro-economy', 'crypto', 'analysis' );
?>
<?php foreach ( $modules as $module_slug ) : ?>
	<?php
	$category = get_category_by_slug( $module_slug );
	if ( ! $category ) {
		continue;
	}
	$lead = tradingle_category_query( $module_slug, 1 );
	$list = tradingle_category_query( $module_slug, 3, 1 );
	?>
	<section class="module-wrap module-board">
		<div class="module-head">
			<h2 class="module-title"><?php echo esc_html( $category->name ); ?></h2>
			<a href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>"><?php esc_html_e( 'View all', 'tradingle' ); ?></a>
		</div>
		<div class="module-grid">
			<div>
				<?php if ( $lead->have_posts() ) : $lead->the_post(); ?>
					<?php get_template_part( 'template-parts/content/card', 'featured' ); ?>
				<?php endif; wp_reset_postdata(); ?>
			</div>
			<div class="stack-list">
				<?php while ( $list->have_posts() ) : $list->the_post(); ?>
					<?php get_template_part( 'template-parts/content/card', 'list' ); ?>
				<?php endwhile; wp_reset_postdata(); ?>
			</div>
		</div>
	</section>
<?php endforeach; ?>
