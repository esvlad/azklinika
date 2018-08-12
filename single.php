<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Private_clinic
 */

get_header(); 

while ( have_posts() ) : the_post();

	$this_cat = get_the_category(get_the_ID());
	if($this_cat[0]->parent != 0){
		$this_cat[0] = get_category($this_cat[0]->parent);
	}

	get_template_part( 'template-parts/content', $this_cat[0]->slug );
	$my_slug = $this_cat[0]->slug;
endwhile;
if($my_slug == 'blog'){
	include('footer_maps.php');
} else {
	include('footer_nomap.php');
}

get_footer();
