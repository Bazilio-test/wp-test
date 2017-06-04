<?php
/*
Plugin Name: InCode Movies
Description: Test task from InCode: movie catalog plug-in.
Version: 1.0.0
Author: Viacheslav Makarov
Author URI: http://bazilio.com/
Text Domain: incode-movies
*/

define('INCODE_MOVIES__PLUGIN_DIR', plugin_dir_path(__FILE__));
define('INCODE_MOVIES__PLUGIN_FILE', __FILE__);
define('INCODE_MOVIES__PLUGIN_URL', plugin_dir_url(__FILE__));
define('INCODE_MOVIES__VERSION', '1.0.0');

require_once(INCODE_MOVIES__PLUGIN_DIR . '/on_activate.php');
require_once(INCODE_MOVIES__PLUGIN_DIR . '/on_deactivate.php');

// Load css & js
//function incode_movies_enqueue_js_css(){
//	wp_enqueue_script('incode_movies', INCODE_MOVIES__PLUGIN_DIR . 'assets/incode-movie.js', null, INCODE_MOVIES__VERSION);
//}
wp_enqueue_style('incode_movies', INCODE_MOVIES__PLUGIN_URL . 'assets/incode-movies.css', null, INCODE_MOVIES__VERSION);

//add_action('wp_enqueue_scripts', 'incode_movies_enqueue_js_css');

// load localization
load_plugin_textdomain('incode-movies', false, dirname(plugin_basename(__FILE__)) . '/lang');

//Register taxonomies: Genres, Countries, Year and Actors

// Register taxonomie Genres:
add_action('init', 'create_taxGenres', 0);
function create_taxGenres(){
	$args = [
		'label'                 => __('Movie genres', 'incode-movies'),
		'labels'                => [
			'name'                       => _x('Movie genres', 'taxonomy general name', 'incode-movies'),
			'singular_name'              => _x('Мovie genre', 'taxonomy singular name', 'incode-movies'),
			'menu_name'                  => __('Genres', 'incode-movies'),
			'all_items'                  => __('All movie genres', 'incode-movies'),
			'edit_item'                  => __('Change movie genre', 'incode-movies'),
			'view_item'                  => __('View movie genre', 'incode-movies'),
			'update_item'                => __('Update movie genre', 'incode-movies'),
			'add_new_item'               => __('Add new movie genre', 'incode-movies'),
			'new_item_name'              => __('Movie genre', 'incode-movies'),
			'parent_item'                => __('Parent', 'incode-movies'),
			'parent_item_colon'          => __('Parent:', 'incode-movies'),
			'search_items'               => __('Search movie genres', 'incode-movies'),
			'popular_items'              => __('Popular genres', 'incode-movies'),
			'separate_items_with_commas' => __('Separate genres with commas', 'incode-movies'),
			'add_or_remove_items'        => __('Add or remove genre', 'incode-movies'),
			'choose_from_most_used'      => __('Choose from most used genres', 'incode-movies'),
			'not_found'                  => __('Genres not found.', 'incode-movies'),
		],
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'show_in_nav_menus'     => true,
		'show_tagcloud'         => true,
		'show_in_quick_edit'    => true,
		'meta_box_cb'           => null,
		'show_admin_column'     => false,
		'description'           => '',
		'hierarchical'          => false,
		'update_count_callback' => '',
		'query_var'             => true,
		'rewrite'               => [
			'slug'         => 'taxgenres',
			'with_front'   => false,
			'hierarchical' => true,
			'ep_mask'      => EP_NONE,
		],
		'sort'                  => null,
		'_builtin'              => false,
	];
	register_taxonomy('taxgenres', ['movies'], $args);
}

// Register taxonomie Countries:
add_action('init', 'create_taxCountries', 0);
function create_taxCountries(){
	$args = [
		'label'                 => __('Сountries', 'incode-movies'),
		'labels'                => [
			'name'                       => _x('Country producers of the film', 'taxonomy general name', 'incode-movies'),
			'singular_name'              => _x('Сountry', 'taxonomy singular name', 'incode-movies'),
			'menu_name'                  => __('Countries', 'incode-movies'),
			'all_items'                  => __('All countries', 'incode-movies'),
			'edit_item'                  => __('Change country', 'incode-movies'),
			'view_item'                  => __('View country', 'incode-movies'),
			'update_item'                => __('Update country', 'incode-movies'),
			'add_new_item'               => __('Add new country', 'incode-movies'),
			'new_item_name'              => __('Country', 'incode-movies'),
			'parent_item'                => __('Parent', 'incode-movies'),
			'parent_item_colon'          => __('Parent:', 'incode-movies'),
			'search_items'               => __('Search country', 'incode-movies'),
			'popular_items'              => __('Popular countries', 'incode-movies'),
			'separate_items_with_commas' => __('Separate countries with commas', 'incode-movies'),
			'add_or_remove_items'        => __('Add or remove country', 'incode-movies'),
			'choose_from_most_used'      => __('Choose from most used countries', 'incode-movies'),
			'not_found'                  => __('Countries not found.', 'incode-movies'),
		],
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'show_in_nav_menus'     => true,
		'show_tagcloud'         => true,
		'show_in_quick_edit'    => true,
		'meta_box_cb'           => null,
		'show_admin_column'     => false,
		'description'           => '',
		'hierarchical'          => false,
		'update_count_callback' => '',
		'query_var'             => true,
		'rewrite'               => [
			'slug'         => 'taxcountries',
			'with_front'   => false,
			'hierarchical' => true,
			'ep_mask'      => EP_NONE,
		],
		'sort'                  => null,
		'_builtin'              => false,
	];
	register_taxonomy('taxcountries', ['movies'], $args);
}

