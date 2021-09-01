wp.domReady( () => {
	wp.blocks.unregisterBlockStyle(
		'core/button',
		[ 'default', 'outline', 'squared', 'fill' ]
	);

	wp.blocks.registerBlockStyle(
		'core/button',
		[
			{
				name: 'default',
				label: 'Default',
				isDefault: true,
			},
			{
				name: 'full',
				label: 'Full Width',
			},
			{
				name: 'large',
				label: 'Large'
			}
		]
	);

	wp.blocks.unregisterBlockStyle(
		'core/separator',
		[ 'default', 'wide', 'dots' ],
	);

	wp.blocks.unregisterBlockStyle(
		'core/quote',
		[ 'default', 'large' ]
	);

	wp.blocks.registerBlockStyle(
		'core/list',
		[
			{
				name: 'checkmarked',
				label: 'Checkmarked'
			},
			{
				name: 'pros',
				label: 'Pros'
			},
			{
				name: 'cons',
				label: 'Cons'
			}
		]
	);

	wp.blocks.registerBlockStyle(
		'acf/card',
		[
			{
				name: 'bordered',
				label: 'Bordered',
				isDefault: true,
			},
			{
				name: 'shadowed',
				label: 'Shadowed',
			}
		]
	);

} );
