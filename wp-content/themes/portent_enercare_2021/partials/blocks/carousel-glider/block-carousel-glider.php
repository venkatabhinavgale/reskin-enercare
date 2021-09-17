<?php
// Create class attribute allowing for custom "className" and "align" values.
$classes = '';
if( !empty($block['className']) ) {
  $classes .= sprintf( ' %s', $block['className'] );
}
if( !empty($block['align']) ) {
  $classes .= sprintf( ' align%s', $block['align'] );
  $allowed_blocks = array( 'acf/glider-slide', 'acf/ecm-card', 'acf/offer-card' );
}

$slides_to_show = get_field('slides_to_show');
$slides_to_advance = get_field('slides_to_advance');

$breakpoints_arr = array();
while ( have_rows('breakpoints') ) { the_row();
  $breakpoints_arr[] = array(
    'breakpoint' => get_sub_field('breakpoint'),
    'settings' => array(
      'slidesToShow' => get_sub_field('slides_to_show'),
      'slidesToScroll' => get_sub_field('slides_to_advance'),
      'itemWidth' => get_sub_field('item_width'),
      'duration' => get_sub_field('duration')
    )
  );
}
?>

<style>
.glider-track {
  min-height: 500px;
}
.glider-prev, .glider-next {
  position: relative !important;
  color: black !important;
}
</style>

<div class="block-carousel__wrapper" data-num-slides="<?= $slides_to_show; ?>" data-num-advance="<?= $slides_to_advance; ?>" data-breakpoints='<?= json_encode($breakpoints_arr); ?>'>
	<div style="min-height: 500px;" class="<?php echo esc_attr($classes); ?>">
		<?php echo '<InnerBlocks allowedBlocks="' . esc_attr( wp_json_encode( $allowed_blocks ) ) . '" />'; ?>
	</div>

  <?php if (get_field('arrows')) { ?>
  <?php if (get_field('rewind')) { ?>
	<button aria-label="Previous" class="glider-prev wp-block-button__link has-red-background-color has-background">«</button>
  <?php } ?>
	<button aria-label="Next" class="glider-next wp-block-button__link has-red-background-color has-background">»</button>
  <?php } ?>
  
  <?php if (get_field('dots')) { ?>
	<div role="tablist" class="dots"></div>
  <?php } ?>
</div>