// Register taxonomie Year:
add_action('init', 'create_taxYears', 0);
function create_taxYears(){
	$args = [
		'label'                 => __('Years of movie releases', 'incode-movies'),
		'labels'                => [
			'name'                       => _x('Year of movie release', 'taxonomy general name', 'incode-movies'),
			'singular_name'              => _x('Year of movie release', 'taxonomy singular name', 'incode-movies'),
			'menu_name'                  => __('Years', 'incode-movies'),
			'all_items'                  => __('All years of releases', 'incode-movies'),
			'edit_item'                  => __('Change year of release', 'incode-movies'),
			'view_item'                  => __('View year of release', 'incode-movies'),
			'update_item'                => __('Update year of release', 'incode-movies'),
			'add_new_item'               => __('Add new year of release', 'incode-movies'),
			'new_item_name'              => __('Year', 'incode-movies'),
			'parent_item'                => __('Parent', 'incode-movies'),
			'parent_item_colon'          => __('Parent:', 'incode-movies'),
			'search_items'               => __('Search by year of release', 'incode-movies'),
			'popular_items'              => __('Popular years of releases', 'incode-movies'),
			'separate_items_with_commas' => __('Separate years with commas', 'incode-movies'),
			'add_or_remove_items'        => __('Add or remove year', 'incode-movies'),
			'choose_from_most_used'      => __('Choose from most used years', 'incode-movies'),
			'not_found'                  => __('Year of release not found.', 'incode-movies'),
		],
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'show_in_nav_menus'     => true,
		'show_tagcloud'         => true,
		'show_in_quick_edit'    => true,
		'meta_box_cb'           => null,
		'show_admin_column'     => false,
		'description'           => '',
		'hierarchical'          => false,
		'update_count_callback' => '',
		'query_var'             => true,
		'rewrite'               => [
			'slug'         => 'taxyears',
			'with_front'   => false,
			'hierarchical' => true,
			'ep_mask'      => EP_NONE,
		],
		'sort'                  => null,
		'_builtin'              => false,
	];
	register_taxonomy('taxyears', ['movies'], $args);
}

// Register taxonomie Actors:
add_action('init', 'create_taxActors', 0);
function create_taxActors(){
	$args = [
		'label'                 => __('Actors', 'incode-movies'),
		'labels'                => [
			'name'                       => _x('Actors', 'taxonomy general name', 'incode-movies'),
			'singular_name'              => _x('Actor', 'taxonomy singular name', 'incode-movies'),
			'menu_name'                  => __('Actors', 'incode-movies'),
			'all_items'                  => __('All actors', 'incode-movies'),
			'edit_item'                  => __('Change actor', 'incode-movies'),
			'view_item'                  => __('View actor', 'incode-movies'),
			'update_item'                => __('Update actor', 'incode-movies'),
			'add_new_item'               => __('Add new actor', 'incode-movies'),
			'new_item_name'              => __('Actor', 'incode-movies'),
			'parent_item'                => __('Parent', 'incode-movies'),
			'parent_item_colon'          => __('Parent:', 'incode-movies'),
			'search_items'               => __('Search actors', 'incode-movies'),
			'popular_items'              => __('Popular actors', 'incode-movies'),
			'separate_items_with_commas' => __('Separate actors with commas', 'incode-movies'),
			'add_or_remove_items'        => __('Add or remove actor', 'incode-movies'),
			'choose_from_most_used'      => __('Choose from most used actors', 'incode-movies'),
			'not_found'                  => __('Actors not found.', 'incode-movies'),
		],
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'show_in_nav_menus'     => true,
		'show_tagcloud'         => true,
		'show_in_quick_edit'    => true,
		'meta_box_cb'           => null,
		'show_admin_column'     => false,
		'description'           => '',
		'hierarchical'          => false,
		'update_count_callback' => '',
		'query_var'             => true,
		'rewrite'               => [
			'slug'         => 'taxactors',
			'with_front'   => false,
			'hierarchical' => true,
			'ep_mask'      => EP_NONE,
		],
		'sort'                  => null,
		'_builtin'              => false,
	];
	register_taxonomy('taxactors', ['movies'], $args);
}


