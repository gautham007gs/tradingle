<?php
/**
 * Hero card.
 *
 * @package Tradingle
 */
?>
<article <?php post_class( 'hero-card' ); ?>>
	<a href="<?php the_permalink(); ?>" class="media-link" aria-label="<?php the_title_attribute(); ?>">
		<?php the_post_thumbnail( 'tradingle-hero', array( 'loading' => 'lazy' ) ); ?>
	</a>
	<div class="card-overlay">
		<span class="category-pill"><?php echo esc_html( get_the_category()[0]->name ?? '' ); ?></span>
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<p class="meta"><?php echo esc_html( get_the_date() ); ?></p>
	</div>
</article>
