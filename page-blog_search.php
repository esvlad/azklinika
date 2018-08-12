<? 
  get_header();

  $categories = get_categories(array('child_of'=>17, 'hide_empty' => 0));
?>
<section class="sect blog blog_search">
  <div class="wrapper">
    <div class="content">
      <img class="sect_icon" src="<?=get_stylesheet_directory_uri();?>/images/icons/blog.png"/>
      <h1>Блог</h1>
      <div class="blog_params">
        <form class="blog_search" id="search_blog">
          <div class="form_row">
            <input type="text" name="search" value="" placeholder="Быстрый поиск по блогу"/>
            <input class="mob" type="submit" value="Искать"/>
          </div>
          <div class="form_row form_checkbox">
            <input class="check chblog" id="blog_search_check" type="checkbox" value="1"/>
            <label for="blog_search_check">Только статьи наших врачей</label>
          </div>
        </form>
        <div class="blog_rubric">
          <p>
            <span>Рубрики:</span>
            <? foreach($categories as $category) : ?>
              <a<?=blog_actvie_rubric($category->term_id, get_query_var('cat'));?> href="../blog/<?=$category->slug;?>" target="_self"><?=$category->name;?></a>
            <? endforeach; ?>
        </div>
      </div>
      <div class="content_view">
        <div class="blog_view">
           <? while(have_posts()) : the_post(); ?>
            <div class="blog_block">
              <? 
                foreach(get_the_category() as $category) {
                  if($category->parent != 0){
                    echo '<h3>'.$category->name.'</h3>';
                  }
                }
              ?>
              <h2><a href="<? the_permalink(); ?>"><? the_title(); ?></a></h2>
              <? the_content(); ?>
              <a class="btn btn_more" href="<? the_permalink(); ?>" target="_self" data-btn-text="Читать">Читать</a>
            </div>
          <? endwhile; wp_reset_query(); ?>
        </div>
        <?
          $args = array('category_name'=>'blog', 'numberposts' => 3, 'meta_key' => 'post_views_count', 'orderby' => 'meta_value_num', 'order' => 'DESC');
          query_posts($args);
        ?>
        <div class="blog_popular_articles">
          <div class="blog_popular_articles_block">
            <div class="blog_popular_articles_block__title">Популярные статьи</div>
            <ul class="blog_popular_articles_block__list">
              <? while ( have_posts() ) : the_post(); ?>
                <li><a href="<? the_permalink(); ?>" target="_self"><? the_title(); ?></a></li>
              <? endwhile; wp_reset_query(); ?>
            </ul>
          </div>
        </div>
      </div>
      <div class="pagination">
        <ul>
          <li class="disable">В начало</li>
          <li class="active">1</li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">4</a></li>
          <li><a href="#">5</a></li>
          <li><a href="#">В конец</a></li>
        </ul>
      </div>
    </div>
  </div>
</section>
<? 
  include('footer_maps.php'); 
  get_footer();