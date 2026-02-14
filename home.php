<?php
/**
 * Home template.
 *
 * @package Tradingle
 */

get_header();

get_template_part( 'template-parts/home/breaking' );

if ( get_theme_mod( 'tradingle_enable_hero', 1 ) ) {
	get_template_part( 'template-parts/home/hero' );
}

if ( is_active_sidebar( 'market-strip' ) ) {
	get_template_part( 'template-parts/home/market-strip' );
}

get_template_part( 'template-parts/home/latest' );

if ( get_theme_mod( 'tradingle_enable_modules', 1 ) ) {
	get_template_part( 'template-parts/home/editorial-modules' );
}

if ( get_theme_mod( 'tradingle_enable_research', 1 ) ) {
	get_template_part( 'template-parts/home/research' );
}

if ( get_theme_mod( 'tradingle_enable_data_visual', 1 ) ) {
	get_template_part( 'template-parts/home/data-visual' );
}

if ( get_theme_mod( 'tradingle_enable_opinion', 1 ) ) {
	get_template_part( 'template-parts/home/opinion' );
}

get_template_part( 'template-parts/home/newsletter' );

get_footer();
