<? 
  get_header(); 

  $service_post = get_posts(
    array(
      'category_name'=>'service',
      'meta_key'    => 'service_in_page',
      'meta_compare' => '==',
      'meta_value'  =>'1',
      'orderby'=>'date', 
      'order'=>'ASC',
      'posts_per_page' => 20,
    )
  );

  $service_modals = get_posts(
    array(
      'category_name' => 'service_caption',
      'orderby'=>'date', 
      'order'=>'ASC',
      'posts_per_page' => 100,
    )
  );
?>
<section class="sect service page">
  <div class="wrapper">
    <div class="content">
      <img class="sect_icon" src="<?=get_stylesheet_directory_uri();?>/images/icons/svg/service.svg"/>
      <h1>Услуги</h1>
      <div class="content_view service_view">
        <? $s = 0; ?>
        <? foreach($service_post as $service) : ?>
          <? if($s == 5) : ?>
            <div class="service_view_block"></div>
          <? endif; ?>
            <div class="service_view_block">
              <?
                /*$is_modal = get_field('modals_service', $service->ID);
                if($is_modal && $is_modal != ''){
                  echo '<h2><a href="'.$service->the_permalink.'" target="_self"><span>'.$service->post_title.'</span></a></h2>';
                } else {
                  echo '<h2>'.$service->post_title.'</h2>';
                }*/
              ?>
              <?=my_typograf($service->post_content);?>
            </div>
          <? $s++; ?>
        <? endforeach; ?>
      </div>
    </div>
  </div>
</section>
<? 
  foreach($service_post as $service){
    $modal = get_field('modals_service', $service->ID);
    if($modal && $modal != ''){
      ?>
        <div class="modals modals_service" data-modal-id="service<?=$service->ID;?>" data-modal-open="false">
          <div class="modals_close"></div>
          <div class="modals_service_body">
            <?=my_typograf($modal);?>
          </div>
        </div>
      <?
    }
  }

  foreach($service_modals as $service_m){
    ?>
      <div class="modals modals_service" data-modal-id="service<?=$service_m->ID;?>" data-modal-open="false">
        <div class="modals_close"></div>
        <div class="modals_service_body">
          <?=my_typograf($service_m->post_content);?>
        </div>
      </div>
    <?
  }
 
  include('footer_maps.php'); 
  get_footer(); 