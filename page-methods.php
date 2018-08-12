<? 
  get_header();

  $methods_page = query_posts('page_id=34');
?>
<section class="sect methods">
  <div class="wrapper">
    <div class="content">
      <img class="sect_icon" src="<?=get_stylesheet_directory_uri();?>/images/icons/svg/methods3.svg"/>
      <h1><?=$methods_page[0]->post_title;?></h1>
      <div class="content_view methods_view">
        <?=my_typograf($methods_page[0]->post_content);?>
      </div>
    </div>
  </div>
</section>
<? 
  include('footer_maps.php'); 
  get_footer(); 
?>