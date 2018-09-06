<?php function testimonials_shortcode($atts) {
	// Three parameters are passed to the shortcode callback function. You can choose to use any number of them including none of them.

	// $atts - an associative array of attributes, or an empty string if no attributes are given
	// $content - the enclosed content (if the shortcode is used in its enclosing form)
	// $tag - the shortcode tag, useful for shared callback functions

	$atts = shortcode_atts([
		'id' => 'client_testimonials'
		], $atts, 'belbo');

	$args = [
		'post_type' => 'testimonials',
		'posts_per_page' => 5
	];
	$loop = new WP_Query($args);
	
	ob_start(); 

	// Retrieve the terms in a given taxonomy 
	$terms = get_terms('location');
	$terms_branch = get_terms('branch'); 
	$terms_products = get_terms('products'); ?>
	
	<!-- HTML frontend page -->
	<div style="background-color:<?php echo esc_attr(get_option('background-color')); ?>; color:<?php echo esc_attr(get_option('color')); ?>;">
		<div>
			<form>
				<input class="button" type="submit" value="Alle Referenzen">
			</form>
		</div>
		<!-- Select boxes -->
		<div class="all-select-boxes">
			<div class="select-box">
				<select>  
					<option value="">Auswahl nach Standort</option><?php
					foreach($terms as $term){ ?>
						<option value="<?php echo $term->name; ?>"><?php echo $term->name; ?></option> <?php
					} ?>
				</select>
			</div>
			<div class="select-box">
				<select>  
					<option value="">Auswahl nach Branche</option> <?php
					foreach($terms_branch as $term_branch){ ?>
						<option value="<?php echo $term_branch->name; ?>"> <?php echo $term_branch->name; ?> </option> <?php
					} ?>
				</select>
			</div>
			<div class="select-box">
				<select>  
					<option value="">Auswahl nach Produkt</option> <?php
					foreach($terms_products as $term_products){ ?>
						<option value="<?php echo $term_products->name; ?>"> <?php echo $term_products->name; ?> </option>  <?php
					} ?>
				</select> 
			</div>
		</div>
		
		<!-- Show all testimonials -->
		<div class="all-testimonials grid-<?php echo esc_attr(get_option('columns')); ?>"> <?php
		
			// Loop through posts
			while($loop->have_posts()) {
				$loop->the_post();

				$locationtags = get_the_terms(get_the_ID(), 'location'); // Retrieve terms for tag 'location'
				$locationAsCSSClass = "";
				foreach($locationtags as $term) {
					$locationAsCSSClass .= $term->name." ";
				}
				
				$branchtags = get_the_terms(get_the_ID(), 'branch'); // Retrieve terms for tag 'branch'
				$branchAsCSSClass = "";
				foreach($branchtags as $term) {
					$branchAsCSSClass .= $term->name." ";
				}
				
				$productstags = get_the_terms(get_the_ID(), 'products'); // Retrieve terms for tag 'products'
				$productsAsCSSClass = "";
				foreach($productstags as $term) {
					$productsAsCSSClass .= $term->name." ";
				} ?>
				
				<!-- Show testimonials with custom fields information -->
				<div class="testimonial-content <?php echo $locationAsCSSClass . " " . $branchAsCSSClass . " " . $productsAsCSSClass; ?>">
					<div class="logo"> <?php
						echo get_post_meta( get_the_ID(), 'logoToUpload', true ); ?>
					</div>
					<div class="title"> <?php 
						the_title(); ?>
					</div>
					<div class="name"> <?php
						echo get_post_meta( get_the_ID(), 'first_name', true );
						echo " ".get_post_meta( get_the_ID(), 'last_name', true ); ?>
					</div>
					<div class="store"> <?php
						echo " ".get_post_meta( get_the_ID(), 'store', true ); ?>
					</div>
					<div class="location"> <?php
						echo " ".get_post_meta( get_the_ID(), 'Standort', true ); ?>
					</div>
					<div> <?php 
						the_content(); ?>
					</div>
				</div> <?php
			} ?>
		</div>
	</div> <?php
	
	return ob_get_clean();
}
add_shortcode('belbo', 'testimonials_shortcode');









