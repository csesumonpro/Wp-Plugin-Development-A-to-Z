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

define( 'WP_TODO_PLUGIN_VERSION', '1.0.0' );
define( 'WP_TODO_PLUGIN_FILE', __FILE__ );
define( 'WP_TODO_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'WP_TODO_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );


add_action('admin_enqueue_scripts', function () {
	wp_enqueue_script( 'wp-todo-plugin', WP_TODO_PLUGIN_URL . 'js/custom.js', array( 'jquery' ), '1.0.0', false );
	wp_enqueue_style( 'wp-todo-plugin', WP_TODO_PLUGIN_URL . 'css/custom.css', [], '1.0.0' );

	wp_localize_script(
		'wp-todo-plugin',
		'wp_todo_plugin',
		array(
			'ajax_url' => admin_url( 'admin-ajax.php' ),
			'nonce'    => wp_create_nonce( 'wp-todo-plugin-nonce' ),
			'abcd' => 'abcd'
		)
	);
});


add_action('wp_ajax_wp_todo_abc', function () {

	if (wp_verify_nonce( $_POST['nonce'], 'wp-todo-plugin-nonce' ) === false) {
		wp_send_json_error( array(
			'message' => 'nonce is not valid'
		) );
	}

	wp_send_json_success( array(
		'message' => 'successsss',
		'response'    => [
			'abcd' => 'abcd'
		]
	) );
});

add_action('wp_ajax_wp_todo_abc_again' , function () {
	wp_send_json_success( array(
		'message' => 'success again',
		'response'    => [
			'cars' => ['volvo', 'bmw', 'toyota']
		]
	) );
});
// Frontend ajax
add_action('wp_ajax_nopriv_wp_todo_abc_again' , function () {
	wp_send_json_success( array(
		'message' => 'success again',
		'response'    => [
			'cars' => ['volvo', 'bmw', 'toyota']
		]
	) );
});
