<?php
function enercare_block_patterns() {

	register_block_pattern_category(
		'enercare',
		array( 'label' => __( 'Enercare', 'portent_enercare' ) )
	);
  register_block_pattern_category(
		'locations',
		array( 'label' => __( 'Locations', 'portent_enercare' ) )
	);
  register_block_pattern_category(
		'tabs',
		array( 'label' => __( 'Tabs', 'portent_enercare' ) )
	);
  register_block_pattern_category(
		'carousels',
		array( 'label' => __( 'Carousels', 'portent_enercare' ) )
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
  
  /**
	 * Tabbed 2 Column Content - Locations
	 */
	register_block_pattern( 'portent_enercare/tabbed-two-column-content-locations',
		array(
			'title' => __( 'Tabbed 2 Column Content - Locations', 'portent_enercare'),
			'description' => _x('Tabs of 2 column content for location pages', 'portent_enercare'),
			'categories' => array('enercare', 'locations', 'tabs'),
			'content' => "
<!-- wp:group -->
<div class=\"wp-block-group\"><!-- wp:heading {\"textAlign\":\"center\"} -->
<h2 class=\"has-text-align-center\">Services available at Barrie</h2>
<!-- /wp:heading -->

<!-- wp:spacer {\"height\":26} -->
<div style=\"height:26px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div>
<!-- /wp:spacer -->

<!-- wp:portent/block-tabbed-content {\"tabs\":\"[[\u002280447220-1c4a-4e15-8185-21d43f8f6856\u0022,\u0022Boiler \u0026 Furnace\u0022,\u0022https://dev-enercare.pantheonsite.io/wp-content/uploads/2021/09/heat-flame-dc1c28.svg\u0022],[\u00228c966f3d-3369-4fdb-b1a2-ba3f448f2610\u0022,\u0022Air Conditioner\u0022,\u0022https://dev-enercare.pantheonsite.io/wp-content/uploads/2021/09/cooling-ac-picto-dc1c28.svg\u0022],[\u00220a050b56-adf1-47a2-8c75-081c7da9f14a\u0022,\u0022Water Heater\u0022,\u0022https://dev-enercare.pantheonsite.io/wp-content/uploads/2021/09/water-heat-picto-dc1c28.svg\u0022],[\u002288beee54-2e94-4d0e-9746-7dd195955db7\u0022,\u0022Plumbing\u0022,\u0022https://dev-enercare.pantheonsite.io/wp-content/uploads/2021/09/plumbing-picto-dc1c28.svg\u0022]]\"} -->
<div class=\"wp-block-portent-block-tabbed-content\"><div class=\"block-tabbed-content__tabs init block-tabbed-content__tabs--left\"><button class=\"block-tabbed-content__tab\" data-interface=\"tab-button\" data-tab=\"80447220-1c4a-4e15-8185-21d43f8f6856\"><img width=\"20px\" height=\"20px\" alt=\"\" src=\"https://dev-enercare.pantheonsite.io/wp-content/uploads/2021/09/heat-flame-dc1c28.svg\"/>Boiler &amp; Furnace</button><button class=\"block-tabbed-content__tab\" data-interface=\"tab-button\" data-tab=\"8c966f3d-3369-4fdb-b1a2-ba3f448f2610\"><img width=\"20px\" height=\"20px\" alt=\"\" src=\"https://dev-enercare.pantheonsite.io/wp-content/uploads/2021/09/cooling-ac-picto-dc1c28.svg\"/>Air Conditioner</button><button class=\"block-tabbed-content__tab\" data-interface=\"tab-button\" data-tab=\"0a050b56-adf1-47a2-8c75-081c7da9f14a\"><img width=\"20px\" height=\"20px\" alt=\"\" src=\"https://dev-enercare.pantheonsite.io/wp-content/uploads/2021/09/water-heat-picto-dc1c28.svg\"/>Water Heater</button><button class=\"block-tabbed-content__tab\" data-interface=\"tab-button\" data-tab=\"88beee54-2e94-4d0e-9746-7dd195955db7\"><img width=\"20px\" height=\"20px\" alt=\"\" src=\"https://dev-enercare.pantheonsite.io/wp-content/uploads/2021/09/plumbing-picto-dc1c28.svg\"/>Plumbing</button></div><div class=\"block-tabbed-content__tab-panels init\"><!-- wp:portent/block-tabbed-content--tab {\"title\":\"Boiler \u0026 Furnace\",\"iconid\":\"https://dev-enercare.pantheonsite.io/wp-content/uploads/2021/09/heat-flame-dc1c28.svg\",\"tabid\":\"80447220-1c4a-4e15-8185-21d43f8f6856\"} -->
<div class=\"wp-block-portent-block-tabbed-content--tab block-tabbed-content__panel\"><h3 class=\"block-tabbed-content__tab__title\" data-tab=\"80447220-1c4a-4e15-8185-21d43f8f6856\">Boiler &amp; Furnace</h3><div class=\"block-tabbed-content__tab-content\" data-tab=\"80447220-1c4a-4e15-8185-21d43f8f6856\"><!-- wp:columns -->
<div class=\"wp-block-columns\"><!-- wp:column -->
<div class=\"wp-block-column\"><!-- wp:heading -->
<h2>Barrie Boiler and Furnace Repair, Maintenance &amp; Installation</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Are you hearing strange noises from your furnace or boiler? You might need replacement, repair or maintenance services for your Barrie home’s <a href=\"https://www.enercare.ca/heating\">heating equipment</a>. Don’t ignore the first signs of trouble — it’s always a good idea to call the professionals for a free consultation.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>When you schedule a furnace or boiler repair with our Barrie team, you get:</p>
<!-- /wp:paragraph -->

<!-- wp:list {\"className\":\"is-style-checkmarked\"} -->
<ul class=\"is-style-checkmarked\"><li>Top-quality service from fully licensed technicians</li><li>A fixed-price quote up front that includes all parts and labour – no hidden charges</li><li>A complete diagnostic and safety check of your equipment</li><li>A comprehensive home care report outlining the health of your heating equipment</li></ul>
<!-- /wp:list -->

<!-- wp:paragraph -->
<p></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Every repair is guaranteed with 90-day labour and one-year parts coverage.* Or, if you want to prevent repairs, get in touch with our team about annual furnace or boiler <a href=\"https://www.enercare.ca/plans\">maintenance</a>. Our certified technicians will offer ongoing inspections and tune-ups to keep your home heating equipment stay at peak efficiency.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {\"contentJustification\":\"left\",\"align\":\"full\"} -->
<div class=\"wp-block-buttons alignfull is-content-justification-left\"><!-- wp:button {\"width\":50,\"className\":\"is-style-default\"} -->
<div class=\"wp-block-button has-custom-width wp-block-button__width-50 is-style-default\"><a class=\"wp-block-button__link\"><img class=\"wp-image-3290\" style=\"width: 40px;\" src=\"https://dev-enercare.pantheonsite.io/wp-content/uploads/2021/09/customer-service-picto-ffffff.svg\" alt=\"\">Call 1-866-633-1553</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class=\"wp-block-column\"><!-- wp:paragraph -->
<p></p>
<!-- /wp:paragraph -->

<!-- wp:image {\"id\":3856,\"sizeSlug\":\"large\",\"linkDestination\":\"none\"} -->
<figure class=\"wp-block-image size-large\"><img src=\"https://dev-enercare.pantheonsite.io/wp-content/uploads/2021/08/Enercare_JP_Day_4_Technician_Remove_Panel_2864_v3-1024x683.jpg\" alt=\"furnace repair\" class=\"wp-image-3856\"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div></div>
<!-- /wp:portent/block-tabbed-content--tab -->

<!-- wp:portent/block-tabbed-content--tab {\"title\":\"Air Conditioner\",\"iconid\":\"https://dev-enercare.pantheonsite.io/wp-content/uploads/2021/09/cooling-ac-picto-dc1c28.svg\",\"tabid\":\"8c966f3d-3369-4fdb-b1a2-ba3f448f2610\"} -->
<div class=\"wp-block-portent-block-tabbed-content--tab block-tabbed-content__panel\"><h3 class=\"block-tabbed-content__tab__title\" data-tab=\"8c966f3d-3369-4fdb-b1a2-ba3f448f2610\">Air Conditioner</h3><div class=\"block-tabbed-content__tab-content\" data-tab=\"8c966f3d-3369-4fdb-b1a2-ba3f448f2610\"><!-- wp:columns -->
<div class=\"wp-block-columns\"><!-- wp:column -->
<div class=\"wp-block-column\"><!-- wp:heading -->
<h2>Barrie AC Repair, Maintenance &amp; Installation</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>We provide Barrie homeowners with fast, reliable <a href=\"https://www.enercare.ca/cooling\">air conditioning services</a>. The Enercare team understands the discomfort of a sweltering home—our experts are available to take a look at your home’s HVAC system and determine a solution.&nbsp;</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Whether you need one-time repair services or would like to sign up for our <a href=\"https://www.enercare.ca/cooling/ac-protection-plan\">Cooling Repair &amp; Protection Plan</a>, our licensed technicians can quickly diagnose the issue and determine the right solution for your home. Enercare’s Barrie AC repair services include:</p>
<!-- /wp:paragraph -->

<!-- wp:list {\"className\":\"is-style-checkmarked\"} -->
<ul class=\"is-style-checkmarked\"><li>Top-quality service from fully licensed technicians</li><li>A fixed-price quote up front that includes all parts and labour – no hidden charges</li><li>A complete diagnostic and safety check of your air conditioner</li><li>A comprehensive home care report outlining the health of your air conditioner</li></ul>
<!-- /wp:list -->

<!-- wp:paragraph -->
<p></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Every repair is guaranteed with 90-day labour and one-year parts coverage.* If you’d like to ensure ongoing protection for your equipment, our <a href=\"https://www.enercare.ca/cooling/ac-maintenance-plan\">AC maintenance services</a> are designed to spot any potential problems. We also offer AC replacement services to homeowners in need of new equipment.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {\"contentJustification\":\"left\",\"align\":\"full\"} -->
<div class=\"wp-block-buttons alignfull is-content-justification-left\"><!-- wp:button {\"width\":50,\"className\":\"is-style-default\"} -->
<div class=\"wp-block-button has-custom-width wp-block-button__width-50 is-style-default\"><a class=\"wp-block-button__link\"><img class=\"wp-image-3290\" style=\"width: 40px;\" src=\"https://dev-enercare.pantheonsite.io/wp-content/uploads/2021/09/customer-service-picto-ffffff.svg\" alt=\"\">Call 1-866-633-1553</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class=\"wp-block-column\"><!-- wp:paragraph -->
<p></p>
<!-- /wp:paragraph -->

<!-- wp:image {\"id\":3943,\"sizeSlug\":\"large\",\"linkDestination\":\"none\"} -->
<figure class=\"wp-block-image size-large\"><img src=\"https://dev-enercare.pantheonsite.io/wp-content/uploads/2021/08/2021-06-11_Enercare_Day-04_Shot_11_Tech-Unscreewing-AC_0768_v3-1024x683.jpg\" alt=\"air conditioner repair\" class=\"wp-image-3943\"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div></div>
<!-- /wp:portent/block-tabbed-content--tab -->

<!-- wp:portent/block-tabbed-content--tab {\"title\":\"Water Heater\",\"iconid\":\"https://dev-enercare.pantheonsite.io/wp-content/uploads/2021/09/water-heat-picto-dc1c28.svg\",\"tabid\":\"0a050b56-adf1-47a2-8c75-081c7da9f14a\"} -->
<div class=\"wp-block-portent-block-tabbed-content--tab block-tabbed-content__panel\"><h3 class=\"block-tabbed-content__tab__title\" data-tab=\"0a050b56-adf1-47a2-8c75-081c7da9f14a\">Water Heater</h3><div class=\"block-tabbed-content__tab-content\" data-tab=\"0a050b56-adf1-47a2-8c75-081c7da9f14a\"><!-- wp:columns -->
<div class=\"wp-block-columns\"><!-- wp:column -->
<div class=\"wp-block-column\"><!-- wp:heading -->
<h2>Barrie Water Heater Repair &amp; Rental Services</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>If your plans for a relaxing hot shower or bath were recently disrupted by a malfunctioning water heater, we have you covered. Enercare provides water heater repair, replacement, and rental services to the Barrie community, including Barrie, Penetanguishene, Midland, Alliston, Innisfil, Orillia, Collingwood, Stayner, Creemore, and Wasaga Beach.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>When you choose Enercare for local water heater services, you receive the following:&nbsp;</p>
<!-- /wp:paragraph -->

<!-- wp:list {\"className\":\"is-style-checkmarked\"} -->
<ul class=\"is-style-checkmarked\"><li>Top-quality service from fully licensed technicians</li><li>A fixed-price quote up front that includes all parts and labour – no hidden charges</li><li>A complete diagnostic and safety check of your water heater</li><li>Flexible payment options</li></ul>
<!-- /wp:list -->

<!-- wp:paragraph -->
<p></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Our Barrie team is trained to repair all water heater makes and models right the first time, and our repair work comes fully guaranteed with 90-day labour coverage and one-year parts coverage*.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {\"contentJustification\":\"left\",\"align\":\"full\"} -->
<div class=\"wp-block-buttons alignfull is-content-justification-left\"><!-- wp:button {\"width\":50,\"className\":\"is-style-default\"} -->
<div class=\"wp-block-button has-custom-width wp-block-button__width-50 is-style-default\"><a class=\"wp-block-button__link\"><img class=\"wp-image-3290\" style=\"width: 40px;\" src=\"https://dev-enercare.pantheonsite.io/wp-content/uploads/2021/09/customer-service-picto-ffffff.svg\" alt=\"\">Call 1-866-633-1553</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class=\"wp-block-column\"><!-- wp:paragraph -->
<p></p>
<!-- /wp:paragraph -->

<!-- wp:image {\"id\":3944,\"sizeSlug\":\"large\",\"linkDestination\":\"none\"} -->
<figure class=\"wp-block-image size-large\"><img src=\"https://dev-enercare.pantheonsite.io/wp-content/uploads/2021/08/2021-06-08_Enercare_Day-01_Shot_07_Water-Heater-Shut-Off_834-1024x683.jpg\" alt=\"water heater repair\" class=\"wp-image-3944\"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div></div>
<!-- /wp:portent/block-tabbed-content--tab -->

<!-- wp:portent/block-tabbed-content--tab {\"title\":\"Plumbing\",\"iconid\":\"https://dev-enercare.pantheonsite.io/wp-content/uploads/2021/09/plumbing-picto-dc1c28.svg\",\"tabid\":\"88beee54-2e94-4d0e-9746-7dd195955db7\"} -->
<div class=\"wp-block-portent-block-tabbed-content--tab block-tabbed-content__panel\"><h3 class=\"block-tabbed-content__tab__title\" data-tab=\"88beee54-2e94-4d0e-9746-7dd195955db7\">Plumbing</h3><div class=\"block-tabbed-content__tab-content\" data-tab=\"88beee54-2e94-4d0e-9746-7dd195955db7\"><!-- wp:columns -->
<div class=\"wp-block-columns\"><!-- wp:column -->
<div class=\"wp-block-column\"><!-- wp:heading -->
<h2>Barrie Plumbing Repair Services</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Whether you’re facing leaky or broken pipes, an unrelenting faucet drip, clogged drains or backed up drains and sewer lines, Enercare’s plumbing services have you covered. Get support from a licensed local plumber and the peace of mind that comes with an expert assessment. Here’s what’s included in a Barrie plumbing repair:</p>
<!-- /wp:paragraph -->

<!-- wp:list {\"className\":\"is-style-checkmarked\"} -->
<ul class=\"is-style-checkmarked\"><li>A diagnosis of the problem</li><li>A written, no-surprises quote for parts and labour to fix the problem</li><li>The best advice to make an informed decision</li><li>Same-day repair when parts are available</li></ul>
<!-- /wp:list -->

<!-- wp:paragraph -->
<p></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>After the plumbing emergency has been resolved, Enercare offers ongoing support with our <a href=\"https://www.enercare.ca/plumbing-electrical/plumbing-protection-plan\">Plumbing and Drains Protection Plan</a>. This plan helps you stay prepared for all of your home’s unexpected problems, sending a licensed plumber whenever issues arise.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {\"contentJustification\":\"left\",\"align\":\"full\"} -->
<div class=\"wp-block-buttons alignfull is-content-justification-left\"><!-- wp:button {\"width\":50,\"className\":\"is-style-default\"} -->
<div class=\"wp-block-button has-custom-width wp-block-button__width-50 is-style-default\"><a class=\"wp-block-button__link\"><img class=\"wp-image-3290\" style=\"width: 40px;\" src=\"https://dev-enercare.pantheonsite.io/wp-content/uploads/2021/09/customer-service-picto-ffffff.svg\" alt=\"\">Call 1-866-633-1553</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class=\"wp-block-column\"><!-- wp:paragraph -->
<p></p>
<!-- /wp:paragraph -->

<!-- wp:image {\"id\":3945,\"sizeSlug\":\"large\",\"linkDestination\":\"none\"} -->
<figure class=\"wp-block-image size-large\"><img src=\"https://dev-enercare.pantheonsite.io/wp-content/uploads/2021/08/2021-06-08_Enercare_Day-01_Shot_14_Plumber-Repairing-Toilet_20290147_v2.-1024x683.jpg\" alt=\"plumbing repair\" class=\"wp-image-3945\"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div></div>
<!-- /wp:portent/block-tabbed-content--tab --></div></div>
<!-- /wp:portent/block-tabbed-content --></div>
<!-- /wp:group -->
",
		)
	);
  
  /**
	 * Mega Buttons with Icons - Locations
	 */
	register_block_pattern( 'portent_enercare/mega-buttons-icons-locations',
		array(
			'title' => __( 'Mega Buttons with Icons - Locations', 'portent_enercare'),
			'description' => _x('Mega buttons with icons for location pages', 'portent_enercare'),
			'categories' => array('enercare', 'locations', 'buttons'),
			'content' => "
<!-- wp:group {\"align\":\"full\",\"backgroundColor\":\"grey-10\"} -->
<div class=\"wp-block-group alignfull has-grey-10-background-color has-background\"><!-- wp:acf/mega-button {\"id\":\"block_6144d9f8d771f\",\"name\":\"acf/mega-button\",\"data\":{\"image\":3302,\"_image\":\"field_612e949ed0c97\",\"link\":{\"title\":\"Offers\",\"url\":\"/special-offers/\",\"target\":\"\"},\"_link\":\"field_612e948ad0c96\"},\"align\":\"left\",\"mode\":\"preview\",\"wpClassName\":\"wp-block-acf-mega-button alignleft Test\",\"className\":\"Test\"} /-->

<!-- wp:acf/mega-button {\"id\":\"block_6144e28ed7724\",\"name\":\"acf/mega-button\",\"data\":{\"image\":3297,\"_image\":\"field_612e949ed0c97\",\"link\":{\"title\":\"Boiler \u0026 Furnace\",\"url\":\"/heating\",\"target\":\"\"},\"_link\":\"field_612e948ad0c96\"},\"align\":\"left\",\"mode\":\"preview\",\"wpClassName\":\"wp-block-acf-mega-button alignleft Test\",\"className\":\"Test\"} /-->

<!-- wp:acf/mega-button {\"id\":\"block_6144e2c2d7725\",\"name\":\"acf/mega-button\",\"data\":{\"image\":3313,\"_image\":\"field_612e949ed0c97\",\"link\":{\"title\":\"Air Conditioner\",\"url\":\"/cooling\",\"target\":\"\"},\"_link\":\"field_612e948ad0c96\"},\"align\":\"left\",\"mode\":\"preview\",\"wpClassName\":\"wp-block-acf-mega-button alignleft Test\",\"className\":\"Test\"} /-->

<!-- wp:acf/mega-button {\"id\":\"block_6144e2c4d7726\",\"name\":\"acf/mega-button\",\"data\":{\"image\":3308,\"_image\":\"field_612e949ed0c97\",\"link\":{\"title\":\"Water Heater\",\"url\":\"/water/water-heating\",\"target\":\"\"},\"_link\":\"field_612e948ad0c96\"},\"align\":\"left\",\"mode\":\"preview\",\"wpClassName\":\"wp-block-acf-mega-button alignleft Test\",\"className\":\"Test\"} /-->

<!-- wp:acf/mega-button {\"id\":\"block_6144e2c7d7727\",\"name\":\"acf/mega-button\",\"data\":{\"image\":3301,\"_image\":\"field_612e949ed0c97\",\"link\":{\"title\":\"Plumbing\",\"url\":\"/plumbing-electrical/plumbing-repair\",\"target\":\"\"},\"_link\":\"field_612e948ad0c96\"},\"align\":\"left\",\"mode\":\"preview\",\"wpClassName\":\"wp-block-acf-mega-button alignleft Test\",\"className\":\"Test\"} /-->

<!-- wp:acf/mega-button {\"id\":\"block_6144e2ccd7728\",\"name\":\"acf/mega-button\",\"data\":{\"image\":3303,\"_image\":\"field_612e949ed0c97\",\"link\":{\"title\":\"Location Info\",\"url\":\"/locations/barrie/#location\",\"target\":\"\"},\"_link\":\"field_612e948ad0c96\"},\"align\":\"left\",\"mode\":\"preview\",\"wpClassName\":\"wp-block-acf-mega-button alignleft Test\",\"className\":\"Test\"} /-->

<!-- wp:paragraph -->
<p></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->
",
		)
	);
  
  /**
	 * ECM Bio Carousel - Locations
	 */
	register_block_pattern( 'portent_enercare/ecm-bio-carousel-locations',
		array(
			'title' => __( 'ECM Bios Carousel - Locations', 'portent_enercare'),
			'description' => _x('ECM Bios in a carousel for location pages', 'portent_enercare'),
			'categories' => array('enercare', 'locations', 'carousels'),
			'content' => "
<!-- wp:group -->
<div class=\"wp-block-group\"><!-- wp:heading {\"textAlign\":\"center\"} -->
<h2 class=\"has-text-align-center\">Meet Your Local Energy Management Consultants</h2>
<!-- /wp:heading -->

<!-- wp:acf/glider-carousel {\"id\":\"block_6144eef35a28d\",\"name\":\"acf/glider-carousel\",\"data\":{\"slides_to_show\":\"1\",\"_slides_to_show\":\"field_612d7a6eeafcd\",\"slides_to_advance\":\"1\",\"_slides_to_advance\":\"field_612d7a7beafce\",\"rewind\":\"1\",\"_rewind\":\"field_612d7a8eeafcf\",\"arrows\":\"1\",\"_arrows\":\"field_612d7aa5eafd0\",\"dots\":\"1\",\"_dots\":\"field_612d7abceafd1\",\"breakpoints_0_breakpoint\":\"775\",\"_breakpoints_0_breakpoint\":\"field_61438d901b8f3\",\"breakpoints_0_slides_to_show\":\"3\",\"_breakpoints_0_slides_to_show\":\"field_61438d671b8f1\",\"breakpoints_0_slides_to_advance\":\"1\",\"_breakpoints_0_slides_to_advance\":\"field_61438d7b1b8f2\",\"breakpoints_0_item_width\":\"272\",\"_breakpoints_0_item_width\":\"field_612d7d07b9cae\",\"breakpoints_0_duration\":\"0.5\",\"_breakpoints_0_duration\":\"field_612d7cfbb9cad\",\"breakpoints\":1,\"_breakpoints\":\"field_612d7b2cb9ca7\"},\"align\":\"\",\"mode\":\"preview\",\"wpClassName\":\"wp-block-acf-glider-carousel\"} -->
<!-- wp:acf/ecm-card {\"id\":\"block_6144eb215a287\",\"name\":\"acf/ecm-card\",\"data\":{\"image\":\"\",\"_image\":\"field_612d778659c6e\",\"name\":\"\",\"_name\":\"field_612d77a859c6f\",\"title\":\"\",\"_title\":\"field_612d794259c70\",\"bio\":\"\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Proin venenatis nisl nec purus porta volutpat. Suspendisse varius ligula sit amet dolor suscipit, et auctor massa molestie. Curabitur rhoncus efficitur blandit. Donec ac ultrices orci. Vestibulum at massa sed sem pulvinar scelerisque.\",\"_bio\":\"field_612d796b59c71\",\"cta_text\":\"Read Bio\",\"_cta_text\":\"field_612d798f59c72\"},\"mode\":\"preview\",\"wpClassName\":\"wp-block-acf-ecm-card\"} /-->

<!-- wp:acf/ecm-card {\"id\":\"block_6144eb335a288\",\"name\":\"acf/ecm-card\",\"data\":{\"image\":\"\",\"_image\":\"field_612d778659c6e\",\"name\":\"\",\"_name\":\"field_612d77a859c6f\",\"title\":\"\",\"_title\":\"field_612d794259c70\",\"bio\":\"\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Proin venenatis nisl nec purus porta volutpat. Suspendisse varius ligula sit amet dolor suscipit, et auctor massa molestie. Curabitur rhoncus efficitur blandit. Donec ac ultrices orci. Vestibulum at massa sed sem pulvinar scelerisque.\",\"_bio\":\"field_612d796b59c71\",\"cta_text\":\"Read Bio\",\"_cta_text\":\"field_612d798f59c72\"},\"mode\":\"preview\",\"wpClassName\":\"wp-block-acf-ecm-card\"} /-->

<!-- wp:acf/ecm-card {\"id\":\"block_6144eb445a289\",\"name\":\"acf/ecm-card\",\"data\":{\"image\":\"\",\"_image\":\"field_612d778659c6e\",\"name\":\"\",\"_name\":\"field_612d77a859c6f\",\"title\":\"\",\"_title\":\"field_612d794259c70\",\"bio\":\"\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Proin venenatis nisl nec purus porta volutpat. Suspendisse varius ligula sit amet dolor suscipit, et auctor massa molestie. Curabitur rhoncus efficitur blandit. Donec ac ultrices orci. Vestibulum at massa sed sem pulvinar scelerisque.\",\"_bio\":\"field_612d796b59c71\",\"cta_text\":\"Read Bio\",\"_cta_text\":\"field_612d798f59c72\"},\"mode\":\"preview\",\"wpClassName\":\"wp-block-acf-ecm-card\"} /-->

<!-- wp:acf/ecm-card {\"id\":\"block_6144eb475a28a\",\"name\":\"acf/ecm-card\",\"data\":{\"image\":\"\",\"_image\":\"field_612d778659c6e\",\"name\":\"\",\"_name\":\"field_612d77a859c6f\",\"title\":\"\",\"_title\":\"field_612d794259c70\",\"bio\":\"\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Proin venenatis nisl nec purus porta volutpat. Suspendisse varius ligula sit amet dolor suscipit, et auctor massa molestie. Curabitur rhoncus efficitur blandit. Donec ac ultrices orci. Vestibulum at massa sed sem pulvinar scelerisque.\",\"_bio\":\"field_612d796b59c71\",\"cta_text\":\"Read Bio\",\"_cta_text\":\"field_612d798f59c72\"},\"mode\":\"preview\",\"wpClassName\":\"wp-block-acf-ecm-card\"} /-->
<!-- /wp:acf/glider-carousel --></div>
<!-- /wp:group -->
",
		)
	);
  
  /**
	 * Location About Info
	 */
	register_block_pattern( 'portent_enercare/why-enercare-five-column-cards',
		array(
			'title' => __( 'Why Enercare? 5 Column Cards', 'portent_enercare'),
			'description' => _x('Why choose Enercare? 5 Column Cards with icons.', 'portent_enercare'),
			'categories' => array('enercare', 'cards', 'text'),
			'content' => "
<!-- wp:group -->
<div class=\"wp-block-group\"><!-- wp:image {\"align\":\"center\",\"id\":3310,\"width\":130,\"height\":130,\"sizeSlug\":\"large\",\"linkDestination\":\"none\"} -->
<div class=\"wp-block-image\"><figure class=\"aligncenter size-large is-resized\"><img src=\"https://dev-enercare.pantheonsite.io/wp-content/uploads/2021/09/billing-picto-dc1c28.svg\" alt=\"\" class=\"wp-image-3310\" width=\"130\" height=\"130\"/></figure></div>
<!-- /wp:image -->

<!-- wp:heading {\"textAlign\":\"center\"} -->
<h2 class=\"has-text-align-center\">Why Choose Enercare?</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {\"align\":\"center\",\"fontSize\":\"normal\"} -->
<p class=\"has-text-align-center has-normal-font-size\">When you choose Enercare, you get expert advice and quality work from one of our friendly, professional and fully licensed electricians along with:</p>
<!-- /wp:paragraph -->

<!-- wp:columns -->
<div class=\"wp-block-columns\"><!-- wp:column {\"width\":\"100%\"} -->
<div class=\"wp-block-column\" style=\"flex-basis:100%\"><!-- wp:columns -->
<div class=\"wp-block-columns\"><!-- wp:column -->
<div class=\"wp-block-column\"><!-- wp:acf/card {\"id\":\"block_6141246acb720\",\"name\":\"acf/card\",\"align\":\"\",\"mode\":\"preview\",\"wpClassName\":\"wp-block-acf-card is-style-shadowed has-white-background-color has-background\",\"className\":\"is-style-shadowed\",\"backgroundColor\":\"white\"} -->
<!-- wp:image {\"align\":\"center\",\"id\":3310,\"width\":150,\"height\":150,\"sizeSlug\":\"large\",\"linkDestination\":\"none\"} -->
<div class=\"wp-block-image\"><figure class=\"aligncenter size-large is-resized\"><img src=\"https://dev-enercare.pantheonsite.io/wp-content/uploads/2021/09/billing-picto-dc1c28.svg\" alt=\"\" class=\"wp-image-3310\" width=\"150\" height=\"150\"/></figure></div>
<!-- /wp:image -->

<!-- wp:paragraph {\"fontSize\":\"normal\"} -->
<p class=\"has-normal-font-size\">A fixed price quote upfront, including all parts and labour — no hidden charges</p>
<!-- /wp:paragraph -->
<!-- /wp:acf/card --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class=\"wp-block-column\"><!-- wp:acf/card {\"id\":\"block_61412554cb73a\",\"name\":\"acf/card\",\"align\":\"\",\"mode\":\"preview\",\"wpClassName\":\"wp-block-acf-card is-style-shadowed has-white-background-color has-background\",\"className\":\"is-style-shadowed\",\"backgroundColor\":\"white\"} -->
<!-- wp:image {\"align\":\"center\",\"id\":3299,\"width\":150,\"height\":150,\"sizeSlug\":\"large\",\"linkDestination\":\"none\"} -->
<div class=\"wp-block-image\"><figure class=\"aligncenter size-large is-resized\"><img src=\"https://dev-enercare.pantheonsite.io/wp-content/uploads/2021/09/maintenance-plans-tools-picto-dc1c28.svg\" alt=\"\" class=\"wp-image-3299\" width=\"150\" height=\"150\"/></figure></div>
<!-- /wp:image -->

<!-- wp:paragraph {\"align\":\"center\",\"fontSize\":\"normal\"} -->
<p class=\"has-text-align-center has-normal-font-size\">1-year parts and a 90-day labour guarantee for all repair work completed<sup>†</sup></p>
<!-- /wp:paragraph -->
<!-- /wp:acf/card --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class=\"wp-block-column\"><!-- wp:acf/card {\"id\":\"block_61412559cb73e\",\"name\":\"acf/card\",\"align\":\"\",\"mode\":\"preview\",\"wpClassName\":\"wp-block-acf-card is-style-shadowed has-white-background-color has-background\",\"className\":\"is-style-shadowed\",\"backgroundColor\":\"white\"} -->
<!-- wp:image {\"align\":\"center\",\"id\":3305,\"width\":150,\"height\":150,\"sizeSlug\":\"large\",\"linkDestination\":\"none\"} -->
<div class=\"wp-block-image\"><figure class=\"aligncenter size-large is-resized\"><img src=\"https://dev-enercare.pantheonsite.io/wp-content/uploads/2021/09/smart-home-picto-dc1c28.svg\" alt=\"\" class=\"wp-image-3305\" width=\"150\" height=\"150\"/></figure></div>
<!-- /wp:image -->

<!-- wp:paragraph {\"align\":\"center\",\"fontSize\":\"normal\"} -->
<p class=\"has-text-align-center has-normal-font-size\">Service and repairs for a wide range of devices and brands, often on the same day<sup>1</sup></p>
<!-- /wp:paragraph -->
<!-- /wp:acf/card --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class=\"wp-block-column\"><!-- wp:acf/card {\"id\":\"block_61491d5a50d4d\",\"name\":\"acf/card\",\"align\":\"\",\"mode\":\"preview\",\"wpClassName\":\"wp-block-acf-card is-style-shadowed has-white-background-color has-background\",\"className\":\"is-style-shadowed\",\"backgroundColor\":\"white\"} -->
<!-- wp:image {\"align\":\"center\",\"id\":3307,\"width\":150,\"height\":150,\"sizeSlug\":\"large\",\"linkDestination\":\"none\"} -->
<div class=\"wp-block-image\"><figure class=\"aligncenter size-large is-resized\"><img src=\"https://dev-enercare.pantheonsite.io/wp-content/uploads/2021/09/van-picto-dc1c28.svg\" alt=\"\" class=\"wp-image-3307\" width=\"150\" height=\"150\"/></figure></div>
<!-- /wp:image -->

<!-- wp:paragraph {\"align\":\"center\",\"fontSize\":\"normal\"} -->
<p class=\"has-text-align-center has-normal-font-size\">An expedited approval process for any required permits</p>
<!-- /wp:paragraph -->
<!-- /wp:acf/card --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class=\"wp-block-column\"><!-- wp:acf/card {\"id\":\"block_61491d5c50d4e\",\"name\":\"acf/card\",\"align\":\"\",\"mode\":\"preview\",\"wpClassName\":\"wp-block-acf-card is-style-shadowed has-white-background-color has-background\",\"className\":\"is-style-shadowed\",\"backgroundColor\":\"white\"} -->
<!-- wp:image {\"align\":\"center\",\"id\":3302,\"width\":150,\"height\":150,\"sizeSlug\":\"large\",\"linkDestination\":\"none\"} -->
<div class=\"wp-block-image\"><figure class=\"aligncenter size-large is-resized\"><img src=\"https://dev-enercare.pantheonsite.io/wp-content/uploads/2021/09/protection-ribbon-picto-dc1c28.svg\" alt=\"\" class=\"wp-image-3302\" width=\"150\" height=\"150\"/></figure></div>
<!-- /wp:image -->

<!-- wp:paragraph {\"align\":\"center\",\"fontSize\":\"normal\"} -->
<p class=\"has-text-align-center has-normal-font-size\">Service from a team of licensed electricians with a 4.8 score on Google and 93% 5-star reviews, our customers agree that we work hard to deliver the best service<sup>2</sup></p>
<!-- /wp:paragraph -->
<!-- /wp:acf/card --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
",
		)
	);
  
  /**
	 * Location About Info
	 */
	register_block_pattern( 'portent_enercare/location-about-info',
		array(
			'title' => __( 'Location About Info', 'portent_enercare'),
			'description' => _x('Location about info for location pages', 'portent_enercare'),
			'categories' => array('enercare', 'locations', 'text'),
			'content' => "
<!-- wp:group {\"align\":\"full\",\"backgroundColor\":\"grey-10\"} -->
<div class=\"wp-block-group alignfull has-grey-10-background-color has-background\"><!-- wp:heading {\"textAlign\":\"center\",\"align\":\"wide\",\"textColor\":\"grey\"} -->
<h2 class=\"alignwide has-text-align-center has-grey-color has-text-color\">How We Contribute to the Community:</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {\"align\":\"center\",\"textColor\":\"grey\"} -->
<p class=\"has-text-align-center has-grey-color has-text-color\">Enercare is proud to provide our Enercare Fresh Start program to the Barrie community. This is a program that is conducted in partnership with local organizations in the communities that we serve. The mandate of the program is to give those families who are residing in shelters the opportunity to change their living conditions with a customized fresh start package.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {\"align\":\"center\",\"textColor\":\"grey\"} -->
<p class=\"has-text-align-center has-grey-color has-text-color\">This is a program that brings great satisfaction to the regions we service, and to us as a company that takes great pride in being an active part of the community.</p>
<!-- /wp:paragraph -->

<!-- wp:spacer {\"height\":30} -->
<div style=\"height:30px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div>
<!-- /wp:spacer -->

<!-- wp:image {\"align\":\"center\",\"id\":3887,\"width\":768,\"height\":512,\"sizeSlug\":\"large\",\"linkDestination\":\"none\"} -->
<div class=\"wp-block-image\"><figure class=\"aligncenter size-large is-resized\"><img src=\"https://dev-enercare.pantheonsite.io/wp-content/uploads/2021/09/Enercare-117-1024x683.jpg\" alt=\"\" class=\"wp-image-3887\" width=\"768\" height=\"512\"/></figure></div>
<!-- /wp:image --></div>
<!-- /wp:group -->
",
		)
	);
  
  /**
	 * Location Info
	 */
	register_block_pattern( 'portent_enercare/location-info',
		array(
			'title' => __( 'Location 2 Column Info', 'portent_enercare'),
			'description' => _x('Location info for location pages', 'portent_enercare'),
			'categories' => array('enercare', 'locations', 'text'),
			'content' => "
<!-- wp:group {\"align\":\"full\",\"backgroundColor\":\"grey-10\"} -->
<div class=\"wp-block-group alignfull has-grey-10-background-color has-background\" id=\"location\"><!-- wp:heading {\"textAlign\":\"center\"} -->
<h2 class=\"has-text-align-center\">Location Info</h2>
<!-- /wp:heading -->

<!-- wp:columns -->
<div class=\"wp-block-columns\"><!-- wp:column {\"backgroundColor\":\"white\"} -->
<div class=\"wp-block-column has-white-background-color has-background\"><!-- wp:acf/location-info {\"id\":\"block_613faea58c938\",\"name\":\"acf/location-info\",\"align\":\"\",\"mode\":\"auto\",\"wpClassName\":\"wp-block-acf-location-info\"} /--></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class=\"wp-block-column\"><!-- wp:acf/location-map {\"id\":\"block_613faeb18c939\",\"name\":\"acf/location-map\",\"align\":\"\",\"mode\":\"auto\",\"wpClassName\":\"wp-block-acf-location-map\"} /--></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
",
		)
	);

	register_block_pattern('portent_enercare/mega-button-2-by-2-grid-block',
		array(
			'title' => __( '2x2 Mega Button Block', '2-by-2-mega-button-block' ),
			'description' => _x( '2x2 Mega Button using the Switchboard', 'Block pattern description', '2-by-2-mega-button-block' ),
			'categories' => array('enercare', 'locations'),
			'content' => "
			<!-- wp:group {\"align\":\"full\",\"backgroundColor\":\"grey-10\"} -->
				<div class=\"wp-block-group alignfull has-grey-10-background-color has-background\">
					<!-- wp:acf/enercare-switchboard {\"id\":\"block_62fff8d840711\",\"name\":\"acf/enercare-switchboard\",\"data\":{\"field_61805b36bd417\":\"2\",\"field_61805b7d3685b\":\"1\"},\"align\":\"\",\"mode\":\"preview\"} -->
					<!-- wp:acf/mega-button {\"id\":\"block_62fff8e240712\",\"name\":\"acf/mega-button\",\"data\":{\"field_612e949ed0c97\":\"\",\"field_612e948ad0c96\":{\"title\":\"Title Placeholder\",\"url\":\"/\",\"target\":\"\"},\"field_616f2bd334d20\":\"auto\",\"field_616f2c6c34d21\":\"top\"},\"align\":\"\",\"mode\":\"preview\"} /-->

					<!-- wp:acf/mega-button {\"id\":\"block_62fff91f40715\",\"name\":\"acf/mega-button\",\"data\":{\"field_612e949ed0c97\":\"\",\"field_612e948ad0c96\":{\"title\":\"Title Placeholder\",\"url\":\"/\",\"target\":\"\"},\"field_616f2bd334d20\":\"auto\",\"field_616f2c6c34d21\":\"top\"},\"align\":\"\",\"mode\":\"preview\"} /-->

					<!-- wp:acf/mega-button {\"id\":\"block_62fff99540719\",\"name\":\"acf/mega-button\",\"data\":{\"field_612e949ed0c97\":\"\",\"field_612e948ad0c96\":{\"title\":\"Title Placeholder\",\"url\":\"/\",\"target\":\"\"},\"field_616f2bd334d20\":\"auto\",\"field_616f2c6c34d21\":\"top\"},\"align\":\"\",\"mode\":\"preview\"} /-->

					<!-- wp:acf/mega-button {\"id\":\"block_62fff9a84071a\",\"name\":\"acf/mega-button\",\"data\":{\"field_612e949ed0c97\":\"\",\"field_612e948ad0c96\":{\"title\":\"Title Placeholder\",\"url\":\"/\",\"target\":\"\"},\"field_616f2bd334d20\":\"auto\",\"field_616f2c6c34d21\":\"top\"},\"align\":\"\",\"mode\":\"preview\"} /-->
				<!-- /wp:acf/enercare-switchboard --></div>
			<!-- /wp:group -->
			",
		)
	);

	register_block_pattern('portent_enercare/mega-button-3-by-2-grid-block',
		array(
			'title' => __( '3x2 Mega Button Block', '3-by-2-mega-button-block' ),
			'description' => _x( '3x2 Mega Button using the Switchboard', 'Block pattern description', '3-by-2-mega-button-block' ),
			'categories' => array('enercare', 'locations'),
			'content' => "
			<!-- wp:group {\"align\":\"full\",\"backgroundColor\":\"grey-10\"} -->
			<div class=\"wp-block-group alignfull has-grey-10-background-color has-background\">
			<!-- wp:acf/enercare-switchboard {\"id\":\"block_62fff73540705\",\"name\":\"acf/enercare-switchboard\",\"data\":{\"field_61805b36bd417\":\"3\",\"field_61805b7d3685b\":\"1\"},\"align\":\"\",\"mode\":\"preview\"} -->
				<!-- wp:acf/mega-button {\"id\":\"block_62fff75840706\",\"name\":\"acf/mega-button\",\"data\":{\"field_612e949ed0c97\":\"\",\"field_612e948ad0c96\":{\"title\":\"Title Placeholder\",\"url\":\"/\",\"target\":\"\"},\"field_616f2bd334d20\":\"auto\",\"field_616f2c6c34d21\":\"top\"},\"align\":\"\",\"mode\":\"preview\"} /-->

				<!-- wp:acf/mega-button {\"id\":\"block_62fff78e40709\",\"name\":\"acf/mega-button\",\"data\":{\"field_612e949ed0c97\":\"\",\"field_612e948ad0c96\":{\"title\":\"Title Placeholder\",\"url\":\"/\",\"target\":\"\"},\"field_616f2bd334d20\":\"auto\",\"field_616f2c6c34d21\":\"top\"},\"align\":\"\",\"mode\":\"preview\"} /-->

				<!-- wp:acf/mega-button {\"id\":\"block_62fff85f4070d\",\"name\":\"acf/mega-button\",\"data\":{\"field_612e949ed0c97\":\"\",\"field_612e948ad0c96\":{\"title\":\"Title Placeholder\",\"url\":\"/\",\"target\":\"\"},\"field_616f2bd334d20\":\"auto\",\"field_616f2c6c34d21\":\"top\"},\"align\":\"\",\"mode\":\"preview\"} /-->

				<!-- wp:acf/mega-button {\"id\":\"block_62fff94240716\",\"name\":\"acf/mega-button\",\"data\":{\"field_612e949ed0c97\":\"\",\"field_612e948ad0c96\":{\"title\":\"Title Placeholder\",\"url\":\"/\",\"target\":\"\"},\"field_616f2bd334d20\":\"auto\",\"field_616f2c6c34d21\":\"top\"},\"align\":\"\",\"mode\":\"preview\"} /-->

				<!-- wp:acf/mega-button {\"id\":\"block_62fff95940717\",\"name\":\"acf/mega-button\",\"data\":{\"field_612e949ed0c97\":\"\",\"field_612e948ad0c96\":{\"title\":\"Title Placeholder\",\"url\":\"/\",\"target\":\"\"},\"field_616f2bd334d20\":\"auto\",\"field_616f2c6c34d21\":\"top\"},\"align\":\"\",\"mode\":\"preview\"} /-->

				<!-- wp:acf/mega-button {\"id\":\"block_62fff96b40718\",\"name\":\"acf/mega-button\",\"data\":{\"field_612e949ed0c97\":\"\",\"field_612e948ad0c96\":{\"title\":\"Title Placeholder\",\"url\":\"/\",\"target\":\"\"},\"field_616f2bd334d20\":\"auto\",\"field_616f2c6c34d21\":\"top\"},\"align\":\"\",\"mode\":\"preview\"} /-->
			<!-- /wp:acf/enercare-switchboard --></div>
			<!-- /wp:group -->
			",
		)
	);  
}

add_action('acf/init', 'enercare_block_patterns' );