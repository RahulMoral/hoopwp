<?php

/**
 * @package Learning Cd
 * 
 */	

/**
 * 	========================
	ENQUEUE FUNCTIONS
	========================
 * 
 */


function sunset_load_scripts(){

	$number = rand(1, 1000000); 
    $var2 = "$number";
	
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '4.1.3', 'all' );
	wp_enqueue_style( 'animate-style', get_template_directory_uri() . '/css/animate.min.css', array(), '3.5.2', 'all' );
    wp_enqueue_style( 'owl-main', get_template_directory_uri() . '/css/owl.carousel.min.css', array(), '2.3.4', 'all' );
    wp_enqueue_style( 'owl-theme-default', get_template_directory_uri() . '/css/owl.theme.default.min.css', array(), '2.3.4', 'all' );
    wp_enqueue_style( 'main-style', get_template_directory_uri() . '/style.css', array(), $var2 , 'all' );
	wp_enqueue_script( 'custom-script', get_template_directory_uri() . '/js/script.js', array(), $var2, true );
	
	if( ! is_page_template( 'page-templates/page-membership.php' ) ){
		wp_enqueue_style( 'custom-style', get_template_directory_uri() . '/css/custom.css', array(), $var2 , 'all' );
	}	
}
add_action( 'wp_enqueue_scripts', 'sunset_load_scripts' );