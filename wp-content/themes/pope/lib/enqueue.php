<?php

function pope_scripts()
{

  wp_enqueue_style('pope_bootstrap', '/assets/css/bootstrap.css', false, '9dada84be109d0f0c9749bcf63b41b27');
  wp_enqueue_style('pope_plugins', '/assets/css/plugins.css', false, '9dada84be109d0f0c9749bcf63b41b27');
  wp_enqueue_style('pope_main', '/assets/css/pope.css', false, '9dada84be109d0f0c9749bcf63b41b27');
  wp_enqueue_style( 'theme', get_stylesheet_uri() );

  if (is_single() && comments_open() && get_option('thread_comments'))
  {
    wp_enqueue_script('comment-reply');
  }

  wp_deregister_script('jquery');
  wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js');

  wp_register_script('pope_bootstrap', pope_assets().'/js/bootstrap.min.js', array(), 'dfa91ab73dcfe688e24ef8a7e1701370', true);
  wp_register_script('pope_plugins', pope_assets().'/js/plugins.js', array(), 'dfa91ab73dcfe688e24ef8a7e1701370', true);
  wp_register_script('pope_scripts', pope_assets().'/js/pope.js', array(), 'dfa91ab73dcfe688e24ef8a7e1701370', true);

  wp_enqueue_script('jquery');
  wp_enqueue_script('pope_bootstrap');
  wp_enqueue_script('pope_plugins');
  wp_enqueue_script('pope_scripts');
}

add_action('wp_enqueue_scripts', 'pope_scripts');
