<?php
// Erstellung einer Custom-Settings-Seite

function my_plugin_menu() {
    add_options_page('Belbo Verknüpfung', 'Belbo', 'manage_options', 'belbo-booking', 'my_plugin_options');
}

if (is_admin()) {
	add_action('admin_menu', 'my_plugin_menu');
	add_action('admin_init', 'register_mysettings');
} else {

}

// The register_setting function should be called in an admin_init action, which runs before every admin page and in particular, options.php, which receives this form
function register_mysettings() { // Whitelist options
  register_setting('belbo-option-group', 'beispiel');
  register_setting('belbo-option-group', 'background-color');
  register_setting('belbo-option-group', 'color');
  register_setting('belbo-option-group', 'columns');
}

function my_plugin_options() {
	
	if ( !current_user_can( 'manage_options' ) )  {
			wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	} ?>
		
    <div class="wrap">
	
		<h2>Plugin Kundenreferenzen</h2>
     
		<form method="post" action="options.php"> <?php
		
		// Where to Save the Code:
		// You can either put the code for your options page in your plugin php file (or, for Themes, in functions.php), or you can // create a second file called options.php, for example, and include it using the php include function ...
		// => deshalb options.php bei action entfernt, dann wieder eingefuegt
		
		settings_fields('belbo-option-group'); //The setting fields will know which settings your options page will handle.
		do_settings_sections('belbo-option-group'); // This function replaces the form-field markup in the form itself. (???) ?>
			
			<table class="form-table belbo-booking">
				<tr valign="top">
					<th scope="row">Hintergrundfarbe</th>
					<td>
						<input type="text" name="background-color" value="<?php echo esc_attr(get_option('background-color')); ?>">
					</td>
				</tr>
			</table>
			
			<table class="form-table belbo-booking">
				<tr valign="top">
					<th scope="row">Schriftfarbe</th>
					<td>
						<input type="text" name="color" value="<?php echo esc_attr(get_option('color')); ?>">
					</td>
				</tr>
			</table>
					
			<!-- following table loeschen -->		
					
			<table class="form-table belbo-booking">
				<tr valign="top">
					<th scope="row">Anzahl der Spalten</th>
					<td>
						<select name="columns">
							<option hidden selected><?php echo esc_attr(get_option('columns')); ?></option>
							<option>1</option>
							<option>2</option>
							<option>3</option>
						<select>
					</td> 
				</tr>
			</table> 
			
			<!-- for optiones selected schleife reinbasteln -->
			<!-- following table in process -->
			
			<table class="form-table belbo-booking">
				<tr valign="top">
					<th scope="row">Anzahl der Spalten</th>
					<td>
						<select name="columns">
							<option><?php 
								if (esc_attr(get_option('columns')) == 1) {
									echo esc_attr(get_option('columns')); 
								}?>
							</option>
							<option><?php 
								if (esc_attr(get_option('columns')) == 2) {
									echo esc_attr(get_option('columns')); 
								}?>
							</option>
							<option><?php 
								if (esc_attr(get_option('columns')) == 3) {
									echo esc_attr(get_option('columns')); 
								}?>
							</option>
						<select>
					</td> 
				</tr>
			</table><?php

			submit_button(); ?>
			
		</form>

	</div> <?php
}

































