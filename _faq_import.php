<?php
set_time_limit(0);

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

require_once(ABSPATH . 'wp-load.php' );
require_once(ABSPATH . 'wp-admin/includes/taxonomy.php'); 
global $wpdb;

$filename = "_faqs.csv";
$index = 0;
if (($handle = fopen($filename, "r")) !== FALSE) {
    
    $row = 1;
    while (($data = fgetcsv($handle)) !== FALSE) {
      if ($row == 1) {
        $row++;
        continue;
      }
      
      $title = $data[4];
      $content = $data[17];
      $faq_category = $data[18];
      
      /* Drupal FAQ Category IDs
        306 - App Install
        151 - Bill and Payments
        281 - Boiler
        186 - Compliments
        126 - Cooling
          321 - Buy AC
          326 - Rent AC
          351 - Repair AC
        156 - E-Billing
        161 - E-Billing (EGD)
        181 - General Inquiry
        131 - Heating
        141 - Maintenance & Protection Plans
          336 - AC Maintenance
          331,341 - AC Protection Plan
          346 - Cooling Protection Plan with Maintenance
        291 - Maintenance Plan - Paid LP
        146 - Moving
        166 - Parts
        286 - Protection Plan - Paid LP
        296 - Protection with Maintenance Plan - Paid LP
        136 - Repair
          316 - AC Repair
        171 - Service
        176 - Smarter Home - General
        201 - Smarter Home - Indoor & Outdoor Camera
        221 - Smarter Home - Smart Away
        191 - Smarter Home - Thermostat & HVAC
        206 - Smarter Home - Video Clip Recordings & Storage
        211 - Smarter Home - Video Recordings & Viewing
        196 - Smarter Home - Water Valve Shut-off
        216 - Smarter Home - Wireless Setup & Configuration
        226 - Water Heaters
        256 - Water Treatment
      */
      if ($faq_category == 306)
        $faq_term = "App Install";
      elseif ($faq_category == 151)
        $faq_term = "Bill and Payments";
      elseif ($faq_category == 281)
        $faq_term = "Boiler";
      elseif ($faq_category == 186)
        $faq_term = "Compliments";
      elseif ($faq_category == 126)
        $faq_term = "Cooling";
      elseif ($faq_category == 321)
        $faq_term = "Buy AC";
      elseif ($faq_category == 326)
        $faq_term = "Rent AC";
      elseif ($faq_category == 351 OR $faq_category == 316)
        $faq_term = "Repair AC";
      elseif ($faq_category == 156)
        $faq_term = "E-Billing";
      elseif ($faq_category == 161)
        $faq_term = "E-Billing (EGD)";
      elseif ($faq_category == 181)
        $faq_term = "General Inquiry";
      elseif ($faq_category == 131)
        $faq_term = "Heating";
      elseif ($faq_category == 141)
        $faq_term = "Maintenance & Protection Plans";
      elseif ($faq_category == 336)
        $faq_term = "AC Maintenance";
      elseif ($faq_category == 331 OR $faq_category == 341)
        $faq_term = "AC Protection Plan";
      elseif ($faq_category == 346)
        $faq_term = "Cooling Protection Plan with Maintenance";
      elseif ($faq_category == 291)
        $faq_term = "Maintenance Plan - Paid LP";
      elseif ($faq_category == 146)
        $faq_term = "Moving";
      elseif ($faq_category == 166)
        $faq_term = "Parts";
      elseif ($faq_category == 286)
        $faq_term = "Protection Plan - Paid LP";
      elseif ($faq_category == 296)
        $faq_term = "Protection with Maintenance Plan - Paid LP";
      elseif ($faq_category == 136)
        $faq_term = "Repair";
      elseif ($faq_category == 171)
        $faq_term = "Service";
      elseif ($faq_category == 176)
        $faq_term = "Smarter Home - General";  
      elseif ($faq_category == 201)
        $faq_term = "Smarter Home - Indoor & Outdoor Camera";
      elseif ($faq_category == 221)
        $faq_term = "Smarter Home - Smart Away";
      elseif ($faq_category == 191)
        $faq_term = "Smarter Home - Thermostat & HVAC";
      elseif ($faq_category == 206)
        $faq_term = "Smarter Home - Video Clip Recordings & Storage";
      elseif ($faq_category == 211)
        $faq_term = "Smarter Home - Video Recordings & Viewing";
      elseif ($faq_category == 196)
        $faq_term = "Smarter Home - Water Valve Shut-off";
      elseif ($faq_category == 216)
        $faq_term = "Smarter Home - Wireless Setup & Configuration";
      elseif ($faq_category == 226)
        $faq_term = "Water Heaters";
      elseif ($faq_category == 256)
        $faq_term = "Water Treatment";
        
      //var_dump($faq_term);
      $wp_term = wp_create_term($faq_term, 'faq-category');
      //var_dump($wp_term['term_id']);
      //exit;
      
      // Create post object
      $faq_post = array(
        'post_type'     => 'faq',
        'post_title'    => $title,
        'post_content'  => $content,
        'post_status'   => 'publish',
        'post_author'   => 1
      );
      if (isset($_GET['run'])) {
        // Insert the post into the database
        $wp_post_id = wp_insert_post($faq_post);
        
        $result = wp_set_post_terms($wp_post_id, $wp_term['term_id'], 'faq-category');
        var_dump($result);
      
        //update_field('faq_question', $title, $wp_post_id);
      }
    
      $row++;
    }
    echo "total: " . $row;
}
?>