<?
  get_header();

  $consultations = new WP_Query(array('category_name'=>'consultations', 'orderby'=>'date', 'order'=>'DESC', 'nopaging' => true));
  $none_rubric_h = new WP_Query(array('category_name'=>'none_rubric_h', 'orderby'=>'date', 'order'=>'DESC', 'nopaging' => true));
  $phys_procedures = new WP_Query(array('category_name'=>'physiotherapeutic_procedures', 'orderby'=>'date', 'order'=>'DESC', 'nopaging' => true));
  $treatment_room = new WP_Query(array('category_name'=>'treatment_room', 'orderby'=>'date', 'order'=>'DESC', 'nopaging' => true));
  $ultrasonic_dopplerography = new WP_Query(array('category_name'=>'ultrasonic_dopplerography', 'orderby'=>'date', 'order'=>'DESC', 'nopaging' => true));
  $echocardiography = new WP_Query(array('category_name'=>'echocardiography', 'orderby'=>'date', 'order'=>'DESC', 'nopaging' => true));
  $ultrasound_examination = new WP_Query(array('category_name'=>'ultrasound_examination', 'orderby'=>'date', 'order'=>'DESC', 'nopaging' => true));
  $none_rubric_d1 = new WP_Query(array('category_name'=>'none_rubric_d1', 'orderby'=>'date', 'order'=>'DESC', 'nopaging' => true));
  $none_rubric_d2 = new WP_Query(array('category_name'=>'none_rubric_d2', 'orderby'=>'date', 'order'=>'DESC', 'nopaging' => true));
  $none_rubric_d3 = new WP_Query(array('category_name'=>'none_rubric_d3', 'orderby'=>'date', 'order'=>'DESC', 'nopaging' => true));
  $stacionar = new WP_Query(array('category_name'=>'stacionar', 'orderby'=>'date', 'order'=>'DESC', 'nopaging' => true));

  $priceList = new WP_Query(array('pagename'=>'price_list'));
  $price_list = get_field('price_list', $priceList->post->ID);
