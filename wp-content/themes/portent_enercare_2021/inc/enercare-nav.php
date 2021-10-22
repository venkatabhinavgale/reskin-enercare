<?php
/**
 * Custom Navigation Walker to turn hash links into spans
 *
**/

if ( ! class_exists( 'Enercare_Nav_Walker' ) ) :
	class Enercare_Nav_Walker extends Walker_Nav_Menu {
		function start_el(&$output, $item, $depth=0, $args=[], $id=0) {

			//Check if menu has URL and add url class
			$has_url = ($item->url && $item->url != '#') ? true : false;
			if($has_url) {
				array_push($item->classes, "has-url");
			}

			//Start output of list item
			$output .= "<li class='" .  implode(" ", $item->classes) . "'>";

			//use span if using hash as URL
			if ($has_url) {
				$output .= '<a href="' . $item->url . '">';

			} else {
				$output .= '<span>';
			}


			$icon_image_url = get_field('enercare_nav_icon', $item->ID);

			if($icon_image_url) {
				$output .= '<div class="menu-item__icon">';
				$output .= @file_get_contents($icon_image_url);
				$output .= '</div>';
				$output .= '<span class="menu-item__icon-title">'.$item->title.'</span>';
			} else {
				$output .= $item->title;
			}



			//Closing
			if ($item->url && $item->url != '#') {
				$output .= '</a>';
			} else {
				$output .= '</span>';
			}
		}
	}
endif;

/**
 * Creating the nav
 *
 */
function enercare_site_header() {
	//pulling from ACF options
	$phone_number = get_field('default_phone_number', 'option');

	echo '<nav role="navigation" id="slider-menu" class="nav-menu">';
	if( has_nav_menu( 'primary' ) ) {
    // check if page has Commercial site override. Display the commercial primary nav if so
    if (get_field('site_override') && get_field('site_override') == 'Commercial') {
      wp_nav_menu( array( 'menu' => 66, 'container' => false, 'walker' => new Enercare_Nav_Walker() ) );
    } else {
      wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'container' => false, 'walker' => new Enercare_Nav_Walker() ) );
    }
	}
	echo '</nav>';

	//phone section
	echo '<div class="site-header__header-phone header-phone">';
	echo '<span class="header-phone__cta"><strong>Speak with an expert</strong></span>';
	echo '<a class="header-phone__link" href="tel:+'.$phone_number.'">';
	echo '<span class="screen-reader-text">Click to call Enercare'. $phone_number . '</span>';
	echo file_get_contents( get_template_directory() . '/assets/icons/communication/phone_black_24dp_rounded.svg' );
	echo '<strong class="header-phone__number">'.$phone_number.'</strong>';
	echo '</a>';
	echo '</div>';
	echo enercare_mobile_menu_toggle();

}
add_action( 'tha_header_bottom', 'enercare_site_header', 11 );

/**
 * Super / Secondary Navigation
 */
function enercare_secondary_navigation() {
	echo '<div class="top-bar">';
	echo '<div class="wrap">';
	if ( has_nav_menu( 'secondary' ) ) {
		wp_nav_menu( array( 'theme_location'  => 'secondary',
		                    'menu_id'         => 'secondary-menu',
		                    'container_class' => 'top-bar__nav'
		) );
	}
	get_search_form(true);
	echo '</div>';
	echo '</div>';
}
add_action( 'tha_header_top', 'enercare_secondary_navigation');

/**
 * Search toggle
 *
 */
function enercare_search_toggle() {
	$output = '<button' . enercare_amp_class( 'search-toggle', 'active', 'searchActive' ) . enercare_amp_toggle( 'searchActive', array( 'menuActive', 'mobileFollow' ) ) . '>';
		$output .= enercare_icon( array( 'icon' => 'search', 'size' => 24, 'class' => 'open' ) );
		$output .= enercare_icon( array( 'icon' => 'close', 'size' => 24, 'class' => 'close' ) );
		$output .= '<span class="screen-reader-text">Search</span>';
	$output .= '</button>';
	return $output;
}

/**
 * Mobile menu toggle
 *
 */
