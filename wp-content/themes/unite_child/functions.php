<?php
// Exit if accessed directly.
if(!defined('ABSPATH')){
	exit;
}

function unite_child_theme_enqueue_styles(){
	$parent_style = 'unite-style';
	wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.css');
	wp_enqueue_style('unite-child-style', get_stylesheet_directory_uri() . '/style.css', [$parent_style], wp_get_theme()->get('Version'));
}

add_action('wp_enqueue_scripts', 'unite_child_theme_enqueue_styles');
