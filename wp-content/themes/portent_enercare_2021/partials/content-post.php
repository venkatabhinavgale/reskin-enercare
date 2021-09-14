<?php
/**
 * Singular partial
 *
 * @package      EAStarter
 * @author       Bill Erickson
 * @since        1.0.0
 * @license      GPL-2.0+
**/
$article_class = get_post_class();
if( enercare_has_action( 'tha_entry_top' ) ) {
	$article_class[] = 'has-header';
}

echo '<article class="' . join( ' ', $article_class ) . '">';

	if( enercare_has_action( 'tha_entry_top' ) ) {
		echo '<header class="entry-header">';
		tha_entry_top();
		echo '</header>';
		$has_header = true;
	}

	echo '<div class="entry-content">';
		tha_entry_content_before();

		the_content();

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ea-starter' ),
			'after'  => '</div>',
		) );

		tha_entry_content_after();
	echo '</div>';

	if( enercare_has_action( 'tha_entry_bottom' ) ) {
		echo '<footer class="entry-footer">';
			tha_entry_bottom();
		echo '</footer>';
	}

echo '</article>';