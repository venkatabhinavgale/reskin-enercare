<?php
set_time_limit(0);

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

require_once(ABSPATH . 'wp-load.php' );

$args = array (
  'post_type' => array('page','location'),
  'post_status' => 'publish',
  'numberposts' => -1
);
$all_posts = get_posts($args);

foreach ($all_posts as $single_post) {
  echo $single_post->ID . " " . $single_post->post_name . "<br />";
  if (isset($_GET['run'])) {
    $single_post->post_title = $single_post->post_title.'';
    $result = wp_update_post($single_post);
    var_dump($result);
  }
}