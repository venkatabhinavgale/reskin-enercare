<?php
/**
 * Newsletter Sign Up Block
 */
// Create class attribute allowing for custom "className" and "align" values.
$classes = '';
if( !empty($block['className']) ) {
	$classes .= sprintf( ' %s', $block['className'] );
}
if( !empty($block['align']) ) {
	$classes .= sprintf( ' align%s', $block['align'] );
}
if( !empty($block['backgroundColor']) ) {
	$classes .= sprintf( ' has-%s-background-color', $block['backgroundColor'] );
}


$heading = get_field('heading');
$content = get_field('content');
$gform = get_field('gravity_form');
?>

<section class="block-newsletter-form <?php echo esc_attr($classes); ?>" data-interface="block-newsletter-form">
	<div class="block-newsletter-form__content-container">
		<img data-interface="block-newsletter-form__image" class="block-newsletter-form__image" src="" />
		<h2 data-interface="block-newsletter-form__heading" class="block-newsletter-form__heading"><?php _e($heading, 'portent_enercare'); ?></h2>
		<p data-interface="block-newsletter-form__content" class="block-newsletter-form__content"><?php _e($content, 'portent_enercare'); ?></p>
	</div>
	<div class="block-newsletter-form__form-container">
		<?php gravity_form( $gform, false, false ); ?>
	</div>
</section>
