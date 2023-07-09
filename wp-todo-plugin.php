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



function wp_todo_user_permission_check(){
	if (current_user_can('read')) {
		echo "Permitted";
	} else {
		echo "not permitted";
	}
}

add_action('init', function () {

//	$role = get_role( 'simple_role' );
	wp_todo_user_permission_check();
	exit();
//
//	exit();

//	add_role(
//		'simple_role',
//		'Simple Role',
//		array(
//			'read'         => true,
//			'edit_posts'   => true,
//			'upload_files' => true,
//		),
//	);
});


