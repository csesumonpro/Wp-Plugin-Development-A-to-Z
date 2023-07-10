<?php

if ( ! defined( 'ABSPATH' ) ) {
	die( 'you are not allowed to access this page directly' );
}

/*
 * Plugin Name:       Wp Todo Plugin
 * Plugin URI:        https://wordpress.org/plugins/wp-todo-plugin/
 * Description:       A plugin to manage your todo list
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            CleanCodeWithSumon
 * Author URI:        https://CleanCodeWithSumon.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       wp-todo-plugin
 * Domain Path:       /languages
 */


// How Does WordPress Hooks Work Behind the Scene


include_once plugin_dir_path(__FILE__) . 'custom-hook.php';


register_activation_hook(__FILE__, 'wp_todo_plugin_activation');

function wp_todo_plugin_activation(){
	// Do something
	custom_do_action('wp_todo_plugin_activated', 'Hello World', 'second');
//	var_dump('wp_todo_plugin_activation');
	exit();
}

custom_add_action('wp_todo_plugin_activated', function ($data) {
	var_dump($data);
	var_dump('from second action 15');
}, 15);


custom_add_action('wp_todo_plugin_activated', function ($data, $second) {
//	var_dump($data, $second);
	var_dump('from first action 12');
}, 12, 2);
