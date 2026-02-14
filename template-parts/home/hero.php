<?php
/**
 * Hero module.
 *
 * @package Tradingle
 */

$featured   = tradingle_category_query( 'featured', 1 );
$highlights = new WP_Query(
	array(
		'posts_per_page' => 4,
		'offset'         => 1,
	)
);
?>
<section class="module-wrap hero-module">
	<div class="hero-grid">
		<div>
			<?php if ( $featured->have_posts() ) : $featured->the_post(); ?>
				<?php get_template_part( 'template-parts/content/card', 'hero' ); ?>
			<?php endif; wp_reset_postdata(); ?>
		</div>
		<div class="hero-side-list">
			<?php while ( $highlights->have_posts() ) : $highlights->the_post(); ?>
				<?php get_template_part( 'template-parts/content/card', 'mini' ); ?>
			<?php endwhile; wp_reset_postdata(); ?>
		</div>
	</div>
</section>
