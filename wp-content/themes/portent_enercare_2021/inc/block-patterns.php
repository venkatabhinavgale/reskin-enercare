<?php
function enercare_block_patterns() {

	register_block_pattern_category(
		'enercare',
		array( 'label' => __( 'Enercare', 'portent_enercare' ) )
	);

	/**
	 * Our Services 3 Column Cards
	 */
	register_block_pattern( 'portent_expedia/blog-post-template',
		array(
			'title' => __( 'Our Services 3 Column Cards', 'portent_enercare'),
			'description' => _x('3 column cards describing services scaffold', 'portent_enercare'),
			'categories' => array('enercare','columns'),
			'content' => "
<!-- wp:group {\"align\":\"full\"} -->
<div class=\"wp-block-group alignfull\"><!-- wp:heading {\"textAlign\":\"center\",\"level\":1} -->
<h1 class=\"has-text-align-center\"><strong>Our Home Heating Services</strong></h1>
<!-- /wp:heading -->

<!-- wp:columns -->
<div class=\"wp-block-columns\"><!-- wp:column -->
<div class=\"wp-block-column\"><!-- wp:acf/card {\"id\":\"block_6141246acb720\",\"name\":\"acf/card\",\"align\":\"\",\"mode\":\"preview\",\"wpClassName\":\"wp-block-acf-card is-style-shadowed has-white-background-color has-background\",\"className\":\"is-style-shadowed\",\"backgroundColor\":\"white\"} -->
<!-- wp:image {\"align\":\"center\",\"id\":3302,\"width\":150,\"height\":150,\"sizeSlug\":\"large\",\"linkDestination\":\"none\"} -->
<div class=\"wp-block-image\"><figure class=\"aligncenter size-large is-resized\"><img src=\"https://dev-enercare.pantheonsite.io/wp-content/uploads/2021/09/protection-ribbon-picto-dc1c28.svg\" alt=\"\" class=\"wp-image-3302\" width=\"150\" height=\"150\"/></figure></div>
<!-- /wp:image -->

<!-- wp:heading {\"textAlign\":\"center\"} -->
<h2 class=\"has-text-align-center\"><strong>Maintain and Protect</strong></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {\"align\":\"center\"} -->
<p class=\"has-text-align-center\">Get peace of mind with plans that offer annual inspections, unlimited service calls, same-day repairs and more.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {\"contentJustification\":\"center\"} -->
<div class=\"wp-block-buttons is-content-justification-center\"><!-- wp:button {\"className\":\"is-style-hero\"} -->
<div class=\"wp-block-button is-style-hero\"><a class=\"wp-block-button__link\">Protect Furnace</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->
<!-- /wp:acf/card --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class=\"wp-block-column\"><!-- wp:acf/card {\"id\":\"block_61412554cb73a\",\"name\":\"acf/card\",\"align\":\"\",\"mode\":\"preview\",\"wpClassName\":\"wp-block-acf-card is-style-shadowed has-white-background-color has-background\",\"className\":\"is-style-shadowed\",\"backgroundColor\":\"white\"} -->
<!-- wp:image {\"align\":\"center\",\"id\":3302,\"width\":150,\"height\":150,\"sizeSlug\":\"large\",\"linkDestination\":\"none\"} -->
<div class=\"wp-block-image\"><figure class=\"aligncenter size-large is-resized\"><img src=\"https://dev-enercare.pantheonsite.io/wp-content/uploads/2021/09/protection-ribbon-picto-dc1c28.svg\" alt=\"\" class=\"wp-image-3302\" width=\"150\" height=\"150\"/></figure></div>
<!-- /wp:image -->

<!-- wp:heading {\"textAlign\":\"center\"} -->
<h2 class=\"has-text-align-center\"><strong><strong>Repair</strong></strong></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {\"align\":\"center\"} -->
<p class=\"has-text-align-center\">Problems with your furnace? Get heating service right away from our licensed technicians for any make or model.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {\"contentJustification\":\"center\"} -->
<div class=\"wp-block-buttons is-content-justification-center\"><!-- wp:button {\"className\":\"is-style-hero\"} -->
<div class=\"wp-block-button is-style-hero\"><a class=\"wp-block-button__link\" href=\"https://www.enercare.ca/heating/furnace-repair/\" target=\"_blank\" rel=\"noreferrer noopener\">Repair Furnace</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->
<!-- /wp:acf/card --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class=\"wp-block-column\"><!-- wp:acf/card {\"id\":\"block_61412559cb73e\",\"name\":\"acf/card\",\"align\":\"\",\"mode\":\"preview\",\"wpClassName\":\"wp-block-acf-card is-style-shadowed has-white-background-color has-background\",\"className\":\"is-style-shadowed\",\"backgroundColor\":\"white\"} -->
<!-- wp:image {\"align\":\"center\",\"id\":3302,\"width\":150,\"height\":150,\"sizeSlug\":\"large\",\"linkDestination\":\"none\"} -->
<div class=\"wp-block-image\"><figure class=\"aligncenter size-large is-resized\"><img src=\"https://dev-enercare.pantheonsite.io/wp-content/uploads/2021/09/protection-ribbon-picto-dc1c28.svg\" alt=\"\" class=\"wp-image-3302\" width=\"150\" height=\"150\"/></figure></div>
<!-- /wp:image -->

<!-- wp:heading {\"textAlign\":\"center\"} -->
<h2 class=\"has-text-align-center\"><strong><strong>Replace</strong></strong></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {\"align\":\"center\"} -->
<p class=\"has-text-align-center\">If you need to buy or rent a brand-new high-efficiency furnace, we can help you find the right heating system for your home.&nbsp;</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {\"contentJustification\":\"center\"} -->
<div class=\"wp-block-buttons is-content-justification-center\"><!-- wp:button {\"className\":\"is-style-hero\"} -->
<div class=\"wp-block-button is-style-hero\"><a class=\"wp-block-button__link\" href=\"https://www.enercare.ca/heating/new-furnace\" target=\"_blank\" rel=\"noreferrer noopener\">Replace Furnace</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->
<!-- /wp:acf/card --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
",
		)
	);
}

add_action('acf/init', 'enercare_block_patterns' );