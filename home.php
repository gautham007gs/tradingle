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
get_template_part( 'template-parts/home/newsroom' );
get_template_part( 'template-parts/home/ad-band' );
get_template_part( 'template-parts/home/topic-boards' );
get_template_part( 'template-parts/home/highlight' );
get_template_part( 'template-parts/home/data-visual' );
get_template_part( 'template-parts/home/explore-categories' );
get_template_part( 'template-parts/home/newsletter' );

get_footer();
