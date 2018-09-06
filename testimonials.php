<?php

/*
Plugin Name: Filterable Testimonials
Description: Test111
Author: sk
Version: 1.0
Author URI: https://belbo.com
*/	

include('custom_post_type.php');
include('custom_meta_box.php');
include('shortcode.php');
include('custom_settings.php');


// admin_enqueue_scripts is the first action hooked into the admin scripts actions.
// It ist used for enqueuing both scripts and styles (!).

// Add custom admin_testimonials.css
function register_plugin_styles_admin() {
	
	wp_register_style('admin_testimonials', plugins_url('filterable-testimonials/admin_testimonials.css'));
	wp_enqueue_style('admin_testimonials');
}
add_action('admin_enqueue_scripts', 'register_plugin_styles_admin');

// Add custom frontend_testimonials.css
function register_plugin_styles_frontend() {
	
	wp_register_style('frontend_testimonials', plugins_url('filterable-testimonials/frontend_testimonials.css'));
	wp_enqueue_style('frontend_testimonials');
}
add_action('wp_enqueue_scripts', 'register_plugin_styles_frontend'); 

// Add custom testimonials.js
function register_plugin_javascript() {
	
	wp_register_script('testimonials', plugins_url('filterable-testimonials/testimonials.js'));
	wp_enqueue_script('testimonials');
}
add_action('admin_enqueue_scripts', 'register_plugin_javascript');

		
// Register taxonomies location, branch, product
function create_taxonomies() {
	
	register_taxonomy('location', 'testimonials', [
		'label' => __('Standort'),
		'public' => true, 
		'publicly_queryable' => true, 
		'show_ui' => true, 
		'show_in_nav_menus' => true
	]);
	register_taxonomy('branch', 'testimonials', [
		'label' => __('Branche'), 
		'public' => true, 
		'publicly_queryable' => true, 
		'show_ui' => true, 
		'show_in_nav_menus' => true
	]);
	register_taxonomy('products', 'testimonials', [
		'label' => __('Produkte'),
		'public' => true, 
		'publicly_queryable' => true, 
		'show_ui' => true, 
		'show_in_nav_menus' => true
	]);
}
add_action('init', 'create_taxonomies');












