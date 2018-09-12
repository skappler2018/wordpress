<?php
/**
* Create custom post type testimonials.
*
* By creating a custom post type testimonials this type will be added automatically to the WordPress menu.
* Thus the plugin can be accessed easily.
*
* @since 1.0.0
*
* @param string $post_type. Post type.
* @param array $args optional. An array of arguments.
*/ 
function ft_create_post_type() {
	
	register_post_type('testimonials', [
		'labels' => [
			'name' => __('Testimonials'),	
			'singular_name' => __('Testimonial')
		],
		'public' => true,
		'has_archive' => true,
		'taxonomies' => ['branch', 'location', 'products'],
		'supports' => ['editor', 'thumbnail', 'custom-fields', 'title']
	]);
}
add_action('init', 'ft_create_post_type');


