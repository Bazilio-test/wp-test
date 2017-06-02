<?php
/*
Plugin Name: InCode Movies
Description: Test task from InCode: movie catalog plug-in.
Version: 1.0.0
Author: Viacheslav Makarov
Author URI: http://bazilio.com/
Text Domain: incode-movies
*/

// load localization
load_plugin_textdomain('incode-movies', false, dirname(plugin_basename(__FILE__)) . '/lang');

//Register taxonomies: Genres, Countries, Year and Actors

// Register taxonomie Genres:
add_action('init', 'create_taxGenres', 0);
function create_taxGenres(){
	$args = [
		//TODO подключить i18n ко всем текстовым ресурсам
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
		'hierarchical'          => true,
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
			'name'                       => _x('Сountries', 'taxonomy general name', 'incode-movies'),
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
		'hierarchical'          => true,
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
			'name'                       => _x('Years of movie releases', 'taxonomy general name', 'incode-movies'),
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
		'hierarchical'          => true,
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
		'hierarchical'          => true,
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
			'insert_into_item'      => __('Insert into movie info', 'incode-movies'),
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
		'description'          => '', // Короткое описание записи/страницы. По умолчанию: ''.
		'public'               => true, // Управление видимостью в админ-панели ('show_in_nav_menus', 'show_ui') и внешнем фронтэнде ('exclude_from_search', 'publicly_queryable'). По умолчанию: false.
		'exclude_from_search'  => true, // Исключить ли записи из результатов поиска фронтэнда. По умолчанию: значение аргумента 'public'.
		'publicly_queryable'   => true, // Доступность на внешнем сайте: могут ли запросы быть выполненными во фронтэнде как часть parse_request(). По умолчанию: значение аргумента 'public'.
		'show_ui'              => true, // Возможность управления данным пользовательским типом записи в админ-панели. По умолчанию: значение аргумента 'public'.
		'show_in_nav_menus'    => true, // Доступность данного пользовательского типа записи в навигационном меню сайта. По умолчанию: значение аргумента 'public'.
		'show_in_menu'         => true, // Показывать ли тип записи в админ-меню. Значение аргумента 'show_ui' должно быть true. По умолчанию: значение аргумента 'show_ui'.
		'show_in_admin_bar'    => true, // Показывать ли тип записи в админ-баре. По умолчанию: значение аргумента 'show_in_menu'.
		'menu_position'        => 5,
		//TODO сменить иконку
		'menu_icon'            => 'dashicons-editor-textcolor',
		'map_meta_cap'         => null, // Использовать ли внутренние значения по умолчанию для управления правами. По умолчанию: null.
		'hierarchical'         => false, // Является ли тип записи иерархическим (т.е. страницей). Позволяет установливать родительскую страницу. По умолчанию: false.
		'supports'             => [
			'title', // Заголовок объекта типа записи.
			'editor', // Редактор контента.
			'author', // Автор.
			'thumbnail', // Миниатюра.
			'excerpt', // Цитата, отрывок.
			'trackbacks', // Отправить обратные ссылки.
			'custom-fields', // Произвольные поля.
			'comments', // Комментарии.
			'revisions', // Сохраняет версии.
			'page-attributes', // Атрибуты.
			'post-formats', // Формат записи.
		],
		'register_meta_box_cb' => null, // Обеспечивает обратный вызов функции, которая требуется при настройке метабоксов в разделе редактирования. По умолчанию: null.
		'taxonomies'           => ['taxgenres', 'taxcountries', 'taxyears', 'taxactors'], // Массив связанных таксономий для данного типа записи. Пользовательскую таксономию необходимо зарегестрировать через функцию register_taxonomy(). По умолчанию: без таксономий.
		'has_archive'          => false, // Включает архивы данного типа записи. Будет использоваться значение $post_type как ярлык архива по умолчанию. По умолчанию: false
		// Возможность перезаписи для данного типа записи. Чтобы предотвратить перезапись, используют значение false. По умолчанию: true и значение $post_type используется как ярлык.
		'rewrite'              => [
			'slug'       => $post_type, // Текст в ссылке. По умолчанию: значение $post_type.
			'with_front' => false, // Должна ли структура ссылки быть с базовым URL. Пример: если структура ссылки /blog/, то ссылка при соответствующих параметрах 'with_front' выглядит так: false->/news/, true->/blog/news/). По умолчанию: true.
			'feeds'      => false, // Должна ли структура постоянных ссылок быть встроена для этого типа записи. По умолчанию: значение 'has_archive'.
			'pages'      => true, // Должна ли структура ссылок обеспечена быть постраничной навигацией. По умолчанию: true.
		],
		'permalink_epmask'     => EP_PERMALINK, // Перезаписывает конечное значение. По умолчанию: EP_PERMALINK.
		'query_var'            => true, // Задается значение запроса для данного типа записи. По умолчанию: true - задается значение $post_type.
		'can_export'           => true, // Возможность данного типа записи быть экспортированным. По умолчанию: true.
		'delete_with_user'     => null, // Удалять ли записи данного типа при удалении их автора. По умолчанию: null.
		'show_in_rest'         => false, // Представлять ли этот тип записи в REST API. По умолчанию: false.
		'rest_base'            => $post_type, // Базовый ярлык данного типа записи когда доступно использование REST API. По умолчанию: значение $post_type.
		'_builtin'             => false, // Является ли этот тип записи собственным или встроенным. Рекомендация: не использовать этот аргумент при регистрации собственного типа сообщения. По умолчанию: false.
	];
	register_post_type($post_type, $args);
}