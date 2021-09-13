<?php
/**
 * Site Footer
 *
 * @package      EAStarter
 * @author       Bill Erickson
 * @since        1.0.0
 * @license      GPL-2.0+
**/

function footer_legal() {
	if( get_field('terms_and_conditions') ) {
		$terms = get_field('terms_and_conditions');
		echo '<div class="legal__terms">';
      echo '<button class="legal__terms-toggle" aria-controls="terms_' . get_the_ID() . '">Legal <img src="' . get_template_directory_uri() . '/assets/icons/utility/navigate-down.svg" /></button>';
      echo '<div class="legal__terms-details" aria-expanded="false" data-state="closed" aria-labelledby="terms_' . get_the_ID() . '">' . $terms . '</div>';
    echo '</div>';
	}
}
add_action( 'tha_footer_before', 'footer_legal' );

function footer_cta() {
	if( get_field('floating_cta_link', 'options') ) {
		$footer_link = get_field( 'floating_cta_link', 'options');
		echo '<div data-interface="floating-cta" class="floating-cta is-style-shadowed"><a class="wp-block-button__link has-red-background-color has-background" href="' . $footer_link['url']. '"> ' . $footer_link['title']. '</a></div>';
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
