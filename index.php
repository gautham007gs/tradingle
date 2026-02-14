<?php
/**
 * Index template.
 *
 * @package Tradingle
 */

get_header();
?>
<div class="content-grid">
	<section>
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'template-parts/content/card', 'standard' ); ?>
			<?php endwhile; ?>
			<?php the_posts_pagination(); ?>
		<?php else : ?>
			<p><?php esc_html_e( 'No articles found.', 'tradingle' ); ?></p>
		<?php endif; ?>
	</section>
	<?php get_sidebar(); ?>
</div>
<?php
get_footer();
