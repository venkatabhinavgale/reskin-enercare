<?php
set_time_limit(0);

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

require_once(ABSPATH . 'wp-load.php' );
require_once(ABSPATH . 'wp-admin/includes/taxonomy.php'); 
global $wpdb;

$filename = "_locations.csv";
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
      $location_info = $data[18];
      
      $google_reviews_url = $data[21];
      $google_maps_url = $data[22];
      $meta_tags = $data[23];
      $postal_codes = $data[28];
      $related_services = $data[29];
      $schema = $data[30];
      
      /* Drupal Services category IDs
          116 - Boiler
          86 - Cooling
          106 - Duct Cleaning
          111 - Electrical
          81 - Heating
          101 - Plumbing
          91 - Water Heating
          96 - Water Treatment
      */
      //var_dump($related_services);
      $related_services = explode(",", $related_services);
      $related_services_term_ids = array();
      foreach ($related_services as $rs) {
        $wp_term = wp_create_term($rs, 'services');
        $related_services_term_ids[] = $wp_term['term_id'];
      }
      
      $meta_tags = html_entity_decode($meta_tags);
      $meta_tags = unserialize($meta_tags);
      if ($meta_tags && sizeof($meta_tags)) {
        $seo_title = $meta_tags['title'];
        $seo_desc = $meta_tags['description'];
        
        if (isset($meta_tags['schema_organization_type']) && strpos($meta_tags['schema_organization_type'], 'HVACBusiness') !== false) {
          $image_arr = unserialize(html_entity_decode($meta_tags['schema_organization_image']));
          $address_arr = unserialize(html_entity_decode($meta_tags['schema_organization_address']));
          
          $schema_content = '
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "HVACBusiness",
      "additionalType": "LocalBusiness",
      "@id": "' . $meta_tags['schema_organization_id'] . '",
      "url": "' . $meta_tags['schema_organization_url'] . '",
      "name": "' . $meta_tags['schema_organization_name'] . '",
      "description": "' . $meta_tags['schema_organization_description'] . '",
      "telephone": "' . $meta_tags['schema_organization_telephone'] . '",
      "image": {
        "@type": "ImageObject",
        "url": "' . $image_arr['url'] . '"
      },
      "openingHoursSpecification": {
        "@type": "OpeningHoursSpecification",
        "dayOfWeek": "Mo-Su",
        "opens": "All day"
      },
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "' . $address_arr['streetAddress'] . '",
        "addressLocality": "' . $address_arr['addressLocality'] . '",
        "addressRegion": "' . $address_arr['addressRegion'] . '",
        "postalCode": "' . $address_arr['postalCode'] . '",
        "addressCountry": "' . $address_arr['addressCountry'] . '"
      }
    },
    
    {
      "@type": "AggregateRating",
      "itemReviewed": {
        "@type": "LocalBusiness",
        "@id": "' . $meta_tags['schema_organization_id'] . '",
        "url": "' . $meta_tags['schema_organization_url'] . '",
        "name": "' . $meta_tags['schema_organization_name'] . '",
        "telephone": "' . $meta_tags['schema_organization_telephone'] . '",
        "image": {
            "@type": "ImageObject",
            "url": "' . $image_arr['url'] . '"
        },
        "openingHoursSpecification": {
            "@type": "OpeningHoursSpecification",
            "dayOfWeek": "Mo-Su",
            "opens": "All day"
            },
        "address": {
            "@type": "PostalAddress",
            "addressLocality": "' . $address_arr['addressLocality'] . '",
            "addressRegion": "' . $address_arr['addressRegion'] . '",
            "addressCountry": "' . $address_arr['addressCountry'] . '"
        }
      },
      "ratingValue": "%ratingValue%",
      "bestRating": "5",
      "ratingCount": "%ratingCount%"
    }
  ]
}';
        
        }
      }
      
      //echo "<textarea rows='50' cols='25'>" . $schema_content . "</textarea>";
      //exit;
      
      // Create post object
      $location_post = array(
        'post_type'     => 'location',
        'post_title'    => html_entity_decode($title),
        'post_content'  => $content,
        'post_status'   => 'publish',
        'post_author'   => 1
      );
      if (isset($_GET['run'])) {
        // Insert the post into the database
        $wp_post_id = wp_insert_post($location_post);
        
        // Associate all service taxonomy
        $result = wp_set_post_terms($wp_post_id, $related_services_term_ids, 'services');
        var_dump($result);
      
        update_field('location_info', $location_info, $wp_post_id);
        update_field('postal_codes', $postal_codes, $wp_post_id);
        update_field('google_reviews_url', $google_reviews_url, $wp_post_id);
        update_field('google_maps_url', $google_maps_url, $wp_post_id);
        if ($schema_content)
          update_field('schema', $schema_content, $wp_post_id);
        
        if ($seo_title)
          update_post_meta($wp_post_id, '_yoast_wpseo_title', $seo_title);
        if ($seo_desc)
          update_post_meta($wp_post_id, '_yoast_wpseo_metadesc', $seo_desc);
      }
    
      $row++;
      echo "<hr />";
    }
    echo "total: " . $row;
}
?>