<?php
set_time_limit(0);

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

require_once(ABSPATH . 'wp-load.php' );
require_once(ABSPATH . 'wp-admin/includes/taxonomy.php'); 
global $wpdb;

$filename = "_articles.csv";
$index = 0;
if (($handle = fopen($filename, "r")) !== FALSE) {
    
    $meta_tag_keys = array();
    $row = 1;
    while (($data = fgetcsv($handle)) !== FALSE) {
      if ($row == 1) {
        $row++;
        continue;
      }
      
      $title = $data[5];
      $publish_date = $data[6];
      $content = $data[18];
      $content = html_entity_decode($content);
      //var_dump($content);exit;
      $article_category = $data[19];
      $article_second_category = $data[20];
      $image_url = $data[22];
      $meta_tags = $data[23];
      $schema = $data[24];
      $post_name = $data[27];
      $post_name = explode("/", $post_name);
      $post_name = $post_name[sizeof($post_name)-1];
      
      //var_dump($article_category);
      $categories = array($article_category);
      if ($article_second_category != "") {
        $categories[] = $article_second_category;
      }
      $category_term_ids = array();
      $primary_category = "";
      //var_dump($categories);exit;
      foreach ($categories as $cat) {
        $wp_term = wp_create_term($cat, 'category');
        $category_term_ids[] = $wp_term['term_id'];
        if ($primary_category != "")
          $primary_category = $wp_term['term_id'];
      }
      
      $meta_tags = html_entity_decode($meta_tags);
      $meta_tags = unserialize($meta_tags);
      
      foreach ($meta_tags as $i => $tag) {
        if (!in_array($i, $meta_tag_keys))
          $meta_tag_keys[] = $i;
      }
      
      if ($meta_tags && sizeof($meta_tags)) {
        $seo_title = $meta_tags['title'];
        $seo_desc = $meta_tags['description'];
      }
      
      //echo "<textarea rows='50' cols='25'>" . $schema_content . "</textarea>";
      //exit;
      
      // Create post object
      $article_post = array(
        'post_type'     => 'post',
        'post_title'    => html_entity_decode($title),
        'post_content'  => $content,
        'post_status'   => 'publish',
        'post_author'   => 1,
        'post_date'     => date('Y-m-d H:i:s', $publish_date),
        'post_name'     => $post_name
      );
      if (isset($_GET['run'])) {
        // Insert the post into the database
        $wp_post_id = wp_insert_post($article_post);
        
        // Associate all category taxonomy
        $result = wp_set_post_terms($wp_post_id, $category_term_ids, 'category');
        //var_dump($result);
        
        if ($schema_content)
          update_field('schema', $schema_content, $wp_post_id);
        
        if ($seo_title)
          update_post_meta($wp_post_id, '_yoast_wpseo_title', $seo_title);
        if ($seo_desc)
          update_post_meta($wp_post_id, '_yoast_wpseo_metadesc', $seo_desc);
        
        if ($primary_category)
          update_post_meta($wp_post_id, '_yoast_wpseo_primary_category', $primary_category); 
        
        // featured image download, media library insert, and attach to post
        $image_url = str_replace("http://localhost/enercare.ca/docroot/", "https://www.enercare.ca/", $image_url);
        echo $image_url . "<br />";
        $image_name = explode("/", $image_url);
        $image_name = $image_name[sizeof($image_name)-1];
        $upload_dir       = wp_upload_dir(); // Set upload folder
        $image_data       = file_get_contents($image_url); // Get image data
        $unique_file_name = wp_unique_filename( $upload_dir['path'], $image_name ); // Generate unique name
        $filename         = basename( $unique_file_name ); // Create image file name

        if ($filename && $filename != "-1") {
          // Check folder permission and define file location
          if( wp_mkdir_p( $upload_dir['path'] ) ) {
            $file = $upload_dir['path'] . '/' . $filename;
          } else {
            $file = $upload_dir['basedir'] . '/' . $filename;
          }

          // Create the image  file on the server
          file_put_contents( $file, $image_data );

          // Check image file type
          $wp_filetype = wp_check_filetype( $filename, null );

          // Set attachment data
          $attachment = array(
            'post_mime_type' => $wp_filetype['type'],
            'post_title'     => sanitize_file_name( $filename ),
            'post_content'   => '',
            'post_status'    => 'inherit',
            'post_date'      => date('Y-m-d H:i:s', $publish_date)
          );

          // Create the attachment
          $attach_id = wp_insert_attachment( $attachment, $file, $wp_post_id );

          // Include image.php
          require_once(ABSPATH . 'wp-admin/includes/image.php');

          // Define attachment metadata
          $attach_data = wp_generate_attachment_metadata( $attach_id, $file );

          // Assign metadata to attachment
          wp_update_attachment_metadata( $attach_id, $attach_data );

          // And finally assign featured image to post
          set_post_thumbnail( $wp_post_id, $attach_id );
        }
        
      }
    
      $row++;
      echo "<hr />";
    }
    var_dump($meta_tag_keys);
    echo "total: " . $row;
}
?>