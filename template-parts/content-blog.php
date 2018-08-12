
<section class="sect blog page">
  <div class="wrapper">
    <div class="content">
      <img class="sect_icon" src="<?=get_stylesheet_directory_uri();?>/images/icons/svg/blog.svg"/>
      <h1>Блог</h1>
      <p class="return"><a href="<?site_url();?>/blog/" target="_self">вернуться ко&nbsp;всем записям</a> &gt; <a href="<?site_url();?>/blog/<?=get_the_category()[0]->slug;?>" target="_self">к&nbsp;рубрике <?=get_the_category()[0]->name;?></a></p>
      <div class="content_view">
        <div class="blog_view">
          <div class="blog_view_articles">
            <h2><? the_title(); ?></h2>
            <div class="blog_view_articles_body">
              <?=my_typograf(get_the_content()); ?>
            </div>
            <div class="social_repost">
              <span>Твитнуть</span>
              <span>Поделиться</span>
              <span>Рассказать друзьям</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<? setPostViews(get_the_ID()); ?>