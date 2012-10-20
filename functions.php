<?php

define('HEADER_IMAGE_WIDTH', 700); // use width and height appropriate for ACCFB
define('HEADER_IMAGE_HEIGHT', 120);

// register home sidebar
function accfb_register_home_sidebar() {
	register_sidebar( array(
		'name' => __('Home Page Sidebar', 'accfb'),
		'id' => 'home-sidebar',
		'description' => __('home page sidebar widget area', 'accfb'),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}

add_action( 'widgets_init', 'accfb_register_home_sidebar' );

function accfb_scripts() {
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'jquery-ui-core' );
	wp_enqueue_script( 'jquery-ui-accordion' );
	wp_register_script('accfb-local', get_stylesheet_directory_uri() . '/js/local.js' ); // added by ed for jquery ui accordion functions
	wp_enqueue_script('accfb-local');
	wp_register_style('accfb-jquery-ui-style', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/smoothness/jquery-ui.css');  
	wp_enqueue_style('accfb-jquery-ui-style');  
  
}    
 
add_action('wp_enqueue_scripts', 'accfb_scripts'); // theme requires jquery ui accordion

wp_register_style('wptuts-jquery-ui-style', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.21/themes/south-street/jquery-ui.css');  
    wp_enqueue_style('wptuts-jquery-ui-style');  
  

?>