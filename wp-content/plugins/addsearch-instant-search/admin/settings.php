<?php

/* Exit if accessed directly. */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Add options page under Settings >> AddSearch.
 *
 * @since  1.1.0
 * @return void
 */
function addsearch_add_setting_page() {

	global $addsearch_settings_page;

	$addsearch_settings_page = add_options_page( __( 'AddSearch settings', 'addsearch' ), __( 'AddSearch', 'addsearch' ), apply_filters( 'addsearch_settings_capability', 'manage_options' ), 'addsearch-options', 'addsearch_options_page' );

}
add_action( 'admin_menu', 'addsearch_add_setting_page' );

/**
 * Registers the plugin settings.
 *
 * @since  1.1.0
 * @return void
 */
function addsearch_register_settings() {
	register_setting( 'addsearch_settings_group', 'addsearch_settings', 'addsearch_settings_sanitize' );
}
add_action( 'admin_init', 'addsearch_register_settings' );

/**
 * Options page.
 *
 * @return void
 */
function addsearch_options_page() {
	/* Get customer key from settings. */
	$addsearch_settings     = get_option( 'addsearch_settings' );
	$addsearch_customer_key = $addsearch_settings['customer_key'];
	$addsearch_installation = $addsearch_settings['installation_method'];
	$config_settings = $addsearch_settings['config'];

	ob_start(); ?>
	<div class="wrap">

		<h2><?php _e( 'AddSearch Settings', 'addsearch' ); ?></h2>

		<form method="post" action="options.php">

			<?php settings_fields( 'addsearch_settings_group' ); ?>

			<table class="form-table">
				<tbody>
					<tr valign="top">
						<th scope="row"><label><?php _e( 'Your Site Key', 'addsearch' ); ?></label></th>
						<td>
							<label>
								<input type="text" name="addsearch_settings[customer_key]" id="customer_key" required class="regular-text" value="<?php echo esc_attr( $addsearch_customer_key ); ?>" />
								<p class="description"><?php echo sprintf( _x( 'Enter your Site Key. This will replace all search forms in your site with AddSearch. This means all instances off %s.', '%s stands for function get_search_form()', 'addsearch' ), '<code>get_search_form()</code>' ); ?></p>
							</label>
						</td>
					</tr>
				</tbody>
			</table>

			<table class="form-table addsearch-settings">
				<tbody>

					<tr valign="top">
						<th scope="row"><label><?php _e( 'Installation method', 'addsearch' ); ?></label></th>
						<td>
							<label>
							<?php
							    $installation_types_old = array( 
									'widgetv2' => esc_html__('Search as you type (New version)', 'addsearch'),
									'resultpagev2' => esc_html__('Separate page for results (New version)', 'addsearch'),
									'widget' => esc_html__('Search as you type (Old version)', 'addsearch'),
									'resultpage' => esc_html__('Separate page for results (Old version)', 'addsearch'),
								);
							    $installation_types_new = array( 
									'widgetv2' => esc_html__('Search as you type', 'addsearch'),
									'resultpagev2' => esc_html__('Separate page for results', 'addsearch'),
								);
								if ( AddSearch::get_instance()->has_prexisting_install() ) {
									$installation_types = $installation_types_old;
								} else { 
									$installation_types = $installation_types_new;
								}
							?>
								<select name="addsearch_settings[installation_method]" id="installation_method">
									<?php
										foreach( $installation_types as $type => $label ) {
									?>
									<option value="<?php echo esc_attr( $type ); ?>" <?php selected( $addsearch_installation, $type ); ?>><?php echo $label; ?></option>
									<?php
										}
									?>
								</select>
								<p class="description">
									<?php _e('Select whether you want to have results as you type, or a separate page for results.', 'addsearch'); ?>
								</p>
							</label>
						</td>
					</tr>

					<!-- widget config -->
					<tr valign="top" style="display: none" class="v2config widgetv2config">
						<th colspan="2" scope="row"><label><?php _e( 'Settings', 'addsearch' ); ?></label></th>
					</tr>
					<tr valign="top" style="display: none" class="v2config widgetv2config">
						<th><label><?php _e( 'Throttle time (milliseconds)', 'addsearch' ); ?></label></th>
						<td>
							<input type="number" min="0" placeholder="300" name="addsearch_settings[config][widgetv2][api_throttle_time]" value="<?php echo empty( $config_settings['api_throttle_time'] ) ? 300 : esc_attr( $config_settings['api_throttle_time'] ); ?>">
						</td>
					</tr>
					<tr valign="top" style="display: none" class="v2config widgetv2config">
						<th><label><?php _e( 'Sort by', 'addsearch' ); ?></label></th>
						<td>
							<?php
								$sortby = array(
									'relevance' => __( 'Relevance', 'addsearch' ),
									'date' => __( 'Date', 'addsearch' ),
								);
							?>
							<select name="addsearch_settings[config][widgetv2][default_sortby]">
							<?php
								foreach ( $sortby as $value => $label ) {
							?>
								<option value="<?php echo esc_attr( $value ); ?>" <?php selected( $config_settings['default_sortby'], $value ); ?>><?php echo esc_html( $label ); ?></option>
							<?php
								}
							?>
							</select>
						</td>
					</tr>
					<tr valign="top" style="display: none" class="v2config widgetv2config">
						<th><label><?php _e( 'Display Date', 'addsearch' ); ?></label></th>
						<td>
							<?php
								$noYes = array(
									'false' => __( 'No', 'addsearch' ),
									'true' => __( 'Yes', 'addsearch' ),
								);
								$yesNo = array(
									'true' => __( 'Yes', 'addsearch' ),
									'false' => __( 'No', 'addsearch' ),
								);
							?>
							<select name="addsearch_settings[config][widgetv2][display_date]">
							<?php
								foreach ( $noYes as $value => $label ) {
							?>
								<option value="<?php echo esc_attr( $value ); ?>" <?php selected( $config_settings['display_date'], $value ); ?>><?php echo esc_html( $label ); ?></option>
							<?php
								}
							?>
							</select>
						</td>
					</tr>
					<tr valign="top" style="display: none" class="v2config widgetv2config">
						<th><label><?php _e( 'Placeholder', 'addsearch' ); ?></label></th>
						<td>
							<input type="text" name="addsearch_settings[config][widgetv2][placeholder]" value="<?php echo empty( $config_settings['placeholder'] ) ? 'Search' : esc_attr( $config_settings['placeholder'] ); ?>">
						</td>
					</tr>
					<tr valign="top" style="display: none" class="v2config widgetv2config">
						<th><label><?php _e( 'Show Suggestions', 'addsearch' ); ?></label></th>
						<td>
							<select name="addsearch_settings[config][widgetv2][show_search_suggestions]">
							<?php
								foreach ( $yesNo as $value => $label ) {
							?>
								<option value="<?php echo esc_attr( $value ); ?>" <?php selected( $config_settings['show_search_suggestions'], $value ); ?>><?php echo esc_html( $label ); ?></option>
							<?php
								}
							?>
							</select>
						</td>
					</tr>
					<tr valign="top" style="display: none" class="v2config widgetv2config">
						<th><label><?php _e( 'Suggestion position', 'addsearch' ); ?></label></th>
						<td>
							<?php
								$positions = array(
									'left' => __( 'Left', 'addsearch' ),
									'right' => __( 'Right', 'addsearch' ),
								);
							?>
							<select name="addsearch_settings[config][widgetv2][search_suggestion_position]">
							<?php
								foreach ( $positions as $value => $label ) {
							?>
								<option value="<?php echo esc_attr( $value ); ?>" <?php selected( $config_settings['search_suggestion_position'], $value ); ?>><?php echo esc_html( $label ); ?></option>
							<?php
								}
							?>
							</select>
						</td>
					</tr>
					<tr valign="top" style="display: none" class="v2config widgetv2config">
						<th><label><?php _e( 'Results box alignment', 'addsearch' ); ?></label></th>
						<td>
							<?php
								$alignments = array(
									'right' => __( 'Right', 'addsearch' ),
									'left' => __( 'Left', 'addsearch' ),
								);
							?>
							<select name="addsearch_settings[config][widgetv2][results_box_opening_direction]">
							<?php
								foreach ( $alignments as $value => $label ) {
							?>
								<option value="<?php echo esc_attr( $value ); ?>" <?php selected( $config_settings['results_box_opening_direction'], $value ); ?>><?php echo esc_html( $label ); ?></option>
							<?php
								}
							?>
							</select>
						</td>
					</tr>
					<!-- widget config -->

					<!-- srp config -->
					<tr valign="top" style="display: none" class="v2config resultpagev2config">
						<th colspan="2" scope="row"><label><?php _e( 'Settings', 'addsearch' ); ?></label></th>
					</tr>
					<tr valign="top" style="display: none" class="v2config resultpagev2config">
						<th><label><?php _e( 'Display Sort by', 'addsearch' ); ?></label></th>
						<td>
							<select name="addsearch_settings[config][resultpagev2][display_sortby]">
							<?php
								foreach ( $yesNo as $value => $label ) {
							?>
								<option value="<?php echo esc_attr( $value ); ?>" <?php selected( $config_settings['display_sortby'], $value ); ?>><?php echo esc_html( $label ); ?></option>
							<?php
								}
							?>
							</select>
						</td>
					</tr>
					<tr valign="top" style="display: none" class="v2config resultpagev2config">
						<th><label><?php _e( 'Sort by', 'addsearch' ); ?></label></th>
						<td>
							<?php
								$sortby = array(
									'relevance' => __( 'Relevance', 'addsearch' ),
									'date' => __( 'Date', 'addsearch' ),
								);
							?>
							<select name="addsearch_settings[config][resultpagev2][default_sortby]">
							<?php
								foreach ( $sortby as $value => $label ) {
							?>
								<option value="<?php echo esc_attr( $value ); ?>" <?php selected( $config_settings['default_sortby'], $value ); ?>><?php echo esc_html( $label ); ?></option>
							<?php
								}
							?>
							</select>
						</td>
					</tr>
					<tr valign="top" style="display: none" class="v2config resultpagev2config">
						<th><label><?php _e( 'Display Date', 'addsearch' ); ?></label></th>
						<td>
							<?php
								$noYes = array(
									'false' => __( 'No', 'addsearch' ),
									'true' => __( 'Yes', 'addsearch' ),
								);
							?>
							<select name="addsearch_settings[config][resultpagev2][display_date]">
							<?php
								foreach ( $noYes as $value => $label ) {
							?>
								<option value="<?php echo esc_attr( $value ); ?>" <?php selected( $config_settings['display_date'], $value ); ?>><?php echo esc_html( $label ); ?></option>
							<?php
								}
							?>
							</select>
						</td>
					</tr>
					<tr valign="top" style="display: none" class="v2config resultpagev2config">
						<th><label><?php _e( 'Display Category', 'addsearch' ); ?></label></th>
						<td>
							<select name="addsearch_settings[config][resultpagev2][display_category]">
							<?php
								foreach ( $yesNo as $value => $label ) {
							?>
								<option value="<?php echo esc_attr( $value ); ?>" <?php selected( $config_settings['display_category'], $value ); ?>><?php echo esc_html( $label ); ?></option>
							<?php
								}
							?>
							</select>
						</td>
					</tr>
					<tr valign="top" style="display: none" class="v2config resultpagev2config">
						<th><label><?php _e( 'Display Results Count', 'addsearch' ); ?></label></th>
						<td>
							<select name="addsearch_settings[config][resultpagev2][display_results_count]">
							<?php
								foreach ( $yesNo as $value => $label ) {
							?>
								<option value="<?php echo esc_attr( $value ); ?>" <?php selected( $config_settings['display_results_count'], $value ); ?>><?php echo esc_html( $label ); ?></option>
							<?php
								}
							?>
							</select>
						</td>
					</tr>
					<tr valign="top" style="display: none" class="v2config resultpagev2config">
						<th><label><?php _e( 'Placeholder', 'addsearch' ); ?></label></th>
						<td>
							<input type="text" name="addsearch_settings[config][resultpagev2][placeholder]" value="<?php echo empty( $config_settings['placeholder'] ) ? 'Search' : esc_attr( $config_settings['placeholder'] ); ?>">
						</td>
					</tr>
					<tr valign="top" style="display: none" class="v2config resultpagev2config">
						<th><label><?php _e( 'Show Suggestions', 'addsearch' ); ?></label></th>
						<td>
							<select name="addsearch_settings[config][resultpagev2][show_search_suggestions]">
							<?php
								foreach ( $noYes as $value => $label ) {
							?>
								<option value="<?php echo esc_attr( $value ); ?>" <?php selected( $config_settings['show_search_suggestions'], $value ); ?>><?php echo esc_html( $label ); ?></option>
							<?php
								}
							?>
							</select>
						</td>
					</tr>
					<tr valign="top" style="display: none" class="v2config resultpagev2config">
						<th><label><?php _e( 'Number of results', 'addsearch' ); ?></label></th>
						<td>
							<input type="number" min="0" placeholder="10" name="addsearch_settings[config][resultpagev2][number_of_results]" value="<?php echo empty( $config_settings['number_of_results'] ) ? 10 : esc_attr( $config_settings['number_of_results'] ); ?>">
						</td>
					</tr>
					<tr valign="top" style="display: none" class="v2config resultpagev2config">
						<th><label><?php _e( 'Show Image', 'addsearch' ); ?></label></th>
						<td>
							<select name="addsearch_settings[config][resultpagev2][display_result_image]">
							<?php
								foreach ( $yesNo as $value => $label ) {
							?>
								<option value="<?php echo esc_attr( $value ); ?>" <?php selected( $config_settings['display_result_image'], $value ); ?>><?php echo esc_html( $label ); ?></option>
							<?php
								}
							?>
							</select>
						</td>
					</tr>
					<!-- srp config -->

				</tbody>
			</table>

			<?php submit_button(); ?>

			<table class="form-table addsearch-instructions">
				<tbody>
					<tr valign="top">
						<th scope="row"><label><?php _e( 'Here is how to configure the AddSearch Plugin', 'addsearch' ); ?></label></th>
					</tr>
					<tr valign="top">
						<td>
							<ol>
								<li><?php echo sprintf( __( 'Sign-Up for <a href="%s" target="_blank">AddSearch Trial</a> using your WordPress email', 'addsearch' ),
								'https://app.addsearch.com/signup/user?utm_campaign=Wordpress%20Plugin&utm_source=wordpress_plugin' ); ?></li>
								<li><?php _e( 'When prompted by the installation wizard, click index my website and choose set up crawling option in the next step', 'addsearch' ); ?></li>
								<li><?php _e( 'Enter the URL for your website on the next step and click begin crawling', 'addsearch' ); ?></li>
								<li><?php _e( 'Open the AddSearch dashboard, go to Setup -> Keys and Installation and copy your public site key under Your Site Key', 'addsearch' ); ?></li>
								<li><?php _e( 'Install and activate the AddSearch plugin from the WordPress admin interface', 'addsearch' ); ?></li>
								<li><?php _e( 'Paste the Site Key in Settings -> AddSearch and click Save', 'addsearch' ); ?></li>
								<li><?php _e( 'Select whether you want to use search-as-you-type search widget (default), or separate results page', 'addsearch' ); ?></li>
								<li><?php _e( 'Test your website and see if the search is working', 'addsearch' ); ?></li>
								<li><?php _e( 'If you see the AddSearch bar being displayed in bottom left corner it means search is not enabled in your theme. Go to your theme settings and
enable search', 'addsearch' ); ?></li>
								<li><?php echo sprintf( __( 'You can also add %s shortcode to anyplace where you want to place the search bar', 'addsearch' ), '<code>[addsearch]</code>' ); ?></li>
								<li><?php echo sprintf( __( 'Please note that Gutenberg plug-in search component is not automatically replaced with AddSearch Search component. We advise Gutenberg users to use the %s shortcode.', 'addsearch' ), '<code>[addsearch]</code>' ); ?></li>
								<li><?php _e( 'You\'re done - congrats! :)', 'addsearch' ); ?></li>
								<li><?php echo sprintf( __( 'For more details, follow our instructions on %show to install AddSearch on WordPress%s.', 'addsearch' ), '<a href="https://www.addsearch.com/docs/installation/wordpress/?utm_campaign=Wordpress%20Plugin&utm_source=wordpress_plugin" target="_new">', '</a>' ); ?></li>
							</ol>
						</td>
					</tr>
				</tbody>
			</table>

		</form>

	</div>
	<?php
	echo ob_get_clean();
}

/**
 * Sanitize each setting field as needed
 *
 * @since  1.1.0
 * @param  array $input Contains all settings fields as array keys.
 * @return array $new_input Returns all sanitized settings as array
 */
function addsearch_settings_sanitize( $input ) {
	$required_fields = [ 'customer_key', 'installation_method' ];

	$new_input = array();

	foreach ( $required_fields as $field ) {
		if ( isset( $input[ $field ] ) ) {
			$new_input[ $field ] = sanitize_text_field( $input[ $field ] );
		}
	}

	if ( strpos( $new_input['installation_method'], 'v2' ) !== false && isset( $input[ 'config' ] ) ) {
		foreach ( $input[ 'config' ][$new_input['installation_method']] as $field => $value ) {
			$new_input['config'][ $field ] = sanitize_text_field( $input['config'][$new_input['installation_method']][ $field ] );
		}
	}

	return $new_input;

}
