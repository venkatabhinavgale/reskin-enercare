<?php
/**
 * Location Post Type
 *
 * @package   Location_Post_Type
 * @license   GPL-2.0+
 *
 * @wordpress-plugin
 * Plugin Name: Location Post Type
 * Plugin URI:  http://github.com/devinsays/team-post-type
 * Description: Enables a faq post type, taxonomy and metaboxes.
 * Version:     0.1.0
 * Author:      Portent
 * Author URI:  http://github.com/devinsays/team-post-type
 * Text Domain: lp-post-type
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
$post_type_registrations = new Location_Post_Type_Registrations;

// Instantiate main plugin file, so activation callback does not need to be static.
$post_type = new Location_Post_Type( $post_type_registrations );

// Register callback that is fired when the plugin is activated.
register_activation_hook( __FILE__, array( $post_type, 'activate' ) );

// Initialize registrations for post-activation requests.
$post_type_registrations->init();

// Initialize metaboxes
//$post_type_metaboxes = new LP_Post_Type_Metaboxes;
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

	$post_type_admin = new Location_Post_Type_Admin( $post_type_registrations );
	$post_type_admin->init();

}

/**
 * Function that queries locations to find one that services the provided postal code
 */
function getLocationByPostalCode($postalcode) {
  // strip out any spaces
  $postalcode = str_replace(" ", "", $postalcode);
  $posts = get_posts(array(
    'numberposts'   => 1,
    'post_type'     => 'location',
    'post_status'   => 'publish',
    'meta_query'    => array(
      array(
        'key' => 'postal_codes',
        'value' => $postalcode,
        'compare' => 'LIKE'
      )
    )
  ));
  if (sizeof($posts) > 0)
    return $posts[0];
  else
    return null;
}

/**
 * Location Info
 *
 */
function getLocationInfo($post_id, $cta_type = 'location') {
  $content = '';
  if (get_field('address', $post_id)) {
    $address_url = trim(get_field('address', $post_id));
    $address_url = str_replace("<br />", "+", $address_url);
    $address_url = str_replace("\n", "+", $address_url);
    $address_url = str_replace(" ", "+", $address_url);
    $address_url = "https://www.google.com/maps/place/" . $address_url;
    $content .= '<div class="location-group"><img src="' . get_template_directory_uri() . '/assets/icons/maps/place_black_24dp_rounded.svg" class="location-group__icon" /><div class="location-group__content"><strong>Address</strong><br /><a href="' . $address_url . '"  target="_blank">' . get_field('address', $post_id) . '</a></div></div>';
  }
  
  if (have_rows('phone_numbers', $post_id)) {
    $content .= '<div class="location-group"><img src="' . get_template_directory_uri() . '/assets/icons/communication/phone_black_24dp_rounded.svg" class="location-group__icon" /><div class="location-group__content"><strong>Phone number</strong><br />';
    $rowCount = count(get_field('phone_numbers', $post_id));
    while ( have_rows('phone_numbers', $post_id) ) { the_row();
      $content .= '<strong>' . get_sub_field('phone_label') . ':</strong> ';
      $phone_url = str_replace(' ','',get_sub_field('phone_number'));
      $phone_url = str_replace('-','',$phone_url);
      $phone_url = str_replace('(','',$phone_url);
      $phone_url = str_replace(')','',$phone_url);
      $content .= '<a href="tel:' . $phone_url  . '">' . get_sub_field('phone_number') . '</a>';
      if (get_row_index() < $rowCount)
        $content .= '<br />';
    }
    $content .= '</div></div>';
  }
  
  if (have_rows('hours', $post_id)) {
    $content .= '<div class="location-group"><img src="' . get_template_directory_uri() . '/assets/icons/action/schedule_black_24dp_rounded.svg" class="location-group__icon" /><div class="location-group__content"><strong>Hours</strong><br />';
    $rowCount = count(get_field('hours', $post_id));
    while ( have_rows('hours', $post_id) ) { the_row();
      $content .= '<strong>' . get_sub_field('hours_label') . ':</strong> ';
      $content .= get_sub_field('hours_open');
      if (get_row_index() < $rowCount)
        $content .= '<br />';
    }
    $content .= '</div></div>';
  }
  
  if (get_field('service_area', $post_id))
    $content .= '<div class="location-group"><img src="' . get_template_directory_uri() . '/assets/icons/maps/my_location_black_24dp_rounded.svg" class="location-group__icon" /><div class="location-group__content"><strong>Service Area</strong><br />' . get_field('service_area', $post_id) . '</div></div>';
  
  $content .= '<div class="location-group"><img src="' . get_template_directory_uri() . '/assets/icons/maps/local_offer_black_24dp_rounded.svg" class="location-group__icon" /><div class="location-group__content"><strong>Services</strong><br />';
  if (get_field('override_service_links', $post_id) && have_rows('services', $post_id)) {
    $services = get_field('services', $post_id);
    foreach ($services as $i => $s) {
      $content .= '<a href="' . $s['service_link']['url'] . '">' . $s['service_link']['title'] . '</a>';
      if ($i+1 < sizeof($services))
        $content .= ', ';
    }
  } else {
    $services = get_the_terms($post_id, 'services');
    foreach ($services as $i => $s) {
      $link = get_field('service_link', $s);
      $content .= '<a href="' . $link . '">' . $s->name . '</a>';
      if ($i+1 < sizeof($services))
        $content .= ', ';
    }
  }
  $content .= '</div></div>';
  
  $location_shortname = get_field('display_title', $post_id);
  if (!$location_shortname || empty($location_shortname))
    $location_shortname = get_the_title();
  $location_shortname = explode(",", $location_shortname);
  $location_shortname = trim($location_shortname[0]);
  
  
  if ($cta_type == "location")
    $content .= '<div class=""><a href="' . get_the_permalink() . '" class="wp-block-button__link has-red-background-color has-background">View ' . $location_shortname . ' info</a></div>';
  elseif ($cta_type == "phone") {
    $phone_number = get_field('default_phone_number', 'option');
    if (get_field('phone_number', $post_id))
      $phone_number = get_field('phone_number', $post_id);
    
    if ($phone_number && $phone_number != "") {
      $phone_number_href = str_replace(" ","",$phone_number);
      $phone_number_href = str_replace("(","",$phone_number_href);
      $phone_number_href = str_replace(")","",$phone_number_href);
      $phone_number_href = str_replace(".","",$phone_number_href);
      $phone_number_href = str_replace("-","",$phone_number_href);
      $content .= '<div class=""><a href="tel:' . $phone_number_href . '" class="wp-block-button__link has-red-background-color has-background">' . $phone_number . ' </a></div>';
    }
  }
  
  if (get_field('google_reviews_url', $post_id))
    $content .= '<div class=""><a href="' . get_field('google_reviews_url', $post_id) . '">Write a review for ' . $location_shortname . '</a></div>';
  
  echo $content;
}