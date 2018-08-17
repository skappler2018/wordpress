<?php

/*
Plugin Name: Filterable Testimonials
Description: Test111
Author: sk
Version: 1.0
Author URI: https://belbo.com
*/	

include('shortcode.php');
include('custom_post_type.php');
include('custom_settings.php');

function register_plugin_styles_admin() {
	
		wp_register_style('admin_testimonials', plugins_url('filterable-testimonials/admin_testimonials.css'));
		wp_enqueue_style('admin_testimonials');
}
add_action('admin_enqueue_scripts', 'register_plugin_styles_admin');

// Eigene CSS-Datei einbinden (frontend_testimonials.css)
function register_plugin_styles_frontend() {
	
		wp_register_style('frontend_testimonials', plugins_url('filterable-testimonials/frontend_testimonials.css'));
		wp_enqueue_style('frontend_testimonials');
}
add_action('wp_enqueue_scripts', 'register_plugin_styles_frontend'); 


		
// Registering a taxonomy
function create_taxonomies() {
	
	register_taxonomy('branch', 'testimonials', [
		'label' => __('Branche'), 
		'public' => true, 
		'publicly_queryable' => true, 
		'show_ui' => true, 
		'show_in_nav_menus' => true
	]);
	register_taxonomy('location', 'testimonials', [
		'label' => __('Standort'),
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

// When registering a post type, always register your taxonomies using the taxonomies argument. 

function add_custom_meta_box(){
	
    $testimonials = ['testimonials'];
    foreach ($testimonials as $testimonial) {
        add_meta_box(
            'id_box',         
            'Testimonials Metabox',
            'custom_meta_box_html',
            $testimonial
        );
    }
}

function custom_meta_box_html($testimonials){ ?>
	<div class="fields">
		<div><label for="first_name">Vorname</label></div>
		<div><input name="first_name" type="text" id="first_name" value="<?php echo get_post_meta($testimonials->ID, 'first_name', true); ?>"></div>
	</div>
	<div class="fields">
		<label for="last_name">Nachname</label>
		<input name="last_name" type="text" id="last_name" value="<?php echo get_post_meta($testimonials->ID, 'last_name', true); ?>">
	</div>
	<div class="fields">
		<label for="store">Unternehmen</label>
		<input name="store" type="text" id="store" value="<?php echo get_post_meta($testimonials->ID, 'store', true); ?>">
	</div>
	<div class="fields">
		<label for="location">Standort</label>
		<input name="location" type="text" id="location" value="<?php echo get_post_meta($testimonials->ID, 'location', true); ?>">
	</div>
	<div class="fields">
		<label for="url">URL</label>
		<input name="url" type="text" id="url" value="<?php echo get_post_meta($testimonials->ID, 'url', true); ?>">
	</div>
	<div class="fields">
		<label for="logo">Logo</label>
		<input type="file" name="fileToUpload" id="logo">
	</div>
	<div class="fields">
		<label for="video">Video</label>
		<input type="file" name="fileToUpload" id="video">
	</div>
	<div class="fields">
		<label for="picture">Bild</label>
		<input type="file" name="fileToUpload" id="picture">
	</div><?php
}
add_action('add_meta_boxes', 'add_custom_meta_box');


// Meta-Daten speichern
function saving_postmeta_data($testimonials) { 

	if (array_key_exists('first_name', $_POST)) {
		update_post_meta(
			$testimonials,
			'first_name',
			$_POST['first_name']
		);
	} 
	if (array_key_exists('last_name', $_POST)) {
		update_post_meta(
			$testimonials,
			'last_name',
			$_POST['last_name']
		);
	} 
	if (array_key_exists('store', $_POST)) {
		update_post_meta(
			$testimonials,
			'store',
			$_POST['store']
		);
	} 
	if (array_key_exists('location', $_POST)) {
		update_post_meta(
			$testimonials,
			'location',
			$_POST['location']
		);
	}
	if (array_key_exists('url', $_POST)) {
		update_post_meta(
			$testimonials,
			'url',
			$_POST['url']
		);
	}
	
}
add_action('save_post', 'saving_postmeta_data');




