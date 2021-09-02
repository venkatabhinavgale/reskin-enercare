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

    acf_register_block_type( array(
		  'name'            => 'ecm-card',
		  'title'           => __( 'EMC Profile Card' ),
		  'description'     => __( 'Card that displays a photo, and some information for an Enercare EMC. This card has an additional text area for supplying biographical content about the EMC that will open in a modal view' ),
		  'render_template' => 'partials/blocks/modal-card/block-modal-card.php',
		  'category'        => 'layout',
		  'mode'            => 'preview',
		  'keywords'        => array('card', 'emc', 'enercare', 'portent'),
		  'enqueue_assets' => function() {
			  wp_enqueue_style( 'block-card-style', get_template_directory_uri() . '/assets/css/block--emc-card.css', array('ea-style'), false, 'screen');
		  },
		  'supports'        => array(
			  'align' => true,
			  'mode'  => false,
			  'color' => array(
				  'background' => true,
				  'text' => false
			  )
		  ),
	  ));

	  acf_register_block_type( array(
		  'name'            => 'offer-card',
		  'title'           => __( 'Offer Card' ),
		  'description'     => __( 'This card sets up a "campaign spot". Active campaigns will be queried based on the settings provided' ),
		  'render_template' => 'partials/blocks/offer-card/block-offer-card.php',
		  'category'        => 'layout',
		  'mode'            => 'preview',
		  'keywords'        => array('card', 'offer', 'campaign', 'deal', 'enercare', 'portent'),
		  'enqueue_assets' => function() {
			  wp_enqueue_style( 'block-card-style', get_template_directory_uri() . '/assets/css/block--offer-card.css', array('ea-style'), false, 'screen');
        wp_enqueue_script( 'block--offer-card-script', get_template_directory_uri() . '/assets/js/block--offer-card.js', null, null, true);
		  },

		  'supports'        => array(
			  'align' => true,
			  'mode'  => false,
			  'color' => array(
				  'background' => true,
				  'text' => false
			  )
		  ),
	  ));

	  acf_register_block_type( array(
		  'name'            => 'mega-button',
		  'title'           => __( 'Mega Button' ),
		  'description'     => __( 'This block setups a large clickable link that has color options, and a spot for a prominent icon' ),
		  'render_template' => 'partials/blocks/mega-button/block-mega-button.php',
		  'category'        => 'layout',
		  'mode'            => 'preview',
		  'keywords'        => array('card', 'emc', 'enercare', 'portent'),
		  'enqueue_assets' => function() {
			  wp_enqueue_style( 'block-card-style', get_template_directory_uri() . '/assets/css/block--emc-card.css', array('ea-style'), false, 'screen');
		  },
		  'supports'        => array(
			  'align' => true,
			  'mode'  => false,
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
        'jsx'   => true,
        'color' => array(
          'background' => true,
          'text' => false,
          'gradients' => false
        )
      ),
    ));

    acf_register_block_type( array(
      'name'            => 'glider-carousel',
      'title'           => __( 'Carousel (Glider.js)' ),
      'description'     => __( 'Block that sets up the carousel container for slides. This block uses the Glider.js library to render the carousel. Glider.js is very low weight in terms of styles and scripting, but lacks the ability to infinitely loop' ),
      'render_template' => 'partials/blocks/carousel-glider/block-carousel-glider.php',
      'category'        => 'layout',
      'mode'            => 'preview',
      'keywords'        => array('carousel', 'glider', 'slide', 'enercare', 'portent'),
      'supports'        => array(
        'mode'  => false,
        'align' => true,
        'jsx'   => true,
        'color' => array(
          'background' => true,
          'text' => false,
          'gradients' => false
        ),
      ),
      'enqueue_assets' => function() {
	      wp_enqueue_script( 'glider-js');
	      wp_enqueue_style( 'glider-css');
	      wp_enqueue_script( 'block--carousel-script', get_template_directory_uri() . '/assets/js/block--carousel.js', array('glider-js'), null, true);
      },
    ));

	  acf_register_block_type( array(
		  'name'            => 'glider-slide',
		  'title'           => __( 'Slide (Glider.js)' ),
		  'description'     => __( 'Block to setup individual slides within a Glider Carousel block' ),
		  'render_template' => 'partials/blocks/carousel-glider/slide-glider/block-slide-glider.php',
		  'category'        => 'layout',
		  'parent'          => array('acf/glider-carousel'),
		  'mode'            => 'preview',
		  'keywords'        => array('carousel', 'glider', 'slide', 'enercare', 'portent'),
		  'supports'        => array(
			  'mode'  => false,
			  'align' => true,
			  'jsx'   => true,
			  'color' => array(
				  'background' => true,
				  'text' => false,
				  'gradients' => true
			  ),
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
