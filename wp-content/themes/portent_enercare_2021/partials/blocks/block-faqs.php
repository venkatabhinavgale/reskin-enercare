<?php
/**
 * FAQs Block
 *
 * @package      Enercare
 * @author       Portent
 * @since        1.0.0
 * @license      GPL-2.0+
 **/

$heading = get_field( 'header' );
$content = get_field( 'content' );
$faqs = get_field( 'faqs' );

echo '<div class="block-faqs block-faqs--tablet--'.$tablet_appearance.'" data-allow-multiple>';

if( !empty( $heading ) )
	echo '<h3 class="block-faqs--header">' . esc_html( $heading ) . '</h3>';
if( !empty( $content ) )
	echo '<p class="block-faqs--content">' . esc_html( $content ) . '</p>';

if( !empty( $faqs ) )  {
  foreach ($faqs as $faq) {
    echo '<div class="block-faqs--faq-container" aria-controls="faq_' . $faq->ID . '">';
    echo esc_html($faq->post_title);
    
    echo '<div class="block-faqs--faq-answer-container" aria-expanded="false" data-state="closed" aria-labelledby="faq_' . $faq->ID . '">';
    echo $faq->post_content;
    echo '</div>';
    
    echo '</div>';
  }
}

echo '</div>';
