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
