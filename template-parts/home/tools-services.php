<?php
/**
 * Tools and services cards.
 *
 * @package Tradingle
 */

$tools = tradingle_category_query( 'tools', 3 );
if ( ! $tools->have_posts() ) {
	$tools = tradingle_category_query( 'research', 3 );
}

if ( ! $tools->have_posts() ) {
	return;
}
?>
<section class="home-section section-tools">
	<div class="container">
		<div class="section-head">
			<h2 class="heading-md"><?php esc_html_e( 'Tools & Services', 'tradingle' ); ?></h2>
		</div>
		<div class="tools-grid">
			<?php while ( $tools->have_posts() ) : $tools->the_post(); ?>
				<article class="tool-card">
					<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 18 ) ); ?></p>
				</article>
			<?php endwhile; wp_reset_postdata(); ?>
		</div>
	</div>
</section>
