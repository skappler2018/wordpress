<?php
	/* Template Name: Testimonials Template */	
?>

<div >
	<?php
		while (have_posts()) : the_post();
			get_template_part('content', 'page');	// to pull in the content.php file
		endwhile;
	?>
</div>


