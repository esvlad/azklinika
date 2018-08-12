<?
  $categories = get_categories(array('child_of'=>17, 'hide_empty' => 0));

  if(isset($_GET['search']) && $_GET['search'] != ''){
    $search_value = $_GET['search'];
  } else {
    $search_value = null;
  }

  if(isset($_GET['specialist'])){
    $search_checked = ' checked';
  } else {
    $search_checked = null;
  }
?>
<section class="sect blog">
  <div class="wrapper">
    <div class="content">
      <img class="sect_icon" src="<?=get_stylesheet_directory_uri();?>/images/icons/svg/blog.svg"/>
      <h1>Блог</h1>
      <div class="blog_params">
        <form id="search_blog" class="blog_search" action="<?=site_url();?>/blog/" method="GET">
          <div class="form_row">
            <input type="text" name="search" value="<?=$search_value;?>" placeholder="Быстрый поиск по блогу"/>
            <input class="mob" type="submit" value="Искать"/>
          </div>
          <div class="form_row form_checkbox">
            <input class="check chblog" id="blog_search_check" type="checkbox" name="specialist" value="true"<?=$search_checked;?>/>
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
      <? if(isset($_GET['search']) && $_GET['search'] != '') : ?>
        <?
          $args = array(
            'category_name'=>'blog',
            's'=> $_GET['search'],
            'orderby'=>'date', 
            'order'=>'ASC',
            'posts_per_page' => 20,
          );

          if(isset($_GET['specialist'])){
            $args['meta_key'] = 'blog_our_specialist';
            $args['meta_compare'] = '==';
            $args['meta_value'] = '1';
          }

          $blog_search_post = new WP_Query($args);
        ?>
        <div class="content_view">
          <div class="blog_view">
             <? while($blog_search_post->have_posts()) : $blog_search_post->the_post(); ?>
              <div class="blog_block">
                <? 
                  foreach(get_the_category() as $category) {
                    if($category->parent != 0){
                      echo '<h3>'.$category->name.'</h3>';
                    }
                  }
                ?>
                <h2><a href="<? the_permalink(); ?>"><? the_title(); ?></a></h2>
                <?=my_typograf(get_the_content());?>
                <a class="btn btn_more" href="<? the_permalink(); ?>" target="_self" data-btn-text="Читать">Читать</a>
              </div>
            <? endwhile; wp_reset_query(); ?>
          </div>
          <?
            $args = array('category_name'=>'blog', 'numberposts' => 3, 'meta_key' => 'post_views_count', 'orderby' => 'meta_value_num', 'order' => 'DESC', 'posts_per_page' => 3);
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
        <?
          $blog_pag_args = array(
            'base' => '%_%',
            'format' => '?page=%#%',
            'current' => 1,
            'total'=>$blog_search_post->max_num_pages,
            'mid_size' => 2,
            'prev_next' => true,
            'prev_text' => '&nbsp;',
            'next_text' => '&nbsp;',
            'type' => 'list',
          );
          $blog_pagination = paginate_links($news_pag_args);
        ?>
        <div class="pagination display_none">
          <?=$blog_pagination;?>
        </div>
      <? else : ?>
        <div class="content_view">
          <div class="blog_view">
             <?
              $page = isset($_GET['page']) ? $_GET['page'] : 1;
              $cat_ID = get_query_var('cat');
              query_posts("cat=$cat_ID&paged=$page");
             ?>
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
                <?=my_typograf(get_the_content());?>
                <a class="btn btn_more" href="<? the_permalink(); ?>" target="_self" data-btn-text="Читать">Читать</a>
              </div>
            <? endwhile; wp_reset_query(); ?>
          </div>
          <?
            $args = array('category_name'=>'blog', 'numberposts' => 3, 'meta_key' => 'post_views_count', 'orderby' => 'meta_value_num', 'order' => 'DESC', 'posts_per_page' => 3);
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
        <?
          if(have_posts()){
            $blog_pag_args = array(
              'base' => '%_%',
              'format' => '?page=%#%',
              'show_all' => true,
              'prev_next' => false,
              'type' => 'array',
            );

            $blog_pagination = paginate_links($blog_pag_args);
            $blog_pagination_is_page = isset($_GET['page']) ? $_GET['page'] : 1;
          }
        ?>
        <? if(have_posts() && $blog_pagination) : ?>
          <div class="pagination">
            <ul>
              <? if($blog_pagination_is_page == 1) : ?>
                <li class="disable">В начало</li>
              <? else : ?>
                <li><a href="?page=1">В начало</a></li>
              <? endif; ?>

              <? foreach($blog_pagination as $pagination) : ?>
                <? if(strip_tags($pagination) == $blog_pagination_is_page) : ?>
                  <li class="active"><?=strip_tags($pagination);?></li>
                <? else : ?>
                  <li><a href="?page=<?=strip_tags($pagination);?>"><?=strip_tags($pagination);?></a></li>
                <? endif; ?>
              <? endforeach; ?>

              <? if($blog_pagination_is_page == count($blog_pagination)) : ?>
                <li class="disable">В конец</li>
              <? else : ?>
                <li><a href="?page=<?=count($blog_pagination);?>">В конец</a></li>
              <? endif; ?>
            </ul>
          </div>
        <? endif; ?>
      <? endif; ?>
      
    </div>
  </div>
</section>