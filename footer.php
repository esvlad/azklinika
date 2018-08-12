<div class="modals modals_form modals_rec" data-modal-id="rec" data-modal-open="false">
  <div class="modals_close"></div>
  <div class="modals_rec_body">
    <h3>Здравствуйте!</h3>
    <p>Пожалуйста, укажите верные данные, чтобы мы&nbsp;смогли связаться с&nbsp;вами и&nbsp;подтвердить запись.</p>
    <form id="form_rec" class="mod modals_rec_form clearfix">
      <div class="mod_col">
        <label>
          <p>Ваше имя</p>
          <input class="required" type="text" name="name" value=""/>
        </label>
        <label>
          <p>Номер телефона</p>
          <input class="required" type="text" name="phone" value=""/>
        </label>
        <div class="selected">
          <label>
            <p>Врач, к&nbsp;которому хотите попасть</p>
            <input class="selected_input" type="checkbox" name="vrach" value="Хусаинов А. Р."/>
            <div class="selected_group">
              <?
                $specialist_list = get_posts(
                  array(
                    'category_name'=>'workers',
                    'orderby'=>'date', 
                    'order'=>'ASC',
                  )
                );

                foreach($specialist_list as $specialist){
                  $specialist_name = get_field('name_in_modal', $specialist->ID);
                  echo '<p data-value="'.$specialist->ID.'">'.$specialist_name.'</p>';
                }
              ?>
            </div>
            <div class="selected_active"><span>Хусаинов А. Р.</span>
              <div class="sel"></div>
            </div>
          </label>
        </div>
      </div>
      <div class="mod_col">
        <label>
          <p>Повод для обращения:</p>
          <ul id="reason" class="text_area">
            <li class="input_area"><textarea name="comment" placeholder="Введите текст комментария..."></textarea></li>
          </ul>
        </label>
        <div class="mod_consent">
          <input class="mod_consent_checkbox" id="recall_consent" type="checkbox" value="1" checked="checked"/>
          <label for="recall_consent">
            <p>Соглашаюсь на&nbsp;обработку <a id="modal" href="#" data-modal-id="politics">персональных данных</a>.</p>
          </label>
        </div>
        <button class="btn btn_form" type="submit" data-btn-text="записаться">записаться</button>
      </div>
    </form>
  </div>
  <p class="success">Спасибо. В ближайшее время мы свяжемся с вами.</p>
</div>
<div class="modals modals_form modals_recall" data-modal-id="recall" data-modal-open="false">
  <div class="modals_close"></div>
  <div class="modals_recall_body">
    <p>Оставьте номер вашего телефона, и&nbsp;мы&nbsp;перезвоним вам в&nbsp;течение 15&nbsp;минут.</p>
    <form id="form_recall" class="mod modals_recall_form">
      <label>
        <p>Ваше имя</p>
        <input class="required" type="text" name="name" value=""/>
      </label>
      <label>
        <p>Номер телефона</p>
        <input class="required" type="text" name="phone" value=""/>
      </label>
      <div class="mod_consent">
        <input class="mod_consent_checkbox" id="recall_consent2" type="checkbox" value="1" checked="checked"/>
        <label for="recall_consent2">
          <p>Соглашаюсь на&nbsp;обработку <a id="modal" href="#" data-modal-id="politics">персональных данных</a>.</p>
        </label>
      </div>
      <button class="btn btn_form" type="submit" data-btn-text="отправить">отправить</button>
    </form>
  </div>
  <p class="success">Спасибо. В ближайшее время мы свяжемся с вами.</p>
</div>
<div class="modals modals_politics" data-modal-id="politics" data-modal-open="false">
  <div class="modals_close"></div>
  <div class="modals_politics_body">
    <h2>Политика конфиденциальности</h2>
    <p>Общество с&nbsp;Ограниченной Ответственностью &laquo;Аспект здоровья&raquo; уважает Ваше право и&nbsp;соблюдает конфиденциальность при заполнении, передачи и&nbsp;хранении ваших конфиденциальных сведений. Размещение заявки на&nbsp;сайте azklinika.ru означает ваше согласие на&nbsp;обработку данных и&nbsp;дальнейшей передачи ваших контактных данных компании ООО &laquo;Аспект здоровья&raquo;.</p>
    <p>Под персональными данными подразумевается информация, относящаяся к&nbsp;субъекту персональных данных, в&nbsp;частности, имя, контактные реквизиты (телефон, адрес электронной почты) и&nbsp;иные данные, относимые Федеральным законом от&nbsp;27&nbsp;июля 2006 года &#8470;&nbsp;152-ФЗ &laquo;О&nbsp;персональных данных&raquo; (далее&nbsp;&mdash; &laquo;Закон&raquo;) к&nbsp;категории персональных данных. Целью обработки персональных данных является оказание сайтом azklinika.ru информационно-справочных услуг, а&nbsp;также информирование об&nbsp;оказываемых услугах компании ООО &laquo;Аспект здоровья&raquo;.</p>
    <p>Отзыв согласия или запрос на&nbsp;прекращение обработки персональных данных можно отправить в&nbsp;электронном виде по&nbsp;адресу: <a href="mailto:az2007@yandex.ru">az2007@yandex.ru</a></p>
  </div>
</div>
<?php wp_footer(); ?>
<script>
  var ajaxurl = '<?= site_url() ?>/wp-admin/admin-ajax.php';
  var function_file = '<?=get_template_directory_uri();?>/function_file.php';
</script>

<script src="<?=get_stylesheet_directory_uri();?>/js/jquery/jquery.min.js"></script>
<script src="<?=get_stylesheet_directory_uri();?>/js/myscript.js"></script>
</body>
</html>
