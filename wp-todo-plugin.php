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

class WP_Todo_Plugin_Meta_Box {

	/**
	 * Set up and add the meta box.
	 */
	public static function add() {
		$screens = [ 'post', 'page' ];
		foreach ( $screens as $screen ) {
			add_meta_box(
				'wporg_box_id',          // Unique ID
				'Custom Meta Box Title', // Box title
				[ self::class, 'html' ],   // Content callback, must be of type callable
				$screen                  // Post type
			);
		}
	}


	/**
	 * Save the meta box selections.
	 *
	 * @param int $post_id  The post ID.
	 */
	public static function save( int $post_id ) {
		if ( array_key_exists( 'wp_todo_plugin_field', $_POST ) ) {
			update_post_meta(
				$post_id,
				'wp_todo_plugin_field',
				$_POST['wp_todo_plugin_field']
			);
		}
	}


	/**
	 * Display the meta box HTML to the user.
	 *
	 * @param WP_Post $post   Post object.
	 */
	public static function html( $post ) {
		$value = get_post_meta( $post->ID, 'wp_todo_plugin_field', true );
		?>
        <label for="wporg_field">Description for this field</label>
        <select name="wp_todo_plugin_field" id="wporg_field" class="postbox">
            <option value="">Select something...</option>
            <option value="something" <?php selected( $value, 'something' ); ?>>Something</option>
            <option value="else" <?php selected( $value, 'else' ); ?>>Else</option>
        </select>
		<?php
	}
}

add_action( 'add_meta_boxes', [ 'WP_Todo_Plugin_Meta_Box', 'add' ]);
add_action( 'save_post', [ 'WP_Todo_Plugin_Meta_Box', 'save' ] );
