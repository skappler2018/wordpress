<?php
// Add custom meta box
function ft_add_custom_meta_box(){
	
    $testimonials = ['testimonials'];
    foreach ($testimonials as $testimonial) {
        add_meta_box(
            'id_box',         
            'Testimonials Details',
            'ft_custom_meta_box_html',
            $testimonial
        );
    }
}

// Add custom fields to custom meta box
function ft_custom_meta_box_html($testimonials){ ?>
	<div class="fields">
		<div><label for="first_name">Vorname</label></div>
		<div><input name="first_name" type="text" id="first_name" value="<?php echo get_post_meta($testimonials->ID, 'first_name', true); ?>"></div>
	</div>
	<div class="fields">
		<div><label for="last_name">Nachname</label></div>
		<div><input name="last_name" type="text" id="last_name" value="<?php echo get_post_meta($testimonials->ID, 'last_name', true); ?>"></div>
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
	<p>
		Um ein Video einzubinden, gehen Sie wie folgt vor:
	</p>
	<ul>
		<li>Video in YouTube öffnen.</li>
		<li>Auf Teilen klicken.</li>
		<li>ID hinter dem Schrägstrich kopieren und in die untere Box einfügen.</li>
	</ul>
	<div class="fields">
		<label for="video">Video-ID</label>
		<input type="text" name="video" id="video" value="<?php echo get_post_meta($testimonials->ID, 'video', true); ?>">
	</div> <?php
}
add_action('add_meta_boxes', 'ft_add_custom_meta_box');

// Save data from custom fields
function ft_saving_postmeta_data($testimonials) { 

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
	if (array_key_exists('video', $_POST)) {
		update_post_meta(
			$testimonials,
			'video',
			$_POST['video']
		);
	}
	if (array_key_exists('logoToUpload', $_POST)) {
		update_post_meta(
			$testimonials,
			'logoToUpload',
			$_POST['logoToUpload']
		);
	}
}
add_action('save_post', 'ft_saving_postmeta_data');


