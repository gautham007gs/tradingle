<?php
/**
 * Hero card.
 *
 * @package Tradingle
 */

$primary_category = get_the_category();
$primary_slug     = ! empty( $primary_category[0] ) ? sanitize_html_class( $primary_category[0]->slug ) : 'default';
$primary_name     = ! empty( $primary_category[0] ) ? $primary_category[0]->name : '';
?>
<article <?php post_class( 'hero-card card card--featured' ); ?>>
	<a href="<?php the_permalink(); ?>" class="media-link" aria-label="<?php the_title_attribute(); ?>">
		<?php the_post_thumbnail( 'tradingle-hero', array( 'loading' => 'eager' ) ); ?>
	</a>
	<div class="card-overlay">
		<span class="category-pill category-pill--<?php echo esc_attr( $primary_slug ); ?>"><?php echo esc_html( $primary_name ); ?></span>
		<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
		<p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 20 ) ); ?></p>
	</div>
</article>
