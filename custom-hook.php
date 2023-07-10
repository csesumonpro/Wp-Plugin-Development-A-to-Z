<?php

$custom_hooks = [];

function custom_add_action( $hook_name, $callback, $priority = 10, $accepted_args = 1 ) {

	global $custom_hooks;

	if ( ! isset( $custom_hooks[ $hook_name ] ) ) {
		$custom_hooks[ $hook_name ] = [];
	}

	$custom_hooks[ $hook_name ][] = [
		'callback'      => $callback,
		'priority'      => $priority,
		'accepted_args' => $accepted_args
	];
}

function custom_do_action( $hook_name, ...$args ) {

	global $custom_hooks;

	if ( ! isset( $custom_hooks[ $hook_name ] ) ) {
		return;
	}

	usort( $custom_hooks[ $hook_name ], function ( $a, $b ) {
		return $a['priority'] - $b['priority'];
	} );

	$callbacks = $custom_hooks[ $hook_name ];

	foreach ( $callbacks as $callback ) {
		$accepted_args = $callback['accepted_args'];
		$original_args = count( $args );

		if ( $accepted_args < $original_args ) {
			$args = array_slice( $args, 0, $accepted_args );
		} elseif ( $accepted_args > $original_args ) {
			$args = array_pad( $args, $accepted_args, null );
		}

		call_user_func_array( $callback['callback'], $args );
	}
}

