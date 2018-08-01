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

// Eigene CSS-Datei einbinden (admin_testimonials.css)
function register_plugin_styles_admin() {
	
		wp_register_style('admin_testimonials', plugins_url('testimonials/admin_testimonials.css'));
		wp_enqueue_style('admin_testimonials');
}
add_action('admin_enqueue_scripts', 'register_plugin_styles_admin');

// Eigene CSS-Datei einbinden (frontend_testimonials.css)
function register_plugin_styles_frontend() {
	
		wp_register_style('frontend_testimonials', plugins_url('testimonials/frontend_testimonials.css'));
		wp_enqueue_style('frontend_testimonials');
}
add_action('wp_enqueue_scripts', 'register_plugin_styles_frontend'); 
		
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

function custom_meta_box_html($testimonials){
	
    ?>
		<div class="fields">
			<div><label for="first_name">Vorname</label></div>
			<div><input type="text id="first_name"></div>
		</div>
		<div class="fields">
			<label for="last_name">Nachname</label>
			<input type="text id="last_name">
		</div>
		<div class="fields">
			<label for="store">Unternehmen</label>
			<input type="text id="store">
		</div>
		<div class="fields">
			<label for="url">URL</label>
			<input type="text id="url">
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
		</div>
    <?php
}
add_action('add_meta_boxes', 'add_custom_meta_box');

		
		


		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		


