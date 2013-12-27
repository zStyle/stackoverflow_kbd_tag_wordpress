<?php
/*
Plugin Name: KBD tag
Plugin URI: http://www.vimtrick.com
Description: Add kbd tag
Version: 0.1
Author: Methuz Kaewsai-kao
Author URI: http://www.twitter.com/methuz
License: GPLv2 or later
*/

function add_kbd() {
   if ( current_user_can('edit_posts') && current_user_can('edit_pages') ) {
      add_filter('mce_external_plugins', 'add_kbd_plugin');
      add_filter('mce_buttons', 'register_kbd_button');
   }
}

function register_kbd_button($buttons) {
   array_push($buttons, "|", "kbd");
   return $buttons;
}

function add_kbd_plugin($plugin_array) {
   $plugin_array['kbd'] = plugins_url('kbd.js', __FILE__ );
   return $plugin_array;
}

add_action('init', 'add_kbd');

/**
 * Register with hook 'wp_enqueue_scripts', which can be used for front end CSS and JavaScript
 */
add_action( 'wp_enqueue_scripts', 'kbd_stylesheet' );

/**
 * Enqueue plugin style-file
 */
function kbd_stylesheet() {
    // Respects SSL, Style.css is relative to the current file
    wp_register_style( 'prefix-style', plugins_url('kbd.css', __FILE__) );
    wp_enqueue_style( 'prefix-style' );
}
