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
</body>

</html>


