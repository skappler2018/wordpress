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
	
	<div> <!-- Drop-down box -->
		<div class="all-testimonials">
			<form>
				<input class="button" type="submit" value="Alle Referenzen">
			</form>
		</div>
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
		</div><?php
		
		while($loop->have_posts()) { // Loop through posts
			$loop->the_post();

			$locationtags = get_the_terms(get_the_ID(), 'location');
			$locationAsCSSClass = "";
			foreach ( $locationtags as $term ) {
				$locationAsCSSClass .= $term->name." ";
			}
			?>
			<div class="testimonial-content <?php echo $locationAsCSSClass; ?>">
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
					        <?php the_post_thumbnail(); ?>
				</div>
				<iframe width="560" height="315" src="https://www.youtube.com/embed/IcumSRaSoqk" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
			</div><?php
		} ?>
	</div><?php
	
	return ob_get_clean();
}

add_shortcode('belbo', 'testimonials_shortcode'); // Function to register a shortcode handler









