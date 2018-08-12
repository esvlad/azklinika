<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Private_clinic
 */

get_header(); ?>

<section class="sect page404">
  <div class="wrapper">
    <div class="content">
      <h1>404</h1>
      <h2>Страница не найдена.</h2>
      <h3>Может быть перейти на <a href="../" target="_self">главную</a>?</h3>
    </div>
  </div>
</section>

<?php
include('footer_maps.php'); 
get_footer();
