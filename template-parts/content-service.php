<section class="sect service page views">
  <div class="wrapper">
    <div class="content">
      <img class="sect_icon" src="<?=get_stylesheet_directory_uri();?>/images/icons/svg/service.svg"/>
      <h1>Услуги</h1>
	  <p class="return"><a href="http://klinika.promolink.su/service" target="_self">&lt; вернуться ко всем услугам</a></p>
      <div class="content_view">
		<div class="blog_view">
          <div class="blog_view_articles">
            <h2><? the_title(); ?></h2>
            <div class="blog_view_articles_body">
              <?=my_typograf(get_the_content()); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<? setPostViews(get_the_ID()); ?>