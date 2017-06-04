<?php
/**
 * Remove plugin data on deactivate
 *
 *
 *
 * Author: Viacheslav Makarov <v.makarov@bazilio.ru>
 *
 */

function incode_movies_plugin_deactivate(){
	global $wpdb;

	$post_type = 'movies';
	$SQL = "SELECT ID FROM {$wpdb->posts} WHERE post_type = '$post_type'";
	$movies = $wpdb->get_results($SQL);

	foreach($movies as $movie){
		wp_delete_post($movie->ID, true);
	}

	$SQL = "SELECT term_id, taxonomy FROM {$wpdb->term_taxonomy}  WHERE taxonomy IN('taxgenres','taxcountries','taxyears','taxactors')";
	$tts = $wpdb->get_results($SQL);

	foreach($tts as $tt){
		wp_delete_term($tt->term_id, $tt->taxonomy);
	}
}

register_deactivation_hook(INCODE_MOVIES__PLUGIN_FILE, 'incode_movies_plugin_deactivate');
