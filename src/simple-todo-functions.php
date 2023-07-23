<?php

function simple_todo_init() {
	var_dump( 'init_simple_todo' );
	exit();
}

function simple_todo_activate() {
	global $wpdb;
	$table_name      = $wpdb->prefix . 'simple_todo';
	$charset_collate = $wpdb->get_charset_collate();

	$sql = 'CREATE TABLE IF NOT EXISTS ' . $table_name . ' (
		id bigint NOT NULL AUTO_INCREMENT,
		title varchar(255) NOT NULL,
		description text DEFAULT NULL,
		created_at datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
		updated_at datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
		PRIMARY KEY (id)
	) ' . $charset_collate . ';';

	if ( ! function_exists( 'dbDelta' ) ) {
		require_once ABSPATH . 'wp-admin/includes/upgrade.php';
	}

	dbDelta( $sql );
}


function simple_todo_admin_menu()
{
	add_menu_page(
		__( 'Simple Todo', 'simple-todo' ),
		__( 'Simple Todo', 'simple-todo' ),
		'manage_options',
		'simple-todo',
		'simple_todo_admin_page',
		'dashicons-list-view',
		20
	);
}


function simple_todo_admin_page()
{
	$todos = simple_todo_get_todos();

	// For insert and update
	if (isset($_POST['simple-todo-nonce']) && wp_verify_nonce($_POST['simple-todo-nonce'], 'simple-todo-nonce-action')) {
		simple_todo_insert_todo();
	}
	// for delete
	if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
		$id = intval($_GET['id']);
		simple_todo_detete_todo($id);
	}

	include_once SIMPLE_TODO_PLUGIN_DIR . 'src/simple-todo-table.php';
}

function simple_todo_enqueue_scripts()
{
	wp_enqueue_style( 'simple-todo-bootstrap-min', SIMPLE_TODO_PLUGIN_URL . 'assets/css/bootstrap.min.css', array(), SIMPLE_TODO_VERSION, 'all' );
	wp_enqueue_style( 'simple-todo-style', SIMPLE_TODO_PLUGIN_URL . 'assets/css/style.css', array(), SIMPLE_TODO_VERSION, 'all' );
}


function simple_todo_get_todos()
{
	global $wpdb;
	$table_name = $wpdb->prefix . 'simple_todo';
	$sql = 'SELECT * FROM ' . $table_name . ' ORDER BY id ASC';
	$items = $wpdb->get_results( $sql);

	return $items;
}

function simple_todo_detete_todo($id)
{
	global $wpdb;
	$table_name = $wpdb->prefix . 'simple_todo';
	$wpdb->delete( $table_name, array( 'id' => $id ) );
}

function simple_todo_insert_todo()
{
	global $wpdb;
	$table_name = $wpdb->prefix . 'simple_todo';

	$title = isset($_POST['title']) ? sanitize_text_field($_POST['title']) : '';
	$description =  isset($_POST['description']) ? sanitize_textarea_field($_POST['description']) : '';
	$wpdb->insert(
		$table_name,
		array(
			'title' => $title,
			'description' => $description,
		)
	);
}
