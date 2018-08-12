<?
  get_header();

  $workers_post = new WP_Query(array('category_name'=>'workers', 'orderby'=>'date', 'order'=>'ASC', 'posts_per_page' => 100));
?>
<section class="sect about">
  <div class="wrapper">
    <div class="content">
      <img class="sect_icon" src="<?=get_stylesheet_directory_uri();?>/images/icons/svg/about.svg"/>
      <h1>О&nbsp;клинике &laquo;Аспект Здоровья&raquo;</h1>
      <h2>Сотрудники</h2>
      <div class="content_view about_view">
        <div class="about_view_workers">
          <? while($workers_post->have_posts()) : ?>
            <? $workers_post->the_post(); ?>
            <div class="about_view_workers__block">
              <a class="about_view_workers__block__item" href="<? the_permalink(); ?>" target="_self">
                <?
                  if( has_post_thumbnail() ) {
                    echo '<img src="'.get_the_post_thumbnail_url().'" />';
                  }
                  else {
                    echo '<img src="'.get_bloginfo("template_url").'/images/workers/no_image.png" />';
                  }
                ?>
                <p><span><? the_title(); ?></span></p>
                <p><span><? the_field('work_position'); ?></span></p>
              </a>
            </div>
          <? endwhile; ?>
          <div class="about_view_workers__block"></div>
          <div class="about_view_workers__block">
        </div>
      </div>
    </div>
  </div>
</section>
<? 
  include('footer_maps.php'); 
  get_footer(); 