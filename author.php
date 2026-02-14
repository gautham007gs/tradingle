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
<div class="content-grid">
	<section>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'template-parts/content/card', 'standard' ); ?>
		<?php endwhile; ?>
	</section>
	<?php get_sidebar(); ?>
</div>
<?php
get_footer();
