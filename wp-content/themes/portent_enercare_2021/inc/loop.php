<?php
/**
 * Loop
 *
 * @package      EAStarter
 * @author       Bill Erickson
 * @since        1.0.0
 * @license      GPL-2.0+
**/

/**
 * Default Loop
 *
 */
function enercare_default_loop() {

	if ( have_posts() ) :

		tha_content_while_before();

		/* Start the Loop */
		while ( have_posts() ) : the_post();

			tha_entry_before();

			$partial = apply_filters( 'enercare_loop_partial', is_singular() ? 'content' : 'archive' );
			$context = apply_filters( 'enercare_loop_partial_context', is_search() ? 'search' : get_post_type() );
			get_template_part( 'partials/' . $partial, $context );

			tha_entry_after();

		endwhile;

		tha_content_while_after();

	else :

		tha_entry_before();
		$context = apply_filters( 'enercare_empty_loop_partial_context', 'none' );
		get_template_part( 'partials/archive', $context );
		tha_entry_after();

	endif;

}
add_action( 'tha_content_loop', 'enercare_default_loop' );

/**
 * Entry Title
 *
 */
function enercare_entry_title() {
	echo '<h1 class="entry-title">' . get_the_title() . '</h1>';
}
add_action( 'tha_entry_top', 'enercare_entry_title' );

/**
 * Remove entry-title if h1 block used
 * @link https://www.billerickson.net/building-a-header-block-in-wordpress/
 */
function be_remove_entry_title() {

	if( ! ( is_singular() && function_exists( 'parse_blocks' ) ) )
		return;

	global $post;
	$blocks = parse_blocks( $post->post_content );
	$has_h1 = be_has_h1_block( $blocks );

	if( $has_h1 ) {
		remove_action( 'tha_entry_top', 'enercare_breadcrumbs', 8 );
		remove_action( 'tha_entry_top', 'enercare_entry_category', 8 );
		remove_action( 'tha_entry_top', 'enercare_entry_title' );
		remove_action( 'tha_entry_top', 'enercare_entry_author', 12 );
		remove_action( 'tha_entry_top', 'enercare_entry_header_share', 13 );
	}
}
add_action( 'tha_entry_before', 'be_remove_entry_title' );

/**
 * Recursively searches content for h1 blocks.
 *
 * @link https://www.billerickson.net/building-a-header-block-in-wordpress/
 *
 * @param array $blocks
 * @return bool
 */
function be_has_h1_block( $blocks = array() ) {
	foreach ( $blocks as $block ) {

		if( ! isset( $block['blockName'] ) )
			continue;

		// Custom header block
		if( 'acf/header' === $block['blockName'] ) {
			return true;

		// Heading block
		} elseif( 'core/heading' === $block['blockName'] && isset( $block['attrs']['level'] ) && 1 === $block['attrs']['level'] ) {
			return true;

		// Scan inner blocks for headings
		} elseif( isset( $block['innerBlocks'] ) && !empty( $block['innerBlocks'] ) ) {
			$inner_h1 = be_has_h1_block( $block['innerBlocks'] );
			if( $inner_h1 )
				return true;
		}
	}

	return false;
}

/**
 * Post Comments
 *
 */
function enercare_comments() {

	if ( is_single() && ( comments_open() || get_comments_number() ) ) {
		comments_template();
	}

}
add_action( 'tha_content_while_after', 'enercare_comments' );


/**
 * Location Info
 *
 */
function enercare_location_info() {
  $content = '';
  if (get_field('address')) {
    $address_url = trim(get_field('address'));
    $address_url = str_replace("<br />", "+", $address_url);
    $address_url = str_replace("\n", "+", $address_url);
    $address_url = str_replace(" ", "+", $address_url);
    $address_url = "https://www.google.com/maps/place/" . $address_url;
    $content .= '<div class="location-group"><img src="' . get_template_directory_uri() . '/assets/icons/maps/place_black_24dp_rounded.svg" class="location-group__icon" /><div class="location-group__content"><strong>Address</strong><br /><a href="' . $address_url . '"  target="_blank">' . get_field('address') . '</a></div></div>';
  }
  
  if (have_rows('phone_numbers')) {
    $content .= '<div class="location-group"><img src="' . get_template_directory_uri() . '/assets/icons/communication/phone_black_24dp_rounded.svg" class="location-group__icon" /><div class="location-group__content"><strong>Phone number</strong><br />';
    $rowCount = count(get_field('phone_numbers'));
    while ( have_rows('phone_numbers') ) { the_row();
      $content .= '<strong>' . get_sub_field('phone_label') . ':</strong> ';
      $phone_url = str_replace(' ','',get_sub_field('phone_number'));
      $phone_url = str_replace('-','',$phone_url);
      $phone_url = str_replace('(','',$phone_url);
      $phone_url = str_replace(')','',$phone_url);
      $content .= '<a href="tel:' . $phone_url  . '">' . get_sub_field('phone_number') . '</a>';
      if (get_row_index() < $rowCount)
        $content .= '<br />';
    }
    $content .= '</div></div>';
  }
  
  if (have_rows('hours')) {
    $content .= '<div class="location-group"><img src="' . get_template_directory_uri() . '/assets/icons/action/schedule_black_24dp_rounded.svg" class="location-group__icon" /><div class="location-group__content"><strong>Hours</strong><br />';
    $rowCount = count(get_field('hours'));
    while ( have_rows('hours') ) { the_row();
      $content .= '<strong>' . get_sub_field('hours_label') . ':</strong> ';
      $content .= get_sub_field('hours_open');
      if (get_row_index() < $rowCount)
        $content .= '<br />';
    }
    $content .= '</div></div>';
  }
  
  if (get_field('service_area'))
    $content .= '<div class="location-group"><img src="' . get_template_directory_uri() . '/assets/icons/maps/my_location_black_24dp_rounded.svg" class="location-group__icon" /><div class="location-group__content"><strong>Service Area</strong><br />' . get_field('service_area') . '</div>';
  
  $content .= '<div class="location-group"><img src="' . get_template_directory_uri() . '/assets/icons/maps/local_offer_black_24dp_rounded.svg" class="location-group__icon" /><div class="location-group__content"><strong>Services</strong><br />';
  if (get_field('override_service_links') && have_rows('services')) {
    $services = get_field('services');
    foreach ($services as $i => $s) {
      $content .= '<a href="' . $s['service_link']['url'] . '">' . $s['service_link']['title'] . '</a>';
      if ($i+1 < sizeof($services))
        $content .= ', ';
    }
  } else {
    $services = get_the_terms(get_the_ID(), 'services');
    foreach ($services as $i => $s) {
      $link = get_field('service_link', $s);
      $content .= '<a href="' . $link . '">' . $s->name . '</a>';
      if ($i+1 < sizeof($services))
        $content .= ', ';
    }
  }
  $content .= '</div></div>';
  
  $location_shortname = get_field('display_title');
  if (!$location_shortname || empty($location_shortname))
    $location_shortname = get_the_title();
  $location_shortname = explode(",", $location_shortname);
  $location_shortname = trim($location_shortname[0]);
  $content .= '<div class=""><a href="' . get_the_permalink() . '" class="wp-block-button__link has-red-background-color has-background">View ' . $location_shortname . ' info</a></a>';
  
  if (get_field('google_reviews_url'))
    $content .= '<div class=""><a href="' . get_field('google_reviews_url') . '">Write a review for ' . $location_shortname . '</a></div>';
  
  echo $content;
}
