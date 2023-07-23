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
