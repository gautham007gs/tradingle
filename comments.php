<?php
/**
 * Comments template.
 *
 * @package Tradingle
 */

if ( post_password_required() ) {
	return;
}
?>
<div id="comments" class="comments-area">
	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title"><?php esc_html_e( 'Comments', 'tradingle' ); ?></h2>
		<ol class="comment-list">
			<?php wp_list_comments(); ?>
		</ol>
	<?php endif; ?>
	<?php comment_form(); ?>
</div>
