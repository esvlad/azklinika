<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Private_clinic
 */

get_header(); ?>

<section class="sect home" style="background: url('images/home/head.jpg'); background-size: cover; background-position: 32% 0%;">
  <div class="wrapper">
    <div class="content">
      <div class="home_head">
        <div class="home_head_logo">
          <img src="images/logotype.png"/>
          <span>клиника неврологии и&nbsp;нейрореабилитации</span>
        </div>
        <div class="home_head_contacts">
          <p>Режим работы</p>
          <p>ПН&mdash;СБ с&nbsp;9:00 до&nbsp;21:00</p>
          <p>Воскресенье&nbsp;&mdash; выходной</p>
        </div>
      </div>
      <div class="home_caption">
        <p>Специализируемся на лечении позвоночника и&nbsp;восстановлении после инсульта и&nbsp;травм</p>
        <a class="btn btn_head" href="blog_page.php" target="_self" data-btn-text="подробнее">подробнее</a>
      </div>
    </div>
  </div>
</section>
<section class="sect service">
  <div class="wrapper">
    <div class="content">
      <img class="sect_icon" src="images/icons/service.png"/>
      <h1>Услуги</h1>
      <div class="content_view service_view">
        <div class="service_view_block">
          <h2><a href="../service/" target="_self"><span>Консультация </span></a></h2>
          <p>Нейрохирург, невролог, вертеброневролог, невролог&mdash;реабилитолог.</p>
          <p><a href="#" target="_self">Список врачей</a></p>
        </div>
        <div class="service_view_block">
          <h2><a href="../service/" target="_self"><span>Физиотерапия</span></a></h2>
          <p>Комплекс мер для лечения позвоночника: <abbr>УВТ</abbr>, магнито- и&nbsp;лазеротерапия, ультразвуковая терапия, электростимуляция.</p>
        </div>
        <div class="service_view_block">
          <h2><a href="../service/" target="_self"><span>Мануальные методики</span></a></h2>
          <p>Устранение или уменьшение явлений <abbr data-title="Определенное состояние мышц, при котором наблюдается ярко выраженный тонус, возрастающий при напряжении и&nbsp;вызывающий сопротивление при пассивном движении. Спастичность мешает свободно двигаться и&nbsp;говорить.">спастичности</abbr>, <abbr>контрактур</abbr> суставов; восстановление нервно-мышечных связей. Комплекс мер применяется при болях в&nbsp;позвоночнике, головных болях и&nbsp;после инсульта.</p>
        </div>
        <div class="service_view_block">
          <h2><a href="../service/" target="_self"><span>Рефлексотерапия</span></a></h2>
          <p>Метод лечения сосудов, спазмов, восстановление после инсультов и&nbsp;травм. <abbr>Корпоральная</abbr> рефлексотерапия и&nbsp;<abbr>аурикулотерапия</abbr>.</p>
        </div>
        <div class="service_view_block">
          <h2><a href="../service/" target="_self"><span>Лечение обмена веществ</span></a></h2>
          <p><abbr>Гирудотерапия</abbr> и&nbsp;<abbr>хиджама</abbr>.</p>
        </div>
        <div class="service_view_block">
          <h2><a href="../service/" target="_self"><span>Стационарная терапия</span></a></h2>
          <p>Круглосуточное пребывание в&nbsp;клинике при трудностях в&nbsp;движении после инсульта или травм. Комфортное и&nbsp;безопасное проведение курса лечения. Свой процедурный кабинет.</p>
        </div>
      </div><a class="btn btn_dark" href="#" target="_self" data-btn-text="полный список услуг">полный список услуг</a>
    </div>
  </div>