function enercare_mobile_menu_toggle() {
	$output = '<a' . enercare_amp_class( 'menu-toggle', 'active', 'menuActive' ) . enercare_amp_toggle( 'menuActive', array( 'searchActive', 'mobileFollow' ) ) . ' href="#slider-menu">';
		$output .= enercare_icon( array( 'icon' => 'menu', 'size' => 24, 'class' => 'open' ) );
		$output .= enercare_icon( array( 'icon' => 'close', 'size' => 24, 'class' => 'close' ) );
		$output .= '<span class="screen-reader-text">Menu</span>';
	$output .= '</a>';
	return $output;
}

/**
 * Previous/Next Archive Navigation (disabled)
 *
 */
function enercare_archive_navigation() {
	if( ! is_singular() )
		the_posts_navigation();
}
//add_action( 'tha_content_while_after', 'enercare_archive_navigation' );

/**
 * Archive Paginated Navigation
 *
 */
function enercare_archive_paginated_navigation() {

	if ( is_singular() || is_search() ) {
		return;
	}

	global $wp_query;

	// Stop execution if there's only one page.
	if ( $wp_query->max_num_pages <= 1 ) {
		return;
	}

	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = (int) $wp_query->max_num_pages;

	// Add current page to the array.
	if ( $paged >= 1 ) {
		$links[] = $paged;
	}

	// Add the pages around the current page to the array.
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	echo '<nav class="archive-pagination pagination">';

	$before_number = '<span class="screen-reader-text">' . __( 'Go to page', 'ea-starter' ) . '</span>';

	printf( '<ul role="navigation" aria-label="%s">', esc_attr__( 'Pagination', 'ea-starter' ) );

	// Previous Post Link.
	if ( get_previous_posts_link() ) {
		$label		= __( '<span class="screen-reader-text">Go to</span> Previous Page', 'ea-starter' );
		$link       = get_previous_posts_link( apply_filters( 'genesis_prev_link_text', '&#x000AB; ' . $label ) );
		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Value is hardcoded and safe, not set via input.
		printf( '<li class="pagination-previous">%s</li>' . "\n", $link );
	}

	// Link to first page, plus ellipses if necessary.
	if ( ! in_array( 1, $links, true ) ) {
		$class = 1 === $paged ? ' class="active"' : '';

		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Value is known to be safe, not set via input.
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, get_pagenum_link( 1 ), trim( $before_number . ' 1' ) );

		if ( ! in_array( 2, $links, true ) ) {
			$label	= sprintf( '<span class="screen-reader-text">%s</span> &#x02026;', __( 'Interim pages omitted', 'ea-starter' ) );
			// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Value is known to be safe, not set via input.
			printf( '<li class="pagination-omission">%s</li> ' . "\n", $label );
		}
	}

	// Link to current page, plus 2 pages in either direction if necessary.
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = '';
		$aria  = '';
		if ( $paged === $link ) {
			$class = ' class="active" ';
			$aria  = ' aria-label="' . esc_attr__( 'Current page', 'ea-starter' ) . '" aria-current="page"';
		}

		printf(
			'<li%s><a href="%s"%s>%s</a></li>' . "\n",
			// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Value is safe, not set via input.
			$class,
			esc_url( get_pagenum_link( $link ) ),
			// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Value is safe, not set via input.
			$aria,
			// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Value is safe, not set via input.
			trim( $before_number . ' ' . $link )
		);
	}

	// Link to last page, plus ellipses if necessary.
	if ( ! in_array( $max, $links, true ) ) {

		if ( ! in_array( $max - 1, $links, true ) ) {
			$label = sprintf( '<span class="screen-reader-text">%s</span> &#x02026;', __( 'Interim pages omitted', 'ea-starter' ) );
			// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Value is known to be safe, not set via input.
			printf( '<li class="pagination-omission">%s</li> ' . "\n", $label );
		}

		$class = $paged === $max ? ' class="active"' : '';
		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Value is safe, not set via input.
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, get_pagenum_link( $max ), trim( $before_number . ' ' . $max ) );

	}

	// Next Post Link.
	if ( get_next_posts_link() ) {
		$label = __( '<span class="screen-reader-text">Go to</span> Next Page', 'ea-starter' );
		$link       = get_next_posts_link( apply_filters( 'genesis_next_link_text', $label . ' &#x000BB;' ) );
		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Value is hardcoded and safe, not set via input.
		printf( '<li class="pagination-next">%s</li>' . "\n", $link );
	}

	echo '</ul>';
	echo '</nav>';
}
add_action( 'tha_content_while_after', 'enercare_archive_paginated_navigation' );