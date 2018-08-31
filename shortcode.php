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

	$terms = get_terms('location'); // Retrieve the terms in a given taxonomy 
	$terms_branch = get_terms('branch'); 
	$terms_products = get_terms('products'); ?>
	
	<div style="background-color:<?php echo esc_attr(get_option('background-color')); ?>; color:<?php echo esc_attr(get_option('color')); ?>;"> <!-- Drop-down box -->
		<div>
			<form>
				<input class="button" type="submit" value="Alle Referenzen">
			</form>
		</div>
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
					<option value="">Auswahl nach Branche</option><?php
					foreach($terms_branch as $term_branch){ ?>
						<option value="<?php echo $term_branch->name; ?>"><?php echo $term_branch->name; ?></option> <?php
					} ?>
				</select>
			</div>
			<div class="select-box">
				<select>  
					<option value="">Auswahl nach Produkt</option><?php
					foreach($terms_products as $term_products){ ?>
						<option value="<?php echo $term_products->name; ?>"><?php echo $term_products->name; ?></option> <?php
					} ?>
				</select> 
			</div>
		</div>
		
		<!-- Anzeige aller Referenzen -->
		
		<!-- <div class="all-testimonials" style="grid-template-columns: 1fr 1fr 1fr;"> -->
		<div class="all-testimonials grid-<?php echo esc_attr(get_option('columns')); ?>"> <?php
		
			while($loop->have_posts()) { // Loop through posts
				$loop->the_post();

				$locationtags = get_the_terms(get_the_ID(), 'location'); // Retrieve terms to tag 'location'
				$locationAsCSSClass = "";
				foreach($locationtags as $term) {
					$locationAsCSSClass .= $term->name." ";
				}
				
				$branchtags = get_the_terms(get_the_ID(), 'branch'); // Retrieve terms to tag 'branch'
				$branchAsCSSClass = "";
				foreach($branchtags as $term) {
					$branchAsCSSClass .= $term->name." ";
				}
				
				$productstags = get_the_terms(get_the_ID(), 'products'); // Retrieve terms to tag 'products'
				$productsAsCSSClass = "";
				foreach($productstags as $term) {
					$productsAsCSSClass .= $term->name." ";
				}
				
				?>
				<div class="testimonial-content <?php echo $locationAsCSSClass . " " . $branchAsCSSClass . " " . $productsAsCSSClass; ?>">
					<div class="logo"><?php
						echo get_post_meta( get_the_ID(), 'logoToUpload', true ); ?>
					</div>
					<div class="title"><?php 
						the_title(); ?>
					</div>
					<div class="name"><?php
						echo get_post_meta( get_the_ID(), 'first_name', true );
						echo " ".get_post_meta( get_the_ID(), 'last_name', true ); ?>
					</div>
					<div class="store"><?php
						echo " ".get_post_meta( get_the_ID(), 'store', true ); ?>
					</div>
					<div class="location"><?php
						echo " ".get_post_meta( get_the_ID(), 'Standort', true ); ?>
					</div>
					<div><?php 
						the_content(); ?>
								<?php the_post_thumbnail(); ?>
					</div>
					<iframe width="789" height="337" src="https://www.youtube.com/embed/hzixp8s4pyg" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
				</div><?php
			} ?>
		</div>
	</div><?php
	
	return ob_get_clean();
}

add_shortcode('belbo', 'testimonials_shortcode'); // Function to register a shortcode handler









