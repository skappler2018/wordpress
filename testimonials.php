<?php

/*
Plugin Name: Filterable Testimonials
Description: Plugin for filtering and administering of testimonials 
Author: Sabine Kappler
Version: 1.0.0
Author URI: https://belbo.com
*/	

include('custom_post_type.php'); // To create custom post type.
include('custom_meta_box.php'); // To add custom meta box with custom fields.
include('shortcode.php'); // To create the shortcode with the frontend content. 
include('custom_settings.php'); // To add options for custom settings.


// admin_enqueue_scripts is the first action hooked into the admin scripts actions.
// It ist used for enqueuing both scripts and styles (!).

// Add custom admin_testimonials.css
function ft_register_plugin_styles_admin() {
	
	wp_register_style('admin_testimonials', plugins_url('admin_testimonials.css', __FILE__));
	wp_enqueue_style('admin_testimonials');
}
add_action('admin_enqueue_scripts', 'ft_register_plugin_styles_admin');

// Add custom frontend_testimonials.css
function ft_register_plugin_styles_frontend() {
	
	wp_register_style('frontend_testimonials', plugins_url('frontend_testimonials.css', __FILE__));
	wp_enqueue_style('frontend_testimonials');
}
add_action('wp_enqueue_scripts', 'ft_register_plugin_styles_frontend'); 

// Add custom testimonials.js
function ft_register_plugin_javascript() {
	
	wp_register_script('testimonials', plugins_url('testimonials.js', __FILE__));
	wp_enqueue_script('testimonials', false);
}
add_action('wp_enqueue_scripts', 'ft_register_plugin_javascript');

		
// Register taxonomies location, branch, product
function ft_create_taxonomies() {
	
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
add_action('init', 'ft_create_taxonomies');












