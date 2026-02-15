<?php
/**
 * Breaking news bar fallback.
 *
 * @package Tradingle
 */

$breaking = new WP_Query(
	array(
		'posts_per_page' => 8,
	)
);

if ( ! is_active_sidebar( 'header-breaking' ) && $breaking->have_posts() ) :
	?>
	<section class="module-wrap ticker-inline ticker-inline--urgent" aria-label="<?php esc_attr_e( 'Breaking News', 'tradingle' ); ?>">
		<p class="ticker-label"><?php esc_html_e( 'Breaking', 'tradingle' ); ?></p>
		<div class="ticker-window">
			<div class="ticker-track">
				<?php while ( $breaking->have_posts() ) : $breaking->the_post(); ?>
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				<?php endwhile; ?>
				<?php $breaking->rewind_posts(); ?>
				<?php while ( $breaking->have_posts() ) : $breaking->the_post(); ?>
					<a href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1"><?php the_title(); ?></a>
				<?php endwhile; ?>
			</div>
		</div>
	</section>
	<?php
endif;
wp_reset_postdata();
