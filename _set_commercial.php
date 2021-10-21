<?php
set_time_limit(0);

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

require_once(ABSPATH . 'wp-load.php' );

$postIDs = "4755,4844,4884,4887,5184,5190,5227,5238,5309,5314,5318,5344,5346,5348,5368,5393,5562,5577,5579,5580,5581,5582,5583,5584,5586,5587,5591,5592,5594,5596,5597,5612,5664,5667,5669,5672,6079,6180,6185,6230,6250,6256,6259,6263,6266,6268,6272,6278,6281,6317,6321,6962,7904,7905,7906,7907,7908";
$postsArr = explode(",", $postIDs);
foreach ($postsArr as $pid) {
  echo $pid . '<br />';
  if (isset($_GET['run'])) {
    $result = update_field('site_override', 'Commercial', $pid);
    var_dump($result);  
  }
}