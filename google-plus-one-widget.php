<?php

/*

Plugin Name: Google Plus One Widget

Description: Adds the new Google "+1" button on single posts pages and page type pages. Really simple just install and enjoy :)

Version: 0.1

Author: Karol Sojko

Author URI: http://www.karolsojko.com

*/

function add_google_plusone_header($head = ''){
	if(is_single() || is_page()){
		wp_enqueue_script('google_plusone_script', 'http://apis.google.com/js/plusone.js');
	}
}

function add_google_plusone_content($content = ''){
	if(is_single() || is_page()){
		$button = get_google_plusone_button();
		$content = $button . $content;
	}
	
	return $content;
}

function get_google_plusone_button($size = 'tall'){

	$button = '<g:plusone size="' . $size .'"></g:plusone>';

	return $button;
}

add_action('wp_print_scripts', 'add_google_plusone_header');
add_filter('the_content', 'add_google_plusone_content');


?>