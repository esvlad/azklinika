<?
  get_header();
  $reviews_post = new WP_Query(array('category_name'=>'reviews', 'orderby'=>'date', 'order'=>'DESC', 'posts_per_page' => 5));
?>
<section class="sect review page">
  <div class="wrapper">
    <div class="content">
      <img class="sect_icon" src="<?=get_stylesheet_directory_uri();?>/images/icons/svg/heart.svg"/>
      <h1>Отзывы</h1>
      <div id="modal" class="btn btn_dark" data-modal-id="review" data-btn-text="Оставить отзыв">Оставить отзыв</div>
      <div class="content_view review_page">
        <? $r = 1; ?>
        <? while($reviews_post->have_posts()) : ?>
          <? $reviews_post->the_post(); ?>
          <div class="review_page_block" data-list-item="<?=$r;?>">
            <?
              if( has_post_thumbnail() ) {
                the_post_thumbnail();
              }
            ?>
            <?=my_typograf(get_the_content()); ?>
          </div>
          <?$r++;?>
        <? endwhile; ?>
        <div class="review_page_col left">
        </div>
        <div class="review_page_col right">
        </div>
      </div>
      <?
        if($reviews_post->max_num_pages > 5){
            $review_pag_args = array(
              'base' => '%_%',
              'format' => '?page=%#%',
              'show_all' => true,
              'prev_next' => false,
              'type' => 'array',
            );

            $review_pagination = paginate_links($review_pag_args);
            $review_pagination_is_page = isset($_GET['page']) ? $_GET['page'] : 1;
        }
      ?>
      <? if($reviews_post->max_num_pages > 5) : ?>
        <div class="pagination">
          <ul>
              <? if($review_pagination_is_page == 1) : ?>
                <li class="disable">В начало</li>
              <? else : ?>
                <li><a href="?page=1">В начало</a></li>
              <? endif; ?>

              <? foreach($review_pagination as $pagination) : ?>
                <? if(strip_tags($pagination) == $review_pagination_is_page) : ?>
                  <li class="active"><?=strip_tags($pagination);?></li>
                <? else : ?>
                  <li><a href="?page=<?=strip_tags($pagination);?>"><?=strip_tags($pagination);?></a></li>
                <? endif; ?>
              <? endforeach; ?>

              <? if($review_pagination_is_page == count($review_pagination)) : ?>
                <li class="disable">В конец</li>
              <? else : ?>
                <li><a href="?page=<?=count($review_pagination);?>">В конец</a></li>
              <? endif; ?>
          </ul>
        </div>
      <? endif; ?>
    </div>
  </div>
</section>
<div class="modals modals_form modals_review" data-modal-id="review" data-modal-open="false">
  <div class="modals_close"></div>
  <div class="modals_recall_body">
    <p>Оставьте ваш отзыв, мы опубликуем его после проверки модератором.</p>
    <form id="form_review" class="mod modals_recall_form" enctype="multipart/form-data">
      <label>
        <p>Ваше имя</p>
        <input class="required" type="text" name="name" value=""/>
      </label>
      <label>
        <p>Текст отзыва</p>
        <textarea class="required" name="review_text"></textarea>
      </label>
      <div class="form_files">
        <input id="review_file" type="file" name="review_file" value="">
        <label for="review_file" class="clearfix">
          <p>Прикрепите файл</p>
          <div class="form_files_area"></div>
          <div class="btn btn_more" data-btn-text="Обзор">Обзор</div>
          <p class="format">Разрешенные форматы: JPG, PNG, GIF.</p>
        </label>
      </div>
      <div class="mod_consent">
        <input class="mod_consent_checkbox" id="recall_consent4" type="checkbox" value="1" checked="checked"/>
        <label for="recall_consent4">
          <p>Соглашаюсь на&nbsp;обработку <a id="modal" href="#" data-modal-id="politics">персональных данных</a>.</p>
        </label>
      </div>
      <button class="btn btn_form" type="submit" data-btn-text="отправить">отправить</button>
    </form>
  </div>
  <p class="success">Спасибо, ваш отзыв отправлен модератору.</p>
</div>
<? 
  include('footer_maps.php'); 
  get_footer(); 
?>