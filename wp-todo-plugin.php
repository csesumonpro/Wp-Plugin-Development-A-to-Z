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

add_action('admin_init', function () {
	register_setting('writing', 'wp_todo_plugin_site_key');
	register_setting('writing', 'wp_todo_plugin_writing_selects');

	add_settings_section(
		'wp_todo_settings_section_writing',
		'Site Key', 'wp_todo_plugin_settings_section_writing',
		'writing'
	);
	add_settings_field(
		'wp_todo_id_setting_field_id',
		'Text Input', 'wp_todo_plugin_settings_field_writing',
		'writing',
		'wp_todo_settings_section_writing'
	);

	add_settings_field(
		'wp_todo_id_setting_field_id_sd',
		'Multiple Selects', 'wp_todo_plugin_settings_field_writings',
		'writing',
		'wp_todo_settings_section_writing'
	);
});

function wp_todo_plugin_settings_section_writing()
{
//	$site_key = get_option('wp_todo_plugin_site_key');
//	?>
<!--	<input type="text" name="wp_todo_plugin_site_key" value="--><?php //echo $site_key; ?><!--">-->
<!--	--><?php
}

function wp_todo_plugin_settings_field_writing()
{
	$site_key = get_option('wp_todo_plugin_site_key');
	?>
	<input type="text" name="wp_todo_plugin_site_key" value="<?php echo $site_key; ?>">
	<?php
}


function wp_todo_plugin_settings_field_writings()
{
	$value = get_option('wp_todo_plugin_writing_selects');
	?>
	<select name="wp_todo_plugin_writing_selects">
		<option value="one" selected="<?php if ($value === 'one' ? 'selected' : '')?>">One</option>
		<option value="two" selected="<?php if ($value === 'two' ? 'selected' : '')?>">Two</option>
	</select>
	<?php
}
