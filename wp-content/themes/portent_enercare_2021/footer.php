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
		//Check for CTA Variations
		if(get_field('mobile_cta_type') === 'split-a-p') {
			$split_field_group = get_field( 'split_appointment__phone_settings');
			$lead_anchor = $split_field_group['lead_form_anchor'] !== '' ? $split_field_group['lead_form_anchor'] : 'leadForm';
			echo '<div data-interface="floating-cta" class="floating-cta floating-cta--split-a-p is-style-shadowed">';
				echo '<a class="wp-block-button__link has-red-background-color has-background" href="'. get_permalink() . "#" . $lead_anchor.'" style="flex: 1;border-radius: 0;border-right: 2px solid white; display:inline-flex; justify-content:center;">';
				echo '<img loading="lazy" class="wp-image-7370" style="width: 24px;" src="https://www.enercare.ca/wp-content/uploads/2021/10/schedule-appointment-24px-w.svg" alt="" width="24" height="24">Schedule Estimate</a>';
				echo '<a style="border-radius: 0;" class="wp-block-button__link has-red-background-color has-background' . $cl_phone . '" href="' . $footer_link['url'] . '" aria-label="'.$footer_link['title'].'"><img loading="lazy" class="wp-image-7350" style="width: 24px;" src="https://www.enercare.ca/wp-content/uploads/2021/10/call-24px-w.svg" alt="" width="24" height="24">Call</a>';
			echo '</div>';
		} else {
			echo '<div data-interface="floating-cta" class="floating-cta is-style-shadowed"><a class="wp-block-button__link has-red-background-color has-background' . $cl_phone . '" href="' . $footer_link['url'] . '"> ' . $footer_link['title'] . '</a></div>';
		}
	}
}
add_action( 'wp_footer', 'footer_cta' );

function glider_notification_center() {
	echo '<div id="gliderNotificationCenter" aria-atomic="true" aria-live="polite"></div>';
}
add_action('wp_footer', 'glider_notification_center');

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

echo '<div id="enercare-polite-status" aria-live="polite" aria-atomic="true"></div>';
echo '</body></html>';

?>
