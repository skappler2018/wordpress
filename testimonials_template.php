<?php
	/* Template Name: Testimonials Template */	
?>

<html>

<head>

<?php 
	wp_head();
?>

<style>

.edit-link {
	display: none;
}

.entry-content {
	display: flex;
	flex-wrap: wrap;
	margin-right: 10px;
	margin-bottom: 10px;
}

.entry-content > .entry-content {
	min-width: 300px;
	max-width: 500px;
	border: 1px solid grey;
}

</style>

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


