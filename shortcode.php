<?php

function testimonials_shortcode($atts) {

	$atts = shortcode_atts([
		'id' => 'client_testimonials'
		], $atts, 'belbo');

	$args = [
		'post_type' => 'testimonials',
		'posts_per_page' => 5
	];
	$loop = new WP_Query($args);

	ob_start(); 
	while($loop->have_posts()) {
		$loop->the_post();
		?>
			<div class="entry-content">
				<div class"title">
					<?php 
						the_title(); 
					?>
				</div>
				<div class="name">
					<?php
						echo get_post_meta( get_the_ID(), 'Vorname', true );
						echo " ".get_post_meta( get_the_ID(), 'Nachname', true );
					?>
				</div>
				<div class="store">
					<?php
						echo " ".get_post_meta( get_the_ID(), 'Unternehmen', true );
					?>
				</div>			
				<div>
					<?php 
						the_content(); 
					?>
				</div>
			</div>
		<?php	
	}		
	return ob_get_clean();
}
add_shortcode('belbo', 'testimonials_shortcode'); // Function to register a shortcode handler.

/* // Shortcode für die Filter-Tags
function tags_shortcode() {
	
	ob_start();
	?>
		<div> 
			<?php
				echo add_action('init', 'create_taxonomies');
			?>
		<div>
	<?php
	return ob_get_clean();
}
add_shortcode('tags','tags_shortcode'); */







