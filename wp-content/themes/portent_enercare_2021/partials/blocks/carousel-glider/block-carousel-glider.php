<?php
// Create class attribute allowing for custom "className" and "align" values.
$classes = '';
if( !empty($block['className']) ) {
$classes .= sprintf( ' %s', $block['className'] );
}
if( !empty($block['align']) ) {
$classes .= sprintf( ' align%s', $block['align'] );

$allowed_blocks = array( 'acf/glider-slide', 'acf/ecm-card', 'acf/offer-card' );
} ?>

<div class="block-carousel__wrapper">
	<div style="min-height: 500px;" class="<?php echo esc_attr($classes); ?>">
		<?php echo '<InnerBlocks allowedBlocks="' . esc_attr( wp_json_encode( $allowed_blocks ) ) . '" />'; ?>
	</div>

	<button aria-label="Previous" class="glider-prev">«</button>
	<button aria-label="Next" class="glider-next">»</button>
	<div role="tablist" class="dots"></div>
</div>
