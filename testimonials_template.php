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
	
<script type="text/javascript">

$("form").submit(function(){ // Alle Referenzen anzeigen lassen
	$(".testimonial-content").show();
}); 

$("select").change(function(){ // Filtern
	$(".testimonial-content").hide();
	$(".testimonial-content." + $(this).val()).show();
});

function test() {
	alert("hello");
};

</script>

</body>

</html>


