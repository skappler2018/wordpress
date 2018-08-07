<?php function testimonials_shortcode($atts) {

	$atts = shortcode_atts([
		'id' => 'client_testimonials'
		], $atts, 'belbo');

	$args = [
		'post_type' => 'testimonials',
		'tax_query' => [
			[
				'taxonomy' => 'location',
				'field' => 'slug',
				'terms' => 'muenchen'
			]
		]
	];
	
	$query = new WP_Query($args);
	
	ob_start(); 

	$terms = get_terms('location'); // Retrieve the terms in a given taxonomy ?>
	
	<div> <!-- Drop-down box -->
		<select>  
			<option value="">Bitte auswählen!</option><?php
			foreach($terms as $term){ ?>
				<option value="$term"><?php echo $term->name; ?></option> <?php
			} ?>
		</select> <?php
		
		while($query->have_posts()) { // Loop through posts
			$query->the_post(); 
			 // if (has_term('muenchen')) { ?>
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
					<div><?php 
						the_content(); ?>
					</div>
				</div><?php
		//	}
		} ?>
	</div><?php
	
	return ob_get_clean();
}

add_shortcode('belbo', 'testimonials_shortcode'); // Function to register a shortcode handler









