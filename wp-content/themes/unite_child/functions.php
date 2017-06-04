<?php
// Exit if accessed directly.
if(!defined('ABSPATH')){
	exit;
}

add_action('wp_enqueue_scripts', 'unite_child_theme_enqueue_styles', 3);
function unite_child_theme_enqueue_styles(){
	$parent_style = 'unite-style';
	wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.css');
	wp_enqueue_style('unite-child-style', get_stylesheet_directory_uri() . '/style.css', [$parent_style], wp_get_theme()->get('Version'));
}

// Add ShortCode [lastmovies count="N"] which show last N released movies
add_shortcode("lastmovies", "lastmovies");
function lastmovies($atts){
	$movies_number = !empty($atts['count']) ? (int)$atts['count'] : 5;
	if($movies_number < 1) $movies_number = 5;

	$args = [
		'post_type'      => 'movies',
		'posts_per_page' => $movies_number,
		'meta_key'       => 'release_date',
		'orderby'        => 'meta_value',
		'order'          => 'DESC'
	];

	$query = new WP_Query($args);

	$content = '<div class="incode-movies-l5">';

	if($query->have_posts()){
		while($query->have_posts()){
			$query->the_post();
			$release = get_post_meta(get_the_ID(), 'release_date', true);
			$release_value = convert_date_YMD2DMY($release);
			$content .= '<div class="incode-movies-l5o"><span class="incode-movies-l5d">' . $release_value
				. '</span><span class="incode-movies-l5t"><a class="" href="' . get_permalink() . '">' . get_the_title() . '</a></span></div>';
		}
	}else{
		$content .= '<span class="incode-movies-l5no">' . __('Movies not found', 'incode-movies') . '</span>';
	}
	$content .= '</div>';
	wp_reset_query();
	return $content;
}

// Add ShortCode [incodemovies count="N" columns="M"] which show last N released movies placed in M columns
add_shortcode("incodemovies", "incodemovies");
function incodemovies($atts){
	$movies_number = !empty($atts['count']) ? (int)$atts['count'] : 4;
	if($movies_number < 1) $movies_number = 4;

	$columns = !empty($atts['columns']) ? (int)$atts['columns'] : 1;
	if($columns < 1) $cn = 12;
	elseif($columns <= 2) $cn = 6;
	elseif($columns <= 3) $cn = 4;
	elseif($columns <= 4) $cn = 3;
	else $cn = 2;

	$GLOBALS['unite_child_cn'] = $cn;

	$args = [
		'post_type'      => 'movies',
		'posts_per_page' => $movies_number,
		'meta_key'       => 'release_date',
		'orderby'        => 'meta_value',
		'order'          => 'DESC'
	];

	$query = new WP_Query($args);

	$content = '<div class="incode-movies-l5">';

	if($query->have_posts()){
		while($query->have_posts()){
			$query->the_post();
			load_template(get_stylesheet_directory() . '/content-one-movie-4-bootstrap.php', false);
		}
	}else{
		$content .= '<span class="incode-movies-l5no">' . __('Movies not found', 'incode-movies') . '</span>';
	}
	$content .= '</div>';
	unset($GLOBALS['unite_child_cn']);
	wp_reset_query();
	return $content;
}
