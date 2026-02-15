<?php
/**
 * Page template.
 *
 * @package Tradingle
 */

get_header();
?>
<div class="content-grid">
	<section class="article-shell">
		<?php while ( have_posts() ) : the_post(); ?>
			<h1 class="module-title"><?php the_title(); ?></h1>
			<div class="entry-content"><?php the_content(); ?></div>
		<?php endwhile; ?>
	</section>
	<?php get_sidebar(); ?>
</div>
<?php
get_footer();
