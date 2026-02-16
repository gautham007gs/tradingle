<?php
/**
 * Newsroom layout: Latest + right-rail.
 *
 * @package Tradingle
 */
?>
<section class="home-section section-newsroom" aria-label="<?php esc_attr_e( 'Top stories and latest updates', 'tradingle' ); ?>">
	<div class="container">
		<div class="newsroom-layout">
			<div class="newsroom-main">
				<?php
				$latest_lead = new WP_Query(
					array(
						'posts_per_page' => 1,
						'ignore_sticky_posts' => true,
						'post__not_in'   => tradingle_seen_posts_get(),
					)
				);
				?>
				<div class="section-head">
					<h2 class="heading-md"><?php esc_html_e( 'Latest', 'tradingle' ); ?></h2>
					<?php
					$posts_page_id = (int) get_option( 'page_for_posts' );
					$posts_page_url = $posts_page_id ? get_permalink( $posts_page_id ) : home_url( '/' );
					?>
					<a class="section-more" href="<?php echo esc_url( $posts_page_url ); ?>"><?php esc_html_e( 'View all →', 'tradingle' ); ?></a>
				</div>

				<div class="newsroom-lead">
					<?php if ( $latest_lead->have_posts() ) : ?>
						<?php while ( $latest_lead->have_posts() ) : $latest_lead->the_post(); ?>
							<?php
							$primary_category = get_the_category();
							$primary_slug     = ! empty( $primary_category[0] ) ? sanitize_html_class( $primary_category[0]->slug ) : 'default';
							$primary_name     = ! empty( $primary_category[0] ) ? $primary_category[0]->name : '';
							?>
							<article <?php post_class( 'news-card card lead-card' ); ?>>
								<a href="<?php the_permalink(); ?>" class="media-link" aria-label="<?php the_title_attribute(); ?>">
									<?php the_post_thumbnail( 'tradingle-hero', array( 'loading' => 'lazy' ) ); ?>
								</a>
								<div class="card-body">
									<span class="category-pill category-pill--<?php echo esc_attr( $primary_slug ); ?>"><?php echo esc_html( $primary_name ); ?></span>
									<h3 class="heading-md lead-card__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
									<p class="lead-card__excerpt"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 22 ) ); ?></p>
									<p class="meta"><?php the_author(); ?> · <?php echo esc_html( get_the_date( 'M j, Y' ) ); ?> · <?php echo esc_html( tradingle_reading_time() ); ?></p>
								</div>
							</article>
							<?php tradingle_seen_posts_add( get_the_ID() ); ?>
						<?php endwhile; ?>
					<?php endif; ?>
					<?php wp_reset_postdata(); ?>
				</div>

				<?php
				$latest_list = new WP_Query(
					array(
						'posts_per_page' => 6,
						'offset'         => 1,
						'ignore_sticky_posts' => true,
						'post__not_in'   => tradingle_seen_posts_get(),
					)
				);
				?>
				<div class="newsroom-feed">
					<?php if ( $latest_list->have_posts() ) : ?>
						<?php while ( $latest_list->have_posts() ) : $latest_list->the_post(); ?>
							<?php get_template_part( 'template-parts/content/card', 'list' ); ?>
							<?php tradingle_seen_posts_add( get_the_ID() ); ?>
						<?php endwhile; ?>
					<?php endif; ?>
					<?php wp_reset_postdata(); ?>
				</div>
			</div>

			<aside class="newsroom-rail" aria-label="<?php esc_attr_e( 'Trending and quick reads', 'tradingle' ); ?>">
				<?php
				$trending = new WP_Query(
					array(
						'posts_per_page'      => 6,
						'orderby'             => 'comment_count',
						'ignore_sticky_posts' => true,
					)
				);
				?>
				<div class="rail-card rail-card--tight">
					<div class="rail-head">
						<h3><?php esc_html_e( 'Trending', 'tradingle' ); ?></h3>
						<a href="<?php echo esc_url( home_url( '/?s=' ) ); ?>"><?php esc_html_e( 'Search', 'tradingle' ); ?></a>
					</div>
					<div class="rail-list">
						<?php if ( $trending->have_posts() ) : ?>
							<?php while ( $trending->have_posts() ) : $trending->the_post(); ?>
								<article <?php post_class( 'rail-item' ); ?>>
									<a class="rail-item__title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
									<p class="meta"><?php echo esc_html( get_the_date( 'M j' ) ); ?></p>
								</article>
							<?php endwhile; ?>
						<?php else : ?>
							<p class="meta"><?php esc_html_e( 'No trending stories yet.', 'tradingle' ); ?></p>
						<?php endif; ?>
						<?php wp_reset_postdata(); ?>
					</div>
				</div>

				<?php
				$picks = tradingle_category_query( 'editors-picks', 4 );
				if ( ! $picks->have_posts() ) {
					$picks = tradingle_category_query( 'analysis', 4 );
				}
				?>
				<?php if ( $picks->have_posts() ) : ?>
					<div class="rail-card rail-card--tight">
						<div class="rail-head">
							<h3><?php esc_html_e( 'Editor’s picks', 'tradingle' ); ?></h3>
							<a href="<?php echo esc_url( home_url( '/category/editors-picks/' ) ); ?>"><?php esc_html_e( 'More', 'tradingle' ); ?></a>
						</div>
						<div class="rail-list">
							<?php while ( $picks->have_posts() ) : $picks->the_post(); ?>
								<article <?php post_class( 'rail-item' ); ?>>
									<a class="rail-item__title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
									<p class="meta"><?php echo esc_html( get_the_date( 'M j' ) ); ?></p>
								</article>
							<?php endwhile; wp_reset_postdata(); ?>
						</div>
					</div>
				<?php endif; ?>

				<?php if ( is_active_sidebar( 'home-top-widget' ) ) : ?>
					<div class="rail-card rail-card--tight">
						<?php dynamic_sidebar( 'home-top-widget' ); ?>
					</div>
				<?php endif; ?>
			</aside>
		</div>
	</div>
</section>

