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

?>