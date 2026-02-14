<?php
/**
 * Archive template.
 *
 * @package Tradingle
 */

get_header();
?>
<header class="module-wrap">
	<h1 class="module-title"><?php the_archive_title(); ?></h1>
	<?php the_archive_description( '<p class="meta">', '</p>' ); ?>
</header>
<div class="content-grid">
	<section>
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'template-parts/content/card', 'standard' ); ?>
			<?php endwhile; ?>
			<?php the_posts_pagination(); ?>
		<?php endif; ?>
	</section>
	<?php get_sidebar(); ?>
</div>
<?php
get_footer();
