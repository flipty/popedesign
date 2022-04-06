<?php
// Register News Post Type
function news_post_type() {

	$labels = array(
		'name'                  => _x( 'News', 'Project General Name', 'pope' ),
		'singular_name'         => _x( 'News', 'Project Singular Name', 'pope' ),
		'menu_name'             => __( 'News', 'pope' ),
		'name_admin_bar'        => __( 'News', 'pope' ),
		'parent_item_colon'     => __( 'Parent News:', 'pope' ),
		'all_items'             => __( 'All News', 'pope' ),
		'add_new_item'          => __( 'Add New News', 'pope' ),
		'add_new'               => __( 'Add News', 'pope' ),
		'new_item'              => __( 'New News', 'pope' ),
		'edit_item'             => __( 'Edit News', 'pope' ),
		'update_item'           => __( 'Update News', 'pope' ),
		'view_item'             => __( 'View News', 'pope' ),
		'search_items'          => __( 'Search News', 'pope' ),
		'not_found'             => __( 'Not found', 'pope' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'pope' ),
		'items_list'            => __( 'News list', 'pope' ),
		'items_list_navigation' => __( 'News list navigation', 'pope' ),
		'filter_items_list'     => __( 'Filter News list', 'pope' ),
	);
	$args = array(
		'label'                 => __( 'News', 'pope' ),
		'description'           => __( 'News Description', 'pope' ),
		'labels'                => $labels,
		'supports'              => array( 'excerpts', 'title', 'editor'),
		'taxonomies'            => array( 'news-category' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'rewrite' => array( 'slug' => 'news' )
	);
	register_post_type( 'news', $args );

}
add_action( 'init', 'news_post_type', 0 );

// Register Project Post Type
function project_post_type() {

	$labels = array(
		'name'                  => _x( 'Projects', 'Project General Name', 'pope' ),
		'singular_name'         => _x( 'Project', 'Project Singular Name', 'pope' ),
		'menu_name'             => __( 'Projects', 'pope' ),
		'name_admin_bar'        => __( 'Project', 'pope' ),
		'parent_item_colon'     => __( 'Parent Item:', 'pope' ),
		'all_items'             => __( 'All Items', 'pope' ),
		'add_new_item'          => __( 'Add New Item', 'pope' ),
		'add_new'               => __( 'Add New', 'pope' ),
		'new_item'              => __( 'New Item', 'pope' ),
		'edit_item'             => __( 'Edit Item', 'pope' ),
		'update_item'           => __( 'Update Item', 'pope' ),
		'view_item'             => __( 'View Item', 'pope' ),
		'search_items'          => __( 'Search Item', 'pope' ),
		'not_found'             => __( 'Not found', 'pope' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'pope' ),
		'items_list'            => __( 'Items list', 'pope' ),
		'items_list_navigation' => __( 'Items list navigation', 'pope' ),
		'filter_items_list'     => __( 'Filter items list', 'pope' ),
	);
	$args = array(
		'label'                 => __( 'Projects', 'pope' ),
		'description'           => __( 'Project Description', 'pope' ),
		'labels'                => $labels,
		'supports'              => array( 'excerpts', 'title', 'editor'  ),
		'taxonomies'            => array( 'project-type', 'project-tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'rewrite' => array( 'slug' => 'project' )
	);
	register_post_type( 'projects', $args );

}
add_action( 'init', 'project_post_type', 0 );

// Register Bios Post Type
function person_post_type() {

	$labels = array(
		'name'                  => _x( 'People', 'Person General Name', 'pope' ),
		'singular_name'         => _x( 'Person', 'Person Singular Name', 'pope' ),
		'menu_name'             => __( 'People', 'pope' ),
		'name_admin_bar'        => __( 'Person', 'pope' ),
		'parent_item_colon'     => __( 'Parent Person:', 'pope' ),
		'all_items'             => __( 'All People', 'pope' ),
		'add_new_item'          => __( 'Add New Person', 'pope' ),
		'add_new'               => __( 'Add New', 'pope' ),
		'new_item'              => __( 'New Item', 'pope' ),
		'edit_item'             => __( 'Edit Item', 'pope' ),
		'update_item'           => __( 'Update Item', 'pope' ),
		'view_item'             => __( 'View Item', 'pope' ),
		'search_items'          => __( 'Search Item', 'pope' ),
		'not_found'             => __( 'Not found', 'pope' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'pope' ),
		'items_list'            => __( 'People list', 'pope' ),
		'items_list_navigation' => __( 'People list navigation', 'pope' ),
		'filter_items_list'     => __( 'Filter people list', 'pope' ),
	);
	$args = array(
		'label'                 => __( 'Person', 'pope' ),
		'description'           => __( 'Person Description', 'pope' ),
		'labels'                => $labels,
		'supports'              => array( 'excerpts', 'title', 'editor'  ),
		//'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'rewrite' => array( 'slug' => 'people' )
	);
	register_post_type( 'bios', $args );

}
add_action( 'init', 'person_post_type', 0 );