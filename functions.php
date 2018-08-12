<?php
/**
 * Private clinic functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Private_clinic
 */

if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'workers', 295, 300, true ); // 300 в ширину и без ограничения в высоту
	add_image_size( 'photos', 640, 1000, true ); // Кадрирование изображения
	add_image_size( 'review', 430, 400 );
}

add_filter( 'image_size_names_choose', 'my_custom_sizes' );

function my_custom_sizes( $sizes ) {
	return array_merge( $sizes, array(
		'workers' => 'Фото сотрудника',
		'photos' => 'Фото',
		'review' => 'Изображение к отзывам',
	) );
}

if ( ! function_exists( 'clinic_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function clinic_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Private clinic, use a find and replace
		 * to change 'clinic' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'clinic', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'clinic' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'clinic_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 248,
			'width'       => 58,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'clinic_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function clinic_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'clinic_content_width', 640 );
}
add_action( 'after_setup_theme', 'clinic_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function clinic_widgets_init() {
	register_sidebar( 
		array(
			'name'          => esc_html__( 'Sidebar', 'clinic' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'clinic' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '',
			'after_title'   => '',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Sletter', 'clinic' ),
			'id'            => 'sletter1',
			'description'   => esc_html__( 'Add widgets here.', 'clinic' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '',
			'after_title'   => '',
		)
	);
}
add_action( 'widgets_init', 'clinic_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function clinic_scripts() {
	wp_enqueue_style( 'clinic-style', get_stylesheet_uri() );

	wp_enqueue_script( 'clinic-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'clinic-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'clinic_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

function setPostViews($postID) {
	$count_key = 'post_views_count';
	$count = get_post_meta($postID, $count_key, true);

	if($count==»){
		$count = 0;
		delete_post_meta($postID, $count_key);
		add_post_meta($postID, $count_key, '0');
	} else {
		$count++;
		update_post_meta($postID, $count_key, $count);
	}
}

function getPostViews($postID){
	$count_key = 'post_views_count';
	$count = get_post_meta($postID, $count_key, true);

	if($count==»){
		delete_post_meta($postID, $count_key);
		add_post_meta($postID, $count_key, '0');
		return '0';
	}

	return $count;
}

function blog_actvie_rubric($term_id = true, $now_id = false){
	if($term_id == $now_id){
		return ' class="active"';
	} else {
		return false;
	}
}

add_action('init', 'blog_actvie_rubric');

function es_handler_form(){
	$message = '';
	$message .= 'Имя пользователя: '.$_POST['form_data']['user_name'] . '<br>';
	$message .= 'Телефон пользователя: '.$_POST['form_data']['user_phone'] . '<br><br>';

	if(!empty($_POST['form_data']['specialist'])){
		$message .= 'Специалист: '.$_POST['form_data']['specialist'] . '<br><br>';
	}

	if(!empty($_POST['form_data']['user_service'])){
		$message .= 'Выбранные услуги:<br>';
		$message .= $_POST['form_data']['user_service'] . '<br><br>';
	}

	if(!empty($_POST['form_data']['user_comment'])){
		$message .= 'Комментарий пользователя<br>';
		$message .= $_POST['form_data']['user_comment'];
	}

	$headers = array(
		'From: Аспект Здоровья <vlad@promolink.su>',
		'content-type: text/html',
	);

	wp_mail('az2941416@yandex.ru', 'Новое обращение', $message, $headers);

	die();
}

add_action('wp_ajax_handlerform', 'es_handler_form');
add_action('wp_ajax_nopriv_handlerform', 'es_handler_form');


function clinic_excerpt_length(){
	return 20;
}
add_filter('excerpt_length', 'clinic_excerpt_length');

function clinic_excerpt_more( $more_string = null ){
	return ' ...';
}
add_filter('excerpt_more', 'clinic_excerpt_more');

function clinic_add_rewiew_form(){
	$json = array();

	$post_data = array(
	  'post_title'    => $_POST['form_data']['user_name'],
	  'post_content'  => $_POST['form_data']['user_text'],
	  'post_status'   => 'Pending',
	  'post_author'   => 1,
	  'post_category' => array(22),
	);

	$post_id = wp_insert_post($post_data);

	if(isset($post_id) && $post_id > 0){
		$json['success'] = true;
		$json['post_id'] = $post_id;

		$message = 'Отзыв можете посмотреть по этой <a href="http://klinika.promolink.su/wp-admin/post.php?post='.$post_id.'&action=edit">ссылке</a>.';
		
		$headers = array(
			'From: Аспект Здоровья <az2941416@yandex.ru>',
			'content-type: text/html',
		);

		wp_mail('az2941416@yandex.ru', 'Новый отзыв', $message, $headers);

	} else {
		$json['error'] = 'Что-то пошло не так';
	}

	echo json_encode($json);

	die();
}

add_action('wp_ajax_addreview', 'clinic_add_rewiew_form');
add_action('wp_ajax_nopriv_addreview', 'clinic_add_rewiew_form');

function clinic_add_rewiew_post_media(){
	$json = array();

	require_once( ABSPATH . 'wp-admin/includes/media.php' );
	require_once( ABSPATH . 'wp-admin/includes/file.php' );
	require_once( ABSPATH . 'wp-admin/includes/image.php' );

	$url = $_POST['media_url'];
	$post_id = $_POST['post_id'];
	$desc = null;
	$return = 'id';

	$json['img_id'] = media_sideload_image($url, $post_id, $desc, $return);

	if(isset($json['img_id']) && $json['img_id'] > 0){
		$json['success'] = true;
		set_post_thumbnail($json['img_id'], $post_id);
	}

	echo json_encode($json);

	die();
}

add_action('wp_ajax_setattachmedia', 'clinic_add_rewiew_post_media');
add_action('wp_ajax_nopriv_setattachmedia', 'clinic_add_rewiew_post_media');

require get_template_directory() . '/inc/EMT.php';

function my_typograf($text){
	$typograf = new EMTypograph();
    $typograf->set_text($text);
    $typograf->setup(array(
		'Text.paragraphs' => 'off',
		'Text.breakline' => 'off',
		'OptAlign.oa_oquote' => 'off',
		'OptAlign.oa_obracket_coma' => 'off',
	));
    $result = $typograf->apply(); //$result = $text;

    return $result;
}