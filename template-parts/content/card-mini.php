<?php
/**
 * Mini hero list card.
 *
 * @package Tradingle
 */

$primary_category = get_the_category();
$primary_slug     = ! empty( $primary_category[0] ) ? sanitize_html_class( $primary_category[0]->slug ) : 'default';
$primary_name     = ! empty( $primary_category[0] ) ? $primary_category[0]->name : '';
?>
<article <?php post_class( 'mini-list-card card--compact' ); ?>>
	<a href="<?php the_permalink(); ?>" class="mini-thumb" aria-label="<?php the_title_attribute(); ?>">
		<?php the_post_thumbnail( 'tradingle-thumb', array( 'loading' => 'lazy' ) ); ?>
	</a>
	<div class="mini-content">
		<span class="category-pill category-pill--<?php echo esc_attr( $primary_slug ); ?>"><?php echo esc_html( $primary_name ); ?></span>
		<h3 class="heading-sm"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<p class="meta"><?php echo esc_html( get_the_date() ); ?></p>
	</div>
</article>
