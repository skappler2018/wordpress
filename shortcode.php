<?php function testimonials_shortcode($atts) {

	$atts = shortcode_atts([
		'id' => 'client_testimonials'
		], $atts, 'belbo');

	$args = [
		'post_type' => 'testimonials',
		'posts_per_page' => 5
	];
	$loop = new WP_Query($args);
	
	ob_start(); 

	$terms = get_terms('location'); // Retrieve the terms in a given taxonomy ?>
	
	<div> <!-- Drop-down box -->
		<select onchange="filterTestimonials()">  
			<option value="">Bitte auswählen!</option><?php
			foreach($terms as $term){ ?>
				<option value="$term"><?php echo $term->name; ?></option> <?php
			} ?>
		</select> <?php
		
		while($loop->have_posts()) { // Loop through posts
			$loop->the_post(); ?>
			<div class="entry-content">
				<div class="title"><?php 
					the_title(); ?>
				</div>
				<div class="name"><?php
					echo get_post_meta( get_the_ID(), 'Vorname', true );
					echo " ".get_post_meta( get_the_ID(), 'Nachname', true ); ?>
				</div>
				<div class="store"><?php
					echo " ".get_post_meta( get_the_ID(), 'Unternehmen', true ); ?>
				</div>
				<div class="location"><?php
					echo " ".get_post_meta( get_the_ID(), 'Standort', true ); ?>
				</div>
				<div><?php 
					the_content(); ?>
				</div>
			</div><?php
		} ?>
	</div><?php
	
	return ob_get_clean();
}

add_shortcode('belbo', 'testimonials_shortcode'); // Function to register a shortcode handler









