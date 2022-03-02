<?php

add_action('init', 'popedesign_create_post_types');

function popedesign_create_post_types() {

  // Set up Contributors
  $contributorLabels = array(
    'name' => 'Contributors',
    'singular_name' => 'Contributor',
    'add_new' => 'Add New Contributor',
    'add_new_item' => 'Add New Contributor',
    'edit_item' => 'Edit Contributor',
    'new_item' => 'New Contributor',
    'all_items' => 'All Contributors',
    'view_item' => 'View Contributor',
    'search_items' => 'Search Contributors',
    'not_found' =>  'No Contributors Found',
    'not_found_in_trash' => 'No Contributors found in Trash',
    'parent_item_colon' => '',
    'menu_name' => 'Contributors'
  );

  register_post_type('contributor', array(
    'labels' => $contributorLabels,
    'has_archive' => true,
    'public' => true,
    'supports' => array('title', 'editor', 'excerpt', 'custom-fields', 'thumbnail', 'page-attributes'),
    'exclude_from_search' => false,
    'capability_type' => 'post',
    'menu_icon' => 'dashicons-networking',
    'show_in_rest' => true,
    'rewrite' => array('slug' => 'contributor')
    )
  );

}

// add_action( 'init', 'create_product_category_hierarchical_taxonomy', 0 );
//
// function create_product_category_hierarchical_taxonomy() {
//
//   $productCategoryLabels = array(
//     'name' => _x( 'Product Category', 'taxonomy general name' ),
//     'singular_name' => _x( 'Product Category', 'taxonomy singular name' ),
//     'search_items' =>  __( 'Search Product Categories' ),
//     'all_items' => __( 'All Product Categories' ),
//     'parent_item' => __( 'Parent Product Category' ),
//     'parent_item_colon' => __( 'Parent Product Category:' ),
//     'edit_item' => __( 'Edit Product Category' ),
//     'update_item' => __( 'Update Product Category' ),
//     'add_new_item' => __( 'Add New Product Category' ),
//     'new_item_name' => __( 'New Product Category Name' ),
//     'menu_name' => __( 'Product Categories' ),
//   );
//
//   register_taxonomy('product_category',array('post'), array(
//     'hierarchical' => true,
//     'labels' => $productCategoryLabels,
//     'show_ui' => true,
//     'show_admin_column' => true,
//     'query_var' => true,
//     'rewrite' => array( 'slug' => 'product-category' ),
//   ));
//
// }

add_action( 'init', 'create_products_hierarchical_taxonomy', 0 );

function create_products_hierarchical_taxonomy() {

}

?>
