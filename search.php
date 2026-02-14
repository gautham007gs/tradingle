<?php
/**
 * Search template.
 *
 * @package Tradingle
 */

get_header();
?>
<header class="module-wrap">
	<h1 class="module-title"><?php printf( esc_html__( 'Results for: %s', 'tradingle' ), esc_html( get_search_query() ) ); ?></h1>
</header>
<div class="cards-grid cards-grid-3">
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'template-parts/content/card', 'standard' ); ?>
		<?php endwhile; ?>
	<?php else : ?>
		<p><?php esc_html_e( 'No matching content found.', 'tradingle' ); ?></p>
	<?php endif; ?>
</div>
<?php
get_footer();
