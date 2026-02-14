<?php
/**
 * Author template.
 *
 * @package Tradingle
 */

get_header();
$author = get_queried_object();
?>
<section class="module-wrap author-box">
	<?php echo get_avatar( $author->ID, 104 ); ?>
	<div>
		<h1 class="module-title"><?php echo esc_html( $author->display_name ); ?></h1>
		<p class="meta"><?php echo esc_html( get_the_author_meta( 'description', $author->ID ) ); ?></p>
		<p class="meta"><?php echo esc_html( get_the_author_meta( 'user_url', $author->ID ) ); ?></p>
	</div>
</section>
<div class="content-grid blog-layout author-layout">
	<section class="blog-main">
		<div class="post-list-grid cards-grid cards-grid-2">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'template-parts/content/card', 'standard' ); ?>
			<?php endwhile; ?>
		</div>
	</section>
	<?php get_sidebar(); ?>
</div>
<?php
get_footer();
