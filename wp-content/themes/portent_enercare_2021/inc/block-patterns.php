<?php
function enercare_block_patterns() {

	register_block_pattern_category(
		'enercare',
		array( 'label' => __( 'Enercare', 'portent_enercare' ) )
	);
  register_block_pattern_category(
		'tabs',
		array( 'label' => __( 'Tabs', 'portent_enercare' ) )
	);

	/**
	 * Our Services 3 Column Cards
	 */
	register_block_pattern( 'portent_enercare/our-services-three-column-cards',
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
  
  /**
	 * Tabbed 2 Column Content
	 */
	register_block_pattern( 'portent_enercare/tabbed-two-column-content',
		array(
			'title' => __( 'Tabbed 2 Column Content', 'portent_enercare'),
			'description' => _x('Tabs of 2 column content scaffold', 'portent_enercare'),
			'categories' => array('enercare', 'tabs'),
			'content' => "
<!-- wp:group {\"align\":\"full\",\"backgroundColor\":\"grey-10\"} -->
<div class=\"wp-block-group alignfull has-grey-10-background-color has-background\"><!-- wp:heading {\"textAlign\":\"center\",\"level\":1} -->
<h1 class=\"has-text-align-center\"><strong><strong>Our Home Heating Solutions</strong></strong></h1>
<!-- /wp:heading -->

<!-- wp:portent/block-tabbed-content {\"tabs\":\"[[\u002254a5a477-be7d-4f3f-90ce-6bdf042b3b0e\u0022,\u0022Tab 1\u0022,null],[\u002269bdff3d-0b8a-4249-b452-1a8f9a2e5cc0\u0022,\u0022Tab 2\u0022,null],[\u002218313fd4-49ff-4f81-be36-6df97739efe8\u0022,\u0022Tab 3\u0022,null],[\u0022bc373ed0-e917-4443-bec4-5dffc24fc246\u0022,\u0022Tab 4\u0022,null],[\u00221e70f4c6-0362-42a0-b01b-9a90c042714e\u0022,\u0022Tab 5\u0022,null]]\"} -->
<div class=\"wp-block-portent-block-tabbed-content\"><div class=\"block-tabbed-content__tabs init block-tabbed-content__tabs--left\"><button class=\"block-tabbed-content__tab\" data-interface=\"tab-button\" data-tab=\"54a5a477-be7d-4f3f-90ce-6bdf042b3b0e\"><img width=\"20px\" height=\"20px\" alt=\"\"/>Tab 1</button><button class=\"block-tabbed-content__tab\" data-interface=\"tab-button\" data-tab=\"69bdff3d-0b8a-4249-b452-1a8f9a2e5cc0\"><img width=\"20px\" height=\"20px\" alt=\"\"/>Tab 2</button><button class=\"block-tabbed-content__tab\" data-interface=\"tab-button\" data-tab=\"18313fd4-49ff-4f81-be36-6df97739efe8\"><img width=\"20px\" height=\"20px\" alt=\"\"/>Tab 3</button><button class=\"block-tabbed-content__tab\" data-interface=\"tab-button\" data-tab=\"bc373ed0-e917-4443-bec4-5dffc24fc246\"><img width=\"20px\" height=\"20px\" alt=\"\"/>Tab 4</button><button class=\"block-tabbed-content__tab\" data-interface=\"tab-button\" data-tab=\"1e70f4c6-0362-42a0-b01b-9a90c042714e\"><img width=\"20px\" height=\"20px\" alt=\"\"/>Tab 5</button></div><div class=\"block-tabbed-content__tab-panels init\"><!-- wp:portent/block-tabbed-content--tab {\"title\":\"Tab 1\",\"tabid\":\"54a5a477-be7d-4f3f-90ce-6bdf042b3b0e\"} -->
<div class=\"wp-block-portent-block-tabbed-content--tab block-tabbed-content__panel\"><h3 class=\"block-tabbed-content__tab__title\" data-tab=\"54a5a477-be7d-4f3f-90ce-6bdf042b3b0e\">Tab 1</h3><div class=\"block-tabbed-content__tab-content\" data-tab=\"54a5a477-be7d-4f3f-90ce-6bdf042b3b0e\"><!-- wp:columns -->
<div class=\"wp-block-columns\"><!-- wp:column -->
<div class=\"wp-block-column\"><!-- wp:heading {\"level\":3} -->
<h3><strong>Buying a furnace</strong></h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Is your furnace more than 15 years old? Does it break down a lot, take too long to warm up, deliver inconsistent heating, or makes loud or unusual noises? If so, it might be time to buy a new high-efficiency furnace. We can help you find the right one for your home — natural gas or propane — with payment and financing options that work for your budget.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class=\"wp-block-buttons\"><!-- wp:button {\"className\":\"is-style-featured\"} -->
<div class=\"wp-block-button is-style-featured\"><a class=\"wp-block-button__link\">Buy a Furnace</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class=\"wp-block-column\"><!-- wp:heading {\"level\":3} -->
<h3><strong>Buying a furnace</strong></h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Is your furnace more than 15 years old? Does it break down a lot, take too long to warm up, deliver inconsistent heating, or makes loud or unusual noises? If so, it might be time to buy a new high-efficiency furnace. We can help you find the right one for your home — natural gas or propane — with payment and financing options that work for your budget.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class=\"wp-block-buttons\"><!-- wp:button {\"className\":\"is-style-featured\"} -->
<div class=\"wp-block-button is-style-featured\"><a class=\"wp-block-button__link\">Buy a Furnace</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div></div>
<!-- /wp:portent/block-tabbed-content--tab -->

<!-- wp:portent/block-tabbed-content--tab {\"title\":\"Tab 2\",\"tabid\":\"69bdff3d-0b8a-4249-b452-1a8f9a2e5cc0\"} -->
<div class=\"wp-block-portent-block-tabbed-content--tab block-tabbed-content__panel\"><h3 class=\"block-tabbed-content__tab__title\" data-tab=\"69bdff3d-0b8a-4249-b452-1a8f9a2e5cc0\">Tab 2</h3><div class=\"block-tabbed-content__tab-content\" data-tab=\"69bdff3d-0b8a-4249-b452-1a8f9a2e5cc0\"><!-- wp:columns -->
<div class=\"wp-block-columns\"><!-- wp:column -->
<div class=\"wp-block-column\"><!-- wp:heading {\"level\":3} -->
<h3><strong>Buying a furnace</strong></h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Is your furnace more than 15 years old? Does it break down a lot, take too long to warm up, deliver inconsistent heating, or makes loud or unusual noises? If so, it might be time to buy a new high-efficiency furnace. We can help you find the right one for your home — natural gas or propane — with payment and financing options that work for your budget.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class=\"wp-block-buttons\"><!-- wp:button {\"className\":\"is-style-featured\"} -->
<div class=\"wp-block-button is-style-featured\"><a class=\"wp-block-button__link\">Buy a Furnace</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class=\"wp-block-column\"><!-- wp:heading {\"level\":3} -->
<h3><strong>Buying a furnace</strong></h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Is your furnace more than 15 years old? Does it break down a lot, take too long to warm up, deliver inconsistent heating, or makes loud or unusual noises? If so, it might be time to buy a new high-efficiency furnace. We can help you find the right one for your home — natural gas or propane — with payment and financing options that work for your budget.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class=\"wp-block-buttons\"><!-- wp:button {\"className\":\"is-style-featured\"} -->
<div class=\"wp-block-button is-style-featured\"><a class=\"wp-block-button__link\">Buy a Furnace</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div></div>
<!-- /wp:portent/block-tabbed-content--tab -->

<!-- wp:portent/block-tabbed-content--tab {\"title\":\"Tab 3\",\"tabid\":\"18313fd4-49ff-4f81-be36-6df97739efe8\"} -->
<div class=\"wp-block-portent-block-tabbed-content--tab block-tabbed-content__panel\"><h3 class=\"block-tabbed-content__tab__title\" data-tab=\"18313fd4-49ff-4f81-be36-6df97739efe8\">Tab 3</h3><div class=\"block-tabbed-content__tab-content\" data-tab=\"18313fd4-49ff-4f81-be36-6df97739efe8\"><!-- wp:columns -->
<div class=\"wp-block-columns\"><!-- wp:column -->
<div class=\"wp-block-column\"><!-- wp:heading {\"level\":3} -->
<h3><strong>Buying a furnace</strong></h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Is your furnace more than 15 years old? Does it break down a lot, take too long to warm up, deliver inconsistent heating, or makes loud or unusual noises? If so, it might be time to buy a new high-efficiency furnace. We can help you find the right one for your home — natural gas or propane — with payment and financing options that work for your budget.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class=\"wp-block-buttons\"><!-- wp:button {\"className\":\"is-style-featured\"} -->
<div class=\"wp-block-button is-style-featured\"><a class=\"wp-block-button__link\">Buy a Furnace</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class=\"wp-block-column\"><!-- wp:heading {\"level\":3} -->
<h3><strong>Buying a furnace</strong></h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Is your furnace more than 15 years old? Does it break down a lot, take too long to warm up, deliver inconsistent heating, or makes loud or unusual noises? If so, it might be time to buy a new high-efficiency furnace. We can help you find the right one for your home — natural gas or propane — with payment and financing options that work for your budget.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class=\"wp-block-buttons\"><!-- wp:button {\"className\":\"is-style-featured\"} -->
<div class=\"wp-block-button is-style-featured\"><a class=\"wp-block-button__link\">Buy a Furnace</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div></div>
<!-- /wp:portent/block-tabbed-content--tab -->

<!-- wp:portent/block-tabbed-content--tab {\"title\":\"Tab 4\",\"tabid\":\"bc373ed0-e917-4443-bec4-5dffc24fc246\"} -->
<div class=\"wp-block-portent-block-tabbed-content--tab block-tabbed-content__panel\"><h3 class=\"block-tabbed-content__tab__title\" data-tab=\"bc373ed0-e917-4443-bec4-5dffc24fc246\">Tab 4</h3><div class=\"block-tabbed-content__tab-content\" data-tab=\"bc373ed0-e917-4443-bec4-5dffc24fc246\"><!-- wp:columns -->
<div class=\"wp-block-columns\"><!-- wp:column -->
<div class=\"wp-block-column\"><!-- wp:heading {\"level\":3} -->
<h3><strong>Buying a furnace</strong></h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Is your furnace more than 15 years old? Does it break down a lot, take too long to warm up, deliver inconsistent heating, or makes loud or unusual noises? If so, it might be time to buy a new high-efficiency furnace. We can help you find the right one for your home — natural gas or propane — with payment and financing options that work for your budget.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class=\"wp-block-buttons\"><!-- wp:button {\"className\":\"is-style-featured\"} -->
<div class=\"wp-block-button is-style-featured\"><a class=\"wp-block-button__link\">Buy a Furnace</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class=\"wp-block-column\"><!-- wp:heading {\"level\":3} -->
<h3><strong>Buying a furnace</strong></h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Is your furnace more than 15 years old? Does it break down a lot, take too long to warm up, deliver inconsistent heating, or makes loud or unusual noises? If so, it might be time to buy a new high-efficiency furnace. We can help you find the right one for your home — natural gas or propane — with payment and financing options that work for your budget.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class=\"wp-block-buttons\"><!-- wp:button {\"className\":\"is-style-featured\"} -->
<div class=\"wp-block-button is-style-featured\"><a class=\"wp-block-button__link\">Buy a Furnace</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div></div>
<!-- /wp:portent/block-tabbed-content--tab -->

<!-- wp:portent/block-tabbed-content--tab {\"title\":\"Tab 5\",\"tabid\":\"1e70f4c6-0362-42a0-b01b-9a90c042714e\"} -->
<div class=\"wp-block-portent-block-tabbed-content--tab block-tabbed-content__panel\"><h3 class=\"block-tabbed-content__tab__title\" data-tab=\"1e70f4c6-0362-42a0-b01b-9a90c042714e\">Tab 5</h3><div class=\"block-tabbed-content__tab-content\" data-tab=\"1e70f4c6-0362-42a0-b01b-9a90c042714e\"><!-- wp:columns -->
<div class=\"wp-block-columns\"><!-- wp:column -->
<div class=\"wp-block-column\"><!-- wp:heading {\"level\":3} -->
<h3><strong>Buying a furnace</strong></h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Is your furnace more than 15 years old? Does it break down a lot, take too long to warm up, deliver inconsistent heating, or makes loud or unusual noises? If so, it might be time to buy a new high-efficiency furnace. We can help you find the right one for your home — natural gas or propane — with payment and financing options that work for your budget.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class=\"wp-block-buttons\"><!-- wp:button {\"className\":\"is-style-featured\"} -->
<div class=\"wp-block-button is-style-featured\"><a class=\"wp-block-button__link\">Buy a Furnace</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class=\"wp-block-column\"><!-- wp:heading {\"level\":3} -->
<h3><strong>Buying a furnace</strong></h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Is your furnace more than 15 years old? Does it break down a lot, take too long to warm up, deliver inconsistent heating, or makes loud or unusual noises? If so, it might be time to buy a new high-efficiency furnace. We can help you find the right one for your home — natural gas or propane — with payment and financing options that work for your budget.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class=\"wp-block-buttons\"><!-- wp:button {\"className\":\"is-style-featured\"} -->
<div class=\"wp-block-button is-style-featured\"><a class=\"wp-block-button__link\">Buy a Furnace</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div></div>
<!-- /wp:portent/block-tabbed-content--tab --></div></div>
<!-- /wp:portent/block-tabbed-content --></div>
<!-- /wp:group -->
",
		)
	);
  
}

add_action('acf/init', 'enercare_block_patterns' );