// register custom post type "Movies"
add_action('init', 'register_post_movies', 0);
function register_post_movies(){
	$post_type = 'movies';
	$args = [
		'label'                => _x('Movies', 'Post Type General Name', 'incode-movies'),
		'labels'               => [
			'name'                  => _x('Movies', 'Post Type General Name', 'incode-movies'),
			'singular_name'         => _x('Movie', 'Post Type Singular Name', 'incode-movies'),
			'add_new'               => __('Add new', 'incode-movies'),
			'add_new_item'          => __('Add new movie', 'incode-movies'),
			'edit_item'             => __('Edit movie', 'incode-movies'),
			'new_item'              => __('New movie', 'incode-movies'),
			'view_item'             => __('View movie info', 'incode-movies'),
			'search_items'          => __('Search movies', 'incode-movies'),
			'not_found'             => __('Movies not found', 'incode-movies'),
			'not_found_in_trash'    => __('Movies not found in trash', 'incode-movies'),
			'parent_item_colon'     => null,
			'all_items'             => __('All movies', 'incode-movies'),
			'archives'              => __('Archives of movies', 'incode-movies'),
			'insert_into_item'      => __('Insert in movie info', 'incode-movies'),
			'uploaded_to_this_item' => _x('Uploaded to his movie:', 'incode-movies'),
			'featured_image'        => __('Miniature of movie', 'incode-movies'),
			'set_featured_image'    => __('Set miniature of movie', 'incode-movies'),
			'remove_featured_image' => __('Remove miniature of movie', 'incode-movies'),
			'use_featured_image'    => __('Use miniature of movie', 'incode-movies'),
			'menu_name'             => __('Movies', 'incode-movies'),
			'name_admin_bar'        => __('Movie', 'incode-movies'),
			'items_list'            => __('List of movies', 'incode-movies'),
			'items_list_navigation' => __('Page navigation', 'incode-movies'),
			'filter_items_list'     => __('Filter', 'incode-movies'),
		],
		'description'          => '',
		'public'               => true,
		'exclude_from_search'  => true,
		'publicly_queryable'   => true,
		'show_ui'              => true,
		'show_in_nav_menus'    => true,
		'show_in_menu'         => true,
		'show_in_admin_bar'    => true,
		'menu_position'        => 5,
		'menu_icon'            => 'dashicons-video-alt2',
		'map_meta_cap'         => null,
		'hierarchical'         => false,
		'supports'             => [
			'title',
			'editor',
			'author',
			'thumbnail',
			'excerpt', // Цитата, отрывок.
			'trackbacks', // Отправить обратные ссылки.
			//'custom-fields', // Произвольные поля.
			'comments',
			'revisions', // Сохраняет версии.
			'page-attributes', // Атрибуты.
			'post-formats', // Формат записи.
		],
		'register_meta_box_cb' => null, // Обеспечивает обратный вызов функции, которая требуется при настройке метабоксов в разделе редактирования. По умолчанию: null.
		'taxonomies'           => ['taxgenres', 'taxcountries', 'taxyears', 'taxactors'],
		'has_archive'          => true, // Включает архивы данного типа записи. Будет использоваться значение $post_type как ярлык архива по умолчанию. По умолчанию: false
		// Возможность перезаписи для данного типа записи. Чтобы предотвратить перезапись, используют значение false. По умолчанию: true и значение $post_type используется как ярлык.
		'rewrite'              => [
			'slug'       => $post_type,
			'with_front' => false,
			'feeds'      => false,
			'pages'      => true,
		],
		'permalink_epmask'     => EP_PERMALINK,
		'query_var'            => true,
		'can_export'           => true,
		'delete_with_user'     => null,
		'show_in_rest'         => false,
		'rest_base'            => $post_type, // Базовый ярлык данного типа записи когда доступно использование REST API. По умолчанию: значение $post_type.
		'_builtin'             => false,
	];
	register_post_type($post_type, $args);
}

// Add a metabox for custom fields
function movies_meta_box(){
	add_meta_box(
		'movies_meta_box', // Идентификатор(id)
		__('Additional information about the film', 'incode-movies'), // Заголовок области с мета-полями(title)
		'show_movies_metabox', // Вызов(callback)
		'movies', // Тип поста, в котором будет отображаться метабокс
		'normal',
		'high');
}

add_action('add_meta_boxes', 'movies_meta_box');

//Description of custom fields
$movies_meta_fields = [
	['id' => 'show_price', 'label' => __('Cost of the movie show', 'incode-movies')],
	['id' => 'release_date', 'label' => __('Release date of the film', 'incode-movies'), 'descr' => __('Enter a date in format of dd.mm.yyy', 'incode-movies')]
];

