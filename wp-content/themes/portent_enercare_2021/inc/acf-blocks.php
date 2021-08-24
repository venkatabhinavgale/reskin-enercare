<?php
add_action('acf/init', 'enercare_register_theme_blocks');

function enercare_register_theme_blocks() {
  if ( function_exists( 'acf_register_block_type' ) ) {
    $theme_data = wp_get_theme();
		$theme_version = $theme_data->get('Version');

    // Register a general card block.
    acf_register_block_type( array(
      'name'            => 'card',
      'title'           => __( 'Card' ),
      'description'     => __( 'A standard card frame with a customizable inner panel' ),
      'render_template' => 'partials/blocks/card/card.php',
      'category'        => 'layout',
      'mode'            => 'preview',
      'keywords'        => array('card', 'frame', 'enercare', 'portent'),
      'enqueue_assets' => function() {
	      wp_enqueue_style( 'block-card-style', get_template_directory_uri() . '/assets/css/block--card.css', array('ea-style'), false, 'screen');
      },

      'supports'        => array(
        'align' => true,
        'mode'  => false,
        'jsx'   => true,
        'color' => array(
          'background' => true,
          'text' => false
        )
      ),
    ));

    // Register a email newsletter form block.
    acf_register_block_type( array(
      'name'            => 'email-signup',
      'title'           => __( 'Email Newsletter' ),
      'description'     => __( 'Form that allows a user to signup for an email newsletter' ),
      'render_template' => 'partials/blocks/newsletter-signup/block-newsletter-signup.php',
      'category'        => 'layout',
      'mode'            => 'preview',
      'keywords'        => array('email', 'signup', 'newsletter', 'form', 'enercare', 'portent'),
      'enqueue_assets' => function() {
	      wp_enqueue_style( 'block-newsletter-signup-style', get_template_directory_uri() . '/assets/css/block--email-signup.css', array('ea-style'), false, 'screen');
      },
      'supports'        => array(
        'mode'  => false,
        'color' => array(
          'background' => true,
          'text' => false,
          'gradients' => false
        )
      ),
    ));

    acf_register_block_type( array(
      'name'            => 'tabbed-content-area',
      'title'           => __( 'Tabbed Content Area' ),
      'description'     => __( 'Form that allows a user to signup for an email newsletter' ),
      'render_template' => 'partials/blocks/newsletter-signup/block-newsletter-signup.php',
      'category'        => 'layout',
      'mode'            => 'preview',
      'keywords'        => array('tabbed', 'content', 'tab', 'enercare', 'portent'),
      'supports'        => array(
        'mode'  => false,
        'color' => array(
          'background' => true,
          'text' => false,
          'gradients' => false
        )
      ),
    ));

	acf_register_block_type( array(
	  'name'            => 'location-finder',
	  'title'           => __( 'Location Finder' ),
	  'description'     => __( 'Location Finder Block' ),
	  'render_template' => 'partials/blocks/location-finder/block-location-finder.php',
	  'category'        => 'layout',
	  'mode'            => 'preview',
    'keywords'        => array('location', 'finder', 'search', 'form', 'enercare', 'portent'),
	  'enqueue_assets' => function() {
		  wp_enqueue_style( 'block-location-finder-style', get_template_directory_uri() . '/assets/css/block--location-finder.css', array('ea-style'), false, 'screen');
	  },
	  'supports'        => array(
		  'mode'  => false,
		  'align' => false,
		  'color' => array(
			  'background' => true,
			  'text' => false,
			  'gradients' => false
		  )
	  ),
	));

	acf_register_block_type(array(
		'name' => 'enercare-faqs',
		'title' => __('FAQs', 'enercare'),
		'render_template' => 'partials/blocks/block-faqs.php',
		'category' => 'formatting',
		'icon' => 'testimonial',
		'mode' => 'auto',
		'keywords' => array('faq', 'frequently', 'question', 'answer', 'enercare', 'portent'),
	));
  }
}
