<?php
/**
 * Tradingle theme functions.
 *
 * @package Tradingle
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function tradingle_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'customize-selective-refresh-widgets' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'editor-styles' );
	add_theme_support(
		'html5',
		array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' )
	);
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 52,
			'width'       => 180,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	register_nav_menus(
		array(
			'primary' => esc_html__( 'Primary Menu', 'tradingle' ),
			'footer'  => esc_html__( 'Footer Menu', 'tradingle' ),
		)
	);

	add_image_size( 'tradingle-hero', 740, 560, true );
	add_image_size( 'tradingle-card', 386, 220, true );
	add_image_size( 'tradingle-thumb', 120, 120, true );
	add_image_size( 'tradingle-featured-module', 760, 420, true );
}
add_action( 'after_setup_theme', 'tradingle_setup' );

function tradingle_widgets_init() {
	$sidebars = array(
		'utility-left'         => __( 'Utility Bar Left', 'tradingle' ),
		'utility-right'        => __( 'Utility Bar Right', 'tradingle' ),
		'header-breaking'      => __( 'Header Breaking Ticker', 'tradingle' ),
		'header-ad'            => __( 'Header Ad Slot', 'tradingle' ),
		'market-strip'         => __( 'Market Intelligence Strip', 'tradingle' ),
		'home-sponsored'       => __( 'Homepage Sponsored Block', 'tradingle' ),
		'home-data-visual'     => __( 'Homepage Data Visual Block', 'tradingle' ),
		'sidebar-main'         => __( 'Sidebar Intelligence Panel', 'tradingle' ),
		'primary_sidebar'      => __( 'Primary Sidebar', 'tradingle' ),
		'article-sidebar'      => __( 'Article Sidebar', 'tradingle' ),
		'single-inline-ad'     => __( 'Single Inline Ad', 'tradingle' ),
		'article_inline_ad'    => __( 'Article Inline Ad', 'tradingle' ),
		'single-after-content' => __( 'Single After Content', 'tradingle' ),
		'footer-col-1'         => __( 'Footer Company', 'tradingle' ),
		'footer-col-2'         => __( 'Footer Editorial', 'tradingle' ),
		'footer-col-3'         => __( 'Footer Markets', 'tradingle' ),
		'footer-col-4'         => __( 'Footer Resources', 'tradingle' ),
	);

	foreach ( $sidebars as $id => $name ) {
		register_sidebar(
			array(
				'name'          => $name,
				'id'            => $id,
				'before_widget' => '<section class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
		);
	}
}
add_action( 'widgets_init', 'tradingle_widgets_init' );

function tradingle_enqueue_assets() {
	$theme_version = wp_get_theme()->get( 'Version' );

	wp_enqueue_style( 'tradingle-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap', array(), null );
	// Compiled CSS output generated from assets/scss/main.scss.
	wp_enqueue_style( 'tradingle-style', get_template_directory_uri() . '/assets/css/production.css', array( 'tradingle-fonts' ), $theme_version );
	wp_enqueue_script( 'tradingle-theme', get_template_directory_uri() . '/assets/js/theme.js', array(), $theme_version, true );

	$critical_css = '.utility-bar{height:36px;background:var(--color-secondary)}.site-header{position:sticky;top:0;z-index:1000;box-shadow:0 2px 8px rgba(0,0,0,.06)}.header-inner{min-height:80px;display:grid;grid-template-columns:160px minmax(0,760px) 200px}.hero-grid{display:grid;grid-template-columns:740px 1fr;gap:40px}';
	wp_add_inline_style( 'tradingle-style', $critical_css );
	wp_script_add_data( 'tradingle-theme', 'defer', true );
}
add_action( 'wp_enqueue_scripts', 'tradingle_enqueue_assets' );

function tradingle_customizer( $wp_customize ) {
	$wp_customize->add_section(
		'tradingle_theme_options',
		array(
			'title'    => __( 'Tradingle Theme Options', 'tradingle' ),
			'priority' => 40,
		)
	);

	$settings = array(
		'tradingle_primary_color'      => '#0A1F33',
		'tradingle_accent_color'       => '#1DB954',
		'tradingle_layout_width'       => 1240,
		'tradingle_type_size'          => 16,
		'tradingle_sidebar_position'   => 'right',
		'tradingle_enable_hero'        => 1,
		'tradingle_enable_modules'     => 1,
		'tradingle_enable_research'    => 1,
		'tradingle_enable_data_visual' => 1,
		'tradingle_enable_opinion'     => 1,
		'tradingle_dark_mode_default'  => 0,
	);

	foreach ( $settings as $key => $default ) {
		$wp_customize->add_setting(
			$key,
			array(
				'default'           => $default,
				'sanitize_callback' => 'tradingle_sanitize_setting',
			)
		);
	}

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tradingle_primary_color', array( 'label' => __( 'Primary Brand Color', 'tradingle' ), 'section' => 'tradingle_theme_options' ) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tradingle_accent_color', array( 'label' => __( 'Accent Color', 'tradingle' ), 'section' => 'tradingle_theme_options' ) ) );
	$wp_customize->add_control( 'tradingle_layout_width', array( 'label' => __( 'Layout Width', 'tradingle' ), 'section' => 'tradingle_theme_options', 'type' => 'number' ) );
	$wp_customize->add_control( 'tradingle_type_size', array( 'label' => __( 'Base Typography Size', 'tradingle' ), 'section' => 'tradingle_theme_options', 'type' => 'number' ) );
	$wp_customize->add_control( 'tradingle_sidebar_position', array( 'label' => __( 'Sidebar Position', 'tradingle' ), 'section' => 'tradingle_theme_options', 'type' => 'select', 'choices' => array( 'right' => __( 'Right', 'tradingle' ), 'left' => __( 'Left', 'tradingle' ) ) ) );
	$wp_customize->add_control( 'tradingle_enable_hero', array( 'label' => __( 'Enable Hero Grid', 'tradingle' ), 'section' => 'tradingle_theme_options', 'type' => 'checkbox' ) );
	$wp_customize->add_control( 'tradingle_enable_modules', array( 'label' => __( 'Enable Editorial Modules', 'tradingle' ), 'section' => 'tradingle_theme_options', 'type' => 'checkbox' ) );
	$wp_customize->add_control( 'tradingle_enable_research', array( 'label' => __( 'Enable Research Block', 'tradingle' ), 'section' => 'tradingle_theme_options', 'type' => 'checkbox' ) );
	$wp_customize->add_control( 'tradingle_enable_data_visual', array( 'label' => __( 'Enable Data Visual Block', 'tradingle' ), 'section' => 'tradingle_theme_options', 'type' => 'checkbox' ) );
	$wp_customize->add_control( 'tradingle_enable_opinion', array( 'label' => __( 'Enable Opinion Carousel', 'tradingle' ), 'section' => 'tradingle_theme_options', 'type' => 'checkbox' ) );
	$wp_customize->add_control( 'tradingle_dark_mode_default', array( 'label' => __( 'Dark Mode Default', 'tradingle' ), 'section' => 'tradingle_theme_options', 'type' => 'checkbox' ) );
}
add_action( 'customize_register', 'tradingle_customizer' );

function tradingle_sanitize_setting( $value ) {
	if ( is_numeric( $value ) ) {
		return absint( $value );
	}
	return sanitize_text_field( $value );
}

function tradingle_customizer_css() {
	$primary = get_theme_mod( 'tradingle_primary_color', '#0A1F33' );
	$accent  = get_theme_mod( 'tradingle_accent_color', '#1DB954' );
	$width   = absint( get_theme_mod( 'tradingle_layout_width', 1240 ) );
	$size    = absint( get_theme_mod( 'tradingle_type_size', 16 ) );
	?>
	<style id="tradingle-custom-css">
		 :root{--color-primary:<?php echo esc_html( $primary ); ?>;--color-accent:<?php echo esc_html( $accent ); ?>;--container-width:<?php echo esc_html( $width ); ?>px;}
		body{font-size:<?php echo esc_html( $size ); ?>px;}
	</style>
	<?php
}
add_action( 'wp_head', 'tradingle_customizer_css', 30 );

function tradingle_body_classes( $classes ) {
	$classes[] = 'sidebar-' . get_theme_mod( 'tradingle_sidebar_position', 'right' );

	$classes[] = get_theme_mod( 'tradingle_dark_mode_default', 0 ) ? 'theme-default-dark' : 'theme-default-light';

	return $classes;
}
add_filter( 'body_class', 'tradingle_body_classes' );

function tradingle_reading_time( $post_id = 0 ) {
	$post_id = $post_id ? $post_id : get_the_ID();
	$content = get_post_field( 'post_content', $post_id );
	$words   = str_word_count( wp_strip_all_tags( $content ) );
	$minutes = max( 1, (int) ceil( $words / 220 ) );

	return sprintf( _n( '%s min read', '%s mins read', $minutes, 'tradingle' ), number_format_i18n( $minutes ) );
}

function tradingle_breadcrumb() {
	if ( is_front_page() ) {
		return;
	}
	?>
	<nav class="breadcrumb" aria-label="<?php esc_attr_e( 'Breadcrumb', 'tradingle' ); ?>">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'tradingle' ); ?></a>
		<?php if ( is_single() || is_category() ) : ?>
			<?php $categories = get_the_category(); ?>
			<?php if ( ! empty( $categories[0] ) ) : ?>
				<span>/</span>
				<a href="<?php echo esc_url( get_category_link( $categories[0]->term_id ) ); ?>"><?php echo esc_html( $categories[0]->name ); ?></a>
			<?php endif; ?>
		<?php endif; ?>
		<?php if ( is_single() || is_page() ) : ?>
			<span>/</span>
			<span><?php the_title(); ?></span>
		<?php endif; ?>
	</nav>
	<?php
}

function tradingle_category_query( $slug, $count, $offset = 0 ) {
	$category = get_category_by_slug( $slug );

	if ( ! $category ) {
		return new WP_Query();
	}

	return new WP_Query(
		array(
			'posts_per_page' => $count,
			'offset'         => $offset,
			'cat'            => $category->term_id,
		)
	);
}



/**
 * Insert inline ad after third paragraph in single posts.
 *
 * @param string $content Post content.
 * @return string
 */
