<?php

function testimonials_shortcode($atts) {

	$atts = shortcode_atts([
		'id' => '7'
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
			<?php the_title(); ?>
			<?php the_content(); ?>
		</div>
		<?php	
	}		
	return ob_get_clean();
}
add_shortcode('belbo', 'testimonials_shortcode');