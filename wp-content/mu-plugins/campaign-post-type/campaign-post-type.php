<?php
/**
 * Campaign Post Type
 *
 * @package   Campaign_Post_Type
 * @license   GPL-2.0+
 *
 * @wordpress-plugin
 * Plugin Name: Campaign Post Type
 * Plugin URI:  http://github.com/devinsays/team-post-type
 * Description: Enables a campaign post type, taxonomy and metaboxes.
 * Version:     0.1.0
 * Author:      Portent
 * Author URI:  http://github.com/devinsays/team-post-type
 * Text Domain: campaign-post-type
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path: /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Required files for registering the post type and taxonomies.
require plugin_dir_path( __FILE__ ) . 'includes/class-post-type.php';
require plugin_dir_path( __FILE__ ) . 'includes/class-post-type-registrations.php';
require plugin_dir_path( __FILE__ ) . 'includes/class-post-type-metaboxes.php';

// Instantiate registration class, so we can add it as a dependency to main plugin class.
$post_type_registrations = new Campaign_Post_Type_Registrations;

// Instantiate main plugin file, so activation callback does not need to be static.
$post_type = new Campaign_Post_Type( $post_type_registrations );

// Register callback that is fired when the plugin is activated.
register_activation_hook( __FILE__, array( $post_type, 'activate' ) );

// Initialize registrations for post-activation requests.
$post_type_registrations->init();

// Initialize metaboxes
//$post_type_metaboxes = new Success_Story_Post_Type_Metaboxes;
//$post_type_metaboxes->init();


/**
 * Adds styling to the dashboard for the post type and adds team posts
 * to the "At a Glance" metabox.
 */
if ( is_admin() ) {

	// Loads for users viewing the WordPress dashboard
	if ( ! class_exists( 'Dashboard_Glancer' ) ) {
		require plugin_dir_path( __FILE__ ) . 'includes/class-dashboard-glancer.php';  // WP 3.8
	}

	require plugin_dir_path( __FILE__ ) . 'includes/class-post-type-admin.php';

	$post_type_admin = new Campaign_Post_Type_Admin( $post_type_registrations );
	$post_type_admin->init();

}

function getCampaignsByPostalCode($postalcode) {
  // strip out any spaces
  $postalcode = str_replace(" ", "", $postalcode);
  // grab the location/patch that defines this postal code as being serviced
  $location = getLocationByPostalCode($postalcode);
  
  if ($location) {
    $posts = get_posts(array(
      'numberposts'   => 1,
      'post_type'     => 'campaign',
      'post_status'   => 'publish',
      'meta_query'    => array(
        array(
          'key' => 'locations',
          'value' => $location->ID,
          'compare' => 'LIKE'
        )
      )
    ));
    if (sizeof($posts) > 0)
      return $posts;
    else
      return array(-1);
  }
  return array(-1);
}