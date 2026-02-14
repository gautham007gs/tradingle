<?php
/**
 * Standard card.
 *
 * @package Tradingle
 */
?>
<article <?php post_class( 'news-card' ); ?>>
	<a href="<?php the_permalink(); ?>" class="media-link" aria-label="<?php the_title_attribute(); ?>">
		<?php the_post_thumbnail( 'tradingle-card', array( 'loading' => 'lazy' ) ); ?>
	</a>
	<div class="card-body">
		<span class="category-pill"><?php echo esc_html( get_the_category()[0]->name ?? '' ); ?></span>
		<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<p class="meta"><?php the_author_posts_link(); ?> · <?php echo esc_html( get_the_date() ); ?></p>
		<?php the_excerpt(); ?>
	</div>
</article>
