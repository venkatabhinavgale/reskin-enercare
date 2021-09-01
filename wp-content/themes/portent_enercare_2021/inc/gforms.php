<?php
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

function enercare_gform_webhooks_post_request($response, $feed, $entry, $form_id) {
  $updated_entry = array();
  $updated_entry['webhookStatus_field_id'] = null;
  $updated_entry['webhookDate_field_id'] = null;
  
  // get instance of EnercareGFAddOn class for writing entry notes
  $enercareGFAddOn = enercare_gf_addon();
  $form = GFAPI::get_form($form_id);
  /*
  error_log(print_r($form,true));
  error_log(print_r($entry,true));
  error_log(print_r($feed,true));
  error_log(print_r($response,true));
  */
  
  foreach ($form['fields'] as $field_key => $field) {
     // grab the MoveType field id for populating
    if ($field->adminLabel == "webhookStatus" || $field->inputName == "webhookStatus") {
      $updated_entry['webhookStatus_field_id'] = $field->id;
    } elseif ($field->adminLabel == "webhookDate" || $field->inputName == "webhookDate") {
      $updated_entry['webhookDate_field_id'] = $field->id;
    } elseif ($field->adminLabel == "webhookDetails" || $field->inputName == "webhookDetails") {
      $updated_entry['webhookDetails_field_id'] = $field->id;
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