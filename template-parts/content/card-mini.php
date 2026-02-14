<?php
/**
 * Mini hero list card.
 *
 * @package Tradingle
 */
?>
<article <?php post_class( 'mini-list-card' ); ?>>
	<a href="<?php the_permalink(); ?>" class="mini-thumb" aria-label="<?php the_title_attribute(); ?>">
		<?php the_post_thumbnail( 'tradingle-thumb', array( 'loading' => 'lazy' ) ); ?>
	</a>
	<div class="mini-content">
		<span class="category-pill"><?php echo esc_html( get_the_category()[0]->name ?? '' ); ?></span>
		<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<p class="meta"><?php echo esc_html( get_the_date() ); ?></p>
	</div>
</article>
