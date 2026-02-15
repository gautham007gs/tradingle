<?php
/**
 * List card.
 *
 * @package Tradingle
 */
?>
<article <?php post_class( 'list-card card card--compact' ); ?>>
	<div class="card-body">
		<span class="category-pill"><?php echo esc_html( get_the_category()[0]->name ?? '' ); ?></span>
		<h3 class="heading-sm"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<p class="meta"><?php echo esc_html( get_the_date() ); ?></p>
	</div>
</article>
