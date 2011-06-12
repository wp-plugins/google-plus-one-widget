<?php

/*

Plugin Name: Google Plus One Widget

Description: Adds the new Google "+1" button on single posts pages, page type pages and homepage under post titles. Really simple just install and enjoy :)

Version: 1.0

Author: Karol Sójko

Author URI: http://www.karolsojko.com

*/

function add_google_plusone_header($head = ''){
	wp_enqueue_script('google_plusone_script', 'http://apis.google.com/js/plusone.js');
}

function add_google_plusone_content($content = ''){
	$button = get_google_plusone_button();
  $position = get_option('google_plusone_widget_ks_position', 'top');

  if($position == 'top'){
    $content = $button . $content;
  }
  elseif($position == 'bottom'){
    $content = $content . $button;
  }
  else{
    $content = $button . $content . $button;
  }

  return $content;
}

function get_google_plusone_button($size = 'tall'){
  if(!is_single() && !is_page()){
    $button = '<div class="google_plusone_widget"><g:plusone 
      count="' . (get_option('google_plusone_widget_ks_count', true) ? 'true' : 'false') . '" href="' . get_permalink() . '" size="' . get_option('google_plusone_widget_ks_size', 'tall') .'"></g:plusone></div>';
  }
  else{
    $button = '<div class="google_plusone_widget"><g:plusone 
      count="' . (get_option('google_plusone_widget_ks_count', true) ? 'true' : 'false') . '" size="' . get_option('google_plusone_widget_ks_size', 'tall') .'"></g:plusone></div>';
  }


  return $button;
}

add_action('wp_print_scripts', 'add_google_plusone_header');
add_filter('the_content', 'add_google_plusone_content');


// admin pages

add_action('admin_menu', 'google_plusone_admin');

function google_plusone_admin(){
  add_options_page('Google +1 Widget', 'Google +1 Widget',
          'manage_options', 'google_plus_one_widget_menu', 'google_plus_one_admin_ref');
}

function google_plus_one_admin_ref(){
  require_once('google-plus-one-admin.php');
}

?>