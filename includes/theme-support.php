<?php

function sunset_register_nav_menu()
{
    register_nav_menu('primary', 'Header Navigation Menu');
	register_nav_menu('secondary', 'Support Footer One');
	register_nav_menu('third', 'About Footer Two');
	register_nav_menu('fourth', 'Product Footer Three');
	register_nav_menu('fifth', 'Privacy Footer Menu');
}
add_action('after_setup_theme', 'sunset_register_nav_menu');

/* Activate HTML5 features */
add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));

// ******************* Custom Logo ****************** //
add_theme_support( 'custom-logo' );

// ******************* Add Custom Excerpt Lengths ****************** //

function excerptLength($length) {
    return 30;
}
add_filter('excerpt_length', 'excerptLength');

function new_excerpt_more($more) {
    return '';
}
add_filter('excerpt_more', 'new_excerpt_more', 21 );

add_post_type_support('forum', array('thumbnail'));