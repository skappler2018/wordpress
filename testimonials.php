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
		
// Custom Post Types

function create_post_type() {
	
	register_post_type('testimonials', [
		'labels' => [
			'name' => __('Testimonials'),	
			'singular_name' => __('Testimonial')
		],
		'public' => true,
		'has_archive' => true,
	]);
}
add_action('init', 'create_post_type');




