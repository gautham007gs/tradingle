<?php
/**
 * Featured module card.
 *
 * @package Tradingle
 */

$primary_category = get_the_category();
$primary_slug     = ! empty( $primary_category[0] ) ? sanitize_html_class( $primary_category[0]->slug ) : 'default';
$primary_name     = ! empty( $primary_category[0] ) ? $primary_category[0]->name : '';
?>
<article <?php post_class( 'news-card card card--featured' ); ?>>
	<a href="<?php the_permalink(); ?>" class="media-link" aria-label="<?php the_title_attribute(); ?>">
		<?php the_post_thumbnail( 'tradingle-featured-module', array( 'loading' => 'lazy' ) ); ?>
	</a>
	<div class="card-body">
		<span class="category-pill category-pill--<?php echo esc_attr( $primary_slug ); ?>"><?php echo esc_html( $primary_name ); ?></span>
		<h3 class="heading-md"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 20 ) ); ?></p>
		<p class="meta"><?php echo esc_html( get_the_date() ); ?></p>
	</div>
</article>
