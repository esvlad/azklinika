<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Private_clinic
 */

?>

<section class="sect blog page">
  <div class="wrapper">
    <div class="content">
      <p class="return"><a href="<?#site_url();?>/?s=" target="_self">&lt; вернуться к&nbsp;поиску</a></p>
      <div class="content_view">
        <div class="blog_view">
          <div class="blog_view_articles">
            <h2><?# the_title(); ?></h2>
            <div class="blog_view_articles_body">
              <?# the_content(); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>