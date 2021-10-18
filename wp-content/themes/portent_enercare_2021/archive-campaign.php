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
	} elseif( is_post_type_archive( 'location' ) ) {
		$title = 'Find an Enercare Location';
		$description = 'Location archive text';
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

	get_sidebar('offers-header');

	echo apply_filters( 'enercare_the_content', $description );
	echo $more;
	echo '<div class="archive-header__after">';
		do_action ('enercare_archive_header_after' );
	echo '</div>';
	echo '</header>';

}
add_action( 'tha_content_while_before', 'enercare_archive_header' );

// Breadcrumbs
add_action( 'enercare_archive_header_before', 'enercare_breadcrumbs', 5 );

//Filters
add_action( 'enercare_archive_header_after', 'the_postal_code_filter' );

// add section wrapper -- we'll use this on our ajax calls to replace the results
function enercare_archive_wrapper_top() {
  echo '<section class="archive-wrapper">';
}
add_action('tha_content_while_before', 'enercare_archive_wrapper_top', 99999);

function enercare_archive_wrapper_bottom() {
  echo '</section>';
}
add_action('tha_content_bottom', 'enercare_archive_wrapper_bottom');

function addSearch_embed() {
	?>
	<div class="addsearch-container">
    <!-- Search results will be rendered to this div -->
    <div id="addsearch-results"></div>
    <!-- Script must be below search field and addsearch-results div -->
    <script src="https://addsearch.com/js/?key=3145819e621ccfb6dbf5116b2c92967b&type=resultpage"></script>
  </div>
	<?php
}

if (is_search()) {
	add_action('tha_content_bottom', 'addSearch_embed');
}

// Build the page
require get_template_directory() . '/index.php';
