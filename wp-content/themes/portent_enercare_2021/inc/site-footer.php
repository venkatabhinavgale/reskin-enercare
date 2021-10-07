<?php
/**
 * Site Footer
 *
 * @package      GrownAndFlown2020
 * @author       Bill Erickson
 * @since        1.0.0
 * @license      GPL-2.0+
**/

/**
 * Register footer widget areas
 *
 */
function enercare_register_footer_widget_areas() {

	for( $i = 1; $i <=3; $i++ ) {

		register_sidebar( enercare_widget_arenercare_args( array(
			'name' => esc_html__( 'Footer ' . $i, 'ea-starter' ),
		) ) );
	}

}
add_action( 'widgets_init', 'enercare_register_footer_widget_areas' );


/**
 * Footer Widget Areas
 *
 */
function enercare_site_footer_widgets() {
  if (get_post_type(get_the_ID()) != "landing-page") {
    echo '<div class="footer-widgets"><div class="wrap">';
    for( $i = 1; $i < 4; $i++ ) {
      dynamic_sidebar( 'footer-' . $i );
    }
    echo '</div></div>';  
  }
}
add_action( 'tha_footer_before', 'enercare_site_footer_widgets', 2 );


/**
 * Footer Legal area
 *
 */
function footer_legal() {
	if( get_field('terms_and_conditions') ) {
		$terms = get_field('terms_and_conditions');
		echo '<div class="legal__terms">';
      echo '<button class="legal__terms-toggle" aria-controls="terms_' . get_the_ID() . '">Legal <img src="' . get_template_directory_uri() . '/assets/icons/utility/navigate-down.svg" /></button>';
      echo '<div class="legal__terms-details" aria-expanded="false" data-state="closed" aria-labelledby="terms_' . get_the_ID() . '">' . $terms . '</div>';
    echo '</div>';
	}
}
add_action( 'tha_footer_before', 'footer_legal', 1 );

/**
 * Site Footer
 *
 */
function enercare_site_footer() {
	echo '<div class="footer-left">';
		echo '<p class="copyright">Copyright &copy; ' . date( 'Y' ) . ' ' . get_bloginfo( 'name' ) . '<sup>®</sup>. All Rights Reserved.</p>';
		echo '<p class="footer-links"><a href="' . home_url( 'privacy-policy' ) . '">Privacy Policy</a> <a href="' . home_url( 'terms' ) . '">Terms</a></p>';
		echo '<p class="cafemedia">An Elite Cafemedia Food Publisher</p>';
	echo '</div>';
	echo '<a class="backtotop" href="#main-content">Back to top' . enercare_icon( array( 'icon' => 'arrow-up' ) ) . '</a>';
}
add_action( 'tha_footer_top', 'enercare_site_footer' );
