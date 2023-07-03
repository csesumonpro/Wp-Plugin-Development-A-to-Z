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

// Register Custom Post Type Wp Todo
function create_wptodo_cpt() {

	$labels = array(
		'name' => _x( 'Wp Todos', 'Post Type General Name', 'wp-todo-plugin' ),
		'singular_name' => _x( 'Wp Todo', 'Post Type Singular Name', 'wp-todo-plugin' ),
		'menu_name' => _x( 'Wp Todos', 'Admin Menu text', 'wp-todo-plugin' ),
		'name_admin_bar' => _x( 'Wp Todo', 'Add New on Toolbar', 'wp-todo-plugin' ),
		'archives' => __( 'Wp Todo Archives', 'wp-todo-plugin' ),
		'attributes' => __( 'Wp Todo Attributes', 'wp-todo-plugin' ),
		'parent_item_colon' => __( 'Parent Wp Todo:', 'wp-todo-plugin' ),
		'all_items' => __( 'All Wp Todos', 'wp-todo-plugin' ),
		'add_new_item' => __( 'Add New Wp Todo', 'wp-todo-plugin' ),
		'add_new' => __( 'Add New', 'wp-todo-plugin' ),
		'new_item' => __( 'New Wp Todo', 'wp-todo-plugin' ),
		'edit_item' => __( 'Edit Wp Todo', 'wp-todo-plugin' ),
		'update_item' => __( 'Update Wp Todo', 'wp-todo-plugin' ),
		'view_item' => __( 'View Wp Todo', 'wp-todo-plugin' ),
		'view_items' => __( 'View Wp Todos', 'wp-todo-plugin' ),
		'search_items' => __( 'Search Wp Todo', 'wp-todo-plugin' ),
		'not_found' => __( 'Not found', 'wp-todo-plugin' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'wp-todo-plugin' ),
		'featured_image' => __( 'Featured Image', 'wp-todo-plugin' ),
		'set_featured_image' => __( 'Set featured image', 'wp-todo-plugin' ),
		'remove_featured_image' => __( 'Remove featured image', 'wp-todo-plugin' ),
		'use_featured_image' => __( 'Use as featured image', 'wp-todo-plugin' ),
		'insert_into_item' => __( 'Insert into Wp Todo', 'wp-todo-plugin' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Wp Todo', 'wp-todo-plugin' ),
		'items_list' => __( 'Wp Todos list', 'wp-todo-plugin' ),
		'items_list_navigation' => __( 'Wp Todos list navigation', 'wp-todo-plugin' ),
		'filter_items_list' => __( 'Filter Wp Todos list', 'wp-todo-plugin' ),
	);
	$args = array(
		'label' => __( 'Wp Todo', 'wp-todo-plugin' ),
		'description' => __( '', 'wp-todo-plugin' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-list-view',
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'author', 'comments', 'page-attributes', 'post-formats', 'custom-fields'),
		'taxonomies' => ['category', 'post_tag'],
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => false,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
	register_post_type( 'wp-todo-plugin', $args );

}
add_action( 'init', 'create_wptodo_cpt', 0 );


add_action('init', function () {
	$args = array(
		'post_type'      => 'wp-todo-plugin',
		'posts_per_page' => 10,
	);

	$loop = new WP_Query($args);
	while ( $loop->have_posts() ) {
		$loop->the_post();
		?>
		<div class="entry-content">
			<?php the_title(); ?>
			<?php the_content(); ?>
		</div>
		<?php
	}

	exit();
});
