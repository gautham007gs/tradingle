<?php
/**
 * Header template.
 *
 * @package Tradingle
 */
?><!doctype html>
<html <?php language_attributes(); ?> data-theme="<?php echo get_theme_mod( 'tradingle_dark_mode_default', 0 ) ? 'dark' : 'light'; ?>">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link" href="#primary"><?php esc_html_e( 'Skip to content', 'tradingle' ); ?></a>

<header class="site-header" itemscope itemtype="https://schema.org/WPHeader">
	<div class="wrapper header-inner">
		<div class="site-branding">
			<?php $badge_logo_id = absint( get_theme_mod( 'tradingle_badge_logo', 0 ) ); ?>
			<span class="brand-badge" aria-hidden="true">
				<?php if ( $badge_logo_id ) : ?>
					<?php echo wp_get_attachment_image( $badge_logo_id, 'thumbnail', false, array( 'class' => 'brand-badge__img', 'loading' => 'lazy' ) ); ?>
				<?php else : ?>
					<span class="brand-badge__placeholder">T</span>
				<?php endif; ?>
			</span>
			<div class="site-branding__text">
				<?php if ( has_custom_logo() ) { the_custom_logo(); } ?>
				<a class="site-title" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
				<span class="site-tagline"><?php esc_html_e( 'Market Intelligence', 'tradingle' ); ?></span>
			</div>
		</div>

		<nav class="main-navigation" itemscope itemtype="https://schema.org/SiteNavigationElement" aria-label="<?php esc_attr_e( 'Primary Navigation', 'tradingle' ); ?>">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'menu_class'     => 'primary-menu',
					'fallback_cb'    => 'tradingle_primary_menu_fallback',
				)
			);
			?>
		</nav>

		<div class="header-actions">
			<button class="icon-btn button search-btn" type="button" aria-label="<?php esc_attr_e( 'Open search', 'tradingle' ); ?>" aria-expanded="false">⌕</button>
			<button class="menu-toggle button" type="button" aria-label="<?php esc_attr_e( 'Toggle menu', 'tradingle' ); ?>" aria-expanded="false">☰</button>
		</div>
	</div>
	<div class="wrapper header-search" hidden>
		<?php get_search_form(); ?>
	</div>
</header>

<?php if ( is_active_sidebar( 'header-ad' ) ) : ?>
	<div class="wrapper module-wrap ad-wrap">
		<?php dynamic_sidebar( 'header-ad' ); ?>
	</div>
<?php endif; ?>

<main id="primary" class="site-main">
