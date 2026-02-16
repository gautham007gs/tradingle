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
					<?php
					$author_id       = get_the_author_meta( 'ID' );
					$author_bio      = get_the_author_meta( 'description', $author_id );
					$author_website  = get_the_author_meta( 'user_url', $author_id );
					$author_x        = get_the_author_meta( 'twitter', $author_id );
					$author_linkedin = get_the_author_meta( 'linkedin', $author_id );
					?>
					<div class="author-avatar">
						<?php echo get_avatar( $author_id, 72 ); ?>
					</div>
					<div class="author-info">
						<h3 class="author-name" itemprop="name"><?php the_author(); ?></h3>
						<?php if ( $author_bio ) : ?>
							<p class="author-bio" itemprop="description"><?php echo esc_html( wp_trim_words( $author_bio, 32 ) ); ?></p>
						<?php endif; ?>
						<div class="author-links">
							<a href="<?php echo esc_url( get_author_posts_url( $author_id ) ); ?>"><?php esc_html_e( 'View all posts', 'tradingle' ); ?></a>
							<?php if ( $author_website ) : ?>
								<a href="<?php echo esc_url( $author_website ); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Website', 'tradingle' ); ?></a>
							<?php endif; ?>
							<?php if ( $author_x || $author_linkedin ) : ?>
								<div class="author-social">
									<?php if ( $author_x ) : ?>
										<a href="<?php echo esc_url( $author_x ); ?>" target="_blank" rel="noopener noreferrer">X</a>
									<?php endif; ?>
									<?php if ( $author_linkedin ) : ?>
										<a href="<?php echo esc_url( $author_linkedin ); ?>" target="_blank" rel="noopener noreferrer">in</a>
									<?php endif; ?>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</section>

				<section class="related-posts module-wrap" aria-label="<?php esc_attr_e( 'Related Articles', 'tradingle' ); ?>">
					<h2 class="heading-md"><?php printf( esc_html__( 'More in %s', 'tradingle' ), esc_html( ! empty( $single_categories[0] ) ? $single_categories[0]->name : __( 'Markets', 'tradingle' ) ) ); ?></h2>
					<div class="related-grid cards-grid cards-grid-3">
						<?php
						$categories = wp_get_post_categories( get_the_ID() );
						$related_args = array(
							'post__not_in'   => array( get_the_ID() ),
							'posts_per_page' => 3,
						);

						if ( ! empty( $categories ) ) {
							$related_args['category__in'] = $categories;
						}

						$related = new WP_Query( $related_args );

						// Fallback: if no category-based related posts, show latest you-may-like posts.
						if ( ! $related->have_posts() ) {
							wp_reset_postdata();
							$related = new WP_Query(
								array(
									'posts_per_page'      => 3,
									'post__not_in'        => array( get_the_ID() ),
									'ignore_sticky_posts' => true,
								)
							);
						}
						?>
						<?php if ( $related->have_posts() ) : ?>
							<?php
							while ( $related->have_posts() ) :
								$related->the_post();
								get_template_part( 'template-parts/content/card', 'standard' );
							endwhile;
							wp_reset_postdata();
							?>
						<?php else : ?>
							<p class="meta"><?php esc_html_e( 'No related articles available yet.', 'tradingle' ); ?></p>
						<?php endif; ?>
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

				<?php get_template_part( 'template-parts/content/post', 'collections' ); ?>
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
							<a href="https://twitter.com/intent/tweet?url=<?php echo rawurlencode( get_permalink() ); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'X', 'tradingle' ); ?></a>
							<a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo rawurlencode( get_permalink() ); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'LinkedIn', 'tradingle' ); ?></a>
							<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo rawurlencode( get_permalink() ); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Facebook', 'tradingle' ); ?></a>
							<a href="https://wa.me/?text=<?php echo rawurlencode( get_the_title() . ' - ' . get_permalink() ); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'WhatsApp', 'tradingle' ); ?></a>
							<a href="mailto:?subject=<?php echo rawurlencode( get_the_title() ); ?>&amp;body=<?php echo rawurlencode( get_permalink() ); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Email', 'tradingle' ); ?></a>
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

					<?php if ( is_active_sidebar( 'article-sidebar' ) ) : ?>
						<section class="rail-card rail-card--widget">
							<?php dynamic_sidebar( 'article-sidebar' ); ?>
						</section>
					<?php endif; ?>
				</div>
			</aside>
		</div>
	<?php endwhile; ?>
</section>
<?php
get_footer();
