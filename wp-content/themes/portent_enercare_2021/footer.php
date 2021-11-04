<?php
/**
 * Site Footer
 *
 * @package      EAStarter
 * @author       Bill Erickson
 * @since        1.0.0
 * @license      GPL-2.0+
**/

function footer_cta() {
  $footer_link = get_field( 'floating_cta_link', 'options');
  if (get_field('site_override') && get_field('site_override') == 'Commercial') {
    $footer_link = get_field( 'floating_cta_link_commercial', 'options');
  }
  
	if( $footer_link && !empty($footer_link) ) {
    $cl_phone = "";
    /*if (strpos($footer_link, 'tel:') !== false) {
      $cl_phone = " cl-phone";
    }*/
		echo '<div data-interface="floating-cta" class="floating-cta is-style-shadowed"><a class="wp-block-button__link has-red-background-color has-background' . $cl_phone . '" href="' . $footer_link['url']. '"> ' . $footer_link['title']. '</a></div>';
	}
}
add_action( 'wp_footer', 'footer_cta' );

echo '</div>'; // .site-inner
tha_footer_before();
echo '<footer class="site-footer" role="contentinfo"><div class="wrap">';
tha_footer_top();
tha_footer_bottom();
echo '</div></footer>';
tha_footer_after();

echo '</div>';
tha_body_bottom();
wp_footer();

echo '</body></html>';

?>