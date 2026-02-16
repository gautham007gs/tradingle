<?php
/**
 * Home template.
 *
 * @package Tradingle
 */

get_header();

get_template_part( 'template-parts/home/breaking' );
get_template_part( 'template-parts/home/hero' );
get_template_part( 'template-parts/home/market-strip' );
get_template_part( 'template-parts/home/latest' );
get_template_part( 'template-parts/home/highlight' );
get_template_part( 'template-parts/home/asset-classes' );
get_template_part( 'template-parts/home/editors-picks' );
get_template_part( 'template-parts/home/trending' );
get_template_part( 'template-parts/home/data-visual' );
get_template_part( 'template-parts/home/newsletter' );

get_footer();
