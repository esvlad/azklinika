<? 
  get_header();

  $workpri_page = query_posts('page_id=21');
?>
<section class="sect about">
  <div class="wrapper">
    <div class="content">
      <img class="sect_icon" src="<?=get_stylesheet_directory_uri();?>/images/icons/svg/about.svg"/>
      <h1>О&nbsp;клинике &laquo;Аспект Здоровья&raquo;</h1>
      <h2><?=$workpri_page[0]->post_title;?></h2>
      <div class="content_view about_view">
        <div class="about_view_workpri">
          <?=my_typograf($workpri_page[0]->post_content);?>
        </div>
      </div>
    </div>
  </div>
</section>
<? 
  include('footer_maps.php'); 
  get_footer();