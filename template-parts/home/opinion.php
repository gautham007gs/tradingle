<?php
/**
 * Opinion carousel section.
 *
 * @package Tradingle
 */

$opinion = tradingle_category_query( 'opinion', 8 );
if ( ! $opinion->have_posts() ) {
	return;
}
?>
<section class="module-wrap">
	<div class="module-head">
		<h2 class="module-title"><?php esc_html_e( 'Opinion', 'tradingle' ); ?></h2>
	</div>
	<div class="opinion-carousel">
		<?php while ( $opinion->have_posts() ) : $opinion->the_post(); ?>
			<article class="opinion-card">
				<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<div class="opinion-author">
					<?php echo get_avatar( get_the_author_meta( 'ID' ), 48 ); ?>
					<div>
						<strong><?php the_author(); ?></strong>
						<p class="meta"><?php echo esc_html( get_the_date() ); ?></p>
					</div>
				</div>
			</article>
		<?php endwhile; wp_reset_postdata(); ?>
	</div>
</section>
