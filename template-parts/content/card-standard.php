<?php
/**
 * Standard card.
 *
 * @package Tradingle
 */
?>
<article <?php post_class( 'news-card card' ); ?>>
	<a href="<?php the_permalink(); ?>" class="media-link" aria-label="<?php the_title_attribute(); ?>">
		<?php the_post_thumbnail( 'tradingle-card', array( 'loading' => 'lazy' ) ); ?>
	</a>
	<div class="card-body">
		<span class="category-pill"><?php echo esc_html( get_the_category()[0]->name ?? '' ); ?></span>
		<h3 class="heading-sm"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 18 ) ); ?></p>
		<p class="meta"><?php the_author(); ?> · <?php echo esc_html( get_the_date( 'M j, Y' ) ); ?></p>
	</div>
</article>
