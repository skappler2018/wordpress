<?php 
function ft_testimonials_shortcode() {

	$args = [
		'post_type' => 'testimonials',
		'posts_per_page' => 10
	];
	
	$loop = new WP_Query($args);
	
	ob_start(); 

	// Retrieve the terms in a given taxonomy 
	$terms = get_terms('location');
	$terms_branch = get_terms('branch'); 
	$terms_products = get_terms('products'); ?>
	
	<!-- HTML frontend page -->
	<div style="padding: 10px; background-color:<?php echo esc_attr(get_option('background-color')); ?>; color:<?php echo esc_attr(get_option('color')); ?>;">
		<div class="ft-filter">
			<form>
				<input class="ft-button" type="submit" value="Alle Referenzen">
			</form>
		</div>
		
		<!-- Select boxes -->
		<div class="all-select-boxes ft-filter"> <?php
		
			if (count($terms) > 0) { ?>
				<div class="select-box"> 
					<select>  
						<option value="">Auswahl nach Standort</option> <?php
						foreach($terms as $term){ ?>
							<option value="<?php echo $term->name; ?>"><?php echo $term->name; ?></option><?php
						} ?>
					</select>
				</div> <?php
			} 
			
			if (count($terms_branch) > 0) { ?>
				<div class="select-box"> 
					<select>  
						<option value="">Auswahl nach Branche</option> <?php
						foreach($terms_branch as $term_branch){ ?>
							<option value="<?php echo $term_branch->name; ?>"><?php echo $term_branch->name; ?></option> <?php
						} ?>
					</select> 	
				</div> <?php
			} 
			
			if (count($terms_products) > 0) { ?>
				<div class="select-box">
					<select>  
						<option value="">Auswahl nach Produkt</option> <?php
						foreach($terms_products as $term_products){ ?>
							<option value="<?php echo $term_products->name; ?>"><?php echo $term_products->name; ?></option> <?php
						} ?>
					</select> 
				</div> <?php
			} ?>
			
		</div>
		
		<!-- Show all testimonials -->
		<div class="all-testimonials grid-<?php echo esc_attr(get_option('columns')); ?>"> <?php
		
			// Loop through posts
			while($loop->have_posts()) {
				$loop->the_post();

				$locationtags = get_the_terms(get_the_ID(), 'location'); // Retrieve terms for tag 'location'
				$locationAsCSSClass = "";
				if ($locationtags > 0) {
					foreach($locationtags as $term) {
						$locationAsCSSClass .= $term->name." ";
					}
				}
				
				$branchtags = get_the_terms(get_the_ID(), 'branch'); // Retrieve terms for tag 'branch'
				$branchAsCSSClass = "";
				if ($branchtags > 0) {
					foreach($branchtags as $term) {
						$branchAsCSSClass .= $term->name." ";
					}
				}
				
				$productstags = get_the_terms(get_the_ID(), 'products'); // Retrieve terms for tag 'products'
				$productsAsCSSClass = "";
				if ($productstags > 0) {
					foreach($productstags as $term) {
						$productsAsCSSClass .= $term->name." ";
					}
				} ?>
				
				<!-- Show testimonials with custom fields information -->
				<div class="testimonial-content <?php echo $locationAsCSSClass . " " . $branchAsCSSClass . " " . $productsAsCSSClass; ?>">
					<div class="logo"> <?php
						echo get_post_meta( get_the_ID(), 'logoToUpload', true ); ?>	
					</div>
					<div class="name"> <?php 
						if (has_post_thumbnail( get_the_ID())) {
							echo "<img class='thumb' src='".get_the_post_thumbnail_url( get_the_ID(), "thumbnail")."' />";
						} ?>
						<span> <?php
							echo get_post_meta( get_the_ID(), 'first_name', true );
							echo " ".get_post_meta( get_the_ID(), 'last_name', true ); ?> <br/>
						</span>
					</div>
					<div>
						<span> <?php 						
							echo " ".get_post_meta( get_the_ID(), 'store', true );
							echo ", " . get_post_meta( get_the_ID(), 'location', true ); ?>
						</span>
					</div>
					<div style="flex: 1"> <?php 
						the_content(); 
						if (get_post_meta( get_the_ID(), 'url', true )) { ?>
							<a href="<?php
								echo " ".get_post_meta( get_the_ID(), 'url', true ); ?>"> <?php
								echo " ".get_post_meta( get_the_ID(), 'store', true ); ?>
							</a> <?php 
						} ?>
					</div>
					<div> <?php
						if (get_post_meta( get_the_ID(), 'video', true )) { ?>
							<iframe src="https://www.youtube.com/embed/<?php echo get_post_meta( get_the_ID(), 'video', true ); ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen>
							</iframe> <?php 
						} ?>
					</div> 
				</div> <?php
				
			} ?>
			
		</div>
	</div> <?php
	
	return ob_get_clean();
}
add_shortcode('testimonialsShortcode', 'ft_testimonials_shortcode');











