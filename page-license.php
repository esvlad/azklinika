<? 
  get_header();

  $license_page = query_posts('page_id=30');
?>
<section class="sect about">
  <div class="wrapper">
    <div class="content">
      <img class="sect_icon" src="<?=get_stylesheet_directory_uri();?>/images/icons/service.png"/>
      <h1>О&nbsp;клинике &laquo;Аспект Здоровья&raquo;</h1>
      <h2><?=$license_page[0]->post_title;?></h2>
      <div class="content_view about_view">
        <div class="about_view_license">
          <?=$license_page[0]->post_content;?>
        </div>
      </div>
    </div>
  </div>
</section>
<? 
  include('footer_nomap.php'); 
  get_footer(); 
?>