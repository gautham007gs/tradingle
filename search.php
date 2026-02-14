<?php
/**
 * Search template.
 *
 * @package Tradingle
 */

get_header();
?>
<header class="module-wrap search-header">
	<h1 class="module-title"><?php printf( esc_html__( 'Results for: %s', 'tradingle' ), esc_html( get_search_query() ) ); ?></h1>
</header>
<div class="content-grid blog-layout search-layout">
	<section class="blog-main search-results-grid cards-grid cards-grid-2">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'template-parts/content/card', 'standard' ); ?>
			<?php endwhile; ?>
			<?php the_posts_pagination(); ?>
		<?php else : ?>
			<p><?php esc_html_e( 'No matching content found.', 'tradingle' ); ?></p>
		<?php endif; ?>
	</section>
	<?php get_sidebar(); ?>
</div>
<?php
get_footer();
