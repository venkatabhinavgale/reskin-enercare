<?php
add_action('acf/init', 'enercare_register_theme_blocks');

function enercare_register_theme_blocks() {
// Register a general card block.
	acf_register_block_type( array(
		'name'            => 'card',
		'title'           => __( 'Card' ),
		'description'     => __( 'A standard card frame with a customizable inner panel' ),
		'render_template' => 'partials/blocks/card/card.php',
		'category'        => 'layout',
		'mode'            => 'preview',
		'supports'        => array(
			'align' => true,
			'mode'  => false,
			'jsx'   => true,
			'color' => array(
				'background' => true,
				'text' => false
			)
		),
	) );

	// Register a email newsletter form block.
	acf_register_block_type( array(
		'name'            => 'email-signup',
		'title'           => __( 'Email Newsletter' ),
		'description'     => __( 'Form that allows a user to signup for an email newsletter' ),
		'render_template' => 'partials/blocks/newsletter-signup/block-newsletter-signup.php',
		'category'        => 'layout',
		'mode'            => 'preview',
		'supports'        => array(
			'align' => true,
			'mode'  => false,
			'jsx'   => true,
			'color' => array(
				'background' => true,
				'text' => false,
				'gradients' => false
			)
		),
	) );

}
