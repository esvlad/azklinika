<section class="sect about">
  <div class="wrapper">
    <div class="content">
      <img class="sect_icon" src="<?=get_stylesheet_directory_uri();?>/images/icons/svg/about.svg"/>
      <h1>О&nbsp;клинике &laquo;Аспект Здоровья&raquo;</h1>
      <h2 class="small_blue"><a href="../about/workers/" target="_self">&lt; вернуться ко&nbsp;всем врачам</a></h2>
      <div class="content_view about_view">
        <div class="about_view_worker">
          <h2><? the_title(); ?></h2>
          <h3><? the_field('work_position'); ?></h3>
          <div class="about_view_worker_caption">
          	<?
              if( has_post_thumbnail() ) {
                echo '<img src="'.get_the_post_thumbnail_url().'"/>';
              } else {
                echo '<img src="'.get_bloginfo("template_url").'/images/workers/no_image.png" />';
              }
            ?>
            <div>
              <?
                echo my_typograf(get_the_content());

                $work_education = get_field('work_education');

                if($work_education && $work_education != ''){
                  echo '<p class="education">Образование и&nbsp;научная деятельность</p>';
                  echo $work_education;
                }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>