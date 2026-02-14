<?php
/**
 * Featured module card.
 *
 * @package Tradingle
 */
?>
<article <?php post_class( 'news-card' ); ?>>
	<a href="<?php the_permalink(); ?>" class="media-link" aria-label="<?php the_title_attribute(); ?>">
		<?php the_post_thumbnail( 'tradingle-featured-module', array( 'loading' => 'lazy' ) ); ?>
	</a>
	<div class="card-body">
		<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<p class="meta"><?php echo esc_html( get_the_date() ); ?></p>
		<?php the_excerpt(); ?>
	</div>
</article>
