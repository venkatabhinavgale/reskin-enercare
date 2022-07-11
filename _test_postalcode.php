<?php
set_time_limit(0);

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

require_once(ABSPATH . 'wp-load.php' );

$postal_code = '';
if (isset($_GET['postal_code'])) {
  $postal_code = $_GET['postal_code'];
}
$location = getLocationByPostalCode($postal_code);
var_dump($location);