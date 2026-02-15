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
get_template_part( 'template-parts/home/analyst-picks' );
get_template_part( 'template-parts/home/explore-categories' );
get_template_part( 'template-parts/home/podcast' );
get_template_part( 'template-parts/home/tools-services' );
get_template_part( 'template-parts/home/newsletter' );

get_footer();
