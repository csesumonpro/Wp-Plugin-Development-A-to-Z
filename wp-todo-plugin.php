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


add_action('init', function () {
//	// Users
//	$user= wp_create_user('sumon', 'sumon', 'sumon@gmail.com');

//$update_user = wp_update_user([
//	'ID' => 4,
//	'user_url' => 'https://CleanCodeWithSumon.com/'
//]);

//	var_dump($user);
//	exit();

	$data = get_user_meta('4', 'wp_todo_key', true);

	var_dump($data);
	exit();

	exit();
});


