<?php
	/* Template Name: Testimonials Template */	
?>

<html>

<head>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<?php 
	wp_head();
?>

</head>

<body>
	<div>
		<div >
			<?php
				while (have_posts()) : the_post();
					get_template_part('content', 'page');	// to pull in the content.php file
				endwhile;
			?>
		</div>
	</div>
	
<script>

// change() : The change event is sent to an element when its value changes. (ist das Element <select> oder <option> ?)

// val() : Get the current value of the first element in the set of matched elements.

// show() : Display the matched elements.

function filterTestimonials() {
	$("select").change(function(){
		$(this).val();
		
// PHP code nicht in die JavaScript-Funktion schreiben?
/* 		<?php
		while($loop->have_posts()) { // Loop through posts, zunächst werden alle Posts angezeigt
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
		} ?> */
 
/* 		// Pseudocode
		wenn $(this).val() == 'Standort'
			dann entsprechendes <div class="entry-content">  .show()
		sonst
			.hide() */
			
		// Versuch Implementierung der Funktionen hide() und show()
		if ($(this).val() == 'Standort') {
			$(".entry-content").hide();
		}
			
	});
}

/* 
function filterTestimonials() { // funktioniert für alle
	$("select").change(function(){
		$(".entry-content").hide();
	});
}

function filterTestimonials() {
	$("select").change(function(){
		$(this).val().show();
	});
}

function filterTestimonials() {
	if ($(".entry-content") == $(this).value()) {	
		$(".entry-content").show();
}

function filterTestimonials() {
	if ($(this).val();) {
		$("entry-content").show();
	}
}

function filterTestimonials($term) {
	$("select").change(function(){
		var str = "";
		$(this).value();
	});
} 
*/

</script>

</body>

</html>


