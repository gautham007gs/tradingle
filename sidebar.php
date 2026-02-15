<?php
/**
 * Sidebar template.
 *
 * @package Tradingle
 */

$sidebar_id = is_active_sidebar( 'primary_sidebar' ) ? 'primary_sidebar' : 'sidebar-main';

if ( ! is_active_sidebar( $sidebar_id ) ) {
	return;
}
?>
<aside class="site-sidebar" role="complementary" itemscope itemtype="https://schema.org/WPSideBar">
	<div class="sidebar-sticky">
		<?php dynamic_sidebar( $sidebar_id ); ?>
	</div>
</aside>
