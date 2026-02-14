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
<?php if ( get_theme_mod( 'tradingle_show_top_bar', 1 ) ) : ?>
<div class="utility-bar">
	<div class="wrapper utility-inner">
		<div class="utility-left">
			<?php if ( is_active_sidebar( 'utility-left' ) ) : ?>
				<?php dynamic_sidebar( 'utility-left' ); ?>
			<?php else : ?>
				<span><?php echo esc_html( gmdate( 'D, d M Y' ) ); ?></span>
				<span><?php esc_html_e( 'Global Markets', 'tradingle' ); ?></span>
			<?php endif; ?>
		</div>
		<div class="utility-right">
			<?php if ( is_active_sidebar( 'utility-right' ) ) : ?>
				<?php dynamic_sidebar( 'utility-right' ); ?>
			<?php else : ?>
				<span><?php esc_html_e( 'Live TV', 'tradingle' ); ?></span>
				<span><?php esc_html_e( 'Research', 'tradingle' ); ?></span>
			<?php endif; ?>
		</div>
	</div>
</div>
<?php endif; ?>
<?php if ( get_theme_mod( 'tradingle_show_breaking_bar', 1 ) && is_active_sidebar( 'header-breaking' ) ) : ?>
	<div class="breaking-bar">
		<div class="wrapper">
			<?php dynamic_sidebar( 'header-breaking' ); ?>
		</div>
	</div>
<?php endif; ?>
<header class="site-header" itemscope itemtype="https://schema.org/WPHeader">
	<div class="wrapper header-inner">
		<div class="site-branding">
			<?php if ( has_custom_logo() ) : ?>
				<?php the_custom_logo(); ?>
			<?php else : ?>
				<a class="site-title" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
			<?php endif; ?>
		</div>
		<nav class="main-navigation" itemscope itemtype="https://schema.org/SiteNavigationElement">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'menu_class'     => 'primary-menu',
					'fallback_cb'    => false,
				)
			);
			?>
		</nav>
		<div class="header-actions">
			<button class="icon-btn button" type="button" aria-label="<?php esc_attr_e( 'Open search', 'tradingle' ); ?>">⌕</button>
			<a class="text-btn button" href="#"><?php esc_html_e( 'Sign In', 'tradingle' ); ?></a>
			<a class="subscribe-btn button-primary" href="#newsletter-signup"><?php echo esc_html( get_theme_mod( 'tradingle_subscribe_text', __( 'Subscribe', 'tradingle' ) ) ); ?></a>
			<button class="icon-btn button" type="button" data-dark-toggle aria-label="<?php esc_attr_e( 'Toggle dark mode', 'tradingle' ); ?>">◐</button>
			<button class="menu-toggle button" type="button" aria-label="<?php esc_attr_e( 'Toggle menu', 'tradingle' ); ?>">☰</button>
		</div>
	</div>
</header>
<?php if ( is_active_sidebar( 'header-ad' ) ) : ?>
	<div class="wrapper module-wrap ad-wrap">
		<?php dynamic_sidebar( 'header-ad' ); ?>
	</div>
<?php endif; ?>
<main id="primary" class="site-main wrapper">
	<?php tradingle_breadcrumb(); ?>
