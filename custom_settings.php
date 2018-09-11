<?php
function ft_my_plugin_menu() {
    add_options_page('Belbo Verknüpfung', 'Kundenreferenzen', 'manage_options', 'belbo-booking', 'ft_my_plugin_options');
}

if (is_admin()) {
	add_action('admin_menu', 'ft_my_plugin_menu');
	add_action('admin_init', 'ft_register_mysettings');
} else {

}

// The register_setting function should be called in an admin_init action, which runs before every admin page and in particular, options.php, which receives this form
function ft_register_mysettings() { // Whitelist options
  register_setting('belbo-option-group', 'background-color');
  register_setting('belbo-option-group', 'color');
  register_setting('belbo-option-group', 'columns');
}

function ft_my_plugin_options() {
	
	if ( !current_user_can( 'manage_options' ) )  {
			wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	} ?>
		
    <div class="wrap">
	
		<h2>Kundenreferenzen</h2>
     
		<p class="instruction">
			Auf dieser Seite können Sie die Hintergrundfarbe, die Schriftfarbe und die Anzahl der angezeigten Spalten ändern. </br>
			Die Farbe kann als Name oder als Hexadezimalzahl (in der Form #000000) eingegeben werden.
		</p>
	 
		<form method="post" action="options.php"> <?php
		
			settings_fields('belbo-option-group'); 
			do_settings_sections('belbo-option-group'); ?>
			
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
					
			<table class="form-table belbo-booking">
				<tr valign="top">
					<th scope="row">Anzahl der Spalten</th>
					<td>
						<select name="columns" selected="<?php echo esc_attr(get_option('columns')); ?>"> <?php
							$options = array(
								'option1' => '1',
								'option2' => '2',
								'option3' => '3'
							);
							foreach($options as $option) {		
							?>
								<option <?php echo ($option == esc_attr(get_option('columns'))) ? 'selected' : '';?>> 
									<?php echo $option; ?>
								</option> 
							<?php 
							} 
							?>
						</select>
					</td>
				</tr>
			</table> <?php

			submit_button(); ?>
			
		</form>

	</div> <?php
}

































