<?php
$video_id = get_field('video_id');

$block_class_base = 'block-youtube-lazy';
$classes = $block_class_base;

if( !empty($block['className']) ) {
	$classes .= sprintf( ' %s', $block['className'] );
}
if( !empty($block['align']) ) {
	$classes .= sprintf( ' align%s', $block['align'] );
}
?>

<lite-youtube class="<?= $classes ?>" videoid="<?= $video_id ?>" playlabel=""></lite-youtube>
