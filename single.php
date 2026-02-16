<?php
/**
 * Single template.
 *
 * @package Tradingle
 */

get_header();
?>
<section class="single-article" role="main">
	<?php while ( have_posts() ) : the_post(); ?>
		<?php $single_categories = get_the_category(); ?>
		<div class="article-layout container">
			<div class="article-main">
				<article <?php post_class( 'article article-shell' ); ?> itemscope itemtype="https://schema.org/NewsArticle">
					<header class="article-header">
						<nav class="breadcrumb" aria-label="<?php esc_attr_e( 'Breadcrumb', 'tradingle' ); ?>">
							<?php
							if ( function_exists( 'rank_math_the_breadcrumbs' ) ) {
								rank_math_the_breadcrumbs();
							} else {
								echo '<a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html__( 'Home', 'tradingle' ) . '</a>';
								echo '<span>/</span>';
								if ( ! empty( $single_categories[0] ) ) {
									echo '<a href="' . esc_url( get_category_link( $single_categories[0]->term_id ) ) . '">' . esc_html( $single_categories[0]->name ) . '</a>';
									echo '<span>/</span>';
								}
								echo '<span>' . esc_html( get_the_title() ) . '</span>';
							}
							?>
						</nav>

						<div class="article-category">
							<?php the_category( ' ' ); ?>
						</div>

						<h1 class="article-title heading-xl" itemprop="headline"><?php the_title(); ?></h1>

						<?php if ( has_excerpt() ) : ?>
							<p class="article-subtitle" itemprop="alternativeHeadline"><?php echo esc_html( get_the_excerpt() ); ?></p>
						<?php endif; ?>

						<div class="article-meta meta-line">
							<div class="article-author" itemprop="author" itemscope itemtype="https://schema.org/Person">
								<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
									<span itemprop="name"><?php the_author(); ?></span>
								</a>
							</div>
							<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>" itemprop="datePublished"><?php echo esc_html( get_the_date() ); ?></time>
							<span class="reading-time"><?php echo esc_html( tradingle_reading_time() ); ?></span>
							<time datetime="<?php echo esc_attr( get_the_modified_date( 'c' ) ); ?>" class="updated-time"><?php printf( esc_html__( 'Updated %s', 'tradingle' ), esc_html( get_the_modified_date( 'M j, Y' ) ) ); ?></time>
						</div>
					</header>

					<figure class="article-featured-image" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
						<?php the_post_thumbnail( 'large', array( 'loading' => 'lazy' ) ); ?>
						<?php if ( get_the_post_thumbnail_caption() ) : ?>
							<figcaption><?php the_post_thumbnail_caption(); ?></figcaption>
						<?php endif; ?>
					</figure>

					<div class="article-body entry-content" itemprop="articleBody">
						<?php the_content(); ?>
					</div>

					<footer class="article-footer">
						<div class="article-tags">
							<?php the_tags( '<span>' . esc_html__( 'Tags:', 'tradingle' ) . '</span> ', ' ', '' ); ?>
						</div>
					</footer>
				</article>

				<section class="author-box module-wrap" itemscope itemtype="https://schema.org/Person">
					<div class="author-avatar">
						<?php echo get_avatar( get_the_author_meta( 'ID' ), 64 ); ?>
					</div>
					<div class="author-info">
						<h3 itemprop="name"><?php the_author(); ?></h3>
						<p class="author-bio" itemprop="description"><?php echo esc_html( wp_trim_words( get_the_author_meta( 'description' ), 28 ) ); ?></p>
						<div class="author-links">
							<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php esc_html_e( 'View all posts', 'tradingle' ); ?></a>
						</div>
					</div>
				</section>

				<section class="related-posts module-wrap" aria-label="<?php esc_attr_e( 'Related Articles', 'tradingle' ); ?>">
					<h2 class="heading-md"><?php printf( esc_html__( 'More in %s', 'tradingle' ), esc_html( ! empty( $single_categories[0] ) ? $single_categories[0]->name : __( 'Markets', 'tradingle' ) ) ); ?></h2>
					<div class="related-grid cards-grid cards-grid-3">
						<?php
						$categories = wp_get_post_categories( get_the_ID() );
						$related    = new WP_Query(
							array(
								'category__in'   => $categories,
								'post__not_in'   => array( get_the_ID() ),
								'posts_per_page' => 3,
							)
						);
						?>
						<?php while ( $related->have_posts() ) : $related->the_post(); ?>
							<article class="related-card news-card">
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail( 'medium', array( 'loading' => 'lazy' ) ); ?>
									<div class="card-body"><h3 class="heading-sm"><?php the_title(); ?></h3></div>
								</a>
							</article>
						<?php endwhile; wp_reset_postdata(); ?>
					</div>
				</section>

				<section class="comments-section module-wrap">
					<?php comments_template(); ?>
				</section>

				<section class="article-end-cta module-wrap">
					<h3 class="heading-md"><?php esc_html_e( 'Stay Ahead of the Market', 'tradingle' ); ?></h3>
					<p><?php esc_html_e( 'Get our top market briefings and analysis delivered daily.', 'tradingle' ); ?></p>
					<a class="button button-primary" href="#newsletter-signup"><?php esc_html_e( 'Subscribe', 'tradingle' ); ?></a>
				</section>
			</div>

			<aside class="article-side-rail" aria-label="<?php esc_attr_e( 'Article Utilities', 'tradingle' ); ?>">
				<div class="article-side-rail__sticky">
					<section class="rail-card rail-card--toc">
						<h3><?php esc_html_e( 'In this article', 'tradingle' ); ?></h3>
						<nav class="article-toc" id="article-toc"></nav>
					</section>
					<section class="rail-card rail-card--share">
						<h3><?php esc_html_e( 'Share', 'tradingle' ); ?></h3>
						<div class="share-links">
							<a href="https://twitter.com/intent/tweet?url=<?php echo rawurlencode( get_permalink() ); ?>" target="_blank" rel="noopener noreferrer">X</a>
							<a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo rawurlencode( get_permalink() ); ?>" target="_blank" rel="noopener noreferrer">in</a>
						</div>
					</section>
					<section class="rail-card rail-card--trending">
						<h3><?php esc_html_e( 'Trending Now', 'tradingle' ); ?></h3>
						<ul>
							<?php
							$trending_now = new WP_Query(
								array(
									'posts_per_page'      => 3,
									'orderby'             => 'comment_count',
									'ignore_sticky_posts' => true,
								)
							);
							while ( $trending_now->have_posts() ) : $trending_now->the_post();
								?>
								<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
								<?php
							endwhile;
							wp_reset_postdata();
							?>
						</ul>
					</section>
				</div>
			</aside>
		</div>
	<?php endwhile; ?>
</section>
<?php
get_footer();
