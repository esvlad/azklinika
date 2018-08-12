<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Private_clinic
 */

get_header(); ?>
<section class="sect search">
  <div class="wrapper">
    <div class="content">
      <img class="sect_icon" src="http://klinika.promolink.su/wp-content/uploads/2017/08/search-1.png"/>
      <h1>Поиск по сайту</h1>
      <div class="search_block">
        <? dynamic_sidebar( 'sidebar-1' ); ?>
      </div>
      <div class="content_view">
      	<? if ( have_posts() ) : ?>
      		<? while ( have_posts() ) : the_post(); ?>
		        <div class="search_view_block">
		        	<h3><a href="<?= esc_url(get_permalink()); ?>" target="_self"><? the_title(); ?></a></h3>
		          	<p><a href="<?= esc_url(get_permalink()); ?>" target="_self"><?= get_the_excerpt(); ?></a></p>
		        </div>
		    <? endwhile; ?>
		<? endif; ?>
      </div>
    </div>
  </div>
</section>

<?php
include('footer_maps.php'); 
get_footer();