function tradingle_insert_article_inline_ad( $content ) {
	if ( ! is_single() || is_admin() || ! is_main_query() ) {
		return $content;
	}

	if ( ! is_active_sidebar( 'article_inline_ad' ) && ! is_active_sidebar( 'single-inline-ad' ) ) {
		return $content;
	}

	$paragraphs = explode( '</p>', $content );
	if ( count( $paragraphs ) < 3 ) {
		return $content;
	}

	$ad_markup = '<div class="ad-slot ad-inline">';
	ob_start();
	if ( is_active_sidebar( 'article_inline_ad' ) ) {
		dynamic_sidebar( 'article_inline_ad' );
	} else {
		dynamic_sidebar( 'single-inline-ad' );
	}
	$ad_markup .= ob_get_clean();
	$ad_markup .= '</div>';

	foreach ( $paragraphs as $index => $paragraph ) {
		if ( trim( $paragraph ) ) {
			$paragraphs[ $index ] .= '</p>';
		}
		if ( 2 === $index ) {
			$paragraphs[ $index ] .= $ad_markup;
		}
	}

	return implode( '', $paragraphs );
}
add_filter( 'the_content', 'tradingle_insert_article_inline_ad' );

/**
 * Output NewsArticle JSON-LD on single posts.
 */
function tradingle_single_article_schema() {
	if ( ! is_single() ) {
		return;
	}

	$schema = array(
		'@context'      => 'https://schema.org',
		'@type'         => 'NewsArticle',
		'headline'      => get_the_title(),
		'datePublished' => get_the_date( 'c' ),
		'dateModified'  => get_the_modified_date( 'c' ),
		'author'        => array(
			'@type' => 'Person',
			'name'  => get_the_author(),
		),
		'mainEntityOfPage' => get_permalink(),
	);

	echo '<script type="application/ld+json">' . wp_json_encode( $schema ) . '</script>';
}
add_action( 'wp_head', 'tradingle_single_article_schema', 35 );

function tradingle_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="' . esc_url( get_bloginfo( 'pingback_url' ) ) . '">';
	}
}
add_action( 'wp_head', 'tradingle_pingback_header' );
