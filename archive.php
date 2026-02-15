<?php
/**
 * Archive template.
 *
 * @package Tradingle
 */

get_header();
?>
<header class="module-wrap archive-header">
	<h1 class="module-title"><?php the_archive_title(); ?></h1>
	<?php the_archive_description( '<p class="meta">', '</p>' ); ?>
</header>
<div class="content-grid blog-layout">
	<section class="blog-main">
		<?php if ( have_posts() ) : ?>
			<div class="post-list-grid cards-grid cards-grid-2">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'template-parts/content/card', 'standard' ); ?>
				<?php endwhile; ?>
			</div>
			<?php the_posts_pagination(); ?>
		<?php else : ?>
			<p><?php esc_html_e( 'No posts found in this archive.', 'tradingle' ); ?></p>
		<?php endif; ?>
	</section>
	<?php get_sidebar(); ?>
</div>
<?php
get_footer();
