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
		<h2 class="comments-title heading-sm"><?php esc_html_e( 'Comments', 'tradingle' ); ?></h2>
		<ol class="comment-list">
			<?php
			wp_list_comments(
				array(
					'style'      => 'ol',
					'short_ping' => true,
				)
			);
			?>
		</ol>
	<?php endif; ?>
	<?php
	comment_form(
		array(
			'class_submit' => 'button button-primary',
			'title_reply'  => __( 'Share your perspective', 'tradingle' ),
		)
	);
	?>
</div>
