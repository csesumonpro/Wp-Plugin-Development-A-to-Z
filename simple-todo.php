<?php
if (!defined('ABSPATH')) {
	exit;
}

/*
 * Plugin Name:Simple Todo
 * Description: This is a simple todo plugin.
 * Version: 1.0.0
 * Author: Clean Code With Sumon
 * Author URI: http://www.cleancodewithsumon.com
 */

define('SIMPLE_TODO_VERSION', '1.0.0');
define('SIMPLE_TODO_PLUGIN_URL', plugin_dir_url(__FILE__));
define('SIMPLE_TODO_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('SIMPLE_TODO_PLUGIN_BASENAME', plugin_basename(__FILE__));
define('SIMPLE_TODO_PLUGIN_FILE', basename(__FILE__));

include_once SIMPLE_TODO_PLUGIN_DIR . 'src/simple-todo-functions.php';

register_activation_hook(__FILE__, 'simple_todo_activate');
