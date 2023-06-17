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

register_activation_hook(
	__FILE__,
	'wp_todo_plugin_register_activation'
);

function wp_todo_plugin_register_activation()
{
//	var_dump( 'activation' );
//	exit();
	do_action('wp_todo_plugin_activated', 'hello', 'world');

}

register_deactivation_hook(
	__FILE__,
	'wp_todo_plugin_register_deactivation'
);

function wp_todo_plugin_register_deactivation()
{
//	var_dump( 'deactivation' );
//	exit();
}

register_uninstall_hook(
	__FILE__,
	'wp_todo_plugin_register_uninstall'
);

function wp_todo_plugin_register_uninstall()
{
//	var_dump( 'uninstall' );
//	exit();
}

// Action Hook

//add_action('wp_todo_plugin_activated', 'wp_todo_plugin_create_table', 10, 2);
//
//function wp_todo_plugin_create_table($f, $s) {
//	var_dump( 'table created' );
//	var_dump( $f);
//	var_dump( $s);
//	exit();
//}

add_action('save_post', function ($postId, $post) {
	var_dump('first');
}, 100, 2);

add_action('save_post', function ($postId, $post) {
	var_dump('second');
}, 101, 2);


function wp_todo_plugin_filter_hook_test()
{
	$data = 'Hello World';
	$data = apply_filters('wp_todo_plugin_our_custom_hook_name', $data, 'CleanCode');
	echo $data;
}

add_filter('wp_todo_plugin_our_custom_hook_name',  'wp_todo_plugin_filter_hook_test_2', 10, 2);

function wp_todo_plugin_filter_hook_test_2($data, $name)
{
	$data = ' modified data' . $name;
	return $data;
}

remove_filter('wp_todo_plugin_our_custom_hook_name', 'wp_todo_plugin_filter_hook_test_2');

wp_todo_plugin_filter_hook_test();

exit();
