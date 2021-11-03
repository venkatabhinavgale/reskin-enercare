<?php
/*
 * Function to manipulate all Gravity Form submissions before submitting to the database. $_POST array is available
 */
function enercare_gform_pre_submission( $form ) {
  // find the hidden form fields and copy them to their gform field
  foreach ($form['fields'] as $field_key => $field) {
    if (isset($_POST[$field->label])) {
      $_POST['input_'. $field->id] = $_POST[$field->label];
    } elseif (isset($_POST[$field->inputName])) {
      $_POST['input_'. $field->id] = $_POST[$field->inputName];
    } else if (isset($_POST[$field->adminLabel])) {
      $_POST['input_'. $field->id] = $_POST[$field->adminLabel];
    }
  }
}
add_action('gform_pre_submission', 'enercare_gform_pre_submission');

/* 
----------------------------------------------------------
CUSTOM GRAVITY FORMS ADD ON CLASS
----------------------------------------------------------
*/
define( 'ENERCARE_GF_ADDON_VERSION', '1.0' );
//add_action( 'gform_loaded', array( 'Enercare_GF_AddOn_Bootstrap', 'load' ), 5 );
add_action( 'init', array( 'Enercare_GF_AddOn_Bootstrap', 'load' ), 5 );
 
class Enercare_GF_AddOn_Bootstrap {
  public static function load() {
    if ( ! method_exists( 'GFForms', 'include_addon_framework' ) ) {
      return;
    }
    require_once( 'class-enercare-gfaddon.php' );
    GFAddOn::register( 'EnercareGFAddOn' );
  }
}
 
function enercare_gf_addon() {
  return EnercareGFAddOn::get_instance();
}

function enercare_gform_webhooks_post_request($response, $feed, $entry, $form) {
  $updated_entry = array();
  $updated_entry['webhookStatus_field_id'] = null;
  $updated_entry['webhookDate_field_id'] = null;
  
  // get instance of EnercareGFAddOn class for writing entry notes
  $enercareGFAddOn = enercare_gf_addon();
  
  /* uncomment to debug
  error_log(print_r($form,true));
  error_log(print_r($entry,true));
  error_log(print_r($feed,true));
  error_log(print_r($response,true));
  */
  
  foreach ($form['fields'] as $field_key => $field) {
    /* uncomment to debug
    error_log(print_r($field,true));
    error_log("field id: " . $field['id']);
    error_log("field->adminLabel: " . $field['adminLabel']);
    error_log("field->inputName: " . $field['inputName']);
    */
    // grab the MoveType field id for populating
    if ($field['adminLabel'] == "webhookStatus" || $field['inputName'] == "webhookStatus") {
      $updated_entry['webhookStatus_field_id'] = $field['id'];
    } elseif ($field['adminLabel'] == "webhookDate" || $field['inputName'] == "webhookDate") {
      $updated_entry['webhookDate_field_id'] = $field['id'];
    }
  }
  
  $webhookDate = date('m/d/Y h:i:s A');
  // do something here if the request failed.
  if (is_wp_error($response)) {
    $webhookStatus = 'Fail';
    $enercareGFAddOn->add_note( $entry['id'], sprintf( esc_html__( 'Webhook was not successfully executed. %s (%d)', 'gravityformswebhooks' ), $response->get_error_message(), $response->get_error_code() ), 'error' );
    
  } else {
    if (isset($response['response']) && $response['response']['code'] == 200) {
      $webhookStatus = 'Success';
      $response_body = str_replace("<BR>","\n",$response['body']);
      $enercareGFAddOn->add_note( $entry['id'], sprintf( esc_html__( 'Webhook was successfully executed. Response details: %s', 'gravityformswebhooks' ), $response_body ), null );
    } elseif (isset($response['response'])) {
      $webhookStatus = 'Pending';
      $enercareGFAddOn->add_note( $entry['id'], sprintf( esc_html__( 'Webhook response returned HTTP code %d (%s)', 'gravityformswebhooks' ),$response['response']['code'],$response['response']['message'] ), null );
    }
  }
  
  /* uncomment to debug
  error_log("entryid: " . $entry['id']);
  error_log("webhookStatus: " . $webhookStatus);
  error_log("webhookStatus_field_id: " . $updated_entry['webhookStatus_field_id']);
  error_log("webhookDate: " . $webhookDate);
  error_log("webhookDate_field_id: " . $updated_entry['webhookDate_field_id']);
  */
  
  // update the webhook fields for the entry
  GFAPI::update_entry_field( $entry['id'], $updated_entry['webhookStatus_field_id'], $webhookStatus );
  GFAPI::update_entry_field( $entry['id'], $updated_entry['webhookDate_field_id'], $webhookDate );
}
add_action('gform_webhooks_post_request', 'enercare_gform_webhooks_post_request', 10, 4);

