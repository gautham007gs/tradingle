<?php
/**
 * Archive template.
 *
 * @package Tradingle
 */

get_header();
?>
<header class="module-wrap archive-header wrapper">
	<h1 class="module-title"><?php the_archive_title(); ?></h1>
	<?php the_archive_description( '<p class="meta">', '</p>' ); ?>
</header>
<div class="blog-layout wrapper">
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
</div>
<?php get_template_part( 'template-parts/content/post', 'collections' ); ?>
<?php
get_footer();
