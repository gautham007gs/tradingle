<?php
/**
 * Post collections block (trending, recent, popular).
 *
 * @package Tradingle
 */

$trending = tradingle_category_query( 'markets', 3 );
$recent   = new WP_Query(
	array(
		'posts_per_page'      => 3,
		'ignore_sticky_posts' => true,
	)
);
$popular  = new WP_Query(
	array(
		'posts_per_page'      => 3,
		'orderby'             => 'comment_count',
		'ignore_sticky_posts' => true,
	)
);
?>
<section class="module-wrap post-collections" aria-label="<?php esc_attr_e( 'Post Collections', 'tradingle' ); ?>">
	<div class="post-collections__grid">
		<div class="post-collection">
			<h3 class="heading-sm"><?php esc_html_e( 'Trending', 'tradingle' ); ?></h3>
			<?php if ( $trending->have_posts() ) : ?>
				<ul>
					<?php while ( $trending->have_posts() ) : $trending->the_post(); ?>
						<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
					<?php endwhile; wp_reset_postdata(); ?>
				</ul>
			<?php endif; ?>
		</div>
		<div class="post-collection">
			<h3 class="heading-sm"><?php esc_html_e( 'Recent', 'tradingle' ); ?></h3>
			<?php if ( $recent->have_posts() ) : ?>
				<ul>
					<?php while ( $recent->have_posts() ) : $recent->the_post(); ?>
						<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
					<?php endwhile; wp_reset_postdata(); ?>
				</ul>
			<?php endif; ?>
		</div>
		<div class="post-collection">
			<h3 class="heading-sm"><?php esc_html_e( 'Popular', 'tradingle' ); ?></h3>
			<?php if ( $popular->have_posts() ) : ?>
				<ul>
					<?php while ( $popular->have_posts() ) : $popular->the_post(); ?>
						<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
					<?php endwhile; wp_reset_postdata(); ?>
				</ul>
			<?php endif; ?>
		</div>
	</div>
</section>
