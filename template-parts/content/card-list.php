<?php
/**
 * List card.
 *
 * @package Tradingle
 */
?>
<article <?php post_class( 'list-card' ); ?>>
	<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
	<p class="meta"><?php echo esc_html( get_the_date() ); ?></p>
</article>
