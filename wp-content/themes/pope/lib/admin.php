<?php
//remove admin bar when showing site
//add_action('after_setup_theme', 'remove_admin_bar');

function remove_admin_bar() {
      show_admin_bar(false);
}

function pope_admin_menu() {
    //remove_menu_page( 'upload.php' );
    remove_menu_page( 'edit.php' );
    //remove_menu_page( 'tools.php' );
    remove_menu_page( 'edit-comments.php' );
    remove_menu_page( 'link-manager.php' );
    remove_menu_page( 'edit.php?post_type=sales_reps' );
}
add_action( 'admin_init', 'pope_admin_menu' );

function pope_update_news(){
	$news = get_posts( array ( 'post_type' => 'news', 'numberposts' => -1 ) );

    foreach($news as $news_detail){
		$meta_values = get_post_meta( $news_detail->ID );
		//var_dump( $news_detail );
		update_field('_image_type', 'field_5738acb104419', $news_detail->ID );
		// foreach($meta_values as $meta_key => $meta_value ){
		// 	update_field($meta_key, $meta_value[0], $news_detail->ID);
		// }
	}
}

// ONLY RUN THIS IF YOU WANT TO SET ALL NEWS DETAIL image_type FIELDS TO sidebar
//pope_update_news();