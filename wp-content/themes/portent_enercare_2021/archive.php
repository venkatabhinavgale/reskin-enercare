<?php
/**
 * Archive
 *
 * @package      EAStarter
 * @author       Bill Erickson
 * @since        1.0.0
 * @license      GPL-2.0+
**/

// Full width
add_filter( 'enercare_page_layout', 'enercare_return_full_width_content' );

/**
 * Body Class
 *
 */
function enercare_archive_body_class( $classes ) {
	$classes[] = 'archive';
	return $classes;
}
add_filter( 'body_class', 'enercare_archive_body_class' );

/**
 * Archive Header
 *
 */
function enercare_archive_header() {

	$title = $subtitle = $description = $more = false;

	if( is_home() && get_option( 'page_for_posts' ) ) {
		$title = get_the_title( get_option( 'page_for_posts' ) );

	} elseif( is_search() ) {
		$title = 'Search Results';
		$more = get_search_form( false );

	} elseif( is_archive() ) {
		$title = get_the_archive_title();
		if( ! get_query_var( 'paged' ) )
			$description = get_the_archive_description();
	}

	if( empty( $title ) && empty( $description ) )
		return;

	$classes = [ 'archive-description' ];
	if( is_author() )
		$classes[] = 'author-archive-description';

	echo '<header class="' . join( ' ', $classes ) . '">';
	do_action ('enercare_archive_header_before' );
	if( ! empty( $title ) )
		echo '<h1 class="archive-title">' . $title . '</h1>';
	if( !empty( $subtitle ) )
		echo '<h4>' . $subtitle . '</h4>';
	echo apply_filters( 'enercare_the_content', $description );
	echo $more;
	do_action ('enercare_archive_header_after' );
	echo '</header>';

}
add_action( 'tha_content_while_before', 'enercare_archive_header' );

// Breadcrumbs
add_action( 'enercare_archive_header_before', 'enercare_breadcrumbs', 5 );

// Build the page
require get_template_directory() . '/index.php';
