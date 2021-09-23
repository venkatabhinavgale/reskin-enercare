<?php
/**
 * Location Information Card
 */

echo '<article class="location-summary block-location-info wp-block-acf-card is-style-shadowed">';

	//enercare_post_summary_image();

	echo '<div class="location-summary__content">';
		//enercare_entry_category();
		enercare_post_summary_title();
  echo '<hr />';
    getLocationInfo(get_the_ID());
	echo '</div>';

echo '</article>';
