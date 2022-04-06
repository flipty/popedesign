<?php
function project_type_taxonomy()  {
	$labels = array(
		'name'                       => _x( 'Type', 'Taxonomy General Name', 'pope' ),
		'singular_name'              => _x( 'Types', 'Taxonomy Singular Name', 'pope' ),
		'menu_name'                  => __( 'Types', 'pope' ),
		'all_items'                  => __( 'All Types', 'pope' ),
		'parent_item'                => __( 'Parent Type', 'pope' ),
		'parent_item_colon'          => __( 'Parent Type:', 'pope' ),
		'new_item_name'              => __( 'New Type', 'pope' ),
		'add_new_item'               => __( 'Add New Type', 'pope' ),
		'edit_item'                  => __( 'Edit Type', 'pope' ),
		'update_item'                => __( 'Update Type', 'pope' ),
		'separate_items_with_commas' => __( 'Separate Types with commas', 'pope' ),
		'search_items'               => __( 'Search Types', 'pope' ),
		'add_or_remove_items'        => __( 'Add or remove types', 'pope' ),
		'choose_from_most_used'      => __( 'Choose from the most used types', 'pope' )
	);

	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite' => array( 'slug' => 'projects/type' )
	);

	register_taxonomy( 'project-type', 'projects', $args );
}

add_action( 'init', 'project_type_taxonomy', 0 );

function project_tag_taxonomy()  {
	$labels = array(
		'name'                       => _x( 'Tag', 'Taxonomy General Name', 'pope' ),
		'singular_name'              => _x( 'Tags', 'Taxonomy Singular Name', 'pope' ),
		'menu_name'                  => __( 'Tags', 'pope' ),
		'all_items'                  => __( 'All Tags', 'pope' ),
		'parent_item'                => __( 'Parent Tag', 'pope' ),
		'parent_item_colon'          => __( 'Parent Tag:', 'pope' ),
		'new_item_name'              => __( 'New Tag', 'pope' ),
		'add_new_item'               => __( 'Add New Tag', 'pope' ),
		'edit_item'                  => __( 'Edit Tag', 'pope' ),
		'update_item'                => __( 'Update Tag', 'pope' ),
		'separate_items_with_commas' => __( 'Separate Tags with commas', 'pope' ),
		'search_items'               => __( 'Search Types', 'tags' ),
		'add_or_remove_items'        => __( 'Add or remove types', 'pope' ),
		'choose_from_most_used'      => __( 'Choose from the most used tags', 'pope' )
	);

	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite' => array( 'slug' => 'projects/tag' )
	);

	register_taxonomy( 'project-tag', 'projects', $args );
}

add_action( 'init', 'project_tag_taxonomy', 0 );

function news_category_taxonomy()  {
	$labels = array(
		'name'                       => _x( 'Category', 'Taxonomy General Name', 'pope' ),
		'singular_name'              => _x( 'Categories', 'Taxonomy Singular Name', 'pope' ),
		'menu_name'                  => __( 'Categories', 'pope' ),
		'all_items'                  => __( 'All Categories', 'pope' ),
		'parent_item'                => __( 'Parent Category', 'pope' ),
		'parent_item_colon'          => __( 'Parent Category:', 'pope' ),
		'new_item_name'              => __( 'New Category', 'pope' ),
		'add_new_item'               => __( 'Add New Category', 'pope' ),
		'edit_item'                  => __( 'Edit Category', 'pope' ),
		'update_item'                => __( 'Update Category', 'pope' ),
		'separate_items_with_commas' => __( 'Separate Categories with commas', 'pope' ),
		'search_items'               => __( 'Search Categories', 'pope' ),
		'add_or_remove_items'        => __( 'Add or remove categories', 'pope' ),
		'choose_from_most_used'      => __( 'Choose from the most used categories', 'pope' )
	);

	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite' => array( 'slug' => 'news-category' )
	);

	register_taxonomy( 'news-category', 'news', $args );
}

add_action( 'init', 'news_category_taxonomy', 0 );
