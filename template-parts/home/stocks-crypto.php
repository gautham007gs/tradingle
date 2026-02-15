<?php
/**
 * Stocks and crypto homepage modules.
 *
 * @package Tradingle
 */

$layout_style = get_theme_mod( 'tradingle_home_category_layout_style', 'two-boxes' );
$modules      = array( 'stocks', 'crypto' );
?>
<section class="home-categories home-categories--<?php echo esc_attr( $layout_style ); ?>">
	<?php foreach ( $modules as $module_slug ) : ?>
		<?php
		$category = get_category_by_slug( $module_slug );
		if ( ! $category ) {
			continue;
		}
		$lead = tradingle_category_query( $module_slug, 1 );
		$list = tradingle_category_query( $module_slug, 3, 1 );
		?>
		<section class="module-wrap module-board module-board--category">
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

		<?php if ( 'stocks' === $module_slug && is_active_sidebar( 'home-category-insert' ) ) : ?>
			<section class="module-wrap module-board module-board--insert" aria-label="<?php esc_attr_e( 'Homepage Category Insert', 'tradingle' ); ?>">
				<?php dynamic_sidebar( 'home-category-insert' ); ?>
			</section>
		<?php endif; ?>
	<?php endforeach; ?>
</section>
