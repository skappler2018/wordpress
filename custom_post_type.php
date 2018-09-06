<?php

// Create custom post type testimonials
function create_post_type() {
	
	register_post_type('testimonials', [
		'labels' => [
			'name' => __('Testimonials'),	
			'singular_name' => __('Testimonial')
		],
		'public' => true,
		'has_archive' => true,
		'taxonomies' => ['branch', 'location', 'products'],
		'supports' => ['editor', 'thumbnail', 'custom-fields', 'title'
		]
	]);
}
add_action('init', 'create_post_type');