// triggers webhook(s) when an entry is updated
add_action( 'gform_after_update_entry', function ( $form, $entry_id ) {
  if ( function_exists( 'gf_webhooks' ) ) {
    $entry = GFAPI::get_entry( $entry_id );
    gf_webhooks()->maybe_process_feed( $entry, $form );
    gf_feed_processor()->save()->dispatch();
  }
}, 10, 2 );

// customize the progress bar
add_filter( 'gform_progress_bar', function( $progress_bar, $form, $confirmation_message ) {
  $progress_bar = str_replace("class='gf_progressbar gf_progressbar_custom'", "class='gf_progressbar gf_progressbar_custom' data-state='closed'", $progress_bar);
  return $progress_bar;
}, 10, 3 );

// move progress bar to bottom of form if 'progress-bar-bottom' is put in top page custom css
// https://gist.github.com/n7studios/f0b3ce229fa686ea0184
function gravity_forms_move_progress_bar( $form_string, $form ) {
  // Check if Pagination is enabled on this form
  if ( ! is_array( $form['pagination'] ) ) {
    return $form_string;
  } 
  if ( empty( $form['pagination']['type'] ) ) {
    return $form_string;
  }

  // Check if the first page CSS class is progress-bar-bottom
  if ( ! isset( $form['firstPageCssClass'] ) ) {
    return $form_string;
  }
  if ( strpos($form['firstPageCssClass'], 'progress-bar-bottom' ) === false) {
    return $form_string;
  }

  // If here, the progress bar needs to be at the end of the form
  // Load form string into DOMDocument
  $dom = new DOMDocument;
  @$dom->loadHTML( $form_string );

  // Load Xpath
  $xpath = new DOMXPath( $dom );

  // Find Progress Bar
  $progress_bar = $xpath->query( '//div[@class="gf_progressbar_wrapper"]' )->item(0);

  // Find Form
  $form = $xpath->query( '//form' )->item(0);

  // Move Progress Bar to end of the Form
  $form->appendChild( $progress_bar );

  // Get HTML string
  $form_string = $dom->saveHTML();

  // Return modified HTML string
  return $form_string;
}
add_filter( 'gform_get_form_filter', 'gravity_forms_move_progress_bar', 10, 3 );


/* 
----------------------------------------------------------
GRAVITY LITE EXPORTS CUSTOMIZATIONS
----------------------------------------------------------
*/
// separate all address type fields into multiple columns
add_filter( 'gfexcel_field_separated_address', function() { return true; } );

function enercare_gfexcel_field_label($label, GF_Field $field) {
  $labels_to_change = array(
    "Entry Id" => "Submission ID",
    "Entry Date" => "Created",
    "User IP" => "Remote IP Address",
    "Email Address" => "Email",
    "Street Address" => "Address: Street Address",
    "City" => "Address: City",
    "State / Province" => "Address: Province",
    "ZIP / Postal Code" => "Address: Postal Code",
    "Best Time to Call" => "Best Time To Call (Optional)",
    "Source Url" => "Submission URI",
  );
  // "Serial number","Submission ID","Submission URI",Created,Completed,Changed,"Is draft","Current page","Remote IP address","Submitted by: ID","Submitted by: Title","Submitted by: URL",Language,"Submitted to: Entity type","Submitted to: Entity ID",Locked,Sticky,Notes,"Submitted to: Entity title","Submitted to: Entity URL",Name,Email,"Address: Street Address","Address: City","Address: Province","Address: Postal Code","Phone Number","Best Time To Call (Optional)"
  // "Entry Id","Entry Date","User IP","Name","Phone Number","Best Time to Call","Email Address","Street Address","City","ZIP / Postal Code","Select Equipment","Equipment currently not working","How can we help you?","utm_source","utm_medium","utm_campaign","ruid","webhookStatus","webhookDate","Created By (User Id)","Source Url","Transaction Id","Payment Amount","Payment Date","Payment Status","Post Id","User Agent"
  
  foreach ($labels_to_change as $old_label => $new_label) {
    if ($label == $old_label)
      $label = $new_label;
  }

  return $label;
}
add_filter('gfexcel_field_label', 'enercare_gfexcel_field_label', 10, 2);
/* 
----------------------------------------------------------
END GRAVITY LITE EXPORTS CUSTOMIZATIONS
----------------------------------------------------------
*/