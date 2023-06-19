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



add_action('admin_menu', 'wp_todo_plugin_menu');

function wp_todo_plugin_menu()
{
	add_menu_page(
		__('WP Todo Plugin', 'wp-todo-plugin'),
		__('Todos', 'wp-todo-plugin'),
		'manage_options',
		'wp-todo-plugin',
		'wp_todo_plugin_page',
		'dashicons-list-view',
		10);

	add_submenu_page('wp-todo-plugin',
		__('Add New Todo', 'wp-todo-plugin'),
		__('Add New', 'wp-todo-plugin'),
		'manage_options',
		'wp-todo-plugin-new',
		'wp_todo_plugin_submenu');

	add_users_page(
		__( 'Wp Todo Users', 'wp-todo-plugin' ),
		__( 'Wp Todo Users', 'wp-todo-plugin' ),
		'manage_options',
		'wp_todo_plugin_user_sub_menu',
		'wp_to_plugin_custom_submenu_for_user_menu'
	);
}


function wp_todo_plugin_page()
{
	echo  '<h1>Todo List</h1>';
}


function wp_todo_plugin_submenu()
{
	echo  '<h1>Add New Todo</h1>';
}


function wp_to_plugin_custom_submenu_for_user_menu()
{
echo  '<h1>My Plugin Users</h1>';
}