</section>
<section class="sect spec">
  <div class="wrapper">
    <div class="content">
      <h1>Главврач клиники&nbsp;&mdash; Хусаинов Альберт Ринатович</h1>
      <div class="content_view spec_view">
        <div class="spec_view_block spec_view_block__image"><img src="images/home/vrach.png" alt="Хусаинов Альберт Ринатович"/></div>
        <div class="spec_view_block spec_view_block__text">
          <p>Хусаинов&nbsp;А.&nbsp;Р. имеет богатый опыт и&nbsp;серьезные навыки нейрохирургического и&nbsp;нейроребилитационного лечения пациентов с&nbsp;травмой головного и&nbsp;спинного мозга, инсультов, заболеваний позвоночника.</p>
          <span class="mob more_text" data-more-block="spec_view_block__text">Читать целиком</span>
          <div class="mob_more_text">
            <p>Занятие научной деятельностью позволяет постоянно улучшать качество лечения благодаря:</p>
            <ul>
              <li>систематизации и&nbsp;анализу результатов лечения пациентов в&nbsp;клинике;</li>
              <li>применению в&nbsp;лечении пациентов методов доказательной медицины;</li>
              <li>регулярному участию в&nbsp;профильных конференциях, мастер-классах, школах;</li>
              <li>общению с&nbsp;лучшими специалистами в&nbsp;своей области, что значительно повышает профессиональную мотивацию.</li>
            </ul>
            <p><strong>Мы&nbsp;выбрали девизом нашей больницы фразу &laquo;Выздоровление неизбежно!&raquo;</strong></p>
          </div>
          <div class="spec_info">Альберт Ринатович&nbsp;&mdash; нейрохирург с&nbsp;17-летним опытом.</div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="sect info">
  <div class="wrapper">
    <div class="content">
      <div class="info_block">
        <img class="info_block_icon" src="images/icons/methods.png"/>
        <div class="info_block_caption">
          <h2>Методики лечения собственной разработки</h2>
          <p>За&nbsp;15&nbsp;лет работы нам удалось разработать множество методик по&nbsp;самым разным видам лечения и&nbsp;реабилитации.</p>
        </div>
      </div>
      <div class="info_block_mini">
        <p>Даже после окончания лечения ответим на&nbsp;любые вопросы устно или по&nbsp;телефону. Бесплатно.</p>
      </div>
      <div class="info_block"> <img class="info_block_icon" src="images/icons/methods2.png"/>
        <div class="info_block_caption">
          <h2>Поставили на&nbsp;ноги 105 пациентов</h2>
          <p>Мы&nbsp;опросили клиентов: из&nbsp;42&nbsp;опрошенных <b>по&nbsp;рекомендации</b> в&nbsp;клинику обратился 41.<br/><a href="../review/">Отзывы пациентов</a></p>
        </div>
      </div>
      <div class="info_block"> <img class="info_block_icon" src="images/icons/methods3.png"/>
        <div class="info_block_caption">
          <h2>Создание персональных программ лечения</h2>
          <p>У&nbsp;нас нет стандартных шаблонов. Каждый случай уникален, и&nbsp;подход&nbsp;&mdash; тоже.</p>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="sect advice">
  <div class="wrapper">
    <div class="content">
      <img class="sect_icon" src="images/icons/advice.png"/>
      <h1>Совет специалиста<small>Выходит каждый понедельник</small></h1>
      <div class="btn btn_dark" data-btn-text="подписаться на советы">подписаться<span> на советы</span></div>
      <div class="content_view advice_view">
        <h3>Рекомендации для предупреждения спортивных травм.</h3>
        <div class="advice_view__views">
          <div>
            <p><b>Подготовьтесь к&nbsp;физическим нагрузкам.</b> Определите, какие группы мышц будут задействованы, и&nbsp;начните их&nbsp;готовить. Проконсультируйтесь с&nbsp;врачом по&nbsp;поводу допустимой интенсивности и&nbsp;продолжительности нагрузок.</p>
            <p><b>Перед тренировкой растяните мышцы.</b> Мышцы и&nbsp;суставы необходимо &laquo;разогреть&raquo; перед интенсивными упражнениями. В&nbsp;то&nbsp;же время позвольте себе передышку после сильной нагрузки.</p>
            <p><b>Пользуйтесь соответствующим вашему виду спорта снаряжением.</b> Используйте спортивную обувь по&nbsp;назначению. В&nbsp;противном случае, например, занимаясь баскетболом или теннисом в&nbsp;кроссовках для бега, вы&nbsp;не&nbsp;обеспечите себе достаточную защиту и&nbsp;удобство. То, что дешевле, не&nbsp;всегда лучше. Бег в&nbsp;дешевой обуви может стать причиной дискомфорта и&nbsp;серьезных травм в&nbsp;будущем.</p>
            <p>Не&nbsp;насилуйте свое тело. Если физические упражнения не&nbsp;приносят удовольствия, проследите за&nbsp;техникой выполнения.</p>
            <span class="pad768 more_text" data-more-block="advice_view__views">Читать целиком</span>
          </div>
          <div>
            <p>Неправильное положение стопы или слишком большое расстояние между ногами может привести к&nbsp;травме. При необходимости обратитесь за&nbsp;советом к&nbsp;тренеру. Не&nbsp;стоит упражняться, если вы&nbsp;еще не&nbsp;оправились от&nbsp;травмы или болезни, так как физические нагрузки могут ухудшить состояние.</p>
            <p>Не&nbsp;пытайтесь &laquo;прыгнуть выше головы&raquo;, ведь так можно легко получить травму. Если почувствуете боль или головокружение, передохните. Продолжить упражнения можно только после нормализации самочувствия.</p>
            <p><b>Отдыхайте и&nbsp;расслабляйтесь!</b> <br>Даже профессиональные спортсмены берут выходные! По&nbsp;крайней мере раз в&nbsp;неделю позвольте телу отдохнуть.</p>
            <p class="advice_to_blog">Вы&nbsp;можете почитать предыдущие советы в&nbsp;<a href="blog.php" target="_self">Блоге.</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="sect review">
  <div class="wrapper">
    <div class="content">
      <img class="sect_icon" src="images/icons/review.png"/>
      <h1>Отзывы клиентов клиники</h1>
      <div class="content_view review_view">
        <div class="review_block">
          <p>Очень хорошая клиника, добропорядочные в&nbsp;ней люди и&nbsp;не&nbsp;только. Это слаженная команда из&nbsp;молодых людей с&nbsp;Красивой душой. От&nbsp;всей души благодарю Хусаинова Альберта Ринатовича. Рамиля Альфисовича, Аишу, и&nbsp;Галию Хасановну, низкий Вам поклон люди в&nbsp;белых халатах!!!! То, что вы&nbsp;сделали для меня просто не&nbsp;дали мне стать инвалидом. Какая я&nbsp;к&nbsp;вам приехала? И&nbsp;какая уехала от&nbsp;вас&nbsp;&mdash; совсем как новенькая. Огромное вам СПАСИБО! Благодарю ещё и&nbsp;за&nbsp;то, что предоставляете скидку пенсионерам, да&nbsp;ещё и&nbsp;бесплатные последние процедуры. Это немало важно для меня. Хорошо, что есть такие прекрасные и&nbsp;отзывчивые люди! Желаю вам крепкого здоровья, семейного благополучия, успехов в&nbsp;вашей благородной работе. <br>Г.&nbsp;Магнитогорск.</p>
          <p class="review_name">Галина М.</p>
        </div>
        <div class="review_block">
          <p>Хотелось&nbsp;бы выразить благодарность неврологу/мануальному терапевту Макееву Алексею Сергеевичу и&nbsp;физиотерапевту Горицкой Людмиле Владимировне (Университет). Грамотный подход, профессионализм и&nbsp;внимательность к&nbsp;проблеме помогли вылечить мою больную спину. Теперь могу ходить без боли. Спасибо!</p>
          <p class="review_name">Сергей</p>
        </div>
      </div><a class="btn btn_dark" href="reviews.php" target="_self" data-btn-text="читать все отзывы">читать все отзывы</a>
    </div>
  </div>
</section>

<?php
include('footer_maps.php');
get_footer();
