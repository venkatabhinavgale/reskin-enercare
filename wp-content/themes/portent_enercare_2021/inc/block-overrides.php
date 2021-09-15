<?php

function enercare_render_block( $block_content, $block ) {
	if ( 'core/cover' !== $block['blockName'] ) {
		return $block_content;
	}
	
  $block_content .= enercare_banner();
  $block_content .= enercare_breadcrumbs(false);
	return $block_content;
}
add_filter( 'render_block', 'enercare_render_block', 10, 2 );