// Drow meta fields
function show_movies_metabox(){
	global $movies_meta_fields;  // Обозначим наш массив с полями глобальным
	global $post;  // Глобальный $post для получения id создаваемого/редактируемого поста

	// Выводим скрытый input, для верификации. Безопасность прежде всего!
	echo '<input type="hidden" name="custom_meta_box_nonce" value="' . wp_create_nonce(basename(__FILE__)) . '" />';

	$price = $movies_meta_fields[0];
	$meta_price = get_post_meta($post->ID, $price['id'], true);

	$release = $movies_meta_fields[1];
	$meta_release = get_post_meta($post->ID, $release['id'], true);
	$release_value = convert_date_YMD2DMY($meta_release);

	echo '<table class="form-table"><tr>';
	echo '<td><label style="font-weight: 700;" for="' . $price['id'] . '">' . $price['label'] . ':</label> <input type="text" name="' . $price['id'] . '" id="' . $price['label'] . '" value="' . $meta_price . '" size="10" /></td>';
	echo '<td><label style="font-weight: 700;" for="' . $release['id'] . '">' . $release['label'] . ':</label> <input type="text" name="' . $release['id'] . '" id="' . $release['label'] . '" value="' . $release_value . '" size="10" /> ' . $release['label'] . '</td>';
	echo '</tr></table>';
}

/**
 * Convert date string from YYYY-MM-DD to DD.MM.YYYY
 *
 * @param $dateYMD - date in format YYYY-MM-DD
 *
 * @return string
 */
function convert_date_YMD2DMY($dateYMD){
	if(preg_match('/^([1-2]\d{3})\-((?:0[1-9])|(?:1[0-2]))\-((?:0[1-9])|(?:[1-2][0-9])|(?:3[0-1]))$/', $dateYMD, $matches)){
		return $matches[3] . '.' . $matches[2] . '.' . $matches[1];
	}
	return '';
}

/**
 * Save data from custome meta fields
 *
 * @param $post_id
 */
function save_movies_meta_fields($post_id){
	global $movies_meta_fields;

	// проверяем наш проверочный код
	if(!wp_verify_nonce($_POST['custom_meta_box_nonce'], basename(__FILE__))) return;
	// Проверяем авто-сохранение
	if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
	// Проверяем права доступа
	if('page' == $_POST['post_type']){
		if(!current_user_can('edit_page', $post_id)) return;
	}elseif(!current_user_can('edit_post', $post_id)) return;

	$old = get_post_meta($post_id, 'show_price', true);
	$new = $_POST['show_price'];
	if($new && $new != $old){
		update_post_meta($post_id, 'show_price', $new);
	}elseif('' == $new && $old){
		delete_post_meta($post_id, 'show_price', $old);
	}

	$old = get_post_meta($post_id, 'release_date', true);
	$new = $_POST['release_date'];
	if($new && preg_match('%^((?:[1-9])|(?:0[1-9])|(?:[1-2][0-9])|(?:3[0-1]))(?:[\.\-\/])((?:[1-9])|(?:0[1-9])|(?:1[0-2]))(?:[\.\-\/])([1-2]\d{3})$%i', $new, $matches)){
		$new = $matches[3] . '-' . substr(('00' . $matches[2]), -2) . '-' . substr(('00' . $matches[1]), -2);
	}else{
		$new = '';
	}
	if($new && $new != $old){
		update_post_meta($post_id, 'release_date', $new);
	}elseif('' == $new && $old){
		delete_post_meta($post_id, 'release_date', $old);
	}

	return;
}

add_action('save_post', 'save_movies_meta_fields');


//Register custome template
add_filter('template_include', 'include_template_function', 1);

function include_template_function($template_path){
	if(get_post_type() == 'movies'){
		if(is_single()){
			$template_path = INCODE_MOVIES__PLUGIN_DIR . '/templates/single.php';
		}else if(is_archive()){
			$template_path = INCODE_MOVIES__PLUGIN_DIR . '/templates/archive.php'; //-
		}
	}
	return $template_path;
}

add_action('loop_start', 'add_banner_before_movie_list');
function add_banner_before_movie_list($WPQuery){
	if(get_post_type() == 'movies' && get_option('iconv_movies_archive_loop') == 'now'){
		echo '<div class="incode-movies-banner">Баннер ДО списка</div>';
	}
}

add_action('loop_end', 'add_banner_after_movie_list');
function add_banner_after_movie_list($WPQuery){
	if(get_post_type() == 'movies' && get_option('iconv_movies_archive_loop') == 'now'){
		echo '<div class="incode-movies-banner">Баннер ПОСЛЕ списка</div>';
	}
}
