$("form").submit(function(){ // Alle Referenzen anzeigen lassen
	$(".testimonial-content").show();
}); 

$("select").change(function(){ // Filtern
	$(".testimonial-content").hide();
	$(".testimonial-content." + $(this).val()).show();
});
