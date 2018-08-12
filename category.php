<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Private_clinic
 */

get_header(); 

$cats = get_category(get_query_var('cat'));
if($cats->parent != 0){
	$cats = get_category($cats->parent);
}

get_template_part( 'template-cat/category', $cats->slug );
get_template_part('footer_maps');
get_footer();
