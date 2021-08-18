<?php
/**
 * Archive partial
 *
 * @package      EAStarter
 * @author       Bill Erickson
 * @since        1.0.0
 * @license      GPL-2.0+
**/

echo '<article class="post-summary">';

	enercare_post_summary_image();

	echo '<div class="post-summary__content">';
		enercare_entry_category();
		enercare_post_summary_title();
	echo '</div>';

echo '</article>';
