<?php

/*
Plugin Name: Testimonials
Plugin URI: localhost/wordpress/wp-content/plugins/testimonials/testimonials.php
Description: Test
Author: sk
Version: 1.0
Author URI: https://belbo.com
Text Domain: Test
*/	

include('shortcode.php');
include('custom_post_type.php');

// Eigene CSS-Datei einbinden
function register_plugin_styles() {
		wp_register_style('testimonials', plugins_url('testimonials/testimonials.css'));
		wp_enqueue_style('testimonials');
}
add_action('wp_enqueue_scripts', 'register_plugin_styles');
		
// Registering a taxonomy
function create_taxonomies() {
	register_taxonomy('branch', 'testimonials', [
		'label' => __('Branche')
	]);
	register_taxonomy('location', 'testimonials', [
		'label' => __('Standort')
	]);
	register_taxonomy('products', 'testimonials', [
		'label' => __('Produkte')
	]);
}
add_action('init', 'create_taxonomies');

// When registering a post type, always register your taxonomies using the taxonomies argument. 
		
		


		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		


