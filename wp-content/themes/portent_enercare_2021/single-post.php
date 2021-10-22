<?php
/**
 * Single Blog Post
 *
 * @package      EAStarter
 * @author       Bill Erickson
 * @since        1.0.0
 * @license      GPL-2.0+
**/


// Breadcrumbs in header
add_action( 'tha_entry_top', 'enercare_breadcrumbs', 8 );
// Featured image in header
add_action( 'tha_entry_top', 'enercare_post_summary_image', 10, 1 );
// Entry byline in header
add_action( 'tha_entry_top', 'enercare_entry_byline', 12 );

/**
 * Entry header share
 *
 */
function enercare_entry_header_share() {
	do_action( 'enercare_entry_header_share' );
}

// Add category links to bottom
add_action( 'tha_entry_bottom', 'enercare_entry_categories', 8 );

// Related posts in footer
add_action( 'tha_entry_bottom', 'enercare_related_posts', 10 );

// Build the page
require get_template_directory() . '/index.php';
