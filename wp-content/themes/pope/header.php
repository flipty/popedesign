<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<html>
<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta charset="utf-8">
  <title><?php wp_title('|', true, 'right'); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--  <link rel="shortcut icon" href="/favicon.ico" /> -->
  <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

  <?php wp_head(); ?>

  <link rel="alternate" type="application/rss+xml" title="<?php echo get_bloginfo('name'); ?> Feed" href="<?php echo home_url(); ?>/feed/">
</head>

<body <?php body_class(); ?>>

  <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-header" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo home_url(); ?>"><img src="<?php echo home_url(); ?>/wp/wp-content/uploads/2016/05/pope-architects.png" alt="" class="logo"></a>
        </div>
        <div id="searchbar">
          <form role="search" method="get" action="<?php echo home_url('/'); ?>">
            <span class="glyphicon glyphicon-search"></span>
            <input type="text" value="<?php if (is_search()) { echo get_search_query(); } ?>" name="s" />
          </form>
        </div>
        <?php

          $args = array(
            'theme_location'  => 'primary_navigation',
            'menu'            => 'Main Menu',
            'container'       => 'div',
            'container_class' => 'navbar-collapse collapse',
            'container_id'    => 'navbar-header',
            'menu_class'      => 'nav navbar-nav',
            'echo'            => true,
            'fallback_cb'     => 'wp_page_menu',
            'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            'depth'           => 10,
            'walker'          => new Pope_Main_Nav_Menu // located in /lib/nav.php
          );

          if ( has_nav_menu( 'primary_navigation' ) ) :
            echo wp_nav_menu( $args );
          endif;

        ?>
      </div>
    </nav>


    
