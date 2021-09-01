<?php
// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-mega-button';
if( !empty($block['className']) ) {
	$classes .= sprintf( ' %s', $block['className'] );
}
if( !empty($block['align']) ) {
	$classes .= sprintf( ' align%s', $block['align'] );
}

if( !empty($block['backgroundColor'] ) ) {
	$classes .= sprintf(' has-%s-background-color', $block['backgroundColor']);
}

// ACF Fields
	$link = get_field('link');
	$image = get_field( 'image');
?>

<a class="<?php echo esc_attr($classes); ?>" href="<?= $link['url'] ?>">
	<?= wp_get_attachment_image( $image, '1-1', false, array( 'alt' => '', 'class' => 'block-mega-button__image' )); ?>
	<span class="block-mega-button__text"><?= $link['title'] ?></span>
</a>
