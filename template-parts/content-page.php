<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Private_clinic
 */

?>
<section class="sect about">
  <div class="wrapper">
    <div class="content">
      <img class="sect_icon" src="<?=get_stylesheet_directory_uri();?>/images/icons/service.png"/>
      <h1>О&nbsp;клинике &laquo;Аспект Здоровья&raquo;</h1>
      <? the_title( '<h2>', '</h2>' ); ?>
      <div class="content_view about_view">
        <? the_content(); ?>
      </div>
    </div>
  </div>
</section>
