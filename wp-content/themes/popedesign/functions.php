<?php

//enqueue theme styles and scripts
function enqueue_theme_assets() {
    wp_enqueue_style( 'popedesign', get_template_directory_uri() . '/css/popedesign.css',false,'2.3','all');
    //wp_register_script('popedesign', get_template_directory_uri() . '/js/popedesign.js','','1.1', true);
    //wp_enqueue_script( 'popedesign', get_template_directory_uri() . '/js/popedesign.js',false,'1.0','all');
}
add_action( 'template_redirect', 'enqueue_theme_assets' );

// Disable comments by default. Change this if you need to allow comments for your site.
define("WP_ALLOW_COMMENTS", false);

// how many words is in a standard excerpt?
add_filter( 'excerpt_length', function($length) {
    return 30;
} );

// change the default "[...]" for excerpts
function wpdocs_excerpt_more( $more ) {
    if ( is_admin() ) {
        return $more;
    }
    return '...';
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );

//Show all CPT items on archive
add_action( 'pre_get_posts', 'show_all_archive_posts' );
function show_all_archive_posts( $query ) {
    if ( ! is_admin() && $query->is_main_query() ) {
        if ( is_archive( 'post' ) ) {
            $query->set('posts_per_page', 9 );
        }
        if ( is_archive( 'news' ) ) {
            $query->set('posts_per_page', 9 );
        }
    }
}

//add ACF options
if( function_exists('acf_add_options_page') ) {
  acf_add_options_page();
}

function html5_search_form( $form ) {
     $form = '<form role="search" method="get" class="searchform" id="search-form" action="' . home_url( '/' ) . '" >
     <label class="screen-reader-text" for="s">' . __('',  'domain') . '</label>
     <input type="search" class="searchInput" value="' . get_search_query() . '" name="s" id="s" placeholder="Search" />
     <input type="submit" aria-label="search" id="searchsubmit" value="'. esc_attr__('>', 'popedesign') .'" />
     </form>';
     return $form;
}

 add_filter( 'get_search_form', 'html5_search_form' );

 register_nav_menus( array(
     'primary' => 'Primary Menu',
 ) );

 //add_action('admin_menu', 'remove_comment_support');

 // Disable support for comments and trackbacks in post types
 // function df_disable_comments_post_types_support() {
 //     $post_types = get_post_types();
 //     foreach ($post_types as $post_type) {
 //         if(post_type_supports($post_type, 'comments')) {
 //             remove_post_type_support($post_type, 'comments');
 //             remove_post_type_support($post_type, 'trackbacks');
 //         }
 //     }
 // }
 // add_action('admin_init', 'df_disable_comments_post_types_support');

 // Close comments on the front-end
 // function df_disable_comments_status() {
 //     return false;
 // }
 // add_filter('comments_open', 'df_disable_comments_status', 20, 2);
 // add_filter('pings_open', 'df_disable_comments_status', 20, 2);

 // Hide existing comments
 // function df_disable_comments_hide_existing_comments($comments) {
 //     $comments = array();
 //     return $comments;
 // }
 // add_filter('comments_array', 'df_disable_comments_hide_existing_comments', 10, 2);

 // Remove comments page in menu
 // function df_disable_comments_admin_menu() {
 //     remove_menu_page('edit-comments.php');
 // }
 // add_action('admin_menu', 'df_disable_comments_admin_menu');

 // Redirect any user trying to access comments page
 // function df_disable_comments_admin_menu_redirect() {
 //     global $pagenow;
 //     if ($pagenow === 'edit-comments.php') {
 //         wp_redirect(admin_url()); exit;
 //     }
 // }
 // add_action('admin_init', 'df_disable_comments_admin_menu_redirect');

 // Remove comments metabox from dashboard
 // function df_disable_comments_dashboard() {
 //     remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
 // }
 // add_action('admin_init', 'df_disable_comments_dashboard');

 // Remove comments links from admin bar
 // function df_disable_comments_admin_bar() {
 //     if (is_admin_bar_showing()) {
 //         remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
 //     }
 // }
 // add_action('init', 'df_disable_comments_admin_bar');

 //from helpers.php
 function pope_get_excerpt($text, $word_count){

 	if ( $text != '' ) {
 		$text = strip_shortcodes( $text );
 		$text = apply_filters('the_content', $text);
 		$text = str_replace(']]>', ']]>', $text);
 		$excerpt_length = $word_count;
 		$excerpt_more = apply_filters('excerpt_more', ' ' . '...');
 		$text = wp_trim_words( $text, $excerpt_length, $excerpt_more );
 	}
 	return apply_filters('the_excerpt', $text);
 }

 function prepId($string) {
     $string = strtolower($string);
     $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
     $string = preg_replace("/[\s-]+/", " ", $string);
     $string = preg_replace("/[\s_]/", "-", $string);
     return $string;
 }

 //require_once locate_template('/partials/page-nav.php');

//isotope image size
add_image_size( 'isotope', 600, 600, array( 'center', 'center' ) );
