<? 
  get_header();

  $home_page = query_posts('page_id=6');
?>
<div class="search_block_home">
  <? dynamic_sidebar( 'sidebar-1' ); ?>
</div>
<section class="sect home" style="background: url('<?=get_the_post_thumbnail_url($home_page[0]->ID);?>'); background-size: cover; background-position: 32% 0%;">
  <div class="wrapper">
    <div class="content">
      <div class="home_head">
        <div class="home_head_logo">
          <img src="<?=get_stylesheet_directory_uri();?>/img/logo.png"/>
          <span><?=bloginfo('description');?></span>
        </div>
        <div class="home_head_contacts">
          <p>Режим работы</p>
          <p>ПН&mdash;СБ с&nbsp;9:00 до&nbsp;21:00</p>
          <p>Воскресенье&nbsp;&mdash; выходной</p>
        </div>
      </div>
      <div class="home_caption">
        <p><?=trim($home_page[0]->post_content);?></p>
        <a class="btn btn_head" href="<?=get_field('btn_head', $home_page[0]->ID);?>" target="_self" data-btn-text="подробнее">подробнее</a>
      </div>
    </div>
  </div>
</section>
<?
  $service_post = get_posts(
    array(
      'category_name'=>'service',
      'meta_key'    => 'service_in_home',
      'meta_compare' => '==',
      'meta_value'  =>'1',
      'orderby'=>'date', 
      'order'=>'ASC',
      'posts_per_page' => 6,
    )
  );
?>
<section class="sect service">
  <div class="wrapper">
    <div class="content">
      <img class="sect_icon" src="<?=get_stylesheet_directory_uri();?>/images/icons/svg/service.svg"/>
      <h1>Услуги</h1>
      <div class="content_view service_view">
        <? foreach($service_post as $service) : ?>
          <div class="service_view_block">
          	<?
          		$is_modal = trim(strip_tags(get_field('modals_service', $service->ID)));
          		if($is_modal && $is_modal != ''){
          			echo '<h2><p id="modal" data-modal-id="service'.$service->ID.'">'.$service->post_title.'</p></h2>';
          		} else {
          			echo '<h2>'.$service->post_title.'</h2>';
          		}
          	?>
            <?=my_typograf($service->post_content);?>
          </div>
        <? endforeach; ?>
      </div>
      <a class="btn btn_dark" href="../service/" target="_self" data-btn-text="полный список услуг">полный список услуг</a>
    </div>
  </div>
</section>
<div class="modals modals_service modal_rule" id="modal" data-modal-id="service0" data-modal-open="false">
    <div class="modals_close"></div>
        <div class="modals_service_body">
            <?
				$regulations = query_posts('page_id=782');
				
				echo my_typograf($regulations[0]->post_content);
			?>
        </div>
</div>
<?
  foreach($service_post as $service){
    $modal = get_field('modals_service', $service->ID);
    
    if($modal && $modal != ''){
      ?>
        <div class="modals modals_service" id="modal" data-modal-id="service<?=$service->ID;?>" data-modal-open="false">
          <div class="modals_close"></div>
          <div class="modals_service_body">
            <?=my_typograf($modal);?>
          </div>
        </div>
      <?
    }
  }

  $service_caprtion_modal = get_posts(
    array(
      'category_name'=>'service_caption',
      'meta_key'    => 'service_caption_in_home',
      'meta_compare' => '==',
      'meta_value'  =>'1',
    )
  );

  foreach($service_caprtion_modal as $service){
      ?>
        <div class="modals modals_service" id="modal" data-modal-id="service<?=$service->ID;?>" data-modal-open="false">
          <div class="modals_close"></div>
          <div class="modals_service_body">
            <?=my_typograf($service->post_content);?>
          </div>
        </div>
      <?
  }
?>
<?
  $spec_page = query_posts('page_id=42');
  $info_page = query_posts('page_id=45');
?>
<section class="sect spec">
  <div class="wrapper">
    <div class="content">
      <h1><?=$spec_page[0]->post_title;?></h1>
      <div class="content_view spec_view">
        <div class="spec_view_block spec_view_block__image">
          <img src="<?=get_the_post_thumbnail_url($spec_page[0]->ID);?>" alt="<?=$spec_page[0]->post_title;?>"/>
        </div>
        <div class="spec_view_block spec_view_block__text">
          <?=my_typograf($spec_page[0]->post_content);?>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="sect info">
  <div class="wrapper">
    <div class="content">
      <?=my_typograf($info_page[0]->post_content);?>
    </div>
  </div>
</section>
<?
  $blog_post = get_posts(
    array(
      'category_name'=>'blog',
      'meta_key'    => 'blog_advice',
      'meta_compare' => '==',
      'meta_value'  =>'1',
      'orderby'=>'date', 
      'order'=>'ASC',
      'posts_per_page' => 1,
    )
  );
?>
<section class="sect advice">
  <div class="wrapper">
    <div class="content">
      <img class="sect_icon" src="<?=get_stylesheet_directory_uri();?>/images/icons/svg/advice.svg"/>
      <h1>Совет специалиста<small>Выходит каждый понедельник</small></h1>
      <div id="modal" class="btn btn_dark" data-modal-id="seller" data-btn-text="подписаться на советы">подписаться<span> на советы</span></div>
      <div class="content_view advice_view">
        <h3><?=$blog_post[0]->post_title;?></h3>
        <div class="advice_view__views">
          <?=my_typograf($blog_post[0]->post_content);?>
        </div>
      </div>
    </div>
  </div>
</section>
<div class="modals modals_form modals_seller" data-modal-id="seller" data-modal-open="false">
  <div class="modals_close"></div>
  <div class="modals_seller_body">
    <p>&nbsp;</p>
    <? dynamic_sidebar( 'sletter1' ); ?>
    <form id="form_seller" class="mod modals_seller_form">
      <div class="mod_consent">
        <input class="mod_consent_checkbox" id="seller_consent3" type="checkbox" value="1" checked="checked"/>
        <label for="seller_consent3">
          <p>Соглашаюсь на&nbsp;обработку <a id="modal" href="#" data-modal-id="politics">персональных данных</a>.</p>
        </label>
      </div>
      <button id="wysija_btn" class="wysija-submit wysija-submit-field btn btn_form" type="submit" data-btn-text="отправить">отправить</button>
    </form>
  </div>
  <p class="success">Спасибо. В ближайшее время мы свяжемся с вами.</p>
</div>
<?
  $review_post = get_posts(
    array(
      'category_name'=>'reviews',
      'meta_key'    => 'review_in_home',
      'meta_compare' => '==',
      'meta_value'  =>'1',
      'orderby'=>'date', 
      'order'=>'ASC',
      'posts_per_page' => 2,
    )
  );
?>
<section class="sect review">
  <div class="wrapper">
    <div class="content">
      <img class="sect_icon" src="<?=get_stylesheet_directory_uri();?>/images/icons/svg/review.svg"/>
      <h1>Отзывы клиентов клиники</h1>
      <div class="content_view review_view">
        <? foreach($review_post as $review) : ?>
          <div class="review_block">
            <?=my_typograf($review->post_content);?>
            <p class="review_name"><?=$review->post_title;?></p>
          </div>
        <? endforeach; ?>
      </div><a class="btn btn_dark" href="../reviews/" target="_self" data-btn-text="читать все отзывы">читать все отзывы</a>
    </div>
  </div>
</section>
<? 
  include('footer_maps.php'); 
  get_footer(); 
?>