?>
<section class="sect price">
  <div class="wrapper">
    <div class="content"><img class="sect_icon" src="<?=get_stylesheet_directory_uri();?>/images/icons/svg/calc.svg"/>
      <h1>Цены<small>Все цены указаны в&nbsp;рублях</small></h1>
      <div class="price_search">
        <form id="search_price">
          <div class="form_row">
            <input type="text" name="search" value="" placeholder="Быстрый поиск услуг или процедур"/>
            <input class="remove" type="reset" value=""/>
          </div>
        </form>
      </div>
      <div class="content_view price_view">
        <div class="price_view_block search_result">
          <div class="price_block">
            <ul class="search_results"></ul>
          </div>
        </div>
        <div class="price_view_block visible top">
          <div class="price_block">
            <h2>Консультации врачей</h2>
            <ul class="list_row">
              <? while($consultations->have_posts()) : ?>
                <? $consultations->the_post(); ?>
                <li>
                  <div class="price_block__name">
                    <div class="price_block_wrapp" id="price_caption" data-price-id="<? the_ID(); ?>">
                      <p><? the_title(); ?></p>
                      <p><? the_field('price_subject'); ?></p>
                    </div>
                  </div>
                  <div class="price_block__price">
                    <p><? the_field('price_count'); ?></p>
                    <p><? the_field('duration_procedure'); ?></p>
                  </div>
                </li>
              <? endwhile; ?>
            </ul>
          </div>
        </div>
        <div class="price_view_block visible left">
          <div class="price_block">
            <h2>Лечебные процедуры</h2>
            <ul>
              <? while($none_rubric_h->have_posts()) : ?>
                <? $none_rubric_h->the_post(); ?>
                <li>
                  <div class="price_block__name">
                    <div class="price_block_wrapp" id="price_caption" data-price-id="<? the_ID(); ?>">
                      <p><? the_title(); ?></p>
                      <p><? the_field('price_subject'); ?></p>
                    </div>
                  </div>
                  <div class="price_block__price">
                    <p><? the_field('price_count'); ?></p>
                    <p><? the_field('duration_procedure'); ?></p>
                  </div>
                </li>
              <? endwhile; ?>
            </ul>
            <h3>Физиотерапевтические процедуры</h3>
            <ul>
              <? while($phys_procedures->have_posts()) : ?>
                <? $phys_procedures->the_post(); ?>
                <li>
                  <div class="price_block__name">
                    <div class="price_block_wrapp" id="price_caption" data-price-id="<? the_ID(); ?>">
                      <p><? the_title(); ?></p>
                      <p><? the_field('price_subject'); ?></p>
                    </div>
                  </div>
                  <div class="price_block__price">
                    <p><? the_field('price_count'); ?></p>
                    <p><? the_field('duration_procedure'); ?></p>
                  </div>
                </li>
              <? endwhile; ?>
            </ul>
          </div>
          <div class="price_block">
            <h2>Процедурный кабинет</h2>
            <ul>
              <? while($treatment_room->have_posts()) : ?>
                <? $treatment_room->the_post(); ?>
                <li>
                  <div class="price_block__name">
                    <div class="price_block_wrapp" id="price_caption" data-price-id="<? the_ID(); ?>">
                      <p><? the_title(); ?></p>
                      <p><? the_field('price_subject'); ?></p>
                    </div>
                  </div>
                  <div class="price_block__price">
                    <p><? the_field('price_count'); ?></p>
                    <p><? the_field('duration_procedure'); ?></p>
                  </div>
                </li>
              <? endwhile; ?>
            </ul>
          </div>
          <div class="price_all"><a href="<?=$price_list;?>" target="_blank">Посмотреть весь прайс</a></div>
        </div>
        <div class="price_view_block visible right">
          <div class="price_block">
            <h2>Диагностические процедуры</h2>
            <h3>Ультразвуковая доплерография (УЗДГ)</h3>
            <ul>
              <? while($ultrasonic_dopplerography->have_posts()) : ?>
                <? $ultrasonic_dopplerography->the_post(); ?>
                <li>
                  <div class="price_block__name">
                    <div class="price_block_wrapp" id="price_caption" data-price-id="<? the_ID(); ?>">
                      <p><? the_title(); ?></p>
                      <p><? the_field('price_subject'); ?></p>
                    </div>
                  </div>
                  <div class="price_block__price">
                    <p><? the_field('price_count'); ?></p>
                    <p><? the_field('duration_procedure'); ?></p>
                  </div>
                </li>
              <? endwhile; ?>
            </ul>
            <ul>
              <? while($echocardiography->have_posts()) : ?>
                <? $echocardiography->the_post(); ?>
                <li>
                  <div class="price_block__name">
                    <div class="price_block_wrapp" id="price_caption" data-price-id="<? the_ID(); ?>">
                      <p><? the_title(); ?></p>
                      <p><? the_field('price_subject'); ?></p>
                    </div>
                  </div>
                  <div class="price_block__price">
                    <p><? the_field('price_count'); ?></p>
                    <p><? the_field('duration_procedure'); ?></p>
                  </div>
                </li>
              <? endwhile; ?>
            </ul>
            <h3>Ультразвуковое исследование (УЗИ)</h3>
            <ul>
              <? while($ultrasound_examination->have_posts()) : ?>
                <? $ultrasound_examination->the_post(); ?>
                <li>
                  <div class="price_block__name">
                    <div class="price_block_wrapp" id="price_caption" data-price-id="<? the_ID(); ?>">
                      <p><? the_title(); ?></p>
                      <p><? the_field('price_subject'); ?></p>
                    </div>
                  </div>
                  <div class="price_block__price">
                    <p><? the_field('price_count'); ?></p>
                    <p><? the_field('duration_procedure'); ?></p>
                  </div>
                </li>
              <? endwhile; ?>
            </ul>
          </div>
          <div class="price_block small">
            <ul>
              <? while($none_rubric_d1->have_posts()) : ?>
                <? $none_rubric_d1->the_post(); ?>
                <li>
                  <div class="price_block__name">
                    <div class="price_block_wrapp" id="price_caption" data-price-id="<? the_ID(); ?>">
                      <p><? the_title(); ?></p>
                      <p><? the_field('price_subject'); ?></p>
                    </div>
                  </div>
                  <div class="price_block__price">
                    <p><? the_field('price_count'); ?></p>
                    <p><? the_field('duration_procedure'); ?></p>
                  </div>
                </li>
              <? endwhile; ?>
            </ul>
            <ul>
              <? while($none_rubric_d2->have_posts()) : ?>
                <? $none_rubric_d2->the_post(); ?>
                <li>
                  <div class="price_block__name">
                    <div class="price_block_wrapp" id="price_caption" data-price-id="<? the_ID(); ?>">
                      <p><? the_title(); ?></p>
                      <p><? the_field('price_subject'); ?></p>
                    </div>
                  </div>
                  <div class="price_block__price">
                    <p><? the_field('price_count'); ?></p>
                    <p><? the_field('duration_procedure'); ?></p>
                  </div>
                </li>
              <? endwhile; ?>
            </ul>
            <ul>
              <? while($none_rubric_d3->have_posts()) : ?>
                <? $none_rubric_d3->the_post(); ?>
                <li>
                  <div class="price_block__name">
                    <div class="price_block_wrapp" id="price_caption" data-price-id="<? the_ID(); ?>">
                      <p><? the_title(); ?></p>
                      <p><? the_field('price_subject'); ?></p>
                    </div>
                  </div>
                  <div class="price_block__price">
                    <p><? the_field('price_count'); ?></p>
                    <p><? the_field('duration_procedure'); ?></p>
                  </div>
                </li>
              <? endwhile; ?>
            </ul>
          </div>
          <div class="price_block small">
            <h2>Стационар и медобслуживание</h2>
            <ul>
              <? while($stacionar->have_posts()) : ?>
                <? $stacionar->the_post(); ?>
                <li>
                  <div class="price_block__name">
                    <div class="price_block_wrapp" id="price_caption" data-price-id="<? the_ID(); ?>">
                      <p><? the_title(); ?></p>
                      <p><? the_field('price_subject'); ?></p>
                    </div>
                  </div>
                  <div class="price_block__price">
                    <p><? the_field('price_count'); ?></p>
                    <p><? the_field('duration_procedure'); ?></p>
                  </div>
                </li>
              <? endwhile; ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<div class="modals modals_politics modal_price" data-modal-id="price" data-modal-open="false">
  <div class="modals_close"></div>
  <div class="modals_politics_body">
    <h2>&nbsp;</h2>
    <p>Выберите услуги, и&nbsp;они будут указаны в&nbsp;вашей заявке на&nbsp;приём к&nbsp;врачу.</p>
  </div>
  <div id="modal" data-modal-id="price"></div>
</div>
<? 
  include('footer_maps.php'); 
  get_footer();