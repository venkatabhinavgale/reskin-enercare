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
      'supports'        => array(
        'mode'  => false,
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
			/*'enqueue_assets' => function() {
				wp_enqueue_style( 'block-featured-content-style', get_template_directory_uri() . '/assets/css/block-faqs.css', array('ea-style'), false, 'screen');
			},*/
		));
  
  